<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Auth;
use Validator;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     public function index(Request $request)
    {
        try {
            return view('login');
        } catch (\Exception $e) {
            return Helper::fail([], $e->getMessage());
        }
    }

    public function login(Request $request)
    {   
         
        $req = $request->all();
        //echo "<pre/>"; print_r($req);die;
        try {
            $validator  = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => ['required', 'string', 'min:6'],
            ]);
            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }
//            dd(Auth::attempt(['email' => $request->email, 'password' => request('password')]));
            if (Auth::attempt(['email' => $request->email, 'password' => request('password')])) {
                /*if (Auth::user()->deleted_at != '') {
                    Auth::logout();
                    return  Redirect::to('/login-page')->with('error', 'Your account is not active yet, please contact admin.');
                }*/
                $user = Auth::user();
               
                //return view('Admin.dashboard',['dashboard_data'=>$user]);
                //echo "<pre/>"; print_r($user);die;
                //echo "login";die;
                return  Redirect::to('/dashboard-page')->with('success', 'You have logged in successfully.');
            } else {
                //echo "Role Type is Wrong";dd();
                return  Redirect::to('/login-page')->with('error',  'Invalid Credentials.');
            }
        } catch (\Exception $e) {
            //return Helper::fail([], $e->getMessage());
             return $e->getMessage();
            echo "<pre/>"; print_r($e);die;
        }
    }

    public function checkEmailExist(Request $request)
    {
        try {
            if (isset($request->id) && !empty($request->id)) {
                $email_exist = (count(User::where(['email' => $request->email])->where('id', '!=', $request->id)->get()) > 0) ? false : true;
            } else {
                $email_exist = (count(User::where(['email' => $request->email])->get()) > 0) ? false : true;
            }
            return response()->json($email_exist);
        } catch (\Exception $e) {
            return Helper::fail([], $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login-page');
    }

}
