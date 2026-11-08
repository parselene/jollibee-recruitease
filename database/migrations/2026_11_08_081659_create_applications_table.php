
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('applicant_id')
                ->constrained('applicants')
                ->cascadeOnDelete();

            $table->foreignId('job_position_id')
                ->constrained('job_positions')
                ->cascadeOnDelete();

            $table->string('status')->default('submitted');
            $table->timestamp('applied_at')->useCurrent();

            $table->timestamps();

            // Prevent duplicate applications to the same job.
            $table->unique(
                ['applicant_id', 'job_position_id'],
                'unique_applicant_job'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
