@extends('admin.app')

@section('sidebar')
	<div id="header-menu">
		<center><h3 style="margin-bottom: 25px;">tukartukar.com</h3></center>
		<div class="line"></div>
		<ul class="menu">
			<a href="#"><li class="menu-item">Dashboard</li></a>
			<a href="/admin/user"></span><li class="menu-item">User</li></a>
			<a href="#"><li class="menu-item">Chat-Box</li></a>
		</ul>
	</div>
@endsection