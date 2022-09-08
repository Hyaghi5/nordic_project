@extends('layouts.admin_layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

	<div class="col-6">
<form  class="container" action='/admin/categories/create' method="POST" enctype="multipart/form-data">
	@csrf


			<div class="form-group">
		<label for="exampleInputEmail1">Category Name</label>
		<input name="name" class="form-control" rows="5" id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Category Description</label>
		<textarea name="description" class="form-control" rows="5" id="comment" required></textarea>
		
	</div>
	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img" enctype="multipart/form-data" required>
	<br><br>
	<button  type="submit" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Create Category</button>
</form>
	</div>
@endsection