<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validate;
use Auth;
use App\Http\Requests\PaginateRequest;
use App\Models\JobPostsModel;
class JobController extends Controller
{

    // use App\Http\Controllers\JobController;
    public function index()
    {
        /*return view('Frontend.home');*/
        return view('Frontend.pages.homepage');
    }

    public function candidateRegister()
    {
        return view('Frontend.regform');
        
    }

    public function browseJob()
    {
        return view('Frontend.browes_job');
        
    }

     public function thankYou()
    {
        return view('Frontend.thankyou');
        
    }

    public function candidateLogin()
    {
        return view('Frontend.login');
    }

    public function employerData()
    {
        return view('Frontend.employer');
    }
    
    public function aboutUs()
    {
        return view('Frontend.aboutus');
    }

    public function jobDetails()
    {
        return view('Frontend.job_details');
    }


    public function testCase()
    {
        return view('Frontend.test');
    }


    public function checkEmail(Request $request){
       
            $email_exist = (count(DB::table('users')->where(['email' => $request->email])->get()) > 0) ? false : true;
            return response()->json($email_exist);
       
    }
    public function addEmployer(Request $request)
    {
               
       $req = $request->all();
       //echo "<pre/>"; print_r($req);dd();  
       //form wizard 1 data
       $company_name = $request->input('company_name');
       $industry = $request->input('industry');
       $company_address = $request->input('company_address');
       $city = $request->input('city');
       $state = $request->input('state');
       $country = $request->input('country');
       $zipcode = $request->input('zip_code');
       $website = $request->input('website');

       //form wizard 2 data
       $official_title = $request->input('official_title');
       $firstname = $request->input('firstname');
       $lastname = $request->input('lastname');
       $email = $request->input('email');
       $mobile_no = $request->input('mobile_no'); 
       $reach_you = $request->input('reach_you');
       $EmailValid=DB::table('users')->select('*')->where('email',$req['email'])->get()->toArray();
       $fullname = $firstname.' '.$lastname;  
  
        if (empty( $EmailValid))
        {
            $usersdata = array('name'=> $fullname, 'email'=> $email,'role_type'=> 2);
            //echo "<pre/>"; print_r($usersdata);
            $users = DB::table('users')->insert($usersdata);     
            $id = $user_id = DB::getPdo()->lastInsertId();
           //echo "<pre/>"; print_r($id);die;
             $employerdata = array('user_id'=>$id, 'company_name'=>$company_name, 'industry'=>$industry, 'company_address'=> $company_address, 'city'=>$city, 'state'=> $state, 'country'=>$country, 'zip_code'=>$zipcode, 'website'=>$website, 'official_title'=>$official_title, 'firstname'=>$firstname, 'lastname'=> $lastname, 'email'=>$email, 'mobile_no'=>$mobile_no, 'reach_you'=>$reach_you);           
          //echo "<pre/>"; print_r($employerdata);die();
          $employer = DB::table('employers')->insert($employerdata);       
                  
         }
           else
             {
               return response()->json("Your Email ID is Already Register...");
             }
            return  Redirect::to('employer')->with('success', 'Data insert successfully.');       
    }
            
    public function addCandidateData(Request $request)
    {
        $req = $request->all();
        //echo "<pre/>"; print_r($req);die();
       
        //personal details (01)
        $firstname = $req['personal_details']['firstname'];
        $lastname = $req['personal_details']['lastname'];
        $mobile_no = $req['personal_details']['mobile_no'];
        $email = $req['personal_details']['email'];
        $address = $req['personal_details']['address'];
        $city = $req['personal_details']['city'];
        $zip_code = $req['personal_details']['zip_code'];
        $start_job = $req['personal_details']['start_job'];
        $reach_you = $req['personal_details']['reach_you'];
        //$isFirstJob = $req['personal_details']['is_first_job'];
        if($request->hasfile('choosefile'))
          {
              $file = $request->file('choosefile');
              $extention = $file-> getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move(public_path('resume'),$filename);
              $resume=$filename;
          }
        $fullname = $firstname.' '.$lastname;
        $EmailValid=DB::table('users')->select('*')->where('email',$req['personal_details']['email'])->get()->toArray();

        //employ history (02)
        $recent_employement = $request->input('emp_history[History][recent_employement]');
        $industry = $request->input('emp_history[History][industry]');
        $job_title = $request->input('emp_history[History][official_title]');
        $start_date = $request->input('emp_history[History][start_date]');
        $end_date = $request->input('emp_history[History][end_date]');
        $skills = implode(",", $req['emp_history']['skills']);
       
        //education details (03)
        $school_name = $req['education_details']['school_name'];
        $degree = $req['education_details']['degree'];
        $field_of_study = $req['education_details']['field_of_study'];
        $edu_start_year = $req['education_details']['edu_start_year'];
        $edu_start_month = $req['education_details']['edu_start_month'];
        $edu_end_year = $req['education_details']['edu_end_year'];
        $edu_end_month = $req['education_details']['edu_end_month'];

        //job preference (04)
        $apply_job_title = $req['job_preference']['apply_job_title'];
        $job_open = $req['job_preference']['job_open'];
        $salary_from = $req['job_preference']['salary_from'];
        $salary_to = $req['job_preference']['salary_to'];
        $prefer_work = $req['job_preference']['prefer_work'];
        $company = $req['job_preference']['company'];
        $company_size = $req['job_preference']['company_size'];
        $important_roll = implode(",", $req['job_preference']['important_roll']);
        $tell_yourself = $req['job_preference']['tell_yourself'];   
        
        if (empty( $EmailValid))
          {
              $usersdata = array('name'=> $fullname, 'email'=> $email,'role_type'=> 3);
              //echo "<pre/>"; print_r($usersdata);
              $users = DB::table('users')->insert($usersdata);     
              $id = $user_id = DB::getPdo()->lastInsertId();

                $is_first_job = 0;
                if(isset($req['personal_details']['is_first_job']) && $req['personal_details']['is_first_job']){
                    $is_first_job = 1;
                }

                 //For Personal Details Table 
                 $personal_details_data = array('user_id'=>$id,'firstname'=>$firstname, 'lastname'=> $lastname, 'mobile_no'=>$mobile_no, 'email'=>$email,'address'=> $address,'city'=>$city, 'zip_code'=>$zip_code, 'start_job'=>$start_job,  'reach_you'=>$reach_you,'resume'=>$resume,'is_first_job' => $is_first_job, 'top_skills'=>$skills);
                 //echo "<pre/>"; print_r($personal_details_data);
                 $personal_details = DB::table('personal_details')->insert($personal_details_data);
  
                 //For Employment History
                    $Emp_History = $req['emp_history'];
                //echo "<pre/>"; print_r($Emp_History);die();
                 if($is_first_job = 1){
                    if(isset($Emp_History['History']) && $Emp_History['History'] != "")  
                        
                  {
                        foreach ($Emp_History['History'] as $key => $val){
                            $recent_employement = $val['recent_employement'];
                            $industry = $val['industry'];
                            $job_title = $val['official_title'];
                            $start_date = $val['start_date'];
                            $end_date = $val['end_date'];
                            
                            $education_history_data = array('user_id'=>$id,'recent_employement'=> $recent_employement, 'industry'=> $industry, 'job_title'=> $job_title, 'start_date'=> $start_date, 'end_date'=> $end_date );
                            //echo "<pre/>"; print_r($education_history_data);die();
                            $emp_history = DB::table('emp_history')->insert($education_history_data);
                        }
                  }
                 }
                //For Education Details
                 $education_details_data = array('user_id'=>$id,'school_name'=>$school_name, 'degree'=>$degree, 'field_of_study'=> $field_of_study, 'edu_start_year'=>$edu_start_year, 'edu_start_month'=>$edu_start_month, 'edu_end_year'=>$edu_end_year, 'edu_end_month'=>$edu_end_month);
                // echo "<pre/>"; print_r($education_details_data);
                 $education_details = DB::table('education_details')->insert($education_details_data);

                 //For Job Preference
                  $job_preference_data = array('user_id'=>$id,'apply_job_title'=> $apply_job_title,'job_open'=> $job_open,'salary_from'=> $salary_from,'salary_to'=> $salary_to, 'prefer_work'=> $prefer_work, 'company'=>$company, 'company_size'=> $company_size,'important_roll'=>$important_roll, 'tell_yourself'=>$tell_yourself );
                 //echo "<pre/>"; print_r($job_preference_data);
                 $job_preference = DB::table('job_preference')->insert($job_preference_data);  
                  }
        else{
            return response()->json("Your Email ID is Already Register...");
       }
       return  Redirect::to('regf')->with('success', 'Data insert successfully.');   
        
    }

    public function displayBrowesJob(Request $request){
        $req = $request->all();
        $browesalljobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','emp.user_id','=','job_posts.user_id')
                  ->where('job_posts.deleted_at','=', null);
                  if(isset($req['search_by']))
                  {
                     $browesalljobpost->orwhere('job_posts.job_name', 'LIKE', '%'.$req['search_by'].'%')
                                      ->orwhere('job_posts.type_of_job', 'LIKE', '%'.$req['search_by'].'%')
                                      ->orwhere('job_posts.location', 'LIKE', '%'.$req['search_by'].'%');
                                                               
                  }
                 $jobdata = $browesalljobpost->orderBy('job_posts.job_name')->paginate(2);
                 //echo "<pre>"; print_r($jobdata);echo "</pre>"; die; 
        return view('Frontend.browes_job',['browesalljob'=>$jobdata]);
     
    }

    public function searchBrowesJob(Request $request){
        $req = $request->all();
       // echo "<pre>"; print_r($req['page']);echo "</pre>"; die; 
        $main_data = json_decode($req['mydata']); 
        $app_url = env('APP_URL');
        $dynamic_html = '';
        //DB::enableQueryLog();
        $response_status = '';
        $page = '';
        $per_page = 2;
        if(!empty($req['page']) && $req['page']>1){
             $page = $req['page'];
              $browesalljobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','emp.user_id','=','job_posts.user_id');
            if(!empty($main_data[1]))
            {
                $browesalljobpost->where('job_posts.job_name', 'LIKE', '%'.$main_data[1]->search_val.'%')
                  ->orwhere('job_posts.type_of_job', 'LIKE', '%'.$main_data[1]->search_val.'%')
                  ->orwhere('job_posts.location', 'LIKE', '%'.$main_data[1]->search_val.'%');
            }
            if(!empty($main_data[2]))
            {
                    $browesalljobpost->where('emp.industry','LIKE','%'.$main_data[2]->industry.'%');
            }
            if(!empty($main_data[0]))
            {
                    $get_job_type = implode(',',$main_data[0]);
                    //echo "<pre>"; print_r($req['page']);echo "</pre>"; die; 
                    $browesalljobpost->whereIn('job_posts.type_of_job',[$get_job_type]);
            }
            $result = $per_page * $page; 
            $dds = $result - $per_page;
            ///echo $result; die; 
            $browesalljobpost->where('job_posts.deleted_at','=', null);
             $browesalljob = $browesalljobpost->orderBy('job_posts.job_name')->skip($dds)->take($per_page)->get()->toArray();
           
        } else {
            $page =1;
             $browesalljobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','emp.user_id','=','job_posts.user_id');
            if(!empty($main_data[1]))
            {
                $browesalljobpost->where('job_posts.job_name', 'LIKE', '%'.$main_data[1]->search_val.'%')
                  ->orwhere('job_posts.type_of_job', 'LIKE', '%'.$main_data[1]->search_val.'%')
                  ->orwhere('job_posts.location', 'LIKE', '%'.$main_data[1]->search_val.'%');
            }
            if(!empty($main_data[2]))
            {
                    $browesalljobpost->where('emp.industry','LIKE','%'.$main_data[2]->industry.'%');
            }
            if(!empty($main_data[0]))
            {
                    $get_job_type = implode(separator: ',',array: $main_data[0]);

                    $browesalljobpost->whereIn('job_posts.type_of_job',[$get_job_type]);
            }
             $browesalljobpost->where('job_posts.deleted_at','=', null);
             $browesalljob = $browesalljobpost->orderBy('job_posts.job_name')->limit($per_page)->get()->toArray();
        }
       
        if(!empty($browesalljob)){
               foreach ($browesalljob as $key => $value) {
                    $dynamic_html .='<li>';
                    $dynamic_html .='<a href="javascript:void(0)" id="main_details">';
                    $dynamic_html .='<div class="d-flex m-b30">';
                    $dynamic_html .='<div class="job-post-company">';
                    $dynamic_html .='<span><img src="'.$app_url.'assets/images/logo/icon1.png'.'"/></span>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='<div class="job-post-info">';
                    $dynamic_html .='<h4>'.$value->job_name.'</h4>';
                    $dynamic_html .='<ul>';
                    $dynamic_html .='<li><i class="fa fa-map-marker"></i>'.$value->location.'</li>';
                    $dynamic_html .='<li><i class="fa fa-bookmark-o"></i>'.$value->type_of_job.'</li>';
                    $dynamic_html .='<li><i class="fa fa-user"></i>'.$value->no_of_vacancy.'</li>';
                    $dynamic_html .='</ul>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='<div class="d-flex">';
                    $dynamic_html .='<div class="job-time mr-auto">';
                    $dynamic_html .='<span>'.$value->type_of_job.'</span>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='<div class="salary-bx">';
                    $dynamic_html .='<span>₹'. $value->salary_to .'-'.'₹'.  $value->salary_from.'</span>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='<span class="post-like infobtn">';
                    $dynamic_html .='<i class="fas fa-angle-down" aria-hidden="true" style="color:blue; display: inline-block;"></i>';
                    $dynamic_html .='</span>';
                    $dynamic_html .='<div class="more_info " style="display: none;">';
                    $dynamic_html .='<div class="panel" style="color: black;">';
                    $dynamic_html .='<div class="mb-2"><b>Job name:  </b>'.$value->job_name.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>No of vacancy:  </b>'.$value->no_of_vacancy.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>Type of job:  </b>'.$value->type_of_job.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>Description of job:  </b>'.$value->job_description.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>Key skills:  </b>'.$value->key_skills.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>Qualification:  </b>'.$value->qualification.'</div>';
                    $dynamic_html .='<div class="mb-2"><b>Location:  </b>'.$value->location.'</div>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='</div>';
                    $dynamic_html .='</a>';
                    $dynamic_html .='<a href="'.url('job-info/'.base64_encode($value->id)).'" id="link_to_details" style="display: none;"><button name="moreDetails" value="Submit" type="submit" class="site-button radius-xl moreDetails" data-id="{{$browes->id}}">More Details</button></a>';
                    $dynamic_html .='</li>';
          }
          $response_status = 1;

        } else{
           $dynamic_html .='<div class="col-md-3"><h3>Jobs Not Found!</h3></div>';
           $response_status = 0;
        }
         return response()->json([
                "browesjobresult"=>$dynamic_html,
                "status"=>$response_status
            ]);
    }

    public function viewJobDetails($id)
    {
            $id = base64_decode($id);
            $view_Job_Detail = DB::table('job_posts')->select('*')->where('id',$id)->get()->first();
            //echo "<pre/>"; print_r($view_Job_Detail); die;
            return view('Frontend.job_details',['job_info'=>$view_Job_Detail]);
    }

    public function applyForJobs(Request $request){
        $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $firstname = $req['first_name'];
        $lastname = $req['last_name'];
        $mobile_no = $req['mobile_no'];
        $email = $req['email'];
        $total_exp = $req['total_exp'];
        $relavent_exp = $req['relavant_exp'];
        $current_ctc = $req['current_ctc'];
        $expected_ctc = $req['expected_ctc'];
        $notice_period = $req['notice_period'];
        $upload_resume = '';
           if($request->hasfile('choosefile'))
              {
                  $file = $request->file('choosefile');
                  $extention = $file->getClientOriginalExtension();
                  $filename = time().'.'.$extention;
                  $file->move(public_path('upload_resume'),$filename);
                  $upload_resume=$filename;
              } 
          $tell_about_self = $req['tell_about_self'];    

        $data = array('first_name'=>$firstname,'last_name'=>$lastname, 'mobile_no'=>$mobile_no,'email'=>$email,'total_exp'=>$total_exp,'relavant_exp'=>$relavent_exp,'current_ctc'=>$current_ctc,'expected_ctc'=>$expected_ctc,'notice_period'=>$notice_period,'upload_resume'=>$upload_resume,'tell_about_self'=>$tell_about_self);
        //dd($data);
         $user = DB::table('applied_job')->insert($data);   
         return  Redirect::to('thank-you-page');  
    }

}






                               
                                  
                                        
                                            
                                                
                                            
                                            
                                                
                                                
                                                    
                                                  