
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interview_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_id')
                ->unique()
                ->constrained('applications')
                ->cascadeOnDelete();

            $table->foreignId('scheduled_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->dateTime('scheduled_at');
            $table->string('location')->nullable();
            $table->string('meeting_link')->nullable();
            $table->text('instructions')->nullable();

            $table->string('status')->default('scheduled');

            $table->timestamp('notification_sent_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interview_schedules');
    }
};
