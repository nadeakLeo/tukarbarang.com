@extends("admin.menu")
<style>
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
</style>
@section('content')
		<h4>Select the user you want to view the history of the conversation</h4>
		@foreach($chat_users as $user)
		<a href="/admin/chatitem?id={{$user->id}}">
				<div id="user-card">
					{{$user->name}}<br>
				</div>
		</a>
		@endforeach
@endsection
