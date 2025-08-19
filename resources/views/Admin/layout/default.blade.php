<!DOCTYPE html>
<html>

<head>
	<title>JobsDoor</title>
	@include('Admin.includes.head')
</head>

<body>
	<header class="site-header mo-left header fullwidth">
		<div class="app-header-inner">
			@include('Admin.includes.header')
			<sidebar>
				@include('Admin.includes.sidebar')
			</sidebar>
		</div>
	</header>
	<content>
		@yield('content')
	</content>
	<footer>
		@include('Admin.includes.footer')
	</footer>
	@yield('pages.separate_script')
</body>

</html>