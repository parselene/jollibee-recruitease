<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;

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

            // Job details
            'title' => 'required|string|max:255',
            'department' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'required_skills' => 'required|string',
            'min_experience_years' => 'required|integer|min:0',

            // Application settings
            'application_deadline' => $isUpdate
                ? 'required|date'
                : 'required|date|after:now',

            // Interview settings
            'interview_date' => $isUpdate
                ? 'required|date'
                : 'required|date|after_or_equal:today',

            'interview_start_time' => 'required|date_format:H:i',

            'interview_end_time' =>
                'required|date_format:H:i|after:interview_start_time',

            'interview_duration_minutes' => 'required|integer|min:5|max:480',

            'shortlist_limit' => 'required|integer|min:1|max:100',

            // Interview details
            'interview_location' => 'nullable|string|max:255',
            'interview_meeting_link' => 'nullable|url|max:2048',
            'interview_instructions' => 'nullable|string',
        ]);

        // Convert comma-separated skills into an array.
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

        // New job postings are active by default.
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

        // Respect the HR active/inactive checkbox.
        $data['is_active'] = $request->boolean('is_active');

        $jobPosition->update($data);

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job position updated successfully!');
    }

    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job position deleted successfully!');
    }
}
