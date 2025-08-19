@extends('Admin.layout.default')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			@if (\Session::has('success'))
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
			<h1 class="app-page-title">Job Post Details</h1>
			<hr class="my-4">
			<div class="row g-4 settings-section">
				<div class="col-12 col-md-4">
					<h3 class="section-title">Job Post Details</h3>
				</div>
				<div class="col-12 col-md-8">
					<div class="app-card app-card-settings shadow-sm p-4">
						<div class="app-card-body">
							<div class="mb-2"><strong>Post by: </strong>{{$viewjobdata->company_name}}</div>
							<div class="mb-2"><strong>Job name: </strong>{{$viewjobdata->job_name}}</div>
							<div class="mb-2"><strong>No of vacancy: </strong>{{$viewjobdata->no_of_vacancy}}</div>
							<div class="mb-2"><strong>Type of job: </strong>{{$viewjobdata->type_of_job}}</div>
							<div class="mb-2"><strong>Description of job: </strong>{{$viewjobdata->job_description}}
							</div>
							<div class="mb-2"><strong>Key skills: </strong>{{$viewjobdata->key_skills}}</div>
							<div class="mb-2"><strong>Qualification: </strong>{{$viewjobdata->qualification}}</div>
							<div class="mb-2"><strong>Salary to: </strong>{{$viewjobdata->salary_to}}</div>
							<div class="mb-2"><strong>Salary from: </strong>{{$viewjobdata->salary_from}}</div>
							<div class="mb-2"><strong>Location: </strong>{{$viewjobdata->location}}</div>
							<div class="mb-2"><strong>Describe PDF: </strong>{{$viewjobdata->indroduction_pdf}}</div>
							<div class="mb-2"><strong>Status: </strong>
								@if($viewjobdata->status)
									<span class="badge bg-success">Active</span>
								@else
									<span class="badge bg-danger">Inactive</span>
								@endif
							</div>
						</div><!--//app-card-body-->
					</div><!--//app-card-->
				</div>
			</div><!--//row-->
		</div><!--//container-fluid-->
	</div>
</div>
@stop