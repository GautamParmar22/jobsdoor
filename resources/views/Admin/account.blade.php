@extends('Admin.layout.default')
@section('content')
    
<style type="text/css">
	.error {
  color: #F00;
  background-color: #FFF;
}
</style>
   <div class="app-wrapper">
	  <div class="container-xl">   
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
			        <h1 class="app-page-title">Manage Account</h1>
			         <hr class="mb-4">
                      <div class="row g-4 settings-section">
	                                 <div class="col-12 col-md-4">
		                             <h3 class="section-title">Manage Profile</h3>
	                                </div>
	                           <div class="col-12 col-md-8"  >
		                           <div class="app-card app-card-settings shadow-sm p-4">
						               <div class="app-card-body">
							              <form class="managracc-form" method="POST" action="{{url('update-profile-action')}}" id="mngacfrm">
							    	        @csrf
								              <div class="mb-3">
									           <label for="setting-input-2" class="form-label">Name</label>
									           <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
									          </div>
								              <div class="mb-3">
									           <label for="setting-input-3" class="form-label" >Email Address</label>
									           <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" readonly>
									         </div>
									          <button type="submit" class="btn app-btn-primary" >Save Changes</button>
							              </form>
						               </div><!--//app-card-body-->
						          </div><!--//app-card-->
	                         </div>
                  </div><!--//row-->
                     <hr class="my-4">
                      <div class="row g-4 settings-section">
	                      <div class="row g-4 settings-section">
	                           <div class="col-12 col-md-4">
		                        <h3 class="section-title">Change Password</h3>
	                           </div>
	                           <div class="col-12 col-md-8"  >
		                           <div class="app-card app-card-settings shadow-sm p-4">
						             <div class="app-card-body">
							             <form class="chngpass-form" method="POST" action="{{url('change-password-action')}}" id="chngpassfrm">
							    	         @csrf
								            <div class="mb-3">
									            <label for="setting-input-2" class="form-label">Password</label>
									            <input type="password" class="form-control" name="password" id="password">
									        </div>
								            <div class="mb-3">
									            <label for="setting-input-3" class="form-label">Confirm Password</label>
									            <input type="password" class="form-control" name="password_confirmation">
									        </div>
									        <button type="submit" class="btn app-btn-primary" >Changes Password</button>
							              </form>
						              </div><!--//app-card-body-->
						          </div><!--//app-card-->
	                         </div>
                          </div> 
                      </div><!--// row-->
                     <hr class="my-4">
         </div><!--//container-fluid-->
	 </div><!--//app-content-->
</div><!--//app-wrapper-->  

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>


<script type="text/javascript">
	
		$('#mngacfrm').validate({
		rules:{
			 
			 name:{
                    required:true,
                    
                },
			 email:{
                    required:true,
                    email:true,
                },
		},
		messages:{

		}
		
	});

		$('#chngpassfrm').validate({
		rules:{
			   password:{
                    required: true,
                    minlength: 8,
                    
                },
                 password_confirmation:{
                	required:true,
                    equalTo: "#password",
                }

		},
		messages:{
				  password_confirmation: "Password Confirmation should match the Password",
		}
		
	});

</script>
@stop