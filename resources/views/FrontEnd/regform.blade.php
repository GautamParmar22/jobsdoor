@extends('Frontend.layouts.default')
@section('content')
<div class="page-content bg-white">
        <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url('{{URL::asset('assets/images/banner/bnr2.jpg')}}');">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Candidate Registration</h1>
                      <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="/">Home</a></li>
                            <li>Candiadte</li>
                        </ul>
                     </div>
                </div>
            </div>
        </div>
    <div class="section-full content-inner shop-account">
        <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="font-weight-700 m-t0 m-b20">Candidate Registrastion Form</h3>
                        </div>
                    </div>
              <div class="row">
                 <div class="col-md-12 m-b30">
                       <div class="p-a30 border-1  max-w500 m-auto" style="max-width: 800px;">
                            <div class="tab-content">
                                 <form action="{{url('insert-candidate')}}" method="POST" enctype='multipart/form-data' class="tab-pane active" id="msform">
                                    @csrf
                                            <ul id="progressbar">
                                                <li class="active" id="personal" style="width: 25% !important;"><strong style="padding: 0 0 0 50px;">Personal Details</strong></li>
                                                <li id="emphistory" style="width: 25% !important;"><strong style="padding: 0 0 0 50px;">Employement History</strong></li>
                                                <li id="edudetails" style="width: 25% !important;"><strong style="padding: 0 0 0 50px;">Education Details</strong></li>
                                                <li id="jobpreference" style="width: 25% !important;"><strong style="padding: 0 0 0 50px;">Add Job Preference</strong></li>
                                            </ul> <!-- fieldsets -->

                                    <fieldset>
                                        <div class="form-card">
                                            <h4  id="pesonaldeta" class="font-weight-700">PESONAL DETAILS</h4>
                                            <div class="form-group">
                                                <label class="font-weight-700">Firstname <span class="cust_star">*</span></label>
                                                <input name="personal_details[firstname]"  class="form-control" placeholder="Enter Firstname" type="text" id="firstname">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">Lastname <span class="cust_star">*</span></label>
                                                <input name="personal_details[lastname]" class="form-control" placeholder="Enter Lastname" type="text" id="lastname">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">Phone <span class="cust_star">*</span></label>
                                                <input name="personal_details[mobile_no]" class="form-control" placeholder="Please Enter 10 digit Mobile no" type="text" id="mobile_no">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">Email <span class="cust_star">*</span></label>
                                                <input name="personal_details[email]" class="form-control" placeholder="Enter Email Id" type="text" id="email">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">Address <span class="cust_star">*</span></label>
                                                <input name="personal_details[address]"  class="form-control" placeholder="Enter Enter Fulladdress" type="text" id="address">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">City <span class="cust_star">*</span></label>
                                                <input name="personal_details[city]"  class="form-control" placeholder="Enter City" type="text" id="city">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">State <span class="cust_star">*</span></label>
                                                <input name="personal_details[state]"  class="form-control" placeholder="Enter State" type="text" id="state">
                                            </div>


                                            <div class="form-group">
                                                <label class="font-weight-700">Zipcode <span class="cust_star">*</span></label>
                                                <input name="personal_details[zip_code]"  class="form-control" placeholder="Enter Zipcode" type="text" id="zip_code">
                                            </div>

                                             <div class="form-group">
                                                <label class="font-weight-700">Start You <span class="cust_star">*</span></label>
                                                <input name="personal_details[start_job]"  class="form-control form-control-datepicker start_job"  data-date-format="dd-mm-yyyy"  placeholder="dd-mm-yyyy" type="text" id="start_job">
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-700">Reach You <span class="cust_star">*</span></label>
                                                <select name="personal_details[reach_you]"  class="form-control"  id="reach_you" required> 
                                                    <option value="Anytime">Anytime</option>
                                                    <option value="Morning">Morning</option>
                                                    <option value="AfterNoon">AfterNoon</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload Resume <span class="cust_star">*</span></label>
                                                <div class="resume-file">
                                                    <input type="file" class="site-button" id="resumUpload" name="choosefile">
                                                </div>
                                            </div>
                                       </div>
                                        <input type="button" name="next" class="site-button button-lg outline outline-2 next action-button" value="Next" id="nxtbtn" />
                                    </fieldset>
                                    <fieldset>
                                            <h4 class="font-weight-700">ADD EMPLOYEMENT HISTORY</h4>
                                            <div class="form-check" class="checkboxEmpHist">
                                                   <input name="personal_details[is_first_job]" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                                                   <label  class="form-check-label" for="exampleCheck1" id="chklbl">This will be my first job <span class="cust_star">*</span></label>      
                                                    <div class="isFirstJobActive">   
                                                       <div class="form-group">
                                                        <label class="font-weight-700">What is your most recent employement </label>
                                                        <input name="emp_history[History][0][recent_employement]" class="form-control" placeholder="Enter your most recent employement " type="text" id="recentemp">
                                                       </div>

                                                        <div class="form-group">
                                                           <label>Industry </label>
                                                           <select class="form-control" name="emp_history[History][0][industry]">
                                                             <option>Web Devlopment</option>
                                                             <option>SEO</option>
                                                             <option>AI & ML</option>
                                                             <option>Data Science</option>
                                                             <option>Image Processing</option>
                                                           </select>
                                                         </div>

                                                         <div class="form-group">
                                                            <label class="font-weight-700">Your Official Job title </label>
                                                            <input name="emp_history[History][0][official_title]" class="form-control" placeholder="Enter Job title" type="text" id="" >
                                                         </div>
         
                                                        <div class="form-group">
                                                            <label class="font-weight-700">How long have you been working at this position ? </label><br>
                                                            <input name="emp_history[History][0][start_date]"  class="form-control form-control-datepicker startdate"  data-date-format="dd-mm-yyyy"  placeholder="Start Date" type="text" id="startdate">
                                                           <input  name="emp_history[History][0][end_date]"  class="form-control form-control-datepicker enddate"  data-date-format="dd-mm-yyyy"  placeholder="End date" type="text" id="enddate">
                                                        </div>
                                                    </div>
                                                    <input type="button" name="addemployment" class="site-button button-lg outline outline-2 addemployment action-button-addemployment" id="addEmployment" value="+ Add Additional Employement (optional)"/>
                                            </div>
                                            <div class="form-check">
                                                    <label class="font-weight-700">What is your top three skills ? <span class="cust_star">*</span></label>
                                                    <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Communication" id="flexCheckChecked1" name="emp_history[skills][]">
                                                      <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked1lbl">
                                                       Communication
                                                      </label>
                                                     </div>
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Leadership" id="flexCheckChecked2" name="emp_history[skills][]">
                                                      <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked2lbl">
                                                       Leadership
                                                      </label>
                                                     </div>
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Confidence" id="flexCheckChecked3" name="emp_history[skills][]">
                                                      <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked3lbl">
                                                       Confidence
                                                      </label>
                                                     </div>
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Queick Learner" id="flexCheckChecked4" name="emp_history[skills][]">
                                                      <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked4lbl">
                                                       Queick Learner
                                                      </label>
                                                      </div>
                                                     <div class="form-check">
                                                      <input class="form-check-input" type="checkbox" value="Team Work" id="flexCheckChecked5" name="emp_history[skills][]">
                                                      <label class="form-check-label" for="flexCheckChecked" id="flexCheckChecked5lbl">
                                                      Team Work
                                                      </label>
                                                     </div>
                                             </div>
                                                <input  type="button" name="previous" class="site-button button-lg outline outline-2 previous action-button-previous" value="Previous" />
                                                <input  type="button" name="next" class="next site-button button-lg outline outline-2 next action-button" value="Next" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                            <h4  id="pesonaldeta" class="font-weight-700">EDUCATION DETAILS</h4>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Name of school </label>
                                                    <input name="education_details[school_name]"  class="form-control" placeholder="Enter School name" type="text" id="schoolname" >
                                                     <!--label id="companyname-error" class="error" for="companyname" >Please Enter Companyname *</label-->
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Degree/ Certificate </label>
                                                    <input name="education_details[degree]" class="form-control" placeholder="Enter Degree Or Certificate" type="text" id="degree">
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Field of study </label>
                                                    <input name="education_details[field_of_study]" class="form-control" placeholder="Enter your Field of study" type="text" id="field">
                                                </div>
                                               <div class="form-group">
                                                     <label class="font-weight-700">Education start and end date </label><br>
                                                     <label style="font-weight: 300;">Start Year</label>  
                                                         <select id="edustartyr" name="education_details[edu_start_year]" class="form-control">
                                                           <option>{{date('Y')}}</option>
                                                             <?php
                                                                for ($year = date('Y'); $year >= (date('Y') - 100); $year--) {
                                                                echo "<option value=$year>$year</option>";
                                                                }
                                                             ?>
                                                        </select>
                                                      <label style="font-weight: 300;">Start Month</label>  
                                                         <select name="education_details[edu_start_month]"  class="form-control"  id="edustartmonth"> 
                                                             <option value=''>{{date('M')}}</option>
                                                             <option value='01'>Janaury</option>
                                                             <option value='02'>February</option>       
                                                             <option value='03'>March</option>
                                                             <option value='04'>April</option>
                                                             <option value='05'>May</option>
                                                             <option value='06'>June</option>
                                                             <option value='07'>July</option>
                                                             <option value='08'>August</option>
                                                             <option value='09'>September</option>
                                                             <option value='10'>October</option>
                                                             <option value='11'>November</option>
                                                             <option value='12'>December</option>
                                                        </select>
                                                      <label style="font-weight: 300;">End Year</label>  
                                                        <select name="education_details[edu_end_year]" class="form-control" id="eduendyr">
                                                         <option >{{date('Y')}}</option>
                                                          <?php
                                                              for ($year = date('Y'); $year >= (date('Y') - 100); $year--) {
                                                              echo "<option value=$year>$year</option>";
                                                              }
                                                            ?>
                                                        </select>
                                                         <label style="font-weight: 300;">End Month</label>  
                                                           <select name="education_details[edu_end_month]" class="form-control"  id="eduendmonth">
                                                                 <option value=''>{{date('M')}}</option>
                                                                 <option value='01'>Janaury</option>
                                                                 <option value='02'>February</option>
                                                                 <option value='03'>March</option>
                                                                 <option value='04'>April</option>
                                                                 <option value='05'>May</option>
                                                                 <option value='06'>June</option>
                                                                 <option value='07'>July</option>
                                                                 <option value='08'>August</option>
                                                                 <option value='09'>September</option>
                                                                 <option value='10'>October</option>
                                                                 <option value='11'>November</option>
                                                                 <option value='12'>December</option>
                                                            </select>
                                              </div> 
                                        </div>
                                           <input  type="button" name="previous" class="site-button button-lg outline outline-2 previous action-button-previous" value="Previous" />
                                           <input type="button" name="next" class="site-button button-lg outline outline-2 next action-button" value="Next" id="nxtbtn2" />
                                      </fieldset>
                                      <fieldset>
                                         <div class="form-card">
                                              <h4  id="pesonaldata" class="font-weight-700">ADD JOB PREFERENCES</h4>
                                                   <div class="form-group">
                                                      <label class="font-weight-700">Tell us what your're looking for in a job and, we'll use this information to recommend the best jobs to you. </label>
                                                   </div>
                                                   <div class="form-group">
                                                      <label class="font-weight-700">What is Job title are you looking for ? <span class="cust_star">*</span></label>
                                                      <input name="job_preference[apply_job_title]" class="form-control" placeholder="Enter Job title are you looking for" type="text" id="jobtitle">
                                                   </div>
                                                    <div class="form-group">
                                                      <label class="font-weight-700">What types of Job are you open to ? <span class="cust_star">*</span></label>
                                                      <input name="job_preference[job_open]" class="form-control" placeholder="Enter types of Job are you open " type="text" id="job_open">
                                                    </div>
                                                    <label style="font-weight: 300;">Start Year</label>  
                                                        <select id="jobstartyr" name="job_preference[start_yr]" class="form-control">
                                                           <option>{{date('Y')}}</option>
                                                             <?php
                                                                for ($year = date('Y'); $year >= (date('Y') - 100); $year--) {
                                                                echo "<option value=$year>$year</option>";
                                                                }
                                                             ?>
                                                        </select>
                                                   <label style="font-weight: 300;">Start Month</label>  
                                                       <select name="job_preference[start_mon]"  class="form-control"  id="jobstartmonth"> 
                                                             <option value=''>{{date('M')}}</option>
                                                             <option value='01'>Janaury</option>
                                                             <option value='02'>February</option>       
                                                             <option value='03'>March</option>
                                                             <option value='04'>April</option>
                                                             <option value='05'>May</option>
                                                             <option value='06'>June</option>
                                                             <option value='07'>July</option>
                                                             <option value='08'>August</option>
                                                             <option value='09'>September</option>
                                                             <option value='10'>October</option>
                                                             <option value='11'>November</option>
                                                             <option value='12'>December</option>
                                                        </select>
                                                       <div class="form-group">
                                                            <label class="font-weight-700">What is your target salary range? <span class="cust_star">*</span></label>
                                                             <input name="job_preference[salary_from]" class="form-control" placeholder="From" type="text" id="from_salary"><br>
                                                            <input name="job_preference[salary_to]" class="form-control" placeholder="To (optional)" type="text" id="salary_to"><br>
                                                            <input name="job_preference[prefer_work]" class="form-control" placeholder="Where would you prefer to work?" type="text" id="prefer_work"><br>
                                                       </div>
                                                       <div class="form-check">
                                                         <input  type="checkbox" class="form-check-input" id="relocationchckb">
                                                         <label  class="form-check-label" for="relocationchckb" id="relocationchckblbl">I'm open to relocation(Add location you would consider about)</label>
                                                       </div>
                                                       <div class="form-check">
                                                           <input  type="checkbox" class="form-check-input" id="remotworkchckb">
                                                           <label  class="form-check-label" for="remotworkchckb" id="remotworkchckblbl">I want to work remotely</label>
                                                       </div> 
                                                       <div class="form-group">
                                                                 <label class="font-weight-700">What Industry and company do you prefer? <span class="cust_star">*</span></label><br>
                                                                 <label style="font-weight: 300;">Company</label>  
                                                                   <select name="job_preference[company]"  class="form-control"  id="company"> 
                                                                         <option value="c1">company1</option>
                                                                         <option value="c2">company2</option>
                                                                         <option value="c3">company3</option>
                                                                   </select>
                                                                 <label style="font-weight: 300;">Company size</label>  
                                                                    <select name="job_preference[company_size]"  class="form-control"  id="company_size"> 
                                                                        <option value="10e">10</option>
                                                                        <option value="20">20</option>
                                                                        <option value="30">30</option>
                                                                        <option value="40">40</option>
                                                                        <option value="50">50</option>
                                                                    </select>                                    
                                                          </div>
                                                          <div class="form-check">
                                                                <label class="font-weight-700">What are the top 3 things that are important to you for your next roll ? <span class="cust_star"> *</span>
                                                                </label>
                                                                   <div class="form-check">
                                                                      <input class="form-check-input" type="checkbox" value="Career advancement" id="jobrolechk1" name="job_preference[important_roll][]" >
                                                                        <label class="form-check-label" for="flexCheckChecked" id="jobrolelbl1">
                                                                          Career advancement
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Compasation & benefite" id="jobrolechk2" name="job_preference[important_roll][]">
                                                                         <label class="form-check-label" for="flexCheckChecked" id="jobrolelbl2">
                                                                           Compasation & benefite
                                                                         </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="Work place" id="jobrolechk3" name="job_preference[important_roll][]">
                                                                           <label class="form-check-label" for="flexCheckChecked" id="jobrolelbl3">
                                                                           Work place
                                                                           </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                          <input class="form-check-input" type="checkbox" value="Strong company leadership" id="jobrolechk4" name="job_preference[important_roll][]">
                                                                             <label class="form-check-label" for="flexCheckChecked" id="jobrolelbl4">
                                                                               Strong company leadership
                                                                            </label>
                                                                     </div>
                                                                     <div class="form-check">
                                                                         <input class="form-check-input" type="checkbox" value="Company culture & mission & values" id="jobrolechk5" name="job_preference[important_roll][]">
                                                                            <label class="form-check-label" for="flexCheckChecked" id="jobrolelbl5">
                                                                              Company culture & mission & values
                                                                            </label>
                                                                     </div>  
                                                        </div>
                                                        <div class="form-group">
                                                               <label  class="form-check-label" for="remotworkchckb" id="selfintrolbl">Tell us a littel about yourself <span class="cust_star"> *</span></label><br>    
                                                               <textarea type="textarea" class="form-control"  id="selfintrotxtarea" name="job_preference[tell_yourself]">   </textarea> 
                                                        </div>
                                        </div>
                                          <input  type="button" name="previous" class="site-button button-lg outline outline-2 previous action-button-previous" value="Previous" />
                                          <input type="submit" name="submit" class="site-button button-lg outline outline-2 candidateSubmit action-button" value="Submit" id="candidateSubmit" />
                                </fieldset>
                            </form>
                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Employer Registration form END -->
<script src="{{URL::asset('assets/js/bootstrap-datepicker.js')}}"></script><!-- DATEPICKER JS  -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" ></script> --><!--Online jquery CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script text="text/javascript">
    var APP_URL = '{{ env('APP_URL') }}';
    $('.start_job').datepicker();
    $('.startdate').datepicker();
    $('.enddate').datepicker();
//$('.Addmore').hide();
/*$(document).ready(function(){
  $("#candidateSubmit").click(function(event){
    event.preventDefault();
    $('.toast').show();
  });
});*/
$(document).ready(function() {
//toastr.success('abc');
            toastr.options.timeOut = 5000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
$('#exampleCheck1').on('change', function(){
   this.value = this.checked ? 1 : 0;
});
$('#exampleCheck1').on('change', function(){
   //alert();
   if ($(this).is(":checked")) {
    $(".addemployment").hide();
  } else {
    $(".addemployment").show();
  }
});    
$(document).ready(function(){
     var index = 1;
    $("#addEmployment").click(function(){
      //alert();
     //var html = $(".Addmore").html();
     var htmlcode = '<div class="Addmore" id="RemoveEmployment">'
                        +'<div class="form-group">'
                        +'<hr>'
                        +'<hr>'
                            +'<label class="font-weight-700">What is your most recent employement *</label>'
                            +'<input name="emp_history[History]['+index+'][recent_employement]" class="form-control" placeholder="Enter your most recent employement " type="text" id="recentemp">'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<label>Industry *</label>'
                            +'<select class="form-control" name="emp_history[History]['+index+'][industry]">'
                                +'<option>Web Devlopment</option>'
                                +'<option>SEO</option>'
                                +'<option>AI & ML</option>'
                                +'<option>Data Science</option>'
                                +'<option>Image Processing</option>'
                            +'</select>'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<label class="font-weight-700">Your Official Job title *</label>'
                            +'<input name="emp_history[History]['+index+'][official_title]" class="form-control" placeholder="Enter Job title" type="text" id="" >'
                        +'</div>'
                        +'<div class="form-group">'
                            +'<label class="font-weight-700">How long have you been working at this position ? *</label>'
                            +'<input name="emp_history[History]['+index+'][start_date]"  class="form-control form-control-datepicker startdate"  data-date-format="dd-mm-yyyy"  placeholder="Start Date" type="text" id="startdate">'
                            +'<input  name="emp_history[History]['+index+'][end_date]"  class="form-control form-control-datepicker enddate"  data-date-format="dd-mm-yyyy"  placeholder="End date" type="text" id="enddate">'
                        +'</div>'
                        +'<input type="button" name="removeEmployment" class="btn-danger removeEmployment action-button removeEmployment" value="REMOVE EMPLOYEMENT">'
                        +'</div>';    
        //console.log(htmlcode);
        //$(addto + ':last').after(newInput);
        $(".isFirstJobActive:last").after(htmlcode);
        index = index + 1;        
        $('.start_job').datepicker();
        $('.startdate').datepicker();
        $('.enddate').datepicker();
    });
    /*$(".removeEmployment").click(function(){*/
    $(document).on("click", ".removeEmployment", function(){
        //alert("remove employment");
        $(this).parents(".Addmore").remove();
       });
    });
/*
$("#exampleCheck1").on('checked',function(){
    alert();
});
*/
$(".isFirstJobActive").show();
$("#exampleCheck1").click(function() {
  if ($(this).is(":checked")) {
    $(".isFirstJobActive").hide();
  } else {
    $(".isFirstJobActive").show();
  }
});
$.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param * 1000000)
}, 'File size must be less than {0} MB');
    $(document).ready(function(){
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        
        $('#msform').validate({
            rules:{
                "personal_details[firstname]": {
                    required: true,
                       
                },
                "personal_details[lastname]": {
                    required: true,
                        
                },
                "personal_details[address]":{
                    required: true,
                     
                },

               "personal_details[city]":{
                    required: true,
                     
                },
                "personal_details[state]":{
                    required: true,
                     
                },
                "personal_details[zip_code]":{
                    required:true,
                    //numeric:true,
                    digits: true
                   
                },
                "personal_details[mobile_no]":{
                    required:true,
                    digits: true,
                    minlength:10
                },
                "personal_details[email]":{
                    required:true,
                    email:true,
                    remote: {
                            type: 'GET',
                            url: APP_URL + 'checkcndemail',
                            data: {
                                email: function() {
                                    return $("#email").val();
                                  }
                        },
                   },
                 },
                "personal_details[reach_you]":{
                    required:true,
                },
                "choosefile":{
                     required:true,
                     extension: "pdf|doc|word",
                     filesize : 5, // here we are working with MB
                     
                },
                "personal_details[start_job]":{
                    required:true, 
                   //date: true   
                },
                "personal_details[job_title]":{
                    required:true,
                },
                "personal_details[job_open]":{
                    required:true,
                },
                "personal_details[selfintro]":{
                    required:true,    
                },
                "personal_details[prefer_work]":{
                    required:true,
                },
                "emp_history[skills][]":{ 
                    required: true, 
                    minlength: 2, 
                }, 
                "job_preference[apply_job_title]":{
                     required:true,
                },
                "job_preference[job_open]":{
                     required:true,
                },
                "job_preference[prefer_work]":{
                     required:true,
                },
                "job_preference[tell_yourself]":{
                     required:true,
                },
            }, 
            messages:{
                "personal_details[firstname]":"Please Enter Firstname.",
                "personal_details[lastname]": "Please Enter Lastname.",
                "personal_details[mobile_no]":"Please Enter 10 digit Mobile no.",
                "personal_details[address]": "Please Enter Address.",
                "personal_details[city]": "Please Enter City.",
                "personal_details[state]": "Please Enter Statename.",
                "choosefile": {
                    required:"Please Uplaod a File",
                    extension:"Please Uplaod PDF/DOc/WORD File"
                },
                "personal_details[email]":{
                        remote: 'This email id is already exist please try another email id.'
                },
                
                //email: "Please Enter Email ", 
                //zip_code: "Please   Enter   Zipcode",
                "personal_details[selfintro]": "Please Fill this field.",
                "personal_details[job_title]": "Job Title fill is required.",
                "personal_details[job_open]": "This field is required please fill this.",
                "emp_history[skills][]": "Please select at least two types of skills."
            } 
        });

  $(".next").click(function (){
            if( $("#msform").valid() ){            
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();                
                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");               
                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0},
                {
                    step: function(now)
                    {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                      },               
                });
            }
        });
  
        $(".previous").click(function(){
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({opacity: 0},
            {
                step: function(now)
                {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        });

        $(".employerSubmit").on("click", function(e){
            //e.preventDefault();
            if( $("#msform").valid() ) {
                //alert();
                $("#msform").submit();
            }
        })
         
    });
</script>
@stop

