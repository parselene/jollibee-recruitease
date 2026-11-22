<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Applicant;
use App\Models\JobPosition;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Throwable;
use RuntimeException;

class ResumeUploadController extends Controller
{
    /**
     * Display the HR resume upload page.
     */
    public function create()
    {
        $jobPositions = JobPosition::where('is_active', true)
            ->orderBy('title')
            ->get();

        return view('hr.resume-upload.create', compact('jobPositions'));
    }

    /**
     * Upload and process a resume submitted directly to HR.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'job_position_id' => [
                'required',
                'exists:job_positions,id',
            ],
            'resume' => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ], [
            'resume.mimes' => 'Please upload a PDF resume.',
            'resume.max' => 'The resume must not exceed 5 MB.',
        ]);

        $jobPosition = JobPosition::whereKey($validated['job_position_id'])
            ->where('is_active', true)
            ->first();

        if (!$jobPosition) {
            throw ValidationException::withMessages([
                'job_position_id' => 'The selected job position is not active.',
            ]);
        }

        $email = strtolower(trim($validated['email']));

        $file = $validated['resume'];
        $filePath = $file->store('resumes', 'local');

        try {
            $fullPath = Storage::disk('local')->path($filePath);
            $pythonPath = config('services.python.path', 'python');

            /*
             * STEP 1: Extract text from the PDF.
             */
            $extractResult = $this->runPythonScript(
                $pythonPath,
                base_path('python/extract_resume.py'),
                null,
                [$fullPath],
                60
            );

            $extractedText = $extractResult['text'] ?? null;

            if (!$extractedText || !trim($extractedText)) {
                throw new RuntimeException(
                    'No readable text was found in the uploaded PDF.'
                );
            }

            /*
             * STEP 2: Preprocess the extracted text.
             */
            $preprocessResult = $this->runPythonScript(
                $pythonPath,
                base_path('python/preprocess_resume.py'),
                $extractedText,
                [],
                60
            );

            $cleanedText = $preprocessResult['cleaned_text'] ?? null;

            if (!$cleanedText) {
                throw new RuntimeException(
                    'Resume preprocessing did not return cleaned text.'
                );
            }

            $resumeTextForMatching =
                $preprocessResult['original_formatted_text']
                ?? $extractedText;

            /*
             * STEP 3: Extract applicant skills.
             */
            $skillResult = $this->runPythonScript(
                $pythonPath,
                base_path('python/extract_skills.py'),
                $cleanedText,
                [],
                60
            );

            $extractedSkills = $skillResult['skills'] ?? [];

            /*
             * STEP 4: Prepare job requirements.
             */
            $requiredSkills = $jobPosition->required_skills;

            if (is_string($requiredSkills)) {
                $requiredSkills = json_decode($requiredSkills, true);
            }

            if (!is_array($requiredSkills)) {
                $requiredSkills = [];
            }

            /*
             * STEP 5: Calculate resume match scores.
             */
            $matchScore = null;
            $skillsScore = null;
            $semanticScore = null;
            $matchedSkills = null;
            $missingSkills = null;

            if (count($requiredSkills) > 0) {
                $matchResult = $this->runPythonScript(
                    $pythonPath,
                    base_path('python/match_resume.py'),
                    json_encode([
                        'resume_text' => $resumeTextForMatching,
                        'extracted_skills' => $extractedSkills,
                        'required_skills' => $requiredSkills,
                        'job_title' => $jobPosition->title,
                        'job_description' => $jobPosition->description ?? '',
                    ], JSON_UNESCAPED_UNICODE),
                    [],
                    180,
                    true
                );

                $matchScore = $matchResult['match_score'] ?? null;
                $skillsScore = $matchResult['skills_score'] ?? null;
                $semanticScore = $matchResult['semantic_score'] ?? null;
                $matchedSkills = $matchResult['matched_skills'] ?? [];
                $missingSkills = $matchResult['missing_skills'] ?? [];

                if ($matchScore === null) {
                    throw new RuntimeException(
                        'The resume matching process did not return a score.'
                    );
                }
            }

            /*
             * STEP 6: Create or reuse the applicant account,
             * then save the application and resume.
             */
            DB::transaction(function () use (
                $validated,
                $email,
                $jobPosition,
                $file,
                $filePath,
                $extractedText,
                $cleanedText,
                $extractedSkills,
                $matchScore,
                $skillsScore,
                $semanticScore,
                $matchedSkills,
                $missingSkills
            ) {
                // Find an existing account using the email.
                $user = User::where('email', $email)
                    ->lockForUpdate()
                    ->first();

                if ($user) {
                    // Never attach an HR account to an applicant profile.
                    if ($user->role !== 'applicant') {
                        throw ValidationException::withMessages([
                            'email' => 'This email belongs to an HR account. Please use the applicant\'s email address.',
                        ]);
                    }
                } else {
                    // Create a new applicant account.
                    $user = User::create([
                        'name' => $validated['full_name'],
                        'email' => $email,
                        'password' => Hash::make(Str::random(40)),
                    ]);

                    // Role is assigned separately because it is not fillable.
                    $user->role = 'applicant';
                    $user->save();
                }

                // Reuse an existing profile, or create one.
                $applicant = Applicant::where('user_id', $user->id)
                    ->first();

                if (!$applicant) {
                    $applicant = Applicant::create([
                        'user_id' => $user->id,
                        'full_name' => $validated['full_name'],
                        'email' => $email,
                        'phone' => $validated['phone'] ?? null,
                    ]);
                }

                // Prevent duplicate applications.
                $alreadyApplied = Application::where(
                    'applicant_id',
                    $applicant->id
                )
                    ->where('job_position_id', $jobPosition->id)
                    ->exists();

                if ($alreadyApplied) {
                    throw ValidationException::withMessages([
                        'email' => 'This applicant has already applied for the selected job position.',
                    ]);
                }

                $application = Application::create([
                    'applicant_id' => $applicant->id,
                    'job_position_id' => $jobPosition->id,
                    'status' => 'submitted',
                ]);

                Resume::create([
                    'application_id' => $application->id,
                    'applicant_id' => $applicant->id,
                    'job_position_id' => $jobPosition->id,
                    'original_filename' => $file->getClientOriginalName(),
                    'file_path' => $filePath,
                    'mime_type' => $file->getMimeType(),
                    'extracted_text' => $extractedText,
                    'cleaned_text' => $cleanedText,
                    'extracted_skills' => $extractedSkills,
                    'matched_skills' => $matchedSkills,
                    'missing_skills' => $missingSkills,
                    'match_score' => $matchScore,
                    'skills_score' => $skillsScore,
                    'semantic_score' => $semanticScore,
                    'status' => 'pending',
                ]);
            });

        } catch (Throwable $exception) {
            // Remove the uploaded file if processing or saving fails.
            Storage::disk('local')->delete($filePath);

            if ($exception instanceof ValidationException) {
                throw $exception;
            }

            Log::error('HR resume upload failed', [
                'message' => $exception->getMessage(),
                'job_position_id' => $jobPosition->id,
                'email' => $email,
            ]);

            throw ValidationException::withMessages([
                'resume' => 'The resume could not be processed. Please check the PDF and try again. If the problem continues, contact the system administrator.',
            ]);
        }

        return redirect()
            ->route('hr.resume-upload.create')
            ->with('success', 'Resume uploaded and assessed successfully!');
    }

    /**
     * Run a Python script and return its JSON response.
     */
    private function runPythonScript(
        string $pythonPath,
        string $scriptPath,
        ?string $input = null,
        array $arguments = [],
        int $timeout = 60,
        bool $useModelEnvironment = false
    ): array {
        $process = new Process(array_merge(
            [$pythonPath, $scriptPath],
            $arguments
        ));

        if ($useModelEnvironment) {
            $userProfile = getenv('USERPROFILE')
                ?: getenv('HOME')
                ?: storage_path('app/python-home');

            $homeDrive = getenv('HOMEDRIVE') ?: substr($userProfile, 0, 2);
            $homePath = getenv('HOMEPATH') ?: substr($userProfile, 2);

            $process->setEnv([
                'SystemRoot' => getenv('SystemRoot') ?: 'C:\\Windows',
                'WINDIR' => getenv('WINDIR') ?: 'C:\\Windows',
                'PATH' => getenv('PATH') ?: 'C:\\Windows\\system32;C:\\Windows',
                'TEMP' => getenv('TEMP') ?: 'C:\\Windows\\Temp',
                'TMP' => getenv('TMP') ?: 'C:\\Windows\\Temp',
                'USERPROFILE' => $userProfile,
                'HOME' => $userProfile,
                'HOMEDRIVE' => $homeDrive,
                'HOMEPATH' => $homePath,
                'HF_HOME' => $userProfile . DIRECTORY_SEPARATOR . '.cache'
                    . DIRECTORY_SEPARATOR . 'huggingface',
            ]);
        }

        if ($input !== null) {
            $process->setInput($input);
        }

        $process->setTimeout($timeout);
        $process->run();

        $result = json_decode($process->getOutput(), true);

        if (
            !$process->isSuccessful() ||
            !is_array($result) ||
            empty($result['success'])
        ) {
            Log::error('Python resume processing failed', [
                'script' => $scriptPath,
                'output' => $process->getOutput(),
                'error' => $process->getErrorOutput(),
            ]);

            throw new RuntimeException(
                $result['message'] ?? 'A Python resume processing step failed.'
            );
        }

        return $result;
    }
}
