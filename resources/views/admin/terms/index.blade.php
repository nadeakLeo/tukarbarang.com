@extends("admin.menu")
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>

@section('content')
	<div id="editor-terms">
	<form method="POST" action="/admin/update-terms">
		<h4> Terms and Agreement </h4>
    @if(isset($succ))
    <span style="color: #0e5ad3;"><b>{{$succ}}</b></span>
    @endif
 		<textarea id="summernote" class="form-control" name="terms">
      @if($terms->terms != null)
      {{$terms->terms}}
      @endif
    </textarea>
 		<input type="submit" value="Submit" class="btn btn-primary btn-submit-terms">
 		{{ csrf_field() }}
 	</form>
 	</div>
    <script>
      $('#summernote').summernote({
      	placeholder : "Content Goes Here",
        tabsize: 2,
        height: 100
      });
    </script>
@endsection

