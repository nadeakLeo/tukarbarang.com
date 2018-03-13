@extends('layouts.app')
<style type="text/css">
	img {
		width: 90%;
		height: auto;
		border-radius: 50%;
	}

	i {
		color: #047a41;
		position: absolute;
		right: 0;
	}

	p {
		font-size: 13px;
		color: black;
	}

	p strong {
		font-size: 15px;
		color: #047a41
	}

	#longline {
		position: absolute;
		width: 86%;
		height: 1vh;
		background-color: #999999;
		left: 7%;
		top: 130px;
	}

	@media only screen and (max-width: 500px) {
	   p { 
	      font-size: 20px; 
	      color: black;
	   }

	   p strong {
			font-size: 24px;
			color: #047a41;
	   }

	   #longline {
	   	display: none;
	   }
	}

	button {
		background-color: #f7b102;
	}
</style>
@section('content')
	<div class="container">
		<div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel" style="color: #047a41; padding: 10px;">
	            	<center><h3>6 Langkah Mudah Tukar Tukar</h3></center>
	            		<div id="longline"></div>
		            	<div class="row">
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl1.png')}}">
		            			<br>
		            			<p> <strong>Data Diri</strong><br>Isi data barang yang akan ditukar</p></center>

		            		</div>
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl2.png')}}"><br>
		            			<p> <strong>Pilih Barang</strong><br>Pilih barang yang mau ditukarkan (usahakan satu daerah)</p></center>
		            		</div>
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl3.png')}}"><br>
		            			<p> <strong>Chat</strong><br>Chat pemilik barang lewat kolom chat atau hubungi nomor pemilik</p></center>
		            		</div>
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl4.jpg')}}"><br>
		            			<p><strong>Tombol Tukar</strong><br>Jika kedua belah pihak setuju bertukar maka klik tombol tukar pada kolom chat</p></center>
		            		</div>
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl5.png')}}"><br>
		            			<p> <strong>Waktu dan Tanggal</strong><br>Tentukan tempat dan waktu untuk melakukan penukaran</p></center>
		            		</div>
		            		<div class="col-md-2">
		            			<center><img src="{{asset('img/brand/gl6.jpg')}}"><br>
		            			<p> <strong>Tombol Selesai</strong><br>Jika sudah melakukan penukaran buka kembali kolom chat dan klik tombol selesai maka otomatis barang anda akan terhapus</p></center>
		            		</div>
	        			</div>
	        		<br>

	        		<center>
	        			<a href="/home"><button class="btn" style="margin-bottom: 15px; color: white; font-size: 24px; padding: 10px 48px;">Mulai Menukar</button></a>
	        		</center>
	            </div>
	        </div>
	    </div>
	</div>
@endsection