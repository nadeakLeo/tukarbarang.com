@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="list-barang">
                        @foreach($barangs as $barang)
                        <a href="/barang?id={{$barang->id}}&id_owner={{$barang->id_user}}" style="color: black;">
                        <div class="card-barang">
                            <img src="{{asset('img/barang_tukar/'.$barang->path_gambar)}}" alt="Barang" style="width: 100%">
                            <div class="card-container">
                                <h4><strong>{{$barang->nama_barang}}</strong></h4>
                                Kategori : {{$barang->kategori}}<br>
                                Kondisi  : {{$barang->kondisi}}<br>
                                Kategori : {{$barang->kategori}}<br>
                                
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
