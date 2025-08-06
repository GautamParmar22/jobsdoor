<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;
use Session;
use Illuminate\Support\Facades\DB;
        
class IsLogin {

    public function handle($request, Closure $next) 
    {
        $user = Auth::user();
        //echo $user->role_type;die;
        //echo "<pre/>"; print_r($user);die;
        
        if(!empty($user)){
            return $next($request);
        } 
        else
        {
            if($request->header('AJAX-REQUEST')==NULL)
            {
                return redirect('/login-page');
            }   
            else
            {
                return fail("Authentication fail", 401, "oops something went wrong");
            }
            //echo "Here Employer side";
            return redirect('/login-page');
        } 
        
    }

}