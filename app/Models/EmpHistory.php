<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpHistory extends Model
{
    protected $table = 'emp_history';

    protected $fillable = [
        'id',
        'user_id',
        'recent_employement',
        'industry',
        'job_title',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];
}
