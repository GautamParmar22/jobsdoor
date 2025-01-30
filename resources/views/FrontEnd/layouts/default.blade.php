<!DOCTYPE html>
<html>
<head>
	<title>JobsDoor</title>
	  @include('FrontEnd.includes.head')
</head>
<body>
	<header class="site-header mo-left header fullwidth" style="height: 165px;">
		@include('FrontEnd.includes.header')
	</header>
	<sidebar>
		@include('FrontEnd.includes.sidebar')
	</sidebar>
	<content>
		@yield('content')
	</content>
	<footer>
		@include('FrontEnd.includes.footer')
	</footer>
</body>
</html>