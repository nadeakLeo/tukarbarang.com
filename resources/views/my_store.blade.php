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
                <div class="panel-heading">My Store</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="add-button">
                        <a class="add" href="/addbarang">+</a>
                        <span class="hint">Add Your Goods</span>
                    </div>

                    <div id="list-barang" style="margin-top: 30px;">
                        @foreach($barangs as $barang)
                        <div class="card-barang">
                            <img src="{{asset('img/barang_tukar/'.$barang->path_gambar)}}" alt="Barang" style="width: 100%">
                            <div class="card-container">
                                <h4><strong>{{$barang->nama_barang}}</strong></h4>
                                <p>Deskripsi Barang</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
