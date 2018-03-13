@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
@endpush

<div class="container">
    @if(count($ads) > 0)
        <div id="adsCarousel" class="ads-body carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < count($ads); $i++)
                <li data-target="#adsCarousel" data-slide-to="{{$i}}" @if($i == 0) class="active" @endif></li>
                @endfor
            </ol>

        <div class="carousel-inner">
            <?php $i = 0;?>
            @foreach($ads as $ad)
            <div class="item @if($i == 0) active @endif">
                <center><a href="/redirect?link={{$ad->link}}"><img style="width: 100%; height: 400px;" src="{{asset('ads/img/'.$ad->path_pict)}}" alt="$ad->name"></a></center>
                <div class="carousel-caption">
                    <h3>{{$ad->name}}</h3>
                    <p>{{$ad->description}}</p>
                </div>
            </div>
            <?php $i++; ?>
            @endforeach

        </div>

        <a class="left carousel-control" href="#adsCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#adsCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
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
