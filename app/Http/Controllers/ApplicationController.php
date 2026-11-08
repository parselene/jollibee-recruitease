<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPosition;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;
use Symfony\Component\Process\Process;

class ApplicationController extends Controller
{


private function isAcceptingApplications(JobPosition $jobPosition): bool
{
    return JobPosition::whereKey($jobPosition->id)
        ->where('is_active', true)
        ->whereNotNull('application_deadline')
        ->where('application_deadline', '>', now())
        ->exists();
}


public function create(JobPosition $jobPosition)
{
    if (!$this->isAcceptingApplications($jobPosition)) {
        return redirect()
            ->route('applicant.dashboard')
            ->with('error', 'Sorry, this vacancy is no longer accepting applications.');
    }

    return view('applicant.apply', compact('jobPosition'));
}

    public function store(Request $request, JobPosition $jobPosition)
    {
        if (!$this->isAcceptingApplications($jobPosition)) {
    return redirect()
        ->route('applicant.dashboard')
        ->with('error', 'Sorry, the application deadline has passed or this vacancy is no longer available.');
}

        $applicant = $request->user()->applicant;

        if (!$applicant) {
            abort(403, 'Applicant profile not found.');
        }

        // Prevent duplicate applications.
        $alreadyApplied = Application::where('applicant_id', $applicant->id)
            ->where('job_position_id', $jobPosition->id)
            ->exists();

        if ($alreadyApplied) {
            throw ValidationException::withMessages([
                'resume' => 'You have already applied for this position.',
            ]);
        }

        $validated = $request->validate([
            'resume' => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ], [
            'resume.mimes' => 'Please upload your resume as a PDF file.',
            'resume.max' => 'Your resume must not exceed 5 MB.',
        ]);

        $file = $validated['resume'];

        // Save the uploaded resume privately.
        $filePath = $file->store('resumes', 'local');

        try {
            $fullPath = Storage::disk('local')->path($filePath);

            $pythonPath = config('services.python.path', 'python');

            /*
             * STEP 1: Extract text from the PDF.
             */
            $extractProcess = new Process([
                $pythonPath,
                base_path('python/extract_resume.py'),
                $fullPath,
            ]);

            $extractProcess->setTimeout(60);
            $extractProcess->run();

            $extractResult = json_decode(
                $extractProcess->getOutput(),
                true
            );

            $extractedText = null;
            $cleanedText = null;
            $extractedSkills = [];
            $matchScore = null;
            $matchedSkills = null;
$missingSkills = null;

            if (
                $extractProcess->isSuccessful() &&
                !empty($extractResult['success']) &&
                !empty($extractResult['text'])
            ) {
                $extractedText = $extractResult['text'];

                /*
                 * STEP 2: Preprocess the extracted text.
                 */
                $preprocessProcess = new Process([
                    $pythonPath,
                    base_path('python/preprocess_resume.py'),
                ]);

                $preprocessProcess->setInput($extractedText);
                $preprocessProcess->setTimeout(60);
                $preprocessProcess->run();

                $preprocessResult = json_decode(
                    $preprocessProcess->getOutput(),
                    true
                );

                if (
                    $preprocessProcess->isSuccessful() &&
                    !empty($preprocessResult['success'])
                ) {
                    $cleanedText = $preprocessResult['cleaned_text'];

                    /*
                     * STEP 3: Extract skills from cleaned resume text.
                     */
                    $skillProcess = new Process([
                        $pythonPath,
                        base_path('python/extract_skills.py'),
                    ]);

                    $skillProcess->setInput($cleanedText);
                    $skillProcess->setTimeout(60);
                    $skillProcess->run();

                    $skillResult = json_decode(
                        $skillProcess->getOutput(),
                        true
                    );

                    if (
                        $skillProcess->isSuccessful() &&
                        !empty($skillResult['success'])
                    ) {
                        $extractedSkills = $skillResult['skills'];

                        /*
                         * STEP 4: Match extracted skills against
                         * the job's required skills.
                         */
                        $requiredSkills = $jobPosition->required_skills;

                        if (is_string($requiredSkills)) {
                            $requiredSkills = json_decode(
                                $requiredSkills,
                                true
                            );
                        }

                        if (
                            is_array($requiredSkills) &&
                            count($requiredSkills) > 0
                        ) {
                            $matchProcess = new Process([
                                $pythonPath,
                                base_path('python/match_resume.py'),
                            ]);

                            $matchProcess->setInput(json_encode([
                                'extracted_skills' => $extractedSkills,
                                'required_skills' => $requiredSkills,
                            ], JSON_UNESCAPED_UNICODE));

                            $matchProcess->setTimeout(60);
                            $matchProcess->run();

                            $matchResult = json_decode(
                                $matchProcess->getOutput(),
                                true
                            );

                            if (
                                $matchProcess->isSuccessful() &&
                                !empty($matchResult['success']) &&
                                isset($matchResult['match_score'])
                            ) {
                                $matchScore = $matchResult['match_score'];

                                    $matchedSkills = $matchResult['matched_skills'] ?? [];
    $missingSkills = $matchResult['missing_skills'] ?? [];
                            } else {
                                Log::error('Resume matching failed', [
                                    'output' => $matchProcess->getOutput(),
                                    'error' => $matchProcess->getErrorOutput(),
                                ]);
                            }
                        } else {
                            Log::warning('Job has no valid required skills.', [
                                'job_position_id' => $jobPosition->id,
                            ]);
                        }
                    } else {
                        Log::error('Resume skill extraction failed', [
                            'output' => $skillProcess->getOutput(),
                            'error' => $skillProcess->getErrorOutput(),
                        ]);
                    }
                } else {
                    Log::error('Resume preprocessing failed', [
                        'output' => $preprocessProcess->getOutput(),
                        'error' => $preprocessProcess->getErrorOutput(),
                    ]);
                }
            } else {
                Log::error('Resume extraction failed', [
                    'output' => $extractProcess->getOutput(),
                    'error' => $extractProcess->getErrorOutput(),
                ]);
            }

            /*
             * STEP 5: Save application and resume information,
             * including the automatically calculated match score.
                        */
DB::transaction(function () use (
    $applicant,
    $jobPosition,
    $file,
    $filePath,
    $extractedText,
    $cleanedText,
    $extractedSkills,
    $matchScore,
    $matchedSkills,
    $missingSkills
) {

    // Lock and recheck the vacancy before saving.
    $openJob = JobPosition::whereKey($jobPosition->id)
        ->where('is_active', true)
        ->whereNotNull('application_deadline')
        ->where('application_deadline', '>', now())
        ->lockForUpdate()
        ->first();

    if (!$openJob) {
        throw ValidationException::withMessages([
            'resume' => 'The application deadline has passed or this vacancy is no longer available.',
        ]);
    }

    // Check for duplicate applications again.
    $alreadyApplied = Application::where('applicant_id', $applicant->id)
        ->where('job_position_id', $openJob->id)
        ->exists();

    if ($alreadyApplied) {
        throw ValidationException::withMessages([
            'resume' => 'You have already applied for this position.',
        ]);
    }

    $application = Application::create([
        'applicant_id' => $applicant->id,
        'job_position_id' => $openJob->id,
        'status' => 'submitted',
    ]);

    Resume::create([
        'application_id' => $application->id,
        'applicant_id' => $applicant->id,
        'job_position_id' => $openJob->id,
        'original_filename' => $file->getClientOriginalName(),
        'file_path' => $filePath,
        'mime_type' => $file->getMimeType(),
        'extracted_text' => $extractedText,
        'cleaned_text' => $cleanedText,
        'extracted_skills' => $extractedSkills,
        'matched_skills' => $matchedSkills,
        'missing_skills' => $missingSkills,
        'match_score' => $matchScore,
        'status' => 'pending',
    ]);

});

        } catch (Throwable $exception) {
            Storage::disk('local')->delete($filePath);

            throw $exception;
        }

        return redirect()
            ->route('applicant.dashboard')
            ->with('success', 'Your application has been submitted successfully!');
    }
}
