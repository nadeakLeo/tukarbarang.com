@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$barang_detail->nama_barang}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="row">
                        <a id="edit-icon" href="/mybarang?id={{$barang_detail->id}}&edit=true">&#9998;</a>
                        <a id="edit-text" href="/mybarang?id={{$barang_detail->id}}&edit=true">Edit</a>
                        
                    	<div class="col-sm-4">
                    		<img src="{{asset('img/barang_tukar/'.$barang_detail->path_gambar)}}" style="width: 100%;"></div>
                    	<div class="col-sm-8" style="padding: 4px 12px;">
                    		<!-- TODO : Kategori buat kayak icon -->
                    		Kategori : {{$barang_detail->kategori}}<br>
                    		Harapan Tukar : {{$barang_detail->harapan_tukar}}<br>
                    		Berat : {{$barang_detail->berat}}<br>
                    		Panjang : {{$barang_detail->panjang}}<br>
                    		Lebar : {{$barang_detail->lebar}}<br>
                    	</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection