@extends('Admin.layout.default')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			@if(\Session::has('success'))
				<div class="alert alert-success" style="display: none;">
					<ul>
						<li id="success-msg">{!! \Session::get('success') !!}</li>
					</ul>
				</div>
			@endif
			@if (session('error'))
				<div class="alert alert-danger" style="display: none;">
					<li id="error-msg">{{ session('error') }}</li>
				</div>
			@endif
			<h1 class="app-page-title">Candidate Details</h1>
			<hr class="my-4">
			<div class="row g-4 settings-section">
				<div class="col-12 col-md-3">
					<h3 class="section-title">Personal Details</h3>
				</div>
				<div class="col-12 col-md-8">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">
							<div class="mb-2"><strong>Name: </strong>{{$candiadte_view->name}}</div>
							<div class="mb-2"><strong>Mobile no: </strong>{{$getPersonalDetails->mobile_no}}</div>
							<div class="mb-2"><strong>Email: </strong>{{$candiadte_view->email}}</div>
							<div class="mb-2"><strong>Address: </strong>{{$getPersonalDetails->address}}</div>
							<div class="mb-2"><strong>City: </strong>{{$getPersonalDetails->city}}</div>
							<div class="mb-2"><strong>Zip code: </strong>{{$getPersonalDetails->zip_code}}</div>
							<div class="mb-2"><strong>Start job: </strong>{{$getPersonalDetails->start_job}}</div>
							<div class="mb-2"><strong>Reach you: </strong>{{$getPersonalDetails->reach_you}}</div>
							<div class="mb-2"><strong>Resume: </strong>
								<a href="{{env('APP_URL')}}resume/{{$getPersonalDetails->resume}}"
									download="{{$getPersonalDetails->resume}}" target="_blank"
									class="btn btn-info btn-sm">View resume</a>
							</div>
						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div>
			</div><!--//row-->
			<hr class="my-4">
			<div class="row g-4 settings-section">
				<div class="col-12 col-md-3">
					<h3 class="section-title">Employement History</h3>
				</div>
				<div class="col-12 col-md-8">
					<div class="app-card-body">
						@if ($getPersonalDetails->is_first_job == 0)
						<div class="mb-2"><strong>Is your first job: </strong>No</div>
						<hr>						
						@foreach($emp_history as $emp_hist)
							<div class="mb-2"><strong>Recent employement: </strong>{{$emp_hist->recent_employement}}</div>
							<div class="mb-2"><strong>Industry: </strong>{{$emp_hist->industry}}</div>
							<div class="mb-2"><strong>Job title: </strong>{{$emp_hist->job_title}}</div>
							<div class="mb-2"><strong>Start date: </strong>{{$emp_hist->start_date}}</div>
							<div class="mb-2"><strong>End date: </strong>{{$emp_hist->end_date}}</div>
							<hr>
						@endforeach
						@else 
						<div class="mb-2"><strong>Is your first job: </strong>Yes</div>
						<hr>
						@endif
						<div class="mb-2"><strong>Skills : </strong>{{$getPersonalDetails->top_skills}}</div>
					</div><!--//app-card-body-->
				</div><!--//row-->
				<hr>
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-3">
						<h3 class="section-title">Education Details</h3>
					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">
							<div class="app-card-body">
								<div class="mb-2"><strong>School name: </strong>{{$education_details->school_name}}
								</div>
								<div class="mb-2"><strong>Degree: </strong>{{$education_details->degree}}</div>
								<div class="mb-2"><strong>Education start year:
									</strong>{{$education_details->edu_start_year}}</div>
								<div class="mb-2"><strong>Education start month:
									</strong>{{$education_details->edu_start_month}}</div>
								<div class="mb-2"><strong>Education end year:
									</strong>{{$education_details->edu_end_year}}</div>
								<div class="mb-2"><strong>Education end month:
									</strong>{{$education_details->edu_end_month}}</div>
							</div><!--//app-card-body-->
						</div><!--//app-card-->
					</div>
				</div><!--//row-->
				<hr>
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-3">
						<h3 class="section-title">Job Preferences</h3>
					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">
							<div class="app-card-body">
								<div class="mb-2"><strong>Job title: </strong>{{$job_preference->apply_job_title}}</div>
								<div class="mb-2"><strong>Job open: </strong>{{$job_preference->job_open}}</div>
								<div class="mb-2"><strong>Salary from: </strong>{{$job_preference->salary_from}}</div>
								<div class="mb-2"><strong>Salary to: </strong>{{$job_preference->salary_to}}</div>
								<div class="mb-2"><strong>Prefer work: </strong>{{$job_preference->prefer_work}}</div>
								<div class="mb-2"><strong>Company: </strong>{{$job_preference->company}}</div>
								<div class="mb-2"><strong>Company size: </strong>{{$job_preference->company_size}}</div>
								<div class="mb-2"><strong>Important skill: </strong>{{$job_preference->important_roll}}
								</div>
								<div class="mb-2"><strong>Tell your self: </strong>{{$job_preference->tell_yourself}}
								</div>
							</div><!--//app-card-body-->
						</div><!--//app-card-->
					</div>
				</div><!--//row-->
			</div><!--//container-fluid-->
		</div>
	</div>
</div>
@stop