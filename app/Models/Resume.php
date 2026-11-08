<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resume extends Model
{
    protected $fillable = [
        'application_id',
        'applicant_id',
        'job_position_id',
        'original_filename',
        'file_path',
        'mime_type',
        'extracted_text',
        'cleaned_text',
        'extracted_skills',
        'matched_skills',
        'missing_skills',
        'match_score',
        'status',
    ];

    protected $casts = [
        'match_score' => 'decimal:2',
        'extracted_skills' => 'array',
        'matched_skills' => 'array',
'missing_skills' => 'array',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }

    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class);
    }

    public function jobPosition(): BelongsTo
    {
        return $this->belongsTo(JobPosition::class);
    }
}
