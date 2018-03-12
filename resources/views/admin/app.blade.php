<!DOCTYPE html>
<html>
<head>
	<title>tukartukar.com | Administrator</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/app.css')}}">
	
<body>
	<div id="sidebar">
		@yield('sidebar')
	</div>

	<div id="content">
		@include('admin.header')
		@yield('content')
	</div>

	<div id="copyright">&copy; 2017. tukartukar.com Administrator Page</div>
	 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>