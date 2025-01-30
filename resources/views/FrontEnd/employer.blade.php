@extends('Frontend.layouts.default')
@section('content')
<!-- Employer Registration form START -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle bg-pt" style="background-image:url('{{URL::asset('assets/images/banner/bnr2.jpg')}}');">
        <div class="container">
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
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Employer Registration</h1>
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="section-full content-inner shop-account">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3 class="font-weight-700 m-t0 m-b20">Employer Registrastion</h3>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12 m-b30">
                    <div class="p-a30 border-1  max-w500 m-auto">
                        <div class="tab-content">
                            <form action="{{url('insert')}}" method="POST" enctype='multipart/form-data' class="tab-pane active" id="msform">
                                @csrf
                                    <ul id="progressbar">
                                        <li class="active" id="company"><strong style="padding: 0 0 0 85px;">Company</strong></li>
                                        <li id="personal"><strong style="padding: 0 0 0 85px;">Employer</strong></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card">
                                            <h4 class="font-weight-700">COMPANY INFORMATION</h4>
                                            <div class="form-group">
                                                <label class="font-weight-700">Company Name <span class="cust_star"> *</span></label>
                                                <input name="company_name"  class="form-control" placeholder="Enter Company Name" type="text" id="company_name" >
                                                 <!--label id="companyname-error" class="error" for="companyname" >Please Enter Companyname *</label-->
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">Industry <span class="cust_star"> *</span></label>
                                                <input name="industry" class="form-control" placeholder="Enter Industry" type="text" id="industry">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">Company Address <span class="cust_star"> *</span></label>
                                                <input name="company_address" class="form-control" placeholder="Enter Company Address" type="text" id="company_address">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">City <span class="cust_star"> *</span></label>
                                                <input name="city" class="form-control" placeholder="Enter City" type="text" id="city">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">State <span class="cust_star"> *</span></label>
                                                <input name="state"  class="form-control" placeholder="Enter State" type="text" id="state">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">Country <span class="cust_star"> *</span></label>
                                                <input name="country"  class="form-control" placeholder="Enter Country" type="text" id="country">
                                            </div>


                                            <div class="form-group">
                                                <label class="font-weight-700">Zipcode <span class="cust_star"> *</span></label>
                                                <input name="zip_code"  class="form-control" placeholder="Enter Zipcode" type="text" id="zip_code">
                                            </div>

                                            <div class="form-group">
                                                <label class="font-weight-700">Website <span class="cust_star"> *</span></label>
                                                <input name="website"  class="form-control" placeholder="Enter Website" type="url" id="website">
                                            </div>
                              
                                            <!-- <div style="text-align: right;">
                                               <button  class="site-button  button-lg outline outline-2" id="next1">Next</button>
                                            </div> -->
                                        </div>
                                        <input type="button" name="next" class="site-button button-lg outline outline-2 next action-button" value="Next" id="nxtbtn" />
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card">
                                                <h4 class="font-weight-700">EMPLOYER INFORMATION</h4>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Official Title <span class="cust_star"> *</span></label>
                                                    <input name="official_title"  class="form-control" placeholder="Enter Official Title" type="text" id="official_title" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Firstname <span class="cust_star"> *</span></label>
                                                    <input name="firstname" class="form-control" placeholder="Enter Firstname" type="text" id="firstname" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Lastname <span class="cust_star"> *</span></label>
                                                    <input name="lastname" class="form-control" placeholder="Enter Lastname" type="text" id="lastname" required>
                                                </div>
                                               <div class="form-group">
                                                    <label class="font-weight-700">Phone <span class="cust_star"> *</span></label>
                                                    <input name="mobile_no"  class="form-control" placeholder="Enter Mobile No" type="text" id="mobile_no" required>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="font-weight-700">E-mail <span class="cust_star"> *</span></label>
                                                    <input name="email" class="form-control" placeholder="Enter Email Id" type="email" id="email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-weight-700">Reach You <span class="cust_star"> *</span></label>
                                                    <select name="reach_you"  class="form-control"  id="reach_you" required> 
                                                        <option value="Anytime">Anytime</option>
                                                        <option value="Morning">Morning</option>
                                                        <option value="AfterNoon">AfterNoon</option>
                                                    </select>
                                                </div>
                                        </div>
                                            <input  type="button" name="previous" class="site-button button-lg outline outline-2 previous action-button-previous" value="Previous" />
                                            <input  type="submit" name="submit" class="next site-button button-lg outline outline-2 employerSubmit action-button" value="Submit" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script text="text/javascript">
    var APP_URL = '{{ env('APP_URL') }}';
      $(document).ready(function(){
        //toastr.success('XYZ');
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $('#msform').validate({
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
                    digits: true,                   
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
                website: "Please Enter Website URL eg. http://www.google.com",
                official_title: "Palease Enter Officialtitle",
                firstname: "Palease Enter Firstname",
                lastname: "Palease Enter Lastname",
                mobile_no: "Please Enter 10 digit Mobile no",
                email: {
                        remote: 'This email id is already exist please try another email id.'
                    },                
            } 
        }); 

        $(".next").click(function (){
            if( $("#msform").valid() ) {            
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
            if( $("#msform").valid() ){
                //alert();
                $("#msform").submit();
            }
        })
    });
</script>
@stop