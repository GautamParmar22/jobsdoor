@extends('Frontend.layouts.default')
@section('content')
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url('{{URL::asset('assets/images/banner/bnr1.jpg')}}');">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Job Detail</h1>
				<!-- Breadcrumb row -->
				<div class="breadcrumb-row">
					<ul class="list-inline">
						<li><a href="javascript:void(0)">Home</a></li>
						<li>Job Detail</li>
					</ul>
				</div>
				<!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Job Detail -->
		<div class="section-full content-inner-1">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="sticky-top">
							<div class="row">
								<div class="col-lg-12 col-md-6">
									<div class="m-b30">
										<img src="images/blog/grid/pic1.jpg" alt="">
									</div>
								</div>
								<div class="col-lg-12 col-md-6">
									<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
										<h4 class="text-black font-weight-700 p-t10 m-b15">Job Details</h4>										
										<?php //echo "<pre/>"; print_r($job_info);  ?>
										<ul>
											<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address</strong><span class="text-black-light"> {{$job_info->location}} </span></li>
											<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Salary</strong> ₹{{$job_info->salary_to}} to ₹{{$job_info->salary_from}} Monthy</li>
											<li><i class="ti-user"></i><strong class="font-weight-700 text-black">Opening</strong>{{$job_info->no_of_vacancy}}</li>
										</ul>
									</div>
								</div>
							</div>
                        </div>
					</div>
					<div class="col-lg-8">
						<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a href="#" class="text-secondry m-r30">{{$job_info->job_name}}</a>
								</h3>
								<ul class="job-info">
									<li><strong>Education: </strong> {{$job_info->qualification}}</li>
									<li><strong>No of vacancy:</strong> {{$job_info->no_of_vacancy}}</li>
									<li><i class="ti-location-pin text-black m-r5"></i> {{$job_info->location}} </li>
								</ul>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<h5 class="font-weight-600">Job Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p>{{$job_info->job_description}}</p>
								
								
								<h5 class="font-weight-600">Key skills</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<ul class="list-num-count no-round">
									<li>{{$job_info->key_skills}}</li>
									
								</ul>
								<a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalLong" class="site-button">Apply Now</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade " id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">      
      		 <h3 class="modal-title" id="exampleModalLongTitle" >APPLY FOR JOB</h3>      	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="apply_for_job" class="tab-pane active"  action="{{url('apply-for-job')}}" method="POST" enctype='multipart/form-data'>
        	@csrf
        	<h5 class="font-weight-700" align="center">APPLY FOR JOB</h5>
        	<div class="container">
        		<div class="row">
				  <div class="col-6">
				  	<label class="font-weight-400">First Name <span class="cust_star">*</span></label>
					<input name="first_name" required="" class="form-control " placeholder="First Name" type="text" pattern="[A-Za-z\\s]*" >
				  </div>
				  <div class="col-6">
				  	<label class="font-weight-400">Last Name <span class="cust_star">*</span></label>
					<input name="last_name" required="" class="form-control " placeholder="Last Name" type="text" pattern="[A-Za-z\\s]*" >
				  </div>
				</div>
				<br>
				<div class="row">
					<div class="col-6">
					  	<label class="font-weight-400">E-mail <span class="cust_star">*</span></label>
					    <input name="email" required="" class="form-control " placeholder="Your Email Id" type="email" id="email">
				  </div>
				  <div class="col-6">
				  		<label class="font-weight-400">Mobile no <span class="cust_star">*</span></label>
				       <input name="mobile_no" required="" class="form-control " placeholder="Type mobile" type="text">
				  </div>
				</div>
				<br>
				<div class="row">
					<div class="col-6">
					  	<label class="font-weight-400">Total experiance <span class="cust_star">*</span></label>
				        <select name="total_exp"  class="form-control" required> 
                             <option value="0">--Please Select--</option>
                             <option value='Fresher'>Fresher</option>
                             <option value='1 year'>1 year</option>
                             <option value='2 year'>2 year</option>       
                             <option value='3 year'>3 year</option>
                             <option value='4 year'>4 year</option>
                             <option value='5 year'>5 year</option>
                             <option value='6 year'>6 year</option>
                             <option value='7 year'>7 year</option>
                             <option value='8 year'>8 year</option>
                             <option value='9 year'>9 year</option>
                             <option value='10 year'>10 year</option>
                             <option value='11 year'>11 year</option>
                             <option value='12 year'>12 year</option>
                             <option value='13 year'>13 year</option>
                             <option value='14 year'>14 year</option>
                             <option value='15 year'>15 year</option>
                        </select>
				  </div>
				  <div class="col-6">
				  		<label class="font-weight-400">Relavant experiance <span class="cust_star">*</span></label>
				        <select name="relavant_exp"  class="form-control"> 
				        	 <option value="0">--Please Select--</option>
                             <option value='Fresher'>Fresher</option>
                             <option value='1 year'>1 year</option>
                             <option value='2 year'>2 year</option>       
                             <option value='3 year'>3 year</option>
                             <option value='4 year'>4 year</option>
                             <option value='5 year'>5 year</option>
                             <option value='6 year'>6 year</option>
                             <option value='7 year'>7 year</option>
                             <option value='8 year'>8 year</option>
                             <option value='9 year'>9 year</option>
                             <option value='10 year'>10 year</option>
                             <option value='11 year'>11 year</option>
                             <option value='12 year'>12 year</option>
                             <option value='13 year'>13 year</option>
                             <option value='14 year'>14 year</option>
                             <option value='15 year'>15 year</option>
                        </select>
				  </div>
				</div>
				<br>
				<div class="row">
					<div class="col-6">
					  <label class="font-weight-400">Current CTC <span class="cust_star">*</span></label>
				      <input name="current_ctc" required="" class="form-control " placeholder="Your Current CTC" type="text">
				  </div>
				  <div class="col-6">
				  		<label class="font-weight-400">Expected CTC <span class="cust_star">*</span></label>
				        <input name="expected_ctc" required="" class="form-control " placeholder="Your Expected CTC" type="text">
				  </div>
				</div>
				<br>
				<div class="row">
					<div class="col-6">
					   <label class="font-weight-400">Notice period <span class="cust_star">*</span></label>
				       <select name="notice_period"  class="form-control"  id="company" required> 
                             <option value="0">--Please Select--</option>
                             <option value="1 month">1 Month</option>
                             <option value="2 month">2 Months</option>
                             <option value="more then 2 months">More then 2 Months</option>
                       </select>
				    </div>
				    <div class="col-6">
					   <label class="font-weight-400">Upload Resume <span class="cust_star">*</span></label>
		                <div class="resume-file">
		                    <input type="file" class="site-button" id="resumUpload1" name="choosefile">
		                </div>
				    </div>
				  </div>
				 <br>
				 <div class="row">
					<div class="col-12">
					  	<label class="font-weight-400">Tell about your self </label>
					    <textarea name="tell_about_self"  class="form-control " placeholder="Tell about your self" type="text"></textarea> 
				  </div>				  
				</div>
				 <br>	
				 <div class="row"> 
				 	<div class="col-4"> 
				 	</div>
				 	<div class="col-3"> 
				 		<input type="submit" class="btn btn-success" name="Submit" value="Submit">
				 	</div>
				</div>
				<br>
								
		</form>
      </div>
     </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>
var APP_URL = '{{ env('APP_URL') }}';
$(document).ready(function(){

	 $('#apply_for_job').validate({
            rules:{
                
                first_name:{
                    required:true,
                    regex:/^[a-zA-Z\s]+$/,                  
                },
                last_name:{
                    required:true,
                   	regex:/^[a-zA-Z\s]+$/,
                },
                mobile_no:{
                    required:true,
                    digits: true,
                    minlength:10
                },
                total_exp:{
                    required_without:'total_exp|not_in:0',
                },
                 relavent_exp:{
                    required_without:'relavent_exp|not_in:0',
                },
                 email:{
                    required:true,
                    email:true,
                    remote: {
                            type: 'GET',
                            url: APP_URL + 'check-email-exist',
                            data: {
                                email: function() {
                                    return $("#email").val();
                                  }
                        },
                    }  
                },
                notice_period:{
                    required_without:'notice_period|not_in:0',
                },
                "choosefile":{
                     required:true,
                     extension: "pdf|doc|",
                     filesize : 5, // here we are working with MB
                     
                },

                current_ctc:{
                    required:true,
                    number: true,
                },
                expected_ctc:{
                    required:true,
                    number: true,
                },
                
            },
            messages:{
                
                first_name: "Please Enter Only alfabet",
                last_name: "Please Enter Only alfabet",
                mobile_no: "Please Enter 10 digit Mobile no",
                 email: {
                        remote: 'This email id is already exist please try another email id.'
                    },
                "choosefile": {
                    required:"Please Uplaod a File",
                    extension:"Please Uplaod PDF Or DOc File"
                }, 
                total_exp: "Please select",
                relavent_exp: "Please select", 
                notice_period: "Please select",    
                             
            } 
        });
     });    
</script>
@stop