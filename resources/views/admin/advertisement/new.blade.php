@extends('admin.menu')

@section('content')
	<form action="/admin/storeads" method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">Nama</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="image">Image</label>
			<input type="file" name="image" class="form-control">
		</div>
		<div class="form-group">
			<label for="link">Hyperlink</label>
			<input type="text" name="link" class="form-control">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<textarea name="description" class="form-control"></textarea>
		</div>
		<input type="submit" name="submit" class="btn btn-primary btn-save" value="Save">
		{{csrf_field()}}
	</form>
@endsection