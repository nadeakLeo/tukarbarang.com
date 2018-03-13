@extends("admin.menu")

@section('content')
	<div id="panel panel-default">
		<table class="table table-responsive">
			<thead>
				<tr>
					<th>Transaction ID</th>
					<th>User</th>
					<th colspan="2"> User Goods</th>
					<th>Partner</th>
					<th colspan="2"> Partner Goods</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($transactions as $transaction)
				<tr>
					<td>{{$transaction->id}}</td>
					<td>{{$transaction->user_1_name}}</td>
					<td>{{$transaction->id_barang_1}}</td>
					<td>{{$transaction->barang_1}}</td>
					<td>{{$transaction->user_2_name}}</td>
					<td>{{$transaction->id_barang_2}}</td>
					<td>{{$transaction->barang_2}}</td>
					<td>status</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

