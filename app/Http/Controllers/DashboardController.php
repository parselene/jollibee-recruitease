<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use App\Models\Applicant;
use App\Models\Resume;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJobs = JobPosition::count();

        // Count jobs with deadlines that have not yet passed.
        $activeJobs = JobPosition::whereNotNull('application_deadline')
            ->where('application_deadline', '>', now())
            ->count();

        $totalApplicants = Applicant::count();

        $totalResumes = Resume::count();

        $recentJobs = JobPosition::withCount('resumes')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalJobs',
            'activeJobs',
            'totalApplicants',
            'totalResumes',
            'recentJobs'
        ));
    }
}
