<!DOCTYPE html>
<html lang="en">

<head>
	<title>JobsDoor</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
	<meta name="author" content="Xiaoying Riley at 3rd Wave Media">
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FontAwesome JS-->
	<script defer src="{{URL::asset('assets/admin/plugins/fontawesome/js/all.min.js')}}"></script>

	<!-- App CSS -->
	<link id="theme-style" rel="stylesheet" href="{{URL::asset('assets/admin/css/portal.css')}}">
	<style type="text/css">
		.error {
			color: #F00;
			background-color: #FFF;
		}
	</style>
</head>

<body class="app app-login p-0">
	<div class="row g-0 app-auth-wrapper">
		<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
			<div class="d-flex flex-column align-content-end">
				<div class="app-auth-body mx-auto">
					<div class="app-auth-branding mb-4"><a class="app-logo" href="{{url('index-page')}}"><img
								class="logo-icon me-2" style="height: auto; width: auto;"
								src="{{URL::asset('assets/admin/images/JobsDoor_Logo.svg')}}" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-5">Log in to JobsDoor</h2>
					<div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{url('admin-login')}}" id="loginfrm">
							@csrf
							<div class="email mb-3">
								<label class="sr-only" for="email">Email</label>
								<input id="email" name="email" type="email" class="form-control email"
									placeholder="Email address">
							</div><!--//form-group-->
							<div class="password mb-3">
								<label class="sr-only" for="password">Password</label>
								<input id="password" name="password" type="password" class="form-control password"
									placeholder="Password">
								<div class="extra mt-3 row justify-content-between">
									<div class="col-6"></div><!--//col-6-->
									<div class="col-6">

									</div><!--//col-6-->
								</div><!--//extra-->
							</div><!--//form-group-->
							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log
									In</button>
							</div>
						</form>
					</div><!--//auth-form-container-->

				</div><!--//auth-body-->

				<footer class="app-auth-footer">
					<div class="container text-center py-3">
						<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
						<small class="copyright"> <i class="fas fa-copyright" style="color: #000000;"></i> {{date('Y')}}
							JobsDoor All Rights Reserved. </small>

					</div>
				</footer><!--//app-auth-footer-->
			</div><!--//flex-column-->
		</div><!--//auth-main-col-->
		<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
			<div class="auth-background-holder">
			</div>
			<div class="auth-background-mask"></div>
			<div class="auth-background-overlay p-3 p-lg-5">
				<div class="d-flex flex-column align-content-end h-100">
					<div class="h-100"></div>
					<div class="overlay-content p-3 p-lg-4 rounded">
						<h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
						<div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the
							template license <a
								href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.
						</div>
					</div>
				</div>
			</div><!--//auth-background-overlay-->
		</div><!--//auth-background-col-->

	</div><!--//row-->
</body>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>

<script type="text/javascript">

	$('#loginfrm').validate({
		rules: {
			email: {
				required: true,
				email: true,
			},
			password: {
				required: true,

			},
		},
		messages: {

		}

	});

</script>

</html>