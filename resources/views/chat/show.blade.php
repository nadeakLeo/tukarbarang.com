@extends('layouts.app')

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
                </div>
            </div>
        </div>
    </div>
@endsection
