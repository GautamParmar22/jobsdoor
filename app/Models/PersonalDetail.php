<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    protected $table = 'personal_details';

    protected $fillable = [
        'id',
        'user_id',
        'firstname',
        'lastname',
        'mobile_no',
        'email',
        'address',
        'city',
        'zip_code',
        'start_job',
        'reach_you',
        'resume',
        'created_at',
        'updated_at',
        'is_first_job',
        'top_skills',
    ];
}
