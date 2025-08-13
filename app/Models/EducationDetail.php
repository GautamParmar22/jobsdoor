<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    protected $table = 'education_details';

    protected $fillable = [
        'id',
        'user_id',
        'school_name',
        'degree',
        'field_of_study',
        'edu_start_year',
        'edu_start_month',
        'edu_end_year',
        'edu_end_month',
    ];
}
