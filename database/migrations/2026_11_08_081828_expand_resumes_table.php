<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            // Give every resume its own primary key.
            $table->id();

            // Connect resume to its specific application.
            $table->foreignId('application_id')
                ->unique()
                ->constrained('applications')
                ->cascadeOnDelete();

            $table->foreignId('applicant_id')
                ->constrained('applicants')
                ->cascadeOnDelete();

            $table->string('original_filename');
            $table->string('file_path');
            $table->string('mime_type')->nullable();

            // Text extracted from the uploaded resume.
            $table->longText('extracted_text')->nullable();

            // Machine learning screening score.
            $table->decimal('match_score', 5, 2)->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropForeign(['application_id']);
            $table->dropForeign(['applicant_id']);

            $table->dropUnique(['application_id']);

            $table->dropColumn([
                'id',
                'application_id',
                'applicant_id',
                'original_filename',
                'file_path',
                'mime_type',
                'extracted_text',
                'match_score',
                'status',
                'created_at',
                'updated_at',
            ]);
        });
    }
};
