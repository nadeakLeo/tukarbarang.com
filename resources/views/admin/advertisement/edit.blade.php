@extends('admin.menu')

@section('content')
	<form action="/admin/updateads" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value="{{$ads->id}}">
		<div class="form-group">
			<label for="name">Nama</label>
			<input type="text" name="name" class="form-control" value="{{$ads->name}}">
		</div>
		<div class="form-group">
			<label for="image">Image</label><br>
			<img src="{{asset('ads/img/'.$ads->path_pict)}}" width="200"><br>
			<input type="file" name="image" class="form-control">
		</div>
		<div class="form-group">
			<label for="link">Hyperlink</label>
			<input type="text" name="link" class="form-control" value="{{$ads->link}}">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" class="form-control">{{$ads->description}}</textarea>
		</div>
		<input type="submit" name="submit" class="btn btn-primary btn-save" value="Update">
		{{csrf_field()}}
	</form>
@endsection