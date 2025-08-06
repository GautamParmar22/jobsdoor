<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $table = 'employers';
    protected $fillable = [
        'id',
        'user_id',
        'company_name',
        'industry',
        'company_address',
        'city',
        'state',
        'country',
        'zip_code',
        'website',
        'official_title',
        'firstname',
        'lastname',
        'mobile_no',
        'email',
        'reach_you',
        'created_at',
        'updated_at',
    ];
}
