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

        $activeJobs = JobPosition::where('is_active', true)->count();

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
