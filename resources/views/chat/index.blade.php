@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel">
                <div class="panel-heading">
                    List of all partners
                </div>
                @forelse ($partners as $partner)
                    <a href="{{ route('chat.show', $partner->id) }}" class="panel-block" style="justify-content: space-between;">
                        <div>{{ $partner->name }}</div>
                        <!-- <onlineuser v-bind:partner="{{ $partner }}" v-bind:onlineusers="onlineUsers"></onlineuser> -->
                    </a>
                @empty
                    <div class="panel-block">
                        You don't have any partners
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
