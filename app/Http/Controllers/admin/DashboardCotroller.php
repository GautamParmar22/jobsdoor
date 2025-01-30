<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use DB;
use Validate;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Validator;
use  App\Models\User;
use App\Models\JobPostsModel;
class DashboardCotroller extends Controller
{
    public function DashboardPage(Request $request)
    {
        $totalusers = DB::table('users')->select('*')->where('role_type' ,'!=', 1)->where('is_delete', 0)->get()->count();
        //echo "<pre/>"; print_r($totalusers); 
        
        $employer = DB::table('users')->select('*')->where('role_type' , 2)->where('is_delete', 0)->get()->count();
        //echo "<pre/>"; print_r($employer); 
       
        $candidate = DB::table('users')->select('*')->where('role_type' , 3)->where('is_delete', 0)->get()->count();
        //echo "<pre/>"; print_r($candidate); die;
      
         $recentusers = DB::table('users')->select('*')->where('role_type' ,'!=', 1)->orderBy('id', 'desc')->limit(5)->get()->toArray();
         $recentcandidate = DB::table('users')->select('*')->where('role_type' ,'=', 3)->orderBy('id', 'desc')->limit(5)->get()->toArray();
         $activecandidate = DB::table('users')->select('*')->where('status','=',1)->where('role_type' , 3)->where('is_delete', 0)->get()->count();
        
          $inactivecandidate = DB::table('users')->select('*')->where('status','=',0)->where('role_type' , 3)->where('is_delete', 0)->get()->count();
        
          $totalcandidate = DB::table('users')->select('*')->where('role_type' ,'=', 3)->where('is_delete', 0)->get()->count();
        
         $user = Auth::user();
                //return view('Admin.dashboard',['dashboard_data'=>$user]);

        return view('Admin.dashboard',['totsluser'=>$totalusers,'employer'=>$employer,'candidate'=>$candidate, 'recentusers'=>$recentusers,'dashboard_data'=>$user,'total_candidate'=>$totalcandidate,'recent_candidate'=>$recentcandidate,'active_candidate'=>$activecandidate,'inactive_candidate'=>$inactivecandidate,]);
    }

    public function AccountData(){
        return view('Admin.account');
    }

    public function OrderData(){
        return view('Admin.orders');
    }

    public function IndexPage(){
        return view('Admin.pages.indexpage');
    }

    public function ResetPassPage(){
        return view('Admin.reset-password');
    }

    public function LoginPage(){
        return view('Admin.login');
    }

     public function ManageProfile(Request $request){
        $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $name = $req['name'];

        $data = array('name'=>$name);

        $mngprofile = DB::table('users')->where('role_type','=', '1')->update($data);
        //return view('Admin.account');
        return  Redirect::to('/account-page')->with('success', 'Account has been updated successfully.');
    } 

   public function changePassword(Request $request){
    try {
            $validator  = Validator::make($request->all(), [
                'password' => ['required', 'min:8'],
                'password_confirmation' => ['required', 'min:8', 'same:password'],
            ]);

            if ($validator->fails()) {
                return back()->withInput()->withErrors($validator->errors());
            }

            $update_password = User::where(['id' => Auth::user()->id])->update([
                'password' => Hash::make($request->password),
            ]);

            if ($update_password) {
                return  Redirect::to('/account-page')->with('success', 'Password has been updated successfully.');
            } else {
                return Redirect::to('/account-page')->with('error', 'Something went wrong please try again letter!!!');
            }
        } catch (\Exception $e) {
            return Helper::fail([], $e->getMessage());
        }
    }

    public function allUserData(Request $request){
        $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $alluserdata = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
        ->leftjoin('employers as emp','users.id','=','emp.user_id')
        ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
        ->where('role_type' ,'!=', 1)
        ->where('is_delete', 0)
        ->get()->toArray();

        $allcandidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
        ->leftjoin('employers as emp','users.id','=','emp.user_id')
        ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
        ->where('role_type' ,'=', 3)
        ->where('is_delete', 0)
        ->get()->toArray();
       //echo "<pre>"; print_r($alluserdata); echo "</pre>";die;
        return view('Admin.allusers',['alluserdata'=>$alluserdata,'all_candidate'=>$allcandidate]);
    }

    public function deleteUsers(Request $request, $id)
    {
        $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $isDelete = 1;
        $data = array('is_delete'=>$isDelete);
        DB::table('users')->where('id',$id)->update($data);
        //return redirect()->guest('all-users-page');
        return  Redirect::to('all-users-page')->with('error', 'Record Deleted successfully.'); 
        
    }
    public function employerData(Request $request){
            $req = $request->all();
           //echo ""<pre/>"; print_r($req); die";
            $allemployers = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
              ->leftjoin('employers as emp','users.id','=','emp.user_id')
              ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
              ->where('role_type' ,'=', 2 )
              ->where('is_delete', 0)
              ->get()->toArray();
             //echo "<pre/>"; print_r($allemployers); die;
            return view('Admin.employer_data',['allemployers'=>$allemployers]);

    }

    public function deleteEmployers(Request $request, $id)
    {
        $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $isDelete = 1;
        $data = array('is_delete'=>$isDelete);
        DB::table('users')->where('id',$id)->update($data);
        //return redirect()->guest('employer-data-page');
        return  Redirect::to('employer-data-page')->with('error', 'Record Deleted successfully.'); 
        
    }
    public function candidateData(Request $request){
             $req = $request->all();
            //echo ""<pre/>"; print_r($req); die";
            $allcandidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
              ->leftjoin('employers as emp','users.id','=','emp.user_id')
              ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
              ->where('role_type' ,'=', 3)
              ->where('is_delete', 0)
              ->get()->toArray();
            //echo "<pre/>"; print_r($allcandidate); die;
            return view('Admin.candidate_data',['allcandidate'=>$allcandidate]);
    }
    public function  deleteCandidates(Request $request, $id)
    {
       $req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $isDelete = 1;
        $data = array('is_delete'=>$isDelete);
        DB::table('users')->where('id',$id)->update($data);
        //return redirect()->guest('candidate-data-page');
        return  Redirect::to('candidate-data-page')->with('error', 'Record Deleted successfully.');

    }

    public function viewEmployers($id)
    {
        //echo $id; die();
        $id = base64_decode($id);
        $ViewEmployers = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile', 'emp.company_name','emp.industry','emp.company_address','emp.city','emp.zip_code','emp.website','emp.state')
            ->leftjoin('employers as emp','users.id','=','emp.user_id')
            ->where('users.id', $id)
            ->get()->first();
        //echo "<pre>"; print_r($ViewEmployers);echo "</pre>"; die;
        //return view('view-employers');
        return view('Admin.employer_view',['emp_view'=>$ViewEmployers]);
    }
    public function viewCandidate($id){
        $id = base64_decode($id);
        /*$viewCandidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','pd.mobile_no','pd.address','pd.city','pd.zip_code','pd.start_job','pd.reach_you','pd.is_first_job','pd.top_skills','ed.school_name','ed.degree','ed.field_of_study','ed.edu_start_year','ed.edu_start_month','ed.edu_end_year','ed.edu_end_month','jp.apply_job_title','jp.job_open','jp.salary_from','jp.salary_to','jp.prefer_work','jp.company','jp.company_size','jp.important_roll','jp.tell_yourself')
        ->leftjoin('personal_details    as  pd','users.id','=','pd.user_id')
        ->leftjoin('education_details   as ed','users.id','=','ed.user_id')
        ->leftjoin('job_preference  as jp', 'users.id','=','jp.user_id')
        ->where('role_type' ,'=', 3)
        ->where('users.id', $id)
        ->get()->first();*/
        $viewCandidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name')->where('users.id', $id)->get()->first();

        $getPersonalDetails = DB::table('personal_details')->select('*')->where('user_id','=', $id)->first();
        //echo "<pre>"; print_r($getPersonalDetails);echo "</pre>"; die;

         $getEducationDetails = DB::table('education_details')->select('*')->where('user_id','=', $id)->first();
        //echo "<pre>"; print_r($getEducationDetails);echo "</pre>"; die;

        $getEmpHistory = DB::table('emp_history')->select('*')->where('user_id','=', $id)->get()->toArray();
        //echo "<pre>"; print_r($emp_history);echo "</pre>"; die;

        $getJobPreference = DB::table('job_preference')->select('*')->where('user_id','=', $id)->get()->first();
        //echo "<pre>"; print_r($getJobPreference);echo "</pre>"; die;

        return view('Admin.candidate_view',['candiadte_view'=>$viewCandidate,'getPersonalDetails'=>$getPersonalDetails,'education_details'=>$getEducationDetails,'emp_history'=>$getEmpHistory ,'job_preference'=>$getJobPreference]);
    }

    public function employetEdit(Request $request, $id){
       // $id = base64_decode($id);
        $getEmployer = DB::table('users')->select('users.id','users.role_type','users.status','emp_data.email','emp_data.firstname','lastname','emp_data.official_title','emp_data.mobile_no as emp_mobile', 'emp_data.company_name','emp_data.industry','emp_data.company_address','emp_data.city','emp_data.zip_code','emp_data.website','emp_data.state','emp_data.country', 'emp_data.reach_you')
            ->leftjoin('employers as emp_data','users.id','=','emp_data.user_id')
            ->where('user_id','=', $id)
            ->get()->first();
        /*$getUsers = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name')->where('users.id', $id)->get()->first(); 
        $getEmployer = DB::table('employers')->select('*')->where('user_id','=', $id)->get()->first();
        echo "<pre>"; print_r( $getUsers);echo "</pre>"; */
        //echo "<pre>"; print_r( $getEmployer);echo "</pre>"; die;
        return view('Admin.employer_edit',['getEmployers'=>$getEmployer]);

    }
    public function updateEmpData(Request $request,$id){
         //$id = base64_decode($id);
         $req = $request->all();
         //echo "<pre>"; print_r($req); "</pre>"; die;
           //form 1 data
           $firstname = $request->input('firstname');
           $lastname = $request->input('lastname');
           $official_title = $request->input('official_title');
           $email = $request->input('email');
           $mobile_no = $request->input('mobile_no'); 
           $status = $request->input('status');
           $reach_you = $request->input('reach_you');
           $role_type = $request->input('role_type');
           $name = $firstname .' '. $lastname;

           //form 2 data
           $company_name = $request->input('company_name');
           $industry = $request->input('industry');
           $company_address = $request->input('company_address');
           $city = $request->input('city');
           $state = $request->input('state');
           $country = $request->input('country');
           $zipcode = $request->input('zip_code');
           $website = $request->input('website');
 
         $empFrm1 = array('firstname'=>$firstname,'lastname'=>$lastname,'official_title'=>$official_title,  'email'=>$email, 'mobile_no'=>$mobile_no, 'reach_you'=>$reach_you,);
         $empFrm2 = array('company_name'=>$company_name, 'industry'=>$industry, 'company_address'=> $company_address, 'city'=>$city, 'state'=> $state, 'country'=>$country, 'zip_code'=>$zipcode, 'website'=>$website);
        //echo "<pre/>"; print_r($empFrm1);
         $userupdate = array('name'=>$name,'status'=>$status);
        //echo "<pre>"; print_r($userupdate); "</pre>"; die;
        $updateEmployerData = DB::table('employers')->where('user_id','=', $id)->update($empFrm1);
        $updateEmpData = DB::table('employers')->where('user_id','=', $id)->update($empFrm2);
        $user = DB::table('users')->where('id','=', $id)->update($userupdate);
        return  Redirect::to('/employer-data-page')->with('success', 'Data updated successfully.');
    }

    public function candidateEdit(Request $request,$id)
    {    
        $Candidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name')->where('users.id', $id)->get()->first();

        $editPersonalDetails = DB::table('personal_details')->select('*')->where('user_id','=', $id)->first();
        //echo "<pre>"; print_r($getPersonalDetails);echo "</pre>"; die;
         $editEducationDetails = DB::table('education_details')->select('*')->where('user_id','=', $id)->first();
        //echo "<pre>"; print_r($getEducationDetails);echo "</pre>"; die;
        $editEmpHistory = DB::table('emp_history')->select('*')->where('user_id','=', $id)->get()->toArray();
        //echo "<pre>"; print_r($editEmplyemntHitory);echo "</pre>"; die;
        $editJobPreference = DB::table('job_preference')->select('*')->where('user_id','=', $id)->get()->first();
        //echo "<pre>"; print_r($getJobPreference);echo "</pre>"; die;
       return view('Admin.candidate_edit', ['getCandidate'=>$Candidate, 'personal'=>$editPersonalDetails, 'editEmplyemntHitory'=>$editEmpHistory, 'education'=>$editEducationDetails, 'editJobPreference'=>$editJobPreference]);
    }

    public function updateCndData(Request $request,$id){
        $req = $request->all();
        //echo $id ;die;
       //echo "<pre>"; print_r($req);echo "</pre>";die; 
           //Candidate Personal Details data 
           $firstname = $request->input('firstname');
           $lastname = $request->input('lastname');
           $email = $request->input('email');
           $mobile_no = $request->input('mobile_no'); 
           $address = $request->input('address');
           $city = $request->input('city');
           $start_job = $request->input('start_job');
           $zip_code = $request->input('zip_code');
           $reach_you = $request->input('reach_you');
           $top_skills = $request->input('top_skills');
           $status = $request->input('status');
           $name = $firstname .' '. $lastname;

            $school_name = $req['school_name'];
            $degree = $req['degree'];
            $field_of_study = $req['field_of_study'];
            $edu_start_year = $req['edu_start_year'];
            $edu_start_month = $req['edu_start_month'];
            $edu_end_year = $req['edu_end_year'];
            $edu_end_month = $req['edu_end_month'];

            $apply_job_title = $req['apply_job_title'];
            $job_open = $req['job_open'];
            $salary_from = $req['salary_from'];
            $salary_to = $req['salary_to'];
            $prefer_work = $req['prefer_work'];
            $company = $req['company'];
            $company_size = $req['company_size'];
            $important_roll = $req['important_roll'];
            $tell_yourself = $req['tell_yourself'];
          
          
           $candidatePersonalDetails = array('firstname'=>$firstname,'lastname'=>$lastname, 'email'=>$email, 'mobile_no'=>$mobile_no,'address'=>$address, 'city'=>$city, 'start_job'=>$start_job,'zip_code'=>$zip_code, 'reach_you'=>$reach_you, 'top_skills'=>$top_skills);
           //echo "<pre>"; print_r($candidatePersonalDetails);echo "</pre>"; die;
           $userupdate = array('name'=>$name,'status'=>$status);
           //echo "<pre>"; print_r($candidatePersonalDetails);echo "</pre>"; die;
          $education_details_data = array('user_id'=>$id,'school_name'=>$school_name, 'degree'=>$degree, 'field_of_study'=> $field_of_study, 'edu_start_year'=>$edu_start_year, 'edu_start_month'=>$edu_start_month, 'edu_end_year'=>$edu_end_year, 'edu_end_month'=>$edu_end_month);
          //echo "<pre>"; print_r($education_details_data);echo "</pre>"; die;
           $job_preference_data = array('user_id'=>$id,'apply_job_title'=> $apply_job_title,'job_open'=> $job_open,'salary_from'=> $salary_from,'salary_to'=> $salary_to, 'prefer_work'=> $prefer_work, 'company'=>$company, 'company_size'=> $company_size,'important_roll'=>$important_roll, 'tell_yourself'=>$tell_yourself );
                //echo "<pre/>"; print_r($job_preference_data);die;
            $detele_emp_history = DB::table('emp_history')->where('user_id', $id)->delete();
            
            
             //if($personalDetails->is_first_job == 0 & !empty($editEmplyemntHitory))
             if(isset($req['emp_history']) && !empty($req['emp_history']))
             { 
                    $Candidate_Emp_History = $req['emp_history'];  
                    //echo "<pre/>"; print_r($Candidate_Emp_History);die; 
                    foreach ($Candidate_Emp_History as $key => $val)
                    {    
                        $recent_employement = $val['recent_employement'];
                        $industry = $val['industry'];
                        $job_title = $val['job_title'];
                        $start_date = $val['start_date'];
                        $end_date = $val['end_date'];
                        $emp_history = array('user_id'=>$id,'recent_employement'=>$recent_employement,'industry'=>$industry,'job_title'=>$job_title,'start_date'=>$start_date,'end_date'=>$end_date);
                         //echo "<pre/>"; print_r($emp_history);die; 
                        $addEmpData = DB::table('emp_history')->insert($emp_history);
                     }
                 
             }
           //echo "<pre/>"; print_r($Candidate_Emp_History);die;
           $personalDetails = DB::table('personal_details')->where('user_id','=', $id)->update($candidatePersonalDetails);
           $educationDetails = DB::table('education_details')->where('user_id','=', $id)->update($education_details_data);
           $jobPreferenceDetails = DB::table('job_preference')->where('user_id','=', $id)->update($job_preference_data);
           $user = DB::table('users')->where('id','=', $id)->update($userupdate);
           return  Redirect::to('/candidate-data-page')->with('success', 'Data updated successfully.');

    }

     public function candidateDataEmployer(Request $request){
             $req = $request->all();
            //echo ""<pre/>"; print_r($req); die";
            $allcandidate = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
              ->leftjoin('employers as emp','users.id','=','emp.user_id')
              ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
              ->where('role_type' ,'=', 3)
              ->where('is_delete', 0)
              ->get()->toArray();
            //echo "<pre/>"; print_r($allcandidate); die;
            return view('Admin.candidate_data',['allcandidate'=>$allcandidate]);
    }
 public function employerSelf(Request $request){
            $user = Auth::user()->id;echo $user;
            $req = $request->all();
           //echo ""<pre/>"; print_r($req); die";
            $allemployers = DB::table('users')->select('users.id','users.role_type','users.status','users.email','users.name','emp.official_title','emp.mobile_no as emp_mobile','candidate.mobile_no as cnd_mobile')
              ->leftjoin('employers as emp','users.id','=','emp.user_id')
              ->leftjoin('personal_details as candidate','users.id','candidate.user_id')
              ->where('role_type' ,'=', 2 )
              ->where('is_delete', 0)
              ->where('users.id','=',$user)
              ->get()->toArray();
             //echo "<pre/>"; print_r($allemployers); die;
            return view('Admin.employer_data',['allemployers'=>$allemployers]);

    }

    public function addJobPost()
    {
        return view('Admin.add_job_post');
        
    }

    
    public function insertJobPost(Request $request)
    {
        /*$user_id = Auth::user()->id; 
        $req = $request->all();
        //echo "<pre/>"; print_r($req);die;
        $job_name = $req['job_name'];
        $no_of_vacancy = $req['no_of_vacancy'];
        $job_description = $req['job_description'];
        $key_skills = $req['key_skills'];
        $qualification = $req['qualification'];
        $salary = $req['salary'];
        $location = $req['location'];
        $type_of_job = $req['type_of_job'];
        $status = $req['status'];
        $upload_introduction_pdf = '';
        if($request->hasfile('choosefile'))
          {
              $file = $request->file('choosefile');
              $extention = $file->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move(public_path('intro_doc'),$filename);
              $upload_introduction_pdf=$filename;
          }

        $addjobpost = array('user_id'=>$user_id,'job_name'=>$job_name,'no_of_vacancy'=>$no_of_vacancy,'job_description'=>$job_description,'key_skills'=>$key_skills,'qualification'=>$qualification,'salary'=>$salary,'location'=>$location,'type_of_job'=>$type_of_job,'status'=>$status,'indroduction_pdf'=>$upload_introduction_pdf);
        //echo "<pre/>"; print_r($addjobpost);die;
        $jobpost = DB::table('job_post')->insert($addjobpost);
        return  Redirect::to('/add-job-post')->with('success', 'Data inserted successfully.');*/
       $user_id = Auth::user()->id;
       $jobposts = new JobPostsModel;
       $jobposts->user_id = $user_id;
       $jobposts->job_name = $request->job_name;
       $jobposts->no_of_vacancy = $request->no_of_vacancy;
       $jobposts->job_description = $request->job_description;
       $jobposts->key_skills = $request->key_skills;
       $jobposts->qualification = $request->qualification;
       $jobposts->salary_to = $request->salary_to;
        $jobposts->salary_from = $request->salary_from;
       $jobposts->location = $request->location;
       $jobposts->type_of_job = $request->type_of_job;
       $jobposts->status = $request->status;
       $upload_introduction_pdf = '';
       if($request->hasfile('choosefile'))
          {
              $file = $request->file('choosefile');
              $extention = $file->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move(public_path('intro_doc'),$filename);
              $upload_introduction_pdf=$filename;
          } 

          
          $jobposts->indroduction_pdf = $upload_introduction_pdf;
          $jobposts->save();
          return  Redirect::to('/add-job-post')->with('success', 'Data inserted successfully.');
      }


    public function PostJob()
    {
        return view('Admin.add_job');
   }

   public function getJobPosts(Request $request){

     $user_id = Auth::user()->id;
     $getJobPost = DB::table('job_posts')
               ->select('*')
               ->where('user_id','=',$user_id)
               ->where('deleted_at','=', null)
               ->get()
               ->toArray();
    return view('Admin.add_job_post',['job_posts'=>$getJobPost]);          

   }

   public function viewJobPost($id){
    $id = base64_decode($id);
    $view_job_post = JobPostsModel::where('id',$id)->where('deleted_at','=', null)->get()->first();
    //$view_job_post = DB::table('job_posts')->select('*')->where('id',$id)->where('deleted_at','=', null)->get()->first();
    //echo "<pre>"; print_r($view_job_post);echo "</pre>"; die;
    return view('Admin.view_job_post',['display_job_posts'=>$view_job_post]);
   }

   public function deleteJobPost(Request $request,$id){
      $id = base64_decode($id);
      /*$req = $request->all();
        //echo "<pre/>"; print_r($req); die;
        $isDelete = 1;
        $data = array('is_delete'=>$isDelete);
        DB::table('job_post')->where('id',$id)->update($data);
        //return redirect()->guest('candidate-data-page');*/
          $job = JobPostsModel::find($id);
          $job->delete(); // will soft delete the job
          return  Redirect::to('add-job-post')->with('error', 'Record Deleted successfully.');
        }

   public function editJobPost(Request $request,$id){
        $id = $id;
        $edit_post = JobPostsModel::findOrFail($id);
        //$edit_job_post = JobPostsModel::where('id',$id)->where('deleted_at','=', null)->get()->first();
        //echo "<pre/>"; print_r($view_job_post); die;
        //return view('Admin.edit_job_post',['edits_job_posts'=>$edit_job_post]);  
        return view('Admin.edit_job_post', compact('edit_post'));   
   }

   public function updateJobPost(Request $request,$id){
        $req = $request->all();
        //echo "<pre/>"; print_r($req);die;
        $user_id = Auth::user()->id;
        $job_name = $req['job_name'];
        $no_of_vacancy = $req['no_of_vacancy'];
        $job_description = $req['job_description'];
        $key_skills = $req['key_skills'];
        $qualification = $req['qualification'];
        $salary_to = $req['salary_to'];
        $salary_from = $req['salary_from'];
        $location = $req['location'];
        $type_of_job = $req['type_of_job'];
        $status = $req['status'];
        $upload_introduction_pdf = '';
        if($request->hasfile('choosefile'))
          {
              $file = $request->file('choosefile');
              $extention = $file->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move(public_path('intro_doc'),$filename);
              $upload_introduction_pdf=$filename;
          }

        $updatejobpost = array('user_id'=>$user_id,'job_name'=>$job_name,'no_of_vacancy'=>$no_of_vacancy,'job_description'=>$job_description,'key_skills'=>$key_skills,'qualification'=>$qualification,'salary_to'=>$salary_to,'salary_from'=>$salary_from,'location'=>$location,'type_of_job'=>$type_of_job,'status'=>$status,'indroduction_pdf'=>$upload_introduction_pdf);
        //echo "<pre/>"; print_r($validatedData); die;
        JobPostsModel::whereId($id)->update($updatejobpost);
        return  Redirect::to('add-job-post')->with('success', 'Data is successfully updated');
   }

 public function allJobPosts(){
        return view('Admin.all_job_post');
        
    }

public function allJobPostsList(Request $request){
    $req = $request->all();
    $alljobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','emp.user_id','=','job_posts.user_id')
                  ->where('job_posts.deleted_at','=', null)
                  ->get()->toArray();
                  //echo "<pre>"; print_r($alljobpost);echo "</pre>"; die;
   return view('Admin.all_job_post',['alljobdata'=>$alljobpost]);
}
public function viewJob($id){
    //echo $id;
    $id = base64_decode($id);
    $viewjobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','job_posts.user_id','=','emp.user_id')
                  ->where('deleted_at','=', null)
                  ->where('job_posts.id',$id)
                  ->get()->first();
   return view('Admin.view_job',['viewjobdata'=>$viewjobpost]);
}

public function deleteJob(Request $request,$id){
       $id = base64_decode($id);
       $job = JobPostsModel::find($id);
       $job->delete(); // will soft delete the job
          return  Redirect::to('all-job-posts')->with('error', 'Record Deleted successfully.');
        }

public function editJob(Request $request,$id){
        //$edit_post = JobPostsModel::findOrFail($id);
        //$edit_job_post = JobPostsModel::where('id',$id)->where('deleted_at','=', null)->get()->first();
        //echo "<pre/>"; print_r($view_job_post); die;
        // return view('Admin.edit_job',['edits_job'=>$edit_post]);  
        //return view('Admin.edit_job', compact('editjob'));
         $id = base64_decode($id);
         $viewjobpost = DB::table('job_posts')
                  ->select('job_posts.*','emp.company_name')
                  ->leftjoin('employers as emp','job_posts.user_id','=','emp.user_id')
                  ->where('deleted_at','=', null)
                  ->where('job_posts.id',$id)
                  ->get()->first();
   return view('Admin.edit_job',['editjob'=>$viewjobpost]);
}        
public function updateJob(Request $request,$id){
        $id = base64_decode($id);
        $req = $request->all();
        //echo "<pre/>"; print_r($req);die;
        $user_id = Auth::user()->id;
       // echo "user id = "+ $user_id;
        //die;
        //$company_name = $req['company_name'];
        $job_name = $req['job_name'];
        $no_of_vacancy = $req['no_of_vacancy'];
        $job_description = $req['job_description'];
        $key_skills = $req['key_skills'];
        $qualification = $req['qualification'];
        $salary_to = $req['salary_to'];
        $salary_from = $req['salary_from'];
        $location = $req['location'];
        $type_of_job = $req['type_of_job'];
        $status = $req['status'];
        $upload_introduction_pdf = '';
        if($request->hasfile('choosefile'))
          {
              $file = $request->file('choosefile');
              $extention = $file->getClientOriginalExtension();
              $filename = time().'.'.$extention;
              $file->move(public_path('intro_doc'),$filename);
              $upload_introduction_pdf=$filename;
          }
          $updatejobpost = array('job_name'=>$job_name,'no_of_vacancy'=>$no_of_vacancy,'job_description'=>$job_description,'key_skills'=>$key_skills,'qualification'=>$qualification,'salary_to'=>$salary_to,'salary_from'=>$salary_from,'location'=>$location,'type_of_job'=>$type_of_job,'status'=>$status,'indroduction_pdf'=>$upload_introduction_pdf);
            //echo "<pre/>"; print_r($emp_update); die;
        JobPostsModel::whereId($id)->update($updatejobpost);
        return  Redirect::to('all-job-posts')->with('success', 'Data is successfully updated');
   }

   
}



   