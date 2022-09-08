@extends('layouts.admin_layout')
@section('content')
	<div class="col-6">
<form  class="container" action='/admin/categories/update/{{$category->id}}' method="POST" enctype="multipart/form-data">
	@csrf


			<div class="form-group">
		<label for="exampleInputEmail1">Category Name</label>
		<input name="name" class="form-control" rows="5" value="{{$category->name}}" id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Category Description</label>
		<textarea name="description" class="form-control" rows="5" id="comment" required>{{$category->description}}</textarea>
		
	</div>
	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img" enctype="multipart/form-data">
	<br><br>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update Category</button>
</form>
	</div>
@endsection