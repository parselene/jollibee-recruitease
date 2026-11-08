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
                'exists:job_positions,id'
            ],
        ]);

        $selectedJob = $request->job_position_id;

        // Candidate screening results
        $query = Application::with([
            'applicant',
            'jobPosition',
            'resume'
        ])
            ->whereHas('resume')
            ->leftJoin(
                'resumes',
                'applications.id',
                '=',
                'resumes.application_id'
            )
            ->join(
                'job_positions',
                'applications.job_position_id',
                '=',
                'job_positions.id'
            )
            ->select('applications.*');

        if ($selectedJob) {
            $query->where(
                'applications.job_position_id',
                $selectedJob
            );
        }

        $applications = $query
            ->orderBy('job_positions.title')
            ->orderByRaw('resumes.match_score IS NULL ASC')
            ->orderByDesc('resumes.match_score')
            ->orderByDesc('applications.applied_at')
            ->paginate(10)
            ->withQueryString();

        // Actual screening statistics
        $totalScreened = Resume::whereNotNull('match_score')->count();

        $averageMatchScore = Resume::whereNotNull('match_score')
            ->avg('match_score') ?? 0;

        $strongMatches = Resume::where('match_score', '>=', 70)
            ->count();

        $pendingScreening = Resume::whereNull('match_score')
            ->count();

        $jobPositions = JobPosition::orderBy('title')->get();

        return view('hr.resume-screening.index', compact(
            'applications',
            'jobPositions',
            'selectedJob',
            'totalScreened',
            'averageMatchScore',
            'strongMatches',
            'pendingScreening'
        ));
    }
}
