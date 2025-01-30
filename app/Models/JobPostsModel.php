<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPostsModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'job_posts';

    protected $fillable = ['user_id','job_name','no_of_vacancy','job_description','key_skills','location','type_of_job','salary','qualification','indroduction_pdf','status'];

    
}
