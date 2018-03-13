@extends('layouts.app')

@section('content')

    <meta name="partnerId" content="{{ $partner->id }}">

    <div class="container">
        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1" style="font-size: 12px;">Read Terms and Agreement</a>
              </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse" style="max-height: 300px; overflow: auto;">
              <div class="panel-body">@if($terms != null) {{$terms->terms}} @endif</div>
            </div>
          </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel">
                <div class="panel-heading">
                    {{ $partner->name }}
                    <div class="contain is-pulled-right">
                        <a href="{{ url('/home') }}" class="is-link"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                    <chat v-bind:chats="chats" v-bind:userid="{{ Auth::user()->id }}" v-bind:partnerid="{{ $partner->id }}"></chat>
                </div>
            </div>
        </div>
    </div>
@endsection
