<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Support\Facades\DB;
use Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use  App\Models\User;
use App\Models\JobPostsModel;
use App\Models\EducationDetail;
use App\Models\Employer;
use App\Models\JobPreference;
use App\Models\PersonalDetail;
use App\Models\EmpHistory;
use App\Models\JobPost;


class DashboardCotroller extends Controller
{
    /**
     * Displays the admin dashboard page.
     *
     * This page displays the counts of active/inactive candidates, total users, employers, and candidates.
     * It also displays the 5 most recent registered users and candidates.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function DashboardPage(Request $request)
    {
        $user = Auth::user();

        // Base query for non-admin, non-deleted users
        $baseUserQuery = User::where('role_type', '!=', 1)->where('is_delete', 0);

        // Count data
        $totalUsers = $baseUserQuery->count();
        $employerCount = $baseUserQuery->where('role_type', 2)->count();
        $candidateCount = $baseUserQuery->where('role_type', 3)->count();

        // Candidate base query
        $candidateQuery = User::where('role_type', 3)->where('is_delete', 0);

        $recentUsers = $baseUserQuery->orderByDesc('id')->limit(5)->get();
        $recentCandidates = $candidateQuery->orderByDesc('id')->limit(5)->get();
        $activeCandidateCount = $candidateQuery->where('status', 1)->count();
        $inactiveCandidateCount = $candidateQuery->where('status', 0)->count();
        $totalCandidateCount = $candidateQuery->count();

        return view('Admin.dashboard', [
            'dashboard_data' => $user,
            'totsluser' => $totalUsers,
            'employer' => $employerCount,
            'candidate' => $candidateCount,
            'recentusers' => $recentUsers,
            'totalcandidate' => $totalCandidateCount,
            'recentcandidate' => $recentCandidates,
            'activecandidate' => $activeCandidateCount,
            'inactivecandidate' => $inactiveCandidateCount,
        ]);
    }

    public function AccountData()
    {
        return view('Admin.account');
    }

    public function OrderData()
    {
        return view('Admin.orders');
    }

    public function IndexPage()
    {
        return view('Admin.pages.indexpage');
    }

    public function ResetPassPage()
    {
        return view('Admin.reset-password');
    }

    public function LoginPage()
    {
        return view('Admin.login');
    }

    public function ManageProfile(Request $request)
    {
        $req = $request->all();

        $name = $req['name'];

        $data = array('name' => $name);
        $mngprofile = User::where('role_type', 1)->update($data);

        return  Redirect::to('/account-page')->with('success', 'Account has been updated successfully.');
    }

    public function changePassword(Request $request)
    {
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

    public function allUserData(Request $request)
    {
        $req = $request->all();

        $alluserdata = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', '=', 'candidate.user_id')
            ->where('role_type', '!=', 1)
            ->where('is_delete', 0)
            ->get()
            ->toArray();

        $allcandidate = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', '=', 'candidate.user_id')
            ->where('role_type', '=', 3)
            ->where('is_delete', 0)
            ->get()
            ->toArray();

        return view('Admin.allusers', ['alluserdata' => $alluserdata, 'all_candidate' => $allcandidate]);
    }

    public function deleteUsers(Request $request, $id)
    {
        $req = $request->all();

        $isDelete = 1;
        $data = array('is_delete' => $isDelete);
        User::where('id', $id)->update($data);

        return  Redirect::to('all-users-page')->with('error', 'Record Deleted successfully.');
    }
    public function employerData(Request $request)
    {
        $req = $request->all();

        $allemployers = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', 'candidate.user_id')
            ->where('role_type', '=', 2)
            ->where('is_delete', 0)
            ->get()->toArray();

        return view('Admin.employer_data', ['allemployers' => $allemployers]);
    }

    public function deleteEmployers(Request $request, $id)
    {
        $req = $request->all();

        $isDelete = 1;
        $data = array('is_delete' => $isDelete);
        User::where('id', $id)->update($data);

        return  Redirect::to('employer-data-page')->with('error', 'Record Deleted successfully.');
    }
    public function candidateData(Request $request)
    {
        $req = $request->all();
        $allcandidate = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', 'candidate.user_id')
            ->where('role_type', '=', 3)
            ->where('is_delete', 0)
            ->get()->toArray();

        return view('Admin.candidate_data', ['allcandidate' => $allcandidate]);
    }
    public function  deleteCandidates(Request $request, $id)
    {
        $req = $request->all();

        $isDelete = 1;
        $data = array('is_delete' => $isDelete);
        User::where('id', $id)->update($data);
        //return redirect()->guest('candidate-data-page');
        return  Redirect::to('candidate-data-page')->with('error', 'Record Deleted successfully.');
    }

    public function viewEmployers($id)
    {
        $id = base64_decode($id);
        $ViewEmployers = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'emp.company_name', 'emp.industry', 'emp.company_address', 'emp.city', 'emp.zip_code', 'emp.website', 'emp.state')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->where('users.id', $id)
            ->get()->first();

        return view('Admin.employer_view', ['emp_view' => $ViewEmployers]);
    }
    public function viewCandidate($id)
    {
        $id = base64_decode($id);

        $viewCandidate = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name')->where('users.id', $id)->get()->first();

        $getPersonalDetails = PersonalDetail::select('*')->where('user_id', '=', $id)->first();


        $getEducationDetails = EducationDetail::select('*')->where('user_id', '=', $id)->first();


        $getEmpHistory = EmpHistory::select('*')->where('user_id', '=', $id)->get()->toArray();


        $getJobPreference = JobPreference::select('*')->where('user_id', '=', $id)->get()->first();


        return view('Admin.candidate_view', ['candiadte_view' => $viewCandidate, 'getPersonalDetails' => $getPersonalDetails, 'education_details' => $getEducationDetails, 'emp_history' => $getEmpHistory, 'job_preference' => $getJobPreference]);
    }

    public function employetEdit(Request $request, $id)
    {
        $getEmployer = User::select('users.id', 'users.role_type', 'users.status', 'emp_data.email', 'emp_data.firstname', 'lastname', 'emp_data.official_title', 'emp_data.mobile_no as emp_mobile', 'emp_data.company_name', 'emp_data.industry', 'emp_data.company_address', 'emp_data.city', 'emp_data.zip_code', 'emp_data.website', 'emp_data.state', 'emp_data.country', 'emp_data.reach_you')
            ->leftjoin('employers as emp_data', 'users.id', '=', 'emp_data.user_id')
            ->where('user_id', '=', $id)
            ->get()->first();

        return view('Admin.employer_edit', ['getEmployers' => $getEmployer]);
    }
    public function updateEmpData(Request $request, $id)
    {

        $req = $request->all();

        //form 1 data
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $official_title = $request->input('official_title');
        $email = $request->input('email');
        $mobile_no = $request->input('mobile_no');
        $status = $request->input('status');
        $reach_you = $request->input('reach_you');
        $role_type = $request->input('role_type');
        $name = $firstname . ' ' . $lastname;

        //form 2 data
        $company_name = $request->input('company_name');
        $industry = $request->input('industry');
        $company_address = $request->input('company_address');
        $city = $request->input('city');
        $state = $request->input('state');
        $country = $request->input('country');
        $zipcode = $request->input('zip_code');
        $website = $request->input('website');

        $empFrm1 = array('firstname' => $firstname, 'lastname' => $lastname, 'official_title' => $official_title,  'email' => $email, 'mobile_no' => $mobile_no, 'reach_you' => $reach_you,);
        $empFrm2 = array('company_name' => $company_name, 'industry' => $industry, 'company_address' => $company_address, 'city' => $city, 'state' => $state, 'country' => $country, 'zip_code' => $zipcode, 'website' => $website);
        $userupdate = array('name' => $name, 'status' => $status);

        $updateEmployerData = Employer::where('user_id', '=', $id)->update($empFrm1);
        $updateEmpData = Employer::where('user_id', '=', $id)->update($empFrm2);
        $user = User::where('id', '=', $id)->update($userupdate);
        return  Redirect::to('/employer-data-page')->with('success', 'Data updated successfully.');
    }

    public function candidateEdit(Request $request, $id)
    {
        $Candidate = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name')->where('users.id', $id)->get()->first();

        $editPersonalDetails = PersonalDetail::select('*')->where('user_id', '=', $id)->first();

        $editEducationDetails = EducationDetail::select('*')->where('user_id', '=', $id)->first();

        $editEmpHistory = EmpHistory::select('*')->where('user_id', '=', $id)->get()->toArray();

        $editJobPreference = JobPreference::select('*')->where('user_id', '=', $id)->get()->first();

        return view('Admin.candidate_edit', ['getCandidate' => $Candidate, 'personal' => $editPersonalDetails, 'editEmplyemntHitory' => $editEmpHistory, 'education' => $editEducationDetails, 'editJobPreference' => $editJobPreference]);
    }

    public function updateCndData(Request $request, $id)
    {
        $req = $request->all();

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
        $name = $firstname . ' ' . $lastname;

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


        $candidatePersonalDetails = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'mobile_no' => $mobile_no, 'address' => $address, 'city' => $city, 'start_job' => $start_job, 'zip_code' => $zip_code, 'reach_you' => $reach_you, 'top_skills' => $top_skills);

        $userupdate = array('name' => $name, 'status' => $status);

        $education_details_data = array('user_id' => $id, 'school_name' => $school_name, 'degree' => $degree, 'field_of_study' => $field_of_study, 'edu_start_year' => $edu_start_year, 'edu_start_month' => $edu_start_month, 'edu_end_year' => $edu_end_year, 'edu_end_month' => $edu_end_month);

        $job_preference_data = array('user_id' => $id, 'apply_job_title' => $apply_job_title, 'job_open' => $job_open, 'salary_from' => $salary_from, 'salary_to' => $salary_to, 'prefer_work' => $prefer_work, 'company' => $company, 'company_size' => $company_size, 'important_roll' => $important_roll, 'tell_yourself' => $tell_yourself);

        $detele_emp_history = EmpHistory::where('user_id', $id)->delete();


        if (isset($req['emp_history']) && !empty($req['emp_history'])) {
            $Candidate_Emp_History = $req['emp_history'];

            foreach ($Candidate_Emp_History as $key => $val) {
                $recent_employement = $val['recent_employement'];
                $industry = $val['industry'];
                $job_title = $val['job_title'];
                $start_date = $val['start_date'];
                $end_date = $val['end_date'];
                $emp_history = array('user_id' => $id, 'recent_employement' => $recent_employement, 'industry' => $industry, 'job_title' => $job_title, 'start_date' => $start_date, 'end_date' => $end_date);

                $addEmpData = EmpHistory::insert($emp_history);
            }
        }

        $personalDetails = PersonalDetail::where('user_id', '=', $id)->update($candidatePersonalDetails);
        $educationDetails = EducationDetail::where('user_id', '=', $id)->update($education_details_data);
        $jobPreferenceDetails = JobPreference::where('user_id', '=', $id)->update($job_preference_data);
        $user = User::where('id', '=', $id)->update($userupdate);
        return  Redirect::to('/candidate-data-page')->with('success', 'Data updated successfully.');
    }

    public function candidateDataEmployer(Request $request)
    {
        $allcandidate = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', 'candidate.user_id')
            ->where('role_type', '=', 3)
            ->where('is_delete', 0)
            ->get()->toArray();

        return view('Admin.candidate_data', ['allcandidate' => $allcandidate]);
    }
    public function employerSelf(Request $request)
    {
        $user = Auth::user()->id;  
        $allemployers = User::select('users.id', 'users.role_type', 'users.status', 'users.email', 'users.name', 'emp.official_title', 'emp.mobile_no as emp_mobile', 'candidate.mobile_no as cnd_mobile')
            ->leftjoin('employers as emp', 'users.id', '=', 'emp.user_id')
            ->leftjoin('personal_details as candidate', 'users.id', 'candidate.user_id')
            ->where('role_type', '=', 2)
            ->where('is_delete', 0)
            ->where('users.id', '=', $user)
            ->get()->toArray();

        return view('Admin.employer_data', ['allemployers' => $allemployers]);
    }

    public function addJobPost()
    {
        return view('Admin.add_job_post');
    }


    public function insertJobPost(Request $request)
    {
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
        if ($request->hasfile('choosefile')) {
            $file = $request->file('choosefile');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('intro_doc'), $filename);
            $upload_introduction_pdf = $filename;
        }


        $jobposts->indroduction_pdf = $upload_introduction_pdf;
        $jobposts->save();
        return  Redirect::to('/add-job-post')->with('success', 'Data inserted successfully.');
    }


    public function PostJob()
    {
        return view('Admin.add_job');
    }

    public function getJobPosts(Request $request)
    {

        $user_id = Auth::user()->id;
        $getJobPost = DB::table('job_posts')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->where('deleted_at', '=', null)
            ->get()
            ->toArray();
        return view('Admin.add_job_post', ['job_posts' => $getJobPost]);
    }

    public function viewJobPost($id)
    {
        $id = base64_decode($id);
        $view_job_post = JobPostsModel::where('id', $id)->where('deleted_at', '=', null)->get()->first();

        return view('Admin.view_job_post', ['display_job_posts' => $view_job_post]);
    }

    public function deleteJobPost(Request $request, $id)
    {
        $id = base64_decode($id);
        $job = JobPostsModel::find($id);
        $job->delete(); // will soft delete the job
        return  Redirect::to('add-job-post')->with('error', 'Record Deleted successfully.');
    }

    public function editJobPost(Request $request, $id)
    {
        $edit_post = JobPostsModel::findOrFail($id);
        return view('Admin.edit_job_post', compact('edit_post'));
    }

    public function updateJobPost(Request $request, $id)
    {
        $req = $request->all();
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
        if ($request->hasfile('choosefile')) {
            $file = $request->file('choosefile');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('intro_doc'), $filename);
            $upload_introduction_pdf = $filename;
        }

        $updatejobpost = array('user_id' => $user_id, 'job_name' => $job_name, 'no_of_vacancy' => $no_of_vacancy, 'job_description' => $job_description, 'key_skills' => $key_skills, 'qualification' => $qualification, 'salary_to' => $salary_to, 'salary_from' => $salary_from, 'location' => $location, 'type_of_job' => $type_of_job, 'status' => $status, 'indroduction_pdf' => $upload_introduction_pdf);

        JobPostsModel::whereId($id)->update($updatejobpost);
        return  Redirect::to('add-job-post')->with('success', 'Data is successfully updated');
    }

    public function allJobPosts()
    {
        return view('Admin.all_job_post');
    }

    public function allJobPostsList(Request $request)
    {
        $req = $request->all();
        $alljobpost = DB::table('job_posts')
            ->select('job_posts.*', 'emp.company_name')
            ->leftjoin('employers as emp', 'emp.user_id', '=', 'job_posts.user_id')
            ->where('job_posts.deleted_at', '=', null)
            ->get()->toArray();

        return view('Admin.all_job_post', ['alljobdata' => $alljobpost]);
    }
    public function viewJob($id)
    {
        $id = base64_decode($id);
        $viewjobpost = DB::table('job_posts')
            ->select('job_posts.*', 'emp.company_name')
            ->leftjoin('employers as emp', 'job_posts.user_id', '=', 'emp.user_id')
            ->where('deleted_at', '=', null)
            ->where('job_posts.id', $id)
            ->get()->first();
        return view('Admin.view_job', ['viewjobdata' => $viewjobpost]);
    }

    public function deleteJob(Request $request, $id)
    {
        $id = base64_decode($id);
        $job = JobPostsModel::find($id);
        $job->delete(); // will soft delete the job
        return  Redirect::to('all-job-posts')->with('error', 'Record Deleted successfully.');
    }

    public function editJob(Request $request, $id)
    {
        $id = base64_decode($id);
        $viewjobpost = DB::table('job_posts')
            ->select('job_posts.*', 'emp.company_name')
            ->leftjoin('employers as emp', 'job_posts.user_id', '=', 'emp.user_id')
            ->where('deleted_at', '=', null)
            ->where('job_posts.id', $id)
            ->get()->first();
        return view('Admin.edit_job', ['editjob' => $viewjobpost]);
    }
    public function updateJob(Request $request, $id)
    {
        $id = base64_decode($id);
        $req = $request->all();
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
        if ($request->hasfile('choosefile')) {
            $file = $request->file('choosefile');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('intro_doc'), $filename);
            $upload_introduction_pdf = $filename;
        }
        $updatejobpost = array('job_name' => $job_name, 'no_of_vacancy' => $no_of_vacancy, 'job_description' => $job_description, 'key_skills' => $key_skills, 'qualification' => $qualification, 'salary_to' => $salary_to, 'salary_from' => $salary_from, 'location' => $location, 'type_of_job' => $type_of_job, 'status' => $status, 'indroduction_pdf' => $upload_introduction_pdf);

        JobPostsModel::whereId($id)->update($updatejobpost);
        return  Redirect::to('all-job-posts')->with('success', 'Data is successfully updated');
    }
}
