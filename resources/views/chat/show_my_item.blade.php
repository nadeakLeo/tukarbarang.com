@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@endpush
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <p><b>Pilih Barang Yang Ingin Ditukarkan</b></p>
                </h3>
              </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                      @foreach($barang_detail as $barang)

                      <a href="/chat/show?id={{$barang->id_user}}&id_user_good={{$barang->id}}&id_owner={{$id_owner}}&id_good={{$id_good}}" style="color: black;">
                      <div class="row">
                      <div class="col-sm-4">
                    		<img src="{{asset('img/barang_tukar/'.$barang->path_gambar)}}" style="width: 100%;" ></div>
                    	<div class="col-sm-8" style="padding: 4px 12px;">
                        Nama Barang : {{$barang->nama_barang}}<br>
                    		Kategori : {{$barang->kategori}}<br>
                    		Harapan Tukar : {{$barang->harapan_tukar}}<br>
                    		Berat : {{$barang->berat}}<br>
                    		Panjang : {{$barang->panjang}}<br>
                    		Lebar : {{$barang->lebar}}<br>
                    	</div>


                    </div>
                    </a>
                      @endforeach



                </div>

            </div>
        </div>
    </div>
</div>
@endsection
