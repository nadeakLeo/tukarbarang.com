<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
	<title>Administrator - Login</title>

    
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/auth.css') }}">	
     
</head>

<body>
	
	<div id="container">
		<center><span class="title-center">Input Your Credential</span></center>
		<span class="navbar-brand logo">tukartukar.com</span>
		<form class="login-form" method="POST" action="/admin/signIn">
			{{csrf_field()}}
			<div class="form-group">
				<center><label for="username">Username</label></center>
				<input type="text" name="username" id="username" class="form-control">
			</div>
			<div class="form-group">
				<center><label for="password">Password</label></center>
				<input type="password" name="password" id="password" class="form-control">
			</div>
			<div class="form-group">
				<center>
					<input type="submit" value="Sign In" class="btn btn-primary submit">
				</center>
			</div>
		</form>
		 <span class="alert-validation" style="color: red">{{ $errors->first('username') }}</span>
		 <span class="alert-validation" style="color: red">{{ $errors->first('password') }}</span>
		 <span class="alert-validation" style="color: red">
		 	@if(isset($failLogin))
		 		{{$failLogin}}
		 	@endif
		 </span>
		<center><span class="footer">&copy; 2017. tukartukar.com Administrator Page</span></center>
	</div>

</body>
</html>
