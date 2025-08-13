<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPreference extends Model
{
    protected $table = 'job_preference';

    protected $fillable = [
        'id',
        'user_id',
        'apply_job_title',
        'job_open',
        'salary_from',
        'salary_to',
        'prefer_work',
        'company',
        'company_size',
        'important_roll',
        'tell_yourself',
        'created_at',
        'updated_at',
    ];
}
