<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\DashboardCotroller;

// header('Access-Control-Allow-Origin:  http://localhost:4200');
// header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
// header('Access-Control-Allow-Methods:  GET, POST, PUT, DELETE, OPTIONS');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('employer', \App\Http\Controllers\EmployerController::class);

// Candidate and Employer Routes
Route::get('/', [JobController::class, 'index']);
Route::post('insert', [JobController::class, 'addEmployer']);
Route::post('add-employer', [JobController::class, 'addEmployer']);
Route::get('checkcndemail', [JobController::class, 'checkEmail']);
Route::get('regf', [JobController::class, 'candidateregister']);
Route::get('browes-job', [JobController::class, 'displayBrowesJob']);
Route::post('search-job', [JobController::class, 'searchBrowesJob']);
Route::get('job-details', [JobController::class, 'jobDetails']);
Route::get('thank-you-page', [JobController::class, 'thankYou']);
Route::get('test-page', [JobController::class, 'testCase']);
Route::get('job-info/{id}', [JobController::class, 'viewJobDetails']);
Route::post('apply-for-job', [JobController::class, 'applyForJobs']);
Route::post('insert-candidate', [JobController::class, 'addCandidateData']);
Route::get('employer', [JobController::class, 'employerData']);
Route::get('check-email-exist', [JobController::class, 'checkEmail']);
Route::get('about', [JobController::class, 'aboutUs']);

// Admin Routes
Route::group(['middleware' => ['App\Http\Middleware\IsLogin']], function () {

    // Dashboard controller routes
    Route::get('index-page', [DashboardCotroller::class, 'IndexPage']);
    Route::get('account-page', [DashboardCotroller::class, 'AccountData']);
    Route::get('resetpass-page', [DashboardCotroller::class, 'ResetPassPage']);
    Route::get('dashboard-page', [DashboardCotroller::class, 'DashboardPage']);
    Route::post('update-profile-action', [DashboardCotroller::class, 'ManageProfile']);
    Route::post('change-password-action', [DashboardCotroller::class, 'changePassword']);
    Route::get('all-users-page', [DashboardCotroller::class, 'allUserData']);
    Route::post('delete-users/{id}', [DashboardCotroller::class, 'deleteUsers']);
    Route::get('employer-data-page', [DashboardCotroller::class, 'employerData']);
    Route::post('delete-employers/{id}', [DashboardCotroller::class, 'deleteEmployers']);
    Route::get('candidate-data-page', [DashboardCotroller::class, 'candidateData']);
    Route::post('delete-candidates/{id}', [DashboardCotroller::class, 'deleteCandidates']);
    Route::post('view-employers/{id}', [DashboardCotroller::class, 'viewEmployers']);
    Route::get('view-candidate/{id}', [DashboardCotroller::class, 'viewCandidate']);
    Route::get('edit-employer/{id}', [DashboardCotroller::class, 'employetEdit']);
    Route::post('update/{id}', [DashboardCotroller::class, 'updateEmpData']);
    Route::get('edit-candidate/{id}', [DashboardCotroller::class, 'candidateEdit']);
    Route::post('update-candidate/{id}', [DashboardCotroller::class, 'updateCndData']);
    Route::get('candidate-data-page-emp', [DashboardCotroller::class, 'candidateDataEmployer']);
    Route::get('employer-data-self', [DashboardCotroller::class, 'employerSelf']);
    Route::get('add-job-post', [DashboardCotroller::class, 'addJobPost']);
    Route::post('insert-job-post', [DashboardCotroller::class, 'insertJobPost']);
    Route::get('job-post', [DashboardCotroller::class, 'PostJob']);
    Route::get('add-job-post', [DashboardCotroller::class, 'getJobPosts']);
    Route::get('view-job-post/{id}', [DashboardCotroller::class, 'viewJobPost']);
    Route::delete('delete-job-post/{id}', [DashboardCotroller::class, 'deleteJobPost']);
    Route::get('edit-job-post/{id}', [DashboardCotroller::class, 'editJobPost']);
    Route::post('update-job-post/{id}', [DashboardCotroller::class, 'updateJobPost']);
    Route::get('all-job-posts', [DashboardCotroller::class, 'allJobPostsList']);
    Route::get('view-job/{id}', [DashboardCotroller::class, 'viewJob']);
    Route::delete('delete-job/{id}', [DashboardCotroller::class, 'deleteJob']);
    Route::get('edit-job/{id}', [DashboardCotroller::class, 'editJob']);
    Route::post('update-job/{id}', [DashboardCotroller::class, 'updateJob']);

    Route::fallback(function () {
        return view('errors.404');
    });
});

Route::get('login-page', [DashboardCotroller::class, 'LoginPage']);
Route::post('/admin-login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);
