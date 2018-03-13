@extends("admin.menu")
<style>
	#sender {
		float: left;
	}

	#user-card {
		margin: 5px 0px;
		padding-top: 10px;
		padding-bottom: 10px;
		width: 100px;
		background: #d4d4d6;
		text-align: center;
		color: black;
		box-shadow: 2px 2px 3px;
		border-radius: 5px;
	}

	#receiver {
		float: right;
		margin-right: 30%;
	}
</style>
@section('content')
		<h4>Select the user you want to view the history of the conversation</h4>
		<div id="sender">
			<h5> Sender </h5>
			@foreach($chat_users as $user)
			<a href="/admin/chatbox?user={{$user->id}}">
					<div id="user-card">
						{{$user->name}}<br>
					</div>
			</a>
			@endforeach
		</div>
		@if(isset($receivers))
		<div id="receiver">
			<h5> Receiver </h5>
			@foreach($receivers as $receiver)
			<a href="/admin/chatitem?sender={{$sender}}&receiver={{$receiver->id}}">
					<div id="user-card">
						{{$receiver->name}}<br>
					</div>
			</a>
			@endforeach
		</div>
		@endif
@endsection
