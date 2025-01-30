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
							  		<h1 class="app-page-title">Candidate Details</h1>
							  		<hr class="my-4">
							  		<form class="settings-form" action="{{url('update-candidate/'.$getCandidate->id)}}" method="POST" enctype='multipart/form-data' id='cnd_frm'>
							      		@csrf
								        <div class="row g-4 settings-section">
							        		<div class="col-12 col-md-4">
							            		<h3 class="section-title">Personal Details</h3>
							        		</div>
							              	<div class="col-12 col-md-8">
							                   	<div class="app-card app-card-settings shadow-sm p-4">
												    <div class="app-card-body">
													    <?php //echo "<pre>"; print_r($personal); "</pre>";?>
													    <div class="mb-3">
														    <label for="setting-input-firstname" class="form-label">Firstname<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
														    <input type="text" class="form-control" id="setting-input-firstname" value="{{$personal->firstname}}" name="firstname">
														</div>
														<div class="mb-3">
														    <label for="setting-input-lastname" class="form-label">Lastname<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
														    <input type="text" class="form-control" id="setting-input-lastname" value="{{$personal->lastname}}" name="lastname">
														</div>
														<div class="mb-3">
														    <label for="setting-input-email" class="form-label">Email</label>
														    <input type="email" class="form-control" id="setting-input-email" name="email" value="{{$getCandidate->email}}">
														</div>
													    <!--div class="mb-3">
														    <label for="setting-input-3" class="form-label">Role type</label>
														    <input type="text" class="form-control" id="setting-input-3" name="role_type" value="<?php //if($getEmployers->role_type==2){echo "Employer";}else{echo "Candidate";}?>" >
														</div -->
														<div class="mb-3">
														    <label for="setting-input-mobile_no" class="form-label">Phone</label>
														    <input type="text" class="form-control" id="setting-input-mobile_no" name="mobile_no" value="{{$personal->mobile_no}}" >
														</div>
														<div class="mb-3">
															    <label for="setting-input_address" class="form-label">Address</label>
															    <input type="text" class="form-control" id="setting-input-company_address" name="address" value="{{$personal->address}}">
															</div>
															<div class="mb-3">
															    <label for="setting-input-city" class="form-label">City</label>
															    <input type="text" class="form-control" id="setting-input-city" name="city" value="{{$personal->city}}">
															</div>
															<!--div class="mb-3">
															    <label for="setting-input-state" class="form-label">State</label>
															    <input type="text" class="form-control" id="setting-input-state" name="state" value="#">
															</div-->
																<!--div class="mb-3">
															    <label for="setting-input-country" class="form-label">Country</label>
															    <input type="text" class="form-control" id="setting-input-country" name="country" value="">
															</div-->
															<div class="mb-3">
															    <label for="setting-input-zip_code" class="form-label">Zip code</label>
															    <input type="text" class="form-control" id="setting-input-zip_code" name="zip_code" value="{{$personal->zip_code}}">
															</div>
														<div class="mb-3">
														    <label for="setting-input-3" class="form-label">Start you</label>
														    <input type="text" class="form-control" id="setting-input-3" name="start_job" value="{{$personal->start_job}}">
														</div>
														
													  <div class="mb-3">
														    <label for="setting-input-3" class="form-label">Reach you</label>
														    <select name="reach_you"  class="form-control"  id="reach_you" value=""> 
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
							                    <div class="col-12 col-md-4">
							            		 <h3 class="section-title">Employement History</h3>
							        		   </div>
							              	<div class="col-12 col-md-8">
							                   	<div class="app-card app-card-settings shadow-sm p-4 emp_details">
													           <div class="mb-2"><strong>Is your first job:  </strong>
																	    <input name="isFirstJobActive" type="checkbox" class="form-check-input" id="is_first_job_chkb" value="" <?php if($personal->is_first_job == 1 ){echo "checked";}?> >
													    			<hr>

													    			<div id="emp_history_all">
													    			<?php if($personal->is_first_job == 0 & !empty($editEmplyemntHitory)){?>		
													    			  @foreach($editEmplyemntHitory as $key => $emp_hist)
													    			  	<div class="editEmplyemntHitory-{{$key}}">
													    		  		   <div class="app-card-body" id="emp_recent_history">
																			     <div class="mb-3">
																				    <label for="setting-input-1" class="form-label">What is your most recent employement <span class="ms-2" ></span></label>
																				    <input type="text" class="form-control" id="setting-input-1" value="{{$emp_hist->recent_employement}}" name="emp_history[0][recent_employement]">
																				</div>
																				<div class="mb-3">
																				    <label for="setting-input-1" class="form-label">Industry *<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" ></span></label>
																				    <input type="text" class="form-control" id="setting-input-1" value="{{$emp_hist->industry}}" name="emp_history[0][industry]">
																				 </div>
																				<div class="mb-3">
																				    <label for="setting-input-2" class="form-label">Your Official Job title </label>
																				    <input type="text" class="form-control" id="setting-input-2" name="emp_history[0][job_title]" value="{{$emp_hist->job_title}}">
																				</div>
																				<div class="mb-3">
																					 <label for="setting-input-3" class="form-label">How long have you been working at this position ?</label><br>
																				    <label for="setting-input-3" class="form-label">Start Date</label>
																				    <input type="text" class="form-control" id="emp_satrt_date" name="emp_history[0][start_date]" value="{{$emp_hist->start_date}}" >
																				     <label for="setting-input-3" class="form-label">End Date</label>
																				    <input type="text" class="form-control" id="emp_end_date" name="emp_history[0][end_date]" value="{{$emp_hist->end_date}}">
																				</div>													
																           </div>
																          <input  type="button" name="removeEmployment" class="btn-danger removeEmployment action-button removeEmployment"  value="REMOVE " data-key="{{$key}}">
																     </div>
													    	         @endforeach
													    	         </div>
											    			          <?php } ?>
											    			          <?php //echo "<pre>"; print_r($editEmplyemntHitory); "</pre>";?>
											    			          <input  type="button" name="addEmployment" class="btn btn-primary addEmployment action-button addEmployment" value="ADD EMPLOYEMENT " data-key="" style="float: right;">
											    			          <br>
																     <label for="setting-input-skill" class="form-label">Top skills </label>
																		 <?php $skills = explode(",",$personal->top_skills); ?>
																				<div class="form-check">					
											                       <div>				
											                          <input class="form-check-input" type="checkbox" value="Communication" <?php if(in_array('Communication', $skills)){ echo "checked"; }?> id="Communication" name="top_skills[]" >
											                          <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked1lbl">
											                           Communication
											                          </label>
											                        </div>

											                         <div class="form-check">
											                          <input class="form-check-input" type="checkbox" value="Leadership" <?php if(in_array('Leadership', $skills)){ echo "checked"; }?> id="Leadership" name="top_skills[]">
											                          <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked2lbl">
											                           Leadership
											                          </label>
											                        </div>

											                         <div class="form-check">
											                          <input class="form-check-input" type="checkbox" value="Confidence" <?php if(in_array('Confidence', $skills)){ echo "checked"; }?> id="Confidence" name="top_skills[]">
											                          <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked3lbl">
											                           Confidence
											                          </label>
											                        </div>

											                         <div class="form-check">
											                          <input class="form-check-input" type="checkbox" value="Queick Learner" <?php if(in_array('Queick Learner', $skills)){ echo "checked"; }?> id="Queick Learner" name="top_skills[]">
											                          <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked4lbl">
											                           Queick Learner
											                          </label>
											                         </div>

											                         <div class="form-check">
											                          <input class="form-check-input" type="checkbox" value="Team Work" <?php if(in_array('Team Work', $skills)){ echo "checked"; }?> id="Team Work" name="top_skills[]">
											                          <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked5lbl">
											                          Team Work
											                          </label>
							                                 </div>
									          	        </div>
							                 	</div>
							             </div>
							              </div>
										             	<hr class="my-4">
										             	<div class="col-12 col-md-4">
										            		<h3 class="section-title">Educational Details</h3>
										        		  </div>
										           <div class="col-12 col-md-8">
										                  <div class="app-card app-card-settings shadow-sm p-4">
															             <div class="app-card-body">
																									    <?php //echo "<pre>"; print_r($education); "</pre>";?>
																									    <div class="mb-3">
																										    <label for="setting-input-1" class="form-label">School name<span class="ms-2"></span></label>
																										    <input type="text" class="form-control" id="setting-input-1" value="{{$education->school_name}}" name="school_name">
																										</div>
																										<div class="mb-3">
																										    <label for="setting-input-1" class="form-label">Degree<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
																										    <input type="text" class="form-control" id="setting-input-1" value="{{$education->degree}}" name= "degree">
																										</div>
																										<div class="mb-3">
																										    <label for="setting-input-2" class="form-label">Field of study</label>
																										    <input type="text" class="form-control" id="setting-input-2" name="field_of_study" value="{{$education->field_of_study}}">
																										</div>
																									 <div class="mb-3">
																									    <label for="setting-input-3" class="form-label">Education start year</label>
																									    <select id="edustartyr" name="edu_start_year" class="form-control" value="{{$education->edu_start_year}}">
													                                 <option>{{$education->edu_start_year}}</option>
													                                   <?php
													                                      for ($year = date('Y'); $year >= (date('Y') - 100); $year--) {
													                                      echo "<option value=$year>$year</option>";
													                                      }
													                                   ?>
																		                  </select>
																										</div>
																										<div class="mb-3">
																									    <label for="setting-input-3" class="form-label">Education start month</label>
																									      <select name="edu_start_month" class="form-control"  id="eduendmonth" value="{{$education->edu_start_month}}"> 
																									      	     <option value='01' <?php if($education->edu_start_month == "01"){?> selected<?php } ?>>Janaury</option>
																		                           <option value='02' <?php if($education->edu_start_month == "02"){?> selected<?php } ?>>February</option>
																		                           <option value='03' <?php if($education->edu_start_month == "03"){?> selected<?php } ?>>March</option>
																		                           <option value='04' <?php if($education->edu_start_month == "04"){?> selected<?php } ?>>April</option>
																		                           <option value='05' <?php if($education->edu_start_month == "05"){?> selected<?php } ?>>May</option>
																		                           <option value='06' <?php if($education->edu_start_month == "06"){?> selected<?php } ?>>June</option>
																		                           <option value='07' <?php if($education->edu_start_month == "07"){?> selected<?php } ?>>July</option>
																		                           <option value='08' <?php if($education->edu_start_month == "08"){?> selected<?php } ?>>August</option>
																		                           <option value='09' <?php if($education->edu_start_month == "09"){?> selected<?php } ?>>September</option>
																		                           <option value='10' <?php if($education->edu_start_month == "10"){?> selected<?php } ?>>October</option>
																		                           <option value='11' <?php if($education->edu_start_month == "11"){?> selected<?php } ?>>November</option>
																		                           <option value='12' <?php if($education->edu_start_month == "12"){?> selected<?php } ?>>December</option>
																		                     </select> 
																										</div>
																										<div class="mb-3">
																									    <label for="setting-input-3" class="form-label">Education end year</label>
																									    <select id="edustartyr" name="edu_end_year" class="form-control" value="{{$education->edu_end_year}}">
													                               <option>{{$education->edu_end_year}}</option>
													                                 <?php
													                                    for ($year = date('Y'); $year >= (date('Y') - 100); $year--) {
													                                    echo "<option value=$year>$year</option>";
													                                    }
													                                 ?>
																		                   </select>
																										</div>
																										<div class="mb-3">
																										    <label for="setting-input-3" class="form-label">Education end month</label>
																										    <select name="edu_end_month" class="form-control"  id="eduendmonth" value="{{$education->edu_end_month}}">
																						                 <option value='01' <?php if($education->edu_end_month == "01"){?> selected<?php } ?>>Janaury</option>
																						                 <option value='02' <?php if($education->edu_end_month == "02"){?> selected<?php } ?>>February</option>
																						                 <option value='03' <?php if($education->edu_end_month == "03"){?> selected<?php } ?>>March</option>
																						                 <option value='04' <?php if($education->edu_end_month == "04"){?> selected<?php } ?>>April</option>
																						                 <option value='05' <?php if($education->edu_end_month == "05"){?> selected<?php } ?>>May</option>
																						                 <option value='06' <?php if($education->edu_end_month == "06"){?> selected<?php } ?>>June</option>
																						                 <option value='07' <?php if($education->edu_end_month == "07"){?> selected<?php } ?>>July</option>
																						                 <option value='08' <?php if($education->edu_end_month == "08"){?> selected<?php } ?>>August</option>
																						                 <option value='09' <?php if($education->edu_end_month == "09"){?> selected<?php } ?>>September</option>
																						                 <option value='10' <?php if($education->edu_end_month == "10"){?> selected<?php } ?>>October</option>
																						                 <option value='11' <?php if($education->edu_end_month == "11"){?> selected<?php } ?>>November</option>
																						                 <option value='12' <?php if($education->edu_end_month == "12"){?> selected<?php } ?>>December</option>
																						            </select> 
																										   </div>
												                  </div><!--//app-card-body-->
									          	     </div><!--//app-card-->
							             	</div>
							                <hr class="my-4">
							    		      <div class="col-12 col-md-4">
								            		<h3 class="section-title">Job Preference</h3>
								        		</div>
													        <div class="col-12 col-md-8">
															        <div class="app-card app-card-settings shadow-sm p-4">
																			    <div class="app-card-body">
																					    	<?php //echo "<pre>"; print_r($editJobPreference); "</pre>";?>
																						    <div class="mb-3">
																						    	<label for="setting-input-apply_job_title" class="form-label">What is Job title are you looking for ?<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top"></span></label>
																							    <input type="text" class="form-control" id="setting-input-apply_job_title" name="apply_job_title" value="{{$editJobPreference->apply_job_title}}" >
																							  </div>
																								<div class="mb-3">
																								    <label for="setting-input-job_open" class="form-label">What types of Job are you open to ? </label>
																								    <input type="text" class="form-control" id="setting-input-job_open" name="job_open" value="{{$editJobPreference->job_open}}">
																								</div>
																						    <label for="setting-input-salary_from" class="form-label">What is your target salary range? </label>
																								<div class="mb-3">
																								    <label for="setting-input-salary_from" class="form-label">From</label>
																								    <input type="text" class="form-control" id="setting-input-salary_from" name="salary_from" value="{{$editJobPreference->salary_from}}">
																								</div>
																								<div class="mb-3">
																							    <label for="setting-input-salary_to" class="form-label">To</label>
																							    <input type="text" class="form-control" id="setting-input-salary_to" name="salary_to" value="{{$editJobPreference->salary_to}}">
																							   </div>
																								 <div class="mb-3">
																								    <label for="setting-input-prefer_work" class="form-label">Where would you prefer to work?</label>
																								    <input type="text" class="form-control" id="setting-input-prefer_work" name="prefer_work" value="{{$editJobPreference->prefer_work}}">
																								 </div>
																								 <div class="mb-3">
																								    <label for="setting-input-company" class="form-label">Company</label>
																								     <select name="company"  class="form-control"  id="company" value="{{$editJobPreference->company}}"> 
																	                         <option value="c1" <?php if($editJobPreference->company == "c1"){?> selected<?php } ?>>company1</option>
																	                         <option value="c2" <?php if($editJobPreference->company == "c2"){?> selected<?php } ?>>company2</option>
																	                         <option value="c3" <?php if($editJobPreference->company == "c3"){?> selected<?php } ?>>company3</option>
																	                   </select> 
																								 </div>
																								 <div class="mb-3">
																								    <label for="setting-input-company_size" class="form-label">Company size</label>
																								    <select name="company_size"  class="form-control"  id="company_size" value="{{$editJobPreference->company_size}}"> 
																                        <option value="10" <?php if($editJobPreference->company_size == 10){?> selected<?php } ?>>10</option>
																                        <option value="20" <?php if($editJobPreference->company_size == 20){?> selected<?php } ?>>20</option>
																                        <option value="30" <?php if($editJobPreference->company_size == 30){?> selected<?php } ?>>30</option>
																                        <option value="40" <?php if($editJobPreference->company_size == 40){?> selected<?php } ?>>40</option>
																                        <option value="50" <?php if($editJobPreference->company_size == 50){?> selected<?php } ?>>50</option>
																                        <option value="90" <?php if($editJobPreference->company_size == 90){?> selected<?php } ?>>90</option>
																                     </select>
																								 </div>
																								 <div class="mb-3">
																								    <label for="setting-input-important_roll" class="form-label">What are the top 3 things that are important to you for your next roll ?</label>
																								    <input type="text" class="form-control" id="setting-input-important_roll" name="important_roll" value="{{$editJobPreference->important_roll}}">
																								 </div>
																								<div class="mb-3">
																								    <label for="setting-input-tell_yourself" class="form-label">Tell us a littel about yourself</label>
																								    <input type="text" class="form-control" id="setting-input-tell_yourself" name="tell_yourself" value="{{$editJobPreference->tell_yourself}}">
																								</div>
																								<div class="mb-3">
																								    <label for="setting-input-status" class="form-label">Status</label>
																								    <select class="form-label form-control" name="status" id="setting-input-status">
																								    	 <option value="1" <?php if($getCandidate->status == 1){?> selected<?php } ?> >Active</option>
																						                 <option  value="0" <?php if($getCandidate->status == 0){?> selected<?php } ?>>InActive</option>
																								    </select>
																								</div>
																				        <button type="submit" class="btn app-btn-primary" >Save Changes</button>
																         </div><!--//app-card-body-->
																     </div><!--//app-card-->
											           </div>
							           </form>
	         </div><!--//container-fluid-->
	    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script type="text/javascript">
	
	$('#start_job').datepicker();
	$('#emp_satrt_date').datepicker();
		

$(document).on("click", ".removeEmployment", function(){
             
       var count = $('div#editEmplyemntHitory_data').length;// step 1
       //console.log('count of employement = '+count);
       var subtract_343; // step 2
       subtract_343 = parseInt(count) - parseInt(1); //step 3
      // console.log('substract  = '+subtract_343);
       if(subtract_343 == 0){
       	    //console.log('variable is 0 thne checkbox checked!');
       		$('#is_first_job_chkb').prop("checked",true); // step 4
       }

        var key = $(this).data('key');
        $(this).parents(".editEmplyemntHitory-"+key).remove();

       });

	$('.addEmployment').on('click', function(){
        //alert("");
       $("#is_first_job_chkb").prop("checked",false);
});

$('#is_first_job_chkb').on('change', function(){
    if ($(this).is(":checked")) {
    $("div#editEmplyemntHitory_data").hide();
  } else {
    $("div#editEmplyemntHitory_data").show();
  }
});
  
 $('.addEmployment').on('click', function(){
   //alert('Hello');
   var index = 1;
   var count=$('#editEmplyemntHitory_data').length;
   index = parseInt(count) + parseInt(1);
   var addemphis =  '<div class="editEmplyemntHitory-'+index+'" id="editEmplyemntHitory_data">'
                    +'<div class="app-card-body" id="emp_recent_history">'
									  +'<div class="mb-3">'
									  +'<hr>'
									       +'<label for="setting-input-1" class="form-label">What is your most recent employement <span class="ms-2" ></span></label>'
									       +'<input type="text" class="form-control" id="emp_recent_employement" name= "emp_history['+index+'][recent_employement]" required>'
									   +'</div>'
										+'<div class="mb-3">'
											+'<label for="setting-input-1" class="form-label">Industry *<span class="ms-2" data-container="body" data-bs-toggle="popover" data-trigger="hover" data-placement="top" data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>'
											+'<input type="text" class="form-control" id="emp_industry" name= "emp_history['+index+'][industry]" required>'
										+'</div>'
										+'<div class="mb-3">'
											+'<label for="setting-input-2" class="form-label">Your Official Job title </label>'
											+'<input type="text" class="form-control" id="emp_job_title" name="emp_history['+index+'][job_title]" required>'
										+'</div>'
										+'<div class="mb-3">'
											+'<label for="setting-input-3" class="form-label">How long have you been working at this position ?</label><br>'
											+'<label for="setting-input-3" class="form-label">Start Date</label>'
										   +' <input type="text" class="form-control " id="emp_satrt_date" name="emp_history['+index+'][start_date]" required>'
											+'<label for="setting-input-3" class="form-label">End Date</label>'
											+'<input type="text" class="form-control end_date" id="emp_end_date" name="emp_history['+index+'][end_date]" required>'
										+'</div>'
										+'<input  type="button" name="removeEmployment" class="btn-danger removeEmployment action-button removeEmployment"  value="REMOVE" data-key="'+index+'">'													
									+'</div>'
									+'</div>';
  //console.log(addemphis);
  
  if($('#editEmplyemntHitory_data').length>0){
  	$("#editEmplyemntHitory_data:last").after(addemphis);	
  } else {
  	$('.emp_details .mb-2 hr:last').after(addemphis);
  }
   
   });
$('#cnd_frm').validate({
            rules:{
                "firstname": {
                    required: true,
                       
                },
                "lastname": {
                    required: true,
                        
                },
                "address":{
                    required: true,
                     
                },

               "city":{
                    required: true,
                     
                },
                "state":{
                    required: true,
                     
                },
                "zip_code":{
                    required:true,
                    //numeric:true,
                    digits: true
                   
                },
                "mobile_no":{
                    required:true,
                    digits: true,
                    minlength:10
                },
                "email":{
                    required:true,
                    email:true
                },
                "reach_you":{
                    required:true,
                },
                "start_job":{
                    required:true, 
                   //date: true   
                },
                "job_title":{
                    required:true,
                },
                "job_open":{
                    required:true,
                },
                "selfintro":{
                    required:true,    
                },
                "prefer_work":{
                    required:true,
                },
                //"[skills][]":{ 
                   // required: true, 
                   // minlength: 2, 
                //}, 
                "apply_job_title":{
                     required:true,
                },
                "job_open":{
                     required:true,
                },
                "prefer_work":{
                     required:true,
                },
                "tell_yourself":{
                     required:true,
                },
                "emp_history[recent_employement]":{
                     required:true,
                },
                "emp_history[industry]":{
                     required:true,
                },
                "emp_history[start_date]":{
                     required:true,
                },
            }, 
            messages:{
                "firstname":"Please Enter Firstname.",
                "lastname": "Please Enter Lastname.",
                "mobile_no":"Please Enter 10 digit Mobile no.",
                "address": "Please Enter Address.",
                "city": "Please Enter City.",
                "state": "Please Enter Statename.",
                //email: "Please Enter Email ", 
                //zip_code: "Please   Enter   Zipcode",
                "selfintro": "Please Fill this field.",
                "job_title": "Job Title fill is required.",
                "job_open": "This field is required please fill this.",
                
            } 
        });
 </script>				
 @stop

