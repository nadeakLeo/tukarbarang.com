@extends("admin.menu")

@section('content')
    <div id="chatbox">
      @foreach($chats as $chat)
        <div id=@if($sender == $chat->user_id) "sent" @else "received" @endif>
          {{$chat->chat}}
        </div>
      @endforeach
    </div>
@endsection
