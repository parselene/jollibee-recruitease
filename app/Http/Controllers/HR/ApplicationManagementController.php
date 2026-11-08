<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\InterviewSchedule;
use App\Mail\InterviewInvitation;
use Illuminate\Support\Facades\Mail;
use App\Models\JobPosition;

class ApplicationManagementController extends Controller
{

public function index(Request $request)
{
    $request->validate([
        'job_position_id' => ['nullable', 'integer', 'exists:job_positions,id'],
    ]);

    $selectedJob = $request->job_position_id;

    $query = Application::with([
        'applicant',
        'jobPosition',
        'resume',
        'interviewSchedule'
    ])
        ->leftJoin('resumes', 'applications.id', '=', 'resumes.application_id')
        ->join('job_positions', 'applications.job_position_id', '=', 'job_positions.id')
        ->select('applications.*');

    // Filter applicants by selected job position
    if ($selectedJob) {
        $query->where('applications.job_position_id', $selectedJob);
    }

    $applications = $query
        ->orderBy('job_positions.title')
        ->orderByRaw('resumes.match_score IS NULL ASC')
        ->orderByDesc('resumes.match_score')
        ->orderByDesc('applications.applied_at')
        ->paginate(10)
        ->withQueryString();

    $jobPositions = JobPosition::orderBy('title')->get();

    return view('hr.applications.index', compact(
        'applications',
        'jobPositions',
        'selectedJob'
    ));
}


    public function downloadResume(Application $application)
    {
        $application->load('resume');

        abort_unless($application->resume, 404);

        $resume = $application->resume;

        abort_unless(
            Storage::disk('local')->exists($resume->file_path),
            404
        );

        return Storage::disk('local')->download(
            $resume->file_path,
            $resume->original_filename
        );
    }

    
    public function updateStatus(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:submitted,under_review,shortlisted,rejected'
            ],
        ]);

        $application->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('hr.applications.index')
            ->with('success', 'Application status updated successfully.');
    }

    
    public function createSchedule(Application $application)
    {
        abort_unless($application->status === 'shortlisted', 403,
            'Only shortlisted applicants can be scheduled for an interview.');

        $application->load(['applicant', 'jobPosition', 'interviewSchedule']);

        return view('hr.applications.schedule', compact('application'));
    }

    public function storeSchedule(Request $request, Application $application)
    {
        abort_unless($application->status === 'shortlisted', 403,
            'Only shortlisted applicants can be scheduled for an interview.');

        $validated = $request->validate([
            'scheduled_at' => ['required', 'date', 'after:now'],
            'location' => ['nullable', 'string', 'max:255'],
            'meeting_link' => ['nullable', 'url', 'max:2048'],
            'instructions' => ['nullable', 'string', 'max:2000'],
        ]);

        $schedule = InterviewSchedule::updateOrCreate(
            ['application_id' => $application->id],
            [
                'scheduled_by' => $request->user()->id,
                'scheduled_at' => $validated['scheduled_at'],
                'location' => $validated['location'] ?? null,
                'meeting_link' => $validated['meeting_link'] ?? null,
                'instructions' => $validated['instructions'] ?? null,
                'status' => 'scheduled',
                'notification_sent_at' => null,
            ]
        );

        try {

        $schedule->load([
            'application.applicant',
            'application.jobPosition'
        ]);

        $applicantEmail = $schedule->application->applicant->email;

        Mail::to($applicantEmail)->send(
            new InterviewInvitation($schedule)
        );

        $schedule->update([
            'notification_sent_at' => now()
        ]);

        return redirect()
            ->route('hr.applications.index')
            ->with('success', 'Interview scheduled and invitation email sent successfully!');

    } catch (\Throwable $exception) {

        report($exception);

        return redirect()
            ->route('hr.applications.index')
            ->with('warning', 'Interview saved, but the invitation email could not be sent. Please check your mail configuration.');
    }

        return redirect()
            ->route('hr.applications.index')
            ->with('success', 'Interview schedule saved successfully.');
    }


}
