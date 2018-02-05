@extends('layouts.app')

@section('content')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
@endpush
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="chat-panel">
                        <div id="msg-box">
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>Test<br>
                            Test<br>
                            Test<br>
                            Test<br>Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>
                            Test<br>Test<br>
                            Test<br>
                            Test<br>
                        </div>
                        <div id="control">
                            <input class="msg" type="text" name="message">
                            <button class="msg">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
