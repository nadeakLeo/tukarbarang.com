@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
@endpush
@section('content')

    <meta name="partnerId" content="{{ $partner->id }}">
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <div class="panel-heading">
                    {{ $partner->name }}
                    <div class="contain is-pulled-right">
                        <a href="{{ url('/home') }}" class="is-link"><i class="fa fa-arrow-left"></i> Go Back</a>
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
