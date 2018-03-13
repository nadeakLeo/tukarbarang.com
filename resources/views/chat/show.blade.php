@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endpush
@section('content')

    <meta name="partnerId" content="{{ $partner->id }}">

    <div class="container">
        <div class="panel-group">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1" style="font-size: 12px;">Read Terms and Agreement</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse" style="max-height: 300px; overflow: auto;">
              <div class="panel-body">{{$terms->terms}}</div>
            </div>
          </div>
        </div>
        <div class="column is-10 is-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4>{{ $partner->name }}</h4>
                    <div class="contain is-pulled-right">
                        <a href="{{ url('/home') }}" class="is-link"><i class="fa fa-arrow-left">Go Back</i> </a>
                    </div>
                    <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:partnerid="{{ $partner->id }}"></chat>
                    @if($flag)
                      @if($isAccepted)

                        <a class="btn btn-primary" disabled>Accepted</a>
                      @else

                        <a href="/addTransaction?id={{ $partner->id }}&id_user_good={{$id_user_good}}&id_good={{$id_good}}" class="btn btn-primary">Deal</a>
                      @endif
                    @else

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
