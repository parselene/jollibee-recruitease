<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPosition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        // Validate report filters
        $validated = $request->validate([
            'job_position_id' => [
                'nullable',
                'integer',
                'exists:job_positions,id'
            ],
            'date_from' => ['nullable', 'date'],
            'date_to' => [
                'nullable',
                'date',
                'after_or_equal:date_from'
            ],
        ]);

        $selectedJob = $validated['job_position_id'] ?? null;
        $dateFrom = $validated['date_from'] ?? null;
        $dateTo = $validated['date_to'] ?? null;

        // Base application query
        $applicationQuery = Application::query();

        // Filter by job position
        if ($selectedJob) {
            $applicationQuery->where(
                'applications.job_position_id',
                $selectedJob
            );
        }

        // Filter by starting date
        if ($dateFrom) {
            $applicationQuery->whereDate(
                'applications.applied_at',
                '>=',
                $dateFrom
            );
        }

        // Filter by ending date
        if ($dateTo) {
            $applicationQuery->whereDate(
                'applications.applied_at',
                '<=',
                $dateTo
            );
        }

        // Recruitment overview
        $totalApplications = (clone $applicationQuery)->count();

        $totalApplicants = (clone $applicationQuery)
            ->distinct()
            ->count('applications.applicant_id');

        $submittedApplications = (clone $applicationQuery)
            ->where('applications.status', 'submitted')
            ->count();

        $underReviewApplications = (clone $applicationQuery)
            ->where('applications.status', 'under_review')
            ->count();

        $shortlistedApplications = (clone $applicationQuery)
            ->where('applications.status', 'shortlisted')
            ->count();

        $rejectedApplications = (clone $applicationQuery)
            ->where('applications.status', 'rejected')
            ->count();

        $scheduledInterviews = (clone $applicationQuery)
            ->whereHas('interviewSchedule')
            ->count();

        // Vacancy statistics
        $jobQuery = JobPosition::query();

        if ($selectedJob) {
            $jobQuery->where('job_positions.id', $selectedJob);
        }

        $totalJobs = (clone $jobQuery)->count();

        $openJobs = (clone $jobQuery)
            ->where('job_positions.is_active', true)
            ->whereNotNull('job_positions.application_deadline')
            ->where('job_positions.application_deadline', '>=', now())
            ->count();

        $closedJobs = (clone $jobQuery)
            ->where('job_positions.is_active', true)
            ->where(function ($query) {
                $query->whereNull('job_positions.application_deadline')
                    ->orWhere(
                        'job_positions.application_deadline',
                        '<',
                        now()
                    );
            })
            ->count();

        $inactiveJobs = (clone $jobQuery)
            ->where('job_positions.is_active', false)
            ->count();

        // Application status distribution
        $statusLabels = [
            'Submitted',
            'Under Review',
            'Shortlisted',
            'Rejected',
        ];

        $statusData = [
            $submittedApplications,
            $underReviewApplications,
            $shortlistedApplications,
            $rejectedApplications,
        ];

        // Application trends for the last six months
        $trendStart = Carbon::now()->subMonths(5)->startOfMonth();

        $trendQuery = (clone $applicationQuery)
            ->where(
                'applications.applied_at',
                '>=',
                $trendStart
            );

        $monthlyApplications = $trendQuery
            ->selectRaw(
                "DATE_FORMAT(applications.applied_at, '%Y-%m') as month"
            )
            ->selectRaw('COUNT(applications.id) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $trendLabels = [];
        $trendData = [];

        for ($i = 0; $i < 6; $i++) {
            $month = Carbon::now()->subMonths(5 - $i);
            $monthKey = $month->format('Y-m');

            $trendLabels[] = $month->format('M Y');
            $trendData[] = (int) ($monthlyApplications[$monthKey] ?? 0);
        }

        // Applications and average resume scores per job position
        $positionAnalytics = (clone $applicationQuery)
            ->join(
                'job_positions',
                'applications.job_position_id',
                '=',
                'job_positions.id'
            )
            ->leftJoin(
                'resumes',
                'applications.id',
                '=',
                'resumes.application_id'
            )
            ->select(
                'job_positions.id',
                'job_positions.title'
            )
            ->selectRaw(
                'COUNT(DISTINCT applications.id) as total_applications'
            )
            ->selectRaw(
                'ROUND(AVG(resumes.match_score), 2) as average_match_score'
            )
            ->groupBy(
                'job_positions.id',
                'job_positions.title'
            )
            ->orderByDesc('total_applications')
            ->get();

        // Job positions available in the filter
        $jobPositions = JobPosition::orderBy('title')->get();

        return view('hr.reports.index', compact(
            'selectedJob',
            'dateFrom',
            'dateTo',
            'jobPositions',
            'totalApplications',
            'totalApplicants',
            'submittedApplications',
            'underReviewApplications',
            'shortlistedApplications',
            'rejectedApplications',
            'scheduledInterviews',
            'totalJobs',
            'openJobs',
            'closedJobs',
            'inactiveJobs',
            'statusLabels',
            'statusData',
            'trendLabels',
            'trendData',
            'positionAnalytics'
        ));
    }
}
