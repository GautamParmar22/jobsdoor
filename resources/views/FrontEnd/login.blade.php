@extends('Frontend.layouts.default')
@section('content')



 
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url('{{URL::asset('assets/images/banner/bnr2.jpg')}}');">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">Login</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->

	 <!-- Login Page -->
	<div class="section-full content-inner-2 shop-account">
	  	<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h3 class="font-weight-700 m-t0 m-b20">Login Your Account</h3>
				</div>
			</div>
			<div>
				<div class="max-w500 m-auto m-b30">
					<div class="p-a30 border-1 seth">
						<div class="tab-content nav">
							<form id="login" class="tab-pane active col-12 p-a0 ">
								@csrf  
								<h4 style="text-align: center" class="font-weight-700">LOGIN</h4>
								<p class="font-weight-600">If you have an account with us, please log in.</p>
								<div class="form-group">
									<label class="font-weight-700">E-mail *</label>
									<input name="dzName" required="" class="form-control" placeholder="Your Email Id" type="email">
								</div>
								<div class="form-group">
									<label class="font-weight-700">Password *</label>
									<input name="dzName" required="" class="form-control " placeholder="Type Password" type="password">
								</div>
								<div class="text-left">
									<button class="site-button m-r5 button-lg">login</button>
									<a data-toggle="tab" href="#forgot-password" class="m-l5"><i class="fa fa-unlock-alt"></i> Forgot Password</a> 
								</div>
							</form>
							<form id="forgot-password" class="tab-pane fade  col-12 p-a0">
								<h4 class="font-weight-700">FORGET PASSWORD ?</h4>
								<p class="font-weight-600">We will send you an email to reset your password. </p>
								<div class="form-group">
									<label class="font-weight-700">E-MAIL *</label>
									<input name="dzName" required="" class="form-control" placeholder="Your Email Id" type="email">
								</div>
								<div class="text-left"> 
									<a class="site-button outline gray button-lg" data-toggle="tab" href="#login">Back</a>
									<button class="site-button pull-right button-lg">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Login Page END -->
@stop