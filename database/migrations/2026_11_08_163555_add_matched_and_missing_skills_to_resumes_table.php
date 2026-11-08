<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->json('matched_skills')->nullable()->after('extracted_skills');
            $table->json('missing_skills')->nullable()->after('matched_skills');
        });
    }

    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn(['matched_skills', 'missing_skills']);
        });
    }
};