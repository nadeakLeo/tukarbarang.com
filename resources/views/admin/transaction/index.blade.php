@extends("admin.menu")
<style>
	tbody td {
		text-align: center;
	}
</style>
@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
		<table class="table table-responsive">
			<thead>
				<tr>
					<th>No</th>
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
					<td>{{$transaction->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
@endsection

