<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobPosition extends Model
{
    protected $fillable = [
        'title',
        'department',
        'description',
        'required_skills',
        'min_experience_years',
        'is_active',

        // Recruitment settings
        'application_deadline',
        'interview_date',
        'interview_start_time',
        'interview_end_time',
        'interview_duration_minutes',
        'shortlist_limit',
        'interview_location',
        'interview_meeting_link',
        'interview_instructions',
    ];

    protected $casts = [
        'required_skills' => 'array',
        'is_active' => 'boolean',
        'application_deadline' => 'datetime',
        'interview_date' => 'date',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    // Retained for compatibility with existing dashboard code.
    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
    }
}
