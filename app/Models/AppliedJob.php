<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    protected $table = 'applied_jobs';

    protected $fillable = ['id','user_id','first_name','last_name','email','mobile_no','position','total_exp','relavant_exp','current_ctc','expected_ctc','notice_period','upload_resume','tell_about_self','created_at','updated_at'];
}
