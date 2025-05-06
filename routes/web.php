<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\DashboardCotroller;

header('Access-Control-Allow-Origin:  http://localhost:4200');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Authorization, Origin');
header('Access-Control-Allow-Methods:  GET, POST, PUT, DELETE, OPTIONS');

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

// Candidate and Employer Routes
Route::get('/', [JobController::class, 'index']);
Route::post('insert', [JobController::class, 'addEmployer']);
Route::post('add-employer', [JobController::class, 'addEmployer']);
Route::get('checkcndemail', [JobController::class, 'checkEmail']);
Route::any('regf', [JobController::class, 'candidateregister']);
Route::any('browes-job', [JobController::class, 'displayBrowesJob']);
Route::post('search-job', [JobController::class, 'searchBrowesJob']);
Route::get('job-details', [JobController::class, 'jobDetails']);
Route::get('thank-you-page', [JobController::class, 'thankYou']);
Route::get('test-page', [JobController::class, 'testCase']);
Route::get('job-info/{id}', [JobController::class, 'viewJobDetails']);
Route::post('apply-for-job', [JobController::class, 'applyForJobs']);
Route::any('insert-candidate', [JobController::class, 'addCandidateData']);
Route::get('employer', [JobController::class, 'employerData']);
Route::get('check-email-exist', [JobController::class, 'checkEmail']);
Route::get('about', [JobController::class, 'aboutUs']);

// Admin Routes
Route::group(['middleware' => ['App\Http\Middleware\IsLogin']], function () {

    // Dashboard controller routes
    Route::any('index-page', [DashboardCotroller::class, 'IndexPage']);
    Route::any('account-page', [DashboardCotroller::class, 'AccountData']);
    Route::any('resetpass-page', [DashboardCotroller::class, 'ResetPassPage']);
    Route::any('dashboard-page', [DashboardCotroller::class, 'DashboardPage']);
    Route::any('update-profile-action', [DashboardCotroller::class, 'ManageProfile']);
    Route::any('change-password-action', [DashboardCotroller::class, 'changePassword']);
    Route::any('all-users-page', [DashboardCotroller::class, 'allUserData']);
    Route::any('delete-users/{id}', [DashboardCotroller::class, 'deleteUsers']);
    Route::any('employer-data-page', [DashboardCotroller::class, 'employerData']);
    Route::any('delete-employers/{id}', [DashboardCotroller::class, 'deleteEmployers']);
    Route::any('candidate-data-page', [DashboardCotroller::class, 'candidateData']);
    Route::any('delete-candidates/{id}', [DashboardCotroller::class, 'deleteCandidates']);
    Route::any('view-employers/{id}', [DashboardCotroller::class, 'viewEmployers']);
    Route::any('view-candidate/{id}', [DashboardCotroller::class, 'viewCandidate']);
    Route::any('edit-employer/{id}', [DashboardCotroller::class, 'employetEdit']);
    Route::any('update/{id}', [DashboardCotroller::class, 'updateEmpData']);
    Route::any('edit-candidate/{id}', [DashboardCotroller::class, 'candidateEdit']);
    Route::any('update-candidate/{id}', [DashboardCotroller::class, 'updateCndData']);
    Route::any('candidate-data-page-emp', [DashboardCotroller::class, 'candidateDataEmployer']);
    Route::any('employer-data-self', [DashboardCotroller::class, 'employerSelf']);
    Route::any('add-job-post', [DashboardCotroller::class, 'addJobPost']);
    Route::any('insert-job-post', [DashboardCotroller::class, 'insertJobPost']);
    Route::any('job-post', [DashboardCotroller::class, 'PostJob']);
    Route::any('add-job-post', [DashboardCotroller::class, 'getJobPosts']);
    Route::any('view-job-post/{id}', [DashboardCotroller::class, 'viewJobPost']);
    Route::any('delete-job-post/{id}', [DashboardCotroller::class, 'deleteJobPost']);
    Route::any('edit-job-post/{id}', [DashboardCotroller::class, 'editJobPost']);
    Route::any('update-job-post/{id}', [DashboardCotroller::class, 'updateJobPost']);
    Route::any('all-job-posts', [DashboardCotroller::class, 'allJobPostsList']);
    Route::any('view-job/{id}', [DashboardCotroller::class, 'viewJob']);
    Route::any('delete-job/{id}', [DashboardCotroller::class, 'deleteJob']);
    Route::any('edit-job/{id}', [DashboardCotroller::class, 'editJob']);
    Route::any('update-job/{id}', [DashboardCotroller::class, 'updateJob']);

    Route::fallback(function () {
        return view('errors.404');
    });
});

Route::any('login-page', [DashboardCotroller::class, 'LoginPage']);
Route::post('/admin-login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout']);

