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
        		<?php //echo "<pre/>"; print_r($display_job_posts);?>
        		<div class="col-12 col-md-8">
            		<div class="app-card app-card-settings shadow-sm p-4">
			    		<div class="app-card-body">
			    		     <div class="mb-2"><strong>Job name:  </strong>{{$display_job_posts->job_name}}</div>
					    	 <div class="mb-2"><strong>No of vacancy:  </strong>{{$display_job_posts->no_of_vacancy}}</div>
							 <div class="mb-2"><strong>Type of job:  </strong>{{$display_job_posts->type_of_job}}</div>
					         <div class="mb-2"><strong>Description of job:  </strong>{{$display_job_posts->job_description}}</div>
					         <div class="mb-2"><strong>Key skills:  </strong>{{$display_job_posts->key_skills}}</div>
					         <div class="mb-2"><strong>Qualification:  </strong>{{$display_job_posts->qualification}}</div>
					         <div class="mb-2"><strong>Salary:  </strong>{{$display_job_posts->salary}}</div>
					         <div class="mb-2"><strong>Location:  </strong>{{$display_job_posts->location}}</div>
					         <div class="mb-2"><strong>Describe PDF:  </strong>
					         	<a href="{{env('APP_URL')}}/intro_pdf/{{$display_job_posts->indroduction_pdf}}" download="{{$display_job_posts->indroduction_pdf}}" target="_blank" class="btn btn-info btn-sm" >View Introduction PDF</a></div>
					         <div class="mb-2"><strong>Status:  </strong>
					         		<?php
								  if($display_job_posts->status){
									 echo '<span class="badge bg-success">Active</span>';
								   }else{
									echo '<span class="badge bg-danger">Inactive</span>';
								   }
							    ?>
					         </div>
			    		</div><!--//app-card-body-->
					</div><!--//app-card-->
        		</div>
    		</div><!--//row-->
		 </div><!--//container-fluid-->
	</div>
</div>	
@stop