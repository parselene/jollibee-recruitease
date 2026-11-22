<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->decimal('skills_score', 5, 2)->nullable()->after('match_score');
            $table->decimal('semantic_score', 5, 2)->nullable()->after('skills_score');
        });
    }

    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn([
                'skills_score',
                'semantic_score',
            ]);
        });
    }
};
