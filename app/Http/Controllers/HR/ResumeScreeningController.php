<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobPosition;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeScreeningController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'job_position_id' => [
                'nullable',
                'integer',
                'exists:job_positions,id',
            ],
        ]);

        $selectedJob = $request->filled('job_position_id')
            ? (int) $request->job_position_id
            : null;

        /*
         * Retrieve job positions with individual screening statistics.
         */
        $jobPositions = JobPosition::query()
            ->withCount([
                'applications as applicant_count' => function ($query) {
                    $query->whereHas('resume');
                },
                'resumes as screened_count' => function ($query) {
                    $query->whereNotNull('match_score');
                },
                'resumes as pending_count' => function ($query) {
                    $query->whereNull('match_score');
                },
                'resumes as strong_match_count' => function ($query) {
                    $query->whereNotNull('match_score')
                        ->where('match_score', '>=', 70);
                },
            ])
            ->withAvg([
                'resumes as average_match_score' => function ($query) {
                    $query->whereNotNull('match_score');
                },
            ], 'match_score')
            ->orderBy('title')
            ->get();

        /*
         * Calculate statistics for the selected job,
         * or all jobs when viewing the overview.
         */
        $resumeStats = Resume::query();

        if ($selectedJob) {
            $resumeStats->where('job_position_id', $selectedJob);
        }

        $totalScreened = (clone $resumeStats)
            ->whereNotNull('match_score')
            ->count();

        $averageMatchScore = (clone $resumeStats)
            ->whereNotNull('match_score')
            ->avg('match_score') ?? 0;

        $strongMatches = (clone $resumeStats)
            ->whereNotNull('match_score')
            ->where('match_score', '>=', 70)
            ->count();

        $pendingScreening = (clone $resumeStats)
            ->whereNull('match_score')
            ->count();

        /*
         * Retrieve ranked applicants only when a job is selected.
         */
        $applications = null;

        if ($selectedJob) {
            $applications = Application::with([
                'applicant',
                'jobPosition',
                'resume',
            ])
                ->where('applications.job_position_id', $selectedJob)
                ->whereHas('resume')
                ->leftJoin(
                    'resumes',
                    'applications.id',
                    '=',
                    'resumes.application_id'
                )
                ->select('applications.*')
                ->orderByRaw('resumes.match_score IS NULL ASC')
                ->orderByDesc('resumes.match_score')
                ->orderByDesc('applications.applied_at')
                ->paginate(10)
                ->withQueryString();
        }

        $selectedJobPosition = $selectedJob
            ? $jobPositions->firstWhere('id', $selectedJob)
            : null;

            $viewData = compact(
                'applications',
                'jobPositions',
                'selectedJob',
                'selectedJobPosition',
                'totalScreened',
                'averageMatchScore',
                'strongMatches',
                'pendingScreening'
            );

            if ($selectedJob) {
                return view('hr.resume-screening.rankings', $viewData);
            }

            return view('hr.resume-screening.index', $viewData);
    }
}
