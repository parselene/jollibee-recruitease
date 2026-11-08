<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\InterviewSchedule;
use App\Mail\InterviewInvitation;
use Carbon\Carbon;
use Throwable;

class ProcessExpiredJobApplications extends Command
{
    protected $signature = 'recruitment:process-expired';

    protected $description = 'Automatically rank applicants and schedule interviews';

    public function handle()
    {
        $this->info('Starting automatic recruitment processing...');

        $jobs = DB::table('job_positions')
            ->where('is_active', true)
            ->whereNotNull('application_deadline')
            ->where('application_deadline', '<=', now())
            ->whereNull('recruitment_processed_at')
            ->get();

        foreach ($jobs as $job) {

            $this->info("Processing: {$job->title}");

            // Get applicants with valid resume scores.
            $applications = DB::table('applications')
                ->join('resumes', 'applications.id', '=', 'resumes.application_id')
                ->where('applications.job_position_id', $job->id)
                ->whereNotNull('resumes.match_score')
                ->orderByDesc('resumes.match_score')
                ->orderBy('applications.applied_at')
                ->select(
                    'applications.id as application_id',
                    'resumes.match_score'
                )
                ->get();

            // Calculate available interview slots.
            if (
                !$job->interview_date ||
                !$job->interview_start_time ||
                !$job->interview_end_time
            ) {
                $this->error('Interview availability is incomplete. Skipping this job.');
                continue;
            }

            $duration = (int) $job->interview_duration_minutes;

            if ($duration < 1) {
                $this->error('Invalid interview duration. Skipping this job.');
                continue;
            }

            $slotStart = Carbon::parse($job->interview_date)
                ->setTimeFromTimeString($job->interview_start_time);

            $slotEnd = Carbon::parse($job->interview_date)
                ->setTimeFromTimeString($job->interview_end_time);

            $slots = [];

            while ($slotStart->copy()->addMinutes($duration)->lte($slotEnd)) {
                $slots[] = $slotStart->copy();
                $slotStart->addMinutes($duration);
            }

            if (count($slots) === 0) {
                $this->error('No interview slots are available.');
                continue;
            }

            $shortlistLimit = (int) ($job->shortlist_limit ?? 10);

            $selectedCount = min(
                $applications->count(),
                $shortlistLimit,
                count($slots)
            );

            $emailFailures = false;

            foreach ($applications as $index => $application) {

                $isShortlisted = $index < $selectedCount;

                DB::table('applications')
                    ->where('id', $application->application_id)
                    ->update([
                        'status' => $isShortlisted ? 'shortlisted' : 'rejected',
                        'updated_at' => now(),
                    ]);

                if (!$isShortlisted) {
                    continue;
                }

                // Reuse an existing schedule instead of creating duplicates.
                $schedule = InterviewSchedule::firstOrCreate(
                    ['application_id' => $application->application_id],
                    [
                        'scheduled_by' => null,
                        'scheduled_at' => $slots[$index],
                        'location' => $job->interview_location,
                        'meeting_link' => $job->interview_meeting_link,
                        'instructions' => $job->interview_instructions,
                        'status' => 'scheduled',
                        'notification_sent_at' => null,
                    ]
                );

                // Do not send an invitation twice.
                if ($schedule->notification_sent_at) {
                    continue;
                }

                try {
                    $schedule->load([
                        'application.applicant',
                        'application.jobPosition'
                    ]);

                    $applicantEmail = $schedule->application->applicant->email;

                    Mail::to($applicantEmail)
                        ->send(new InterviewInvitation($schedule));

                    $schedule->update([
                        'notification_sent_at' => now(),
                    ]);

                    $this->info(
                        "Interview invitation sent for application #{$application->application_id}"
                    );

                } catch (Throwable $e) {

                    $emailFailures = true;

                    $this->error(
                        "Email failed for application #{$application->application_id}: " .
                        $e->getMessage()
                    );
                }
            }

            // Mark complete only when all invitations were sent successfully.
            if (!$emailFailures) {
                DB::table('job_positions')
                    ->where('id', $job->id)
                    ->update([
                        'recruitment_processed_at' => now(),
                    ]);

                $this->info("Completed: {$job->title}");
            } else {
                $this->warn(
                    'Some invitations failed. This vacancy can be processed again to retry them.'
                );
            }
        }

        $this->info('Automatic recruitment processing completed.');

        return self::SUCCESS;
    }
}
