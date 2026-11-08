<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dateTime('application_deadline')->nullable();

            $table->date('interview_date')->nullable();
            $table->time('interview_start_time')->nullable();
            $table->time('interview_end_time')->nullable();

            $table->unsignedSmallInteger('interview_duration_minutes')
                ->default(30);

            $table->unsignedSmallInteger('shortlist_limit')
                ->default(10);

            $table->string('interview_location')->nullable();
            $table->string('interview_meeting_link')->nullable();
            $table->text('interview_instructions')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('job_positions', function (Blueprint $table) {
            $table->dropColumn([
                'application_deadline',
                'interview_date',
                'interview_start_time',
                'interview_end_time',
                'interview_duration_minutes',
                'shortlist_limit',
                'interview_location',
                'interview_meeting_link',
                'interview_instructions',
            ]);
        });
    }
};