@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column is-8 is-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    List of all partners
                </div>
                <div class="panel-body">
                @forelse ($partners as $partner)
                    <a href="/chat/show?id_owner={{$partner->id}}?id={{Auth::user()->id}}  "class="panel-block"; style="justify-content: space-between;">
                        <div>{{ $partner->name }}</div>
                        <!-- <onlineuser v-bind:partner="{{ $partner }}" v-bind:onlineusers="onlineUsers"></onlineuser> -->
                    </a>
                @empty
                    <div class="panel-block">
                        You don't have any partners
                    </div>
                @endforelse</div>

            </div>
        </div>
    </div>
@endsection
