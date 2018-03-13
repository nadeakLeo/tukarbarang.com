@extends('admin.menu')

@section('content')
	<a href="/admin/newAds"> <button class="btn btn-success btn-ads">+ Add Ads</button></a>
	@if(isset($succAdd))
	<p style="color: #02d0ef;">{{$succAdd}}</p>
	@endif
	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Link</th>
				<th>Description</th>
				<th colspan="2">Tools</th>
			</tr>
		</thead>		
		<tbody>
			@if(count($ads) == 0)
			<tr>
				<td colspan="5"><center>No Record Found</center></td>
			</tr>
			@else
			@foreach($ads as $ad)
			<tr>
				<td>{{$ad->name}}</td>
				<td><a href="https://{{$ad->link}}"> {{$ad->link}} </a></td>
				<td>{{$ad->description}}</td>
				<td><a class="btn btn-edit" href="/admin/editAds?id={{$ad->id}}"><i class="icon-pen"></i>Edit</td>
				<td><a class="btn btn-delete" href="/admin/deleteads?id={{$ad->id}}"><i class="icon-trash"></i> Delete</a></td>
			</tr>
			@endforeach

			@endif
		</tbody>
	</table>
@endsection