<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'full_name',
        'phone',
        'email',
        'career_track',
        'experience_years',
        'expected',
        'period',
        'motivation',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
