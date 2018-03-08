@extends("admin.menu")
<style type="text/css">
	table {
		border: none;
		width: 100%;
	}

	#Penerima {
		float: right;
		text-align: right;
	}
</style>
@section('content')
	<div class="row">
		<div class="col-sm-3">
			<div id="Pengirim">
				<h3>Pengirim </h3>
				<strong>{{$sender->name}}</strong><br>
				{{$sender->email}}<br>
				{{$sender->phone}}
			</div>
		</div>

		<div class="col-sm-6">
			<div id="chatbox">
		      @foreach($chats as $chat)
		        <div id=@if($sender->id == $chat->user_id) "sent" @else "received" @endif>
		          {{$chat->chat}}
		        </div>
		      @endforeach
		    </div>
		</div>

		<div class="col-sm-3">
			<div id="Penerima">
				<h3>Penerima </h3>
				<strong>{{$receiver->name}}</strong><br>
				{{$receiver->email}}<br>
				{{$receiver->phone}}
			</div>
		</div>
@endsection
