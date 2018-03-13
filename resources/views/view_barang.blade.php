@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">{{$barang_detail->nama_barang}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="row">
                    	<div class="col-sm-4" style="border-right: solid 1px; ">
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
                    <div class="col-sm-12" style="margin-top: 30px;">
                    	<center>

                            <a href="/chat?id={{Auth::id()}}&id_owner={{$barang_detail->id_user}}&id_good={{$barang_detail->id}}" class="btn btn-primary"><i class="icon-bubble"></i>  Chat Owner</a>


                		</center>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
