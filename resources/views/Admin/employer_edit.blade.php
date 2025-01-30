@extends('Admin.layout.default')
@section('content')		

<style type="text/css">
	form .error{
  		color: #ff0000;
	}
</style>
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
    		<h1 class="app-page-title">Employer Details</h1>
    		<hr class="my-4">
    		<form class="settings-form" action="{{url('update/'.$getEmployers->id)}}" method="POST" enctype='multipart/form-data' id='emp_frm'>
        		@csrf
		        <div class="row g-4 settings-section">
	        		<div class="col-12 col-md-4">
	            		<h3 class="section-title">Personal Details</h3>
	        		</div>
	              	<div class="col-12 col-md-8">
	                   	<div class="app-card app-card-settings shadow-sm p-4">
						    <div class="app-card-body">
							    <?php //echo "<pre>"; print_r($getEmployers); "</pre>";dd();?>
							    <div class="mb-3">
								    <label for="setting-input-1" class="form-label">Firstname<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
								    <input type="text" class="form-control" id="setting-input-1" value="{{$getEmployers->firstname}}" name= "firstname">
								</div>
								<div class="mb-3">
								    <label for="setting-input-1" class="form-label">Lastname<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
								    <input type="text" class="form-control" id="setting-input-1" value="{{$getEmployers->lastname}}" name= "lastname">
								</div>
								<div class="mb-3">
								    <label for="setting-input-2" class="form-label">Email</label>
								    <input type="email" class="form-control" id="setting-input-2" name="email" value="{{$getEmployers->email}}">
								</div>
							    <!--div class="mb-3">
								    <label for="setting-input-3" class="form-label">Role type</label>
								    <input type="text" class="form-control" id="setting-input-3" name="role_type" value="<?php //if($getEmployers->role_type==2){echo "Employer";}else{echo "Candidate";}?>" >
								</div -->
								<div class="mb-3">
								    <label for="setting-input-3" class="form-label">Phone</label>
								    <input type="text" class="form-control" id="setting-input-3" name="mobile_no" value="{{$getEmployers->emp_mobile}}" >
								</div>
								<div class="mb-3">
								    <label for="setting-input-3" class="form-label">Official title</label>
								    <input type="text" class="form-control" id="setting-input-3" name="official_title" value="{{$getEmployers->official_title}}">
								</div>
								
								 <!--<input type="hidden" class="form-control" id="setting-input-3" name="status" value="{{$getEmployers->status}}">-->
								
								<div class="mb-3">
								    <label for="setting-input-3" class="form-label">Reach you</label>
								    <select name="reach_you"  class="form-control"  id="reach_you" value="{{$getEmployers->reach_you}}"> 
		                                <option value="Anytime">Anytime</option>
		                                <option value="Morning">Morning</option>
		                                <option value="AfterNoon">AfterNoon</option>
	                            	</select>
								</div>
								<!--button type="submit" class="btn app-btn-primary">Save Changes</button--> 
						    </div><!--//app-card-body-->
			          	</div><!--//app-card-->
	             	</div>
	                      
	                <hr class="my-4">
	    		    <div class="row g-4 settings-section">
		        		<div class="col-12 col-md-4">
		            		<h3 class="section-title">Employers Details</h3>
		        		</div>
	        		    <div class="col-12 col-md-8">
			                <div class="app-card app-card-settings shadow-sm p-4">
							    <div class="app-card-body">
								    <div class="mb-3">
								    	<label for="setting-input-company_name" class="form-label">Company name<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
									    <input type="text" class="form-control" id="setting-input-company_name" name="company_name" value="{{$getEmployers->company_name}}" >
									</div>
									<div class="mb-3">
									    <label for="setting-input-industry" class="form-label">Industry</label>
									    <input type="text" class="form-control" id="setting-input-industry" name="industry" value="{{$getEmployers->industry}}">
									</div>
								    <div class="mb-3">
									    <label for="setting-input-company_address" class="form-label">Company address</label>
									    <input type="text" class="form-control" id="setting-input-company_address" name="company_address" value="{{$getEmployers->company_address}}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-city" class="form-label">City</label>
									    <input type="text" class="form-control" id="setting-input-city" name="city" value="{{$getEmployers->city}}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-state" class="form-label">State</label>
									    <input type="text" class="form-control" id="setting-input-state" name="state" value="{{$getEmployers->state}}">
									</div>
										<div class="mb-3">
									    <label for="setting-input-country" class="form-label">Country</label>
									    <input type="text" class="form-control" id="setting-input-country" name="country" value="{{$getEmployers->country}}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-zip_code" class="form-label">Zip code</label>
									    <input type="text" class="form-control" id="setting-input-zip_code" name="zip_code" value="{{$getEmployers->zip_code}}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-website" class="form-label">Website</label>
									    <input type="url" class="form-control" id="setting-input-website" name="website" value="{{$getEmployers->website}}">
									</div>
									<div class="mb-3">
									    <label for="setting-input-status" class="form-label">Status</label>
									    <select class="form-label form-control" name="status" id="setting-input-status">
									    	 <option value="1" <?php if($getEmployers->status == 1){?> selected<?php } ?> >Active</option>
							                 <option  value="0" <?php if($getEmployers->status == 0){?> selected<?php } ?>>InActive</option>
									    </select>
									</div>
									
									<button type="submit" class="btn app-btn-primary" >Save Changes</button>
							    </div><!--//app-card-body-->
							</div><!--//app-card-->
		                </div>
	                </div><!--//row-->
	    		</div><!--//row-->
    		</form>
		</div><!--//container-fluid-->
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script text="text/javascript">
    $('#emp_frm').validate({
            rules:{
                company_name: {
                    required: true
                },
                industry: {
                    required: true
                },
                company_address:{
                    required: true
                },
                city:{
                    required: true
                },
                state:{
                    required: true
                },
                country:{
                    required:true
                },
                zip_code:{
                    required:true,
                    //numeric:true,
                    digits: true
                   
                },
                website:{
                    required:true
                },
                official_title:{
                    required:true
                },
                firstname:{
                    required:true
                },
                lastname:{
                    required:true
                },
                mobile_no:{
                    required:true,
                    digits: true,
                    minlength:10
                },
                email:{
                    required:true,
                    email:true
                },
                reach_you:{
                    required:true
                }               
            },
            messages:{
                company_name:"Please Enter Companyname",
                industry: "Please Enter Indutry",
                company_address:"Please Enter Companyaddress",
                city: "Please Enter Cityname",
                state: "Please Enter Statename",
                country: "Please Enter Countryname",
                //zipcode: "Please Enter Zipcode",
                website: "Please Enter Website URL eg. http://www.google.com",
                official_title: "Palease Enter Officialtitle",
                firstname: "Palease Enter Firstname",
                lastname: "Palease Enter Lastname",
                mobile_no: "Please Enter 10 digit Mobile no",
                //email: "Please Enter Email ",
            } 
        }); 
</script>
					
 @stop