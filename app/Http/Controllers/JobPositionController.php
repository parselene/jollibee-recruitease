<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Throwable;

class JobPositionController extends Controller
{
    public function index()
    {
        $jobPositions = JobPosition::withCount('resumes')
            ->latest()
            ->get();

        return view('job_positions.index', compact('jobPositions'));
    }

    public function create()
    {
        return view('job_positions.create');
    }

    private function validateJobPosition(Request $request, bool $isUpdate = false): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'required_skills' => 'required|string',
            'min_experience_years' => 'required|integer|min:0',

            'application_deadline' => $isUpdate
                ? 'required|date'
                : 'required|date|after:now',

            'interview_date' => $isUpdate
                ? 'required|date'
                : 'required|date|after_or_equal:today',

            'interview_start_time' => 'required|date_format:H:i',
            'interview_end_time' => 'required|date_format:H:i|after:interview_start_time',
            'interview_duration_minutes' => 'required|integer|min:5|max:480',
            'shortlist_limit' => 'required|integer|min:1|max:100',

            'interview_location' => 'nullable|string|max:255',
            'interview_meeting_link' => 'nullable|url|max:2048',
            'interview_instructions' => 'nullable|string',
        ]);

        $data['required_skills'] = collect(
            explode(',', $data['required_skills'])
        )
            ->map(fn ($skill) => trim($skill))
            ->filter()
            ->unique()
            ->values()
            ->all();

        return $data;
    }

    public function store(Request $request)
    {
        $data = $this->validateJobPosition($request);

        $data['is_active'] = true;

        JobPosition::create($data);

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job position created successfully!');
    }

    public function edit(JobPosition $jobPosition)
    {
        return view('job_positions.edit', compact('jobPosition'));
    }

    public function update(Request $request, JobPosition $jobPosition)
    {
        $data = $this->validateJobPosition($request, true);

        // Check whether the assessment-related information changed.
        $assessmentChanged =
            $jobPosition->title !== $data['title'] ||
            $jobPosition->description !== ($data['description'] ?? null) ||
            ($jobPosition->required_skills ?? []) != $data['required_skills'];

        $data['is_active'] = $request->boolean('is_active');

        // Save the updated job position first.
        $jobPosition->update($data);

        $message = 'Job position updated successfully!';

        // Recalculate existing resumes only if assessment details changed.
        if ($assessmentChanged) {
            $results = $this->recalculateResumeScores($jobPosition);

            $message .= " Reassessment completed: {$results['updated']} resume(s) updated.";

            if ($results['failed'] > 0) {
                $message .= " {$results['failed']} resume(s) could not be reassessed. Check the Laravel log.";
            }
        }

        return redirect()
            ->route('job-positions.index')
            ->with('success', $message);
    }

    /**
     * Recalculate existing resume scores using the updated job information.
     */
    private function recalculateResumeScores(JobPosition $jobPosition): array
    {
        $updated = 0;
        $failed = 0;

        $requiredSkills = $jobPosition->required_skills ?? [];

        if (!is_array($requiredSkills) || count($requiredSkills) === 0) {
            return ['updated' => 0, 'failed' => 0];
        }

        $pythonPath = config('services.python.path', 'python');

        $resumes = Resume::where('job_position_id', $jobPosition->id)
            ->whereNotNull('extracted_text')
            ->get();

        foreach ($resumes as $resume) {
            try {
                $matchProcess = new Process([
                    $pythonPath,
                    base_path('python/match_resume.py'),
                ]);

                $matchProcess->setEnv([
                    'USERPROFILE' => 'C:\\Users\\admin',
                    'HOME' => 'C:\\Users\\admin',
                    'HOMEDRIVE' => 'C:',
                    'HOMEPATH' => '\\Users\\admin',
                    'HF_HOME' => 'C:\\Users\\admin\\.cache\\huggingface',
                ]);

                $matchProcess->setInput(json_encode([
                    'resume_text' => $resume->extracted_text,
                    'extracted_skills' => $resume->extracted_skills ?? [],
                    'required_skills' => $requiredSkills,
                    'job_title' => $jobPosition->title,
                    'job_description' => $jobPosition->description ?? '',
                ], JSON_UNESCAPED_UNICODE));

                $matchProcess->setTimeout(180);
                $matchProcess->run();

                $matchResult = json_decode(
                    $matchProcess->getOutput(),
                    true
                );

                if (
                    !$matchProcess->isSuccessful() ||
                    empty($matchResult['success']) ||
                    !isset($matchResult['match_score'])
                ) {
                    $failed++;

                    Log::error('Resume reassessment failed', [
                        'resume_id' => $resume->id,
                        'job_position_id' => $jobPosition->id,
                        'output' => $matchProcess->getOutput(),
                        'error' => $matchProcess->getErrorOutput(),
                    ]);

                    continue;
                }

                // Update assessment results without changing the application.
                $resume->update([
                    'match_score' => $matchResult['match_score'],
                    'skills_score' => $matchResult['skills_score'] ?? null,
                    'semantic_score' => $matchResult['semantic_score'] ?? null,
                    'matched_skills' => $matchResult['matched_skills'] ?? [],
                    'missing_skills' => $matchResult['missing_skills'] ?? [],
                ]);

                $updated++;

            } catch (Throwable $exception) {
                $failed++;

                Log::error('Resume reassessment exception', [
                    'resume_id' => $resume->id,
                    'job_position_id' => $jobPosition->id,
                    'message' => $exception->getMessage(),
                ]);
            }
        }

        return [
            'updated' => $updated,
            'failed' => $failed,
        ];
    }

    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job position deleted successfully!');
    }
}
