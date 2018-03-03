@extends("admin.menu")
<style type="text/css">
	tr th {
		text-align: center;
	}
</style>
@section('content')
	<h3>Daftar Pengguna tukar-tukar.com</h3>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th> Nama </th>
				<th> Email </th>
				<th> Telp./HP </th>
				<th colspan="2"> Tools </th>
			</tr>
		</thead>
		@if(count($users) == 0)
		<tbody>
			<td colspan="5"><center>No Record Found</center></td>
		</tbody>
		@else
		@foreach($users as $user)
		<tbody>
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->phone}}</td>
				<td>Detail</td>
				<td>Delete</td>
			</tr>
		</tbody>
		@endforeach
		@endif
	</table>
@endsection