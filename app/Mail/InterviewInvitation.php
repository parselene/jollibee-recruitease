<?php

namespace App\Mail;

use App\Models\InterviewSchedule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InterviewInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public InterviewSchedule $interviewSchedule
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Interview Invitation - RecruitEase'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.interview-invitation'
        );
    }
}
