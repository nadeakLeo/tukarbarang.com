@extends('admin.app')

@section('sidebar')
	<div id="header-menu">
		<center><h3 style="margin-bottom: 25px;">tukartukar.com</h3></center>
		<div class="line"></div>
		<ul class="menu">
			<a href="/admin/dashboard"><li class="menu-item">Dashboard</li></a>
			<a href="/admin/user"><li class="menu-item">User</li></a>
			<a href="#"><li class="menu-item">Transaction</li></a>
			<a href="/admin/chatbox"><li class="menu-item">Chat-Box</li></a>
			<a href="/admin/terms"><li class="menu-item">Terms and Agreement</li></a>
			<a href="/admin/advertisements"><li class="menu-item">Advertisements</li></a>
		</ul>
	</div>

	  <!-- <a href="#about">About</a>
	  <a href="#services">Services</a>
	  <a href="#clients">Clients</a>
	  <a href="#contact">Contact</a>
	  <button class="dropdown-btn">Dropdown 
	    <i class="fa fa-caret-down"></i>
	  </button>
	  <div class="dropdown-container">
	    <a href="#">Link 1</a>
	    <a href="#">Link 2</a>
	    <a href="#">Link 3</a>
	  </div>
	  <a href="#contact">Search</a> -->

@endsection
