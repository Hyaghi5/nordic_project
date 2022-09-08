@extends('layouts.admin_layout')
@section('content')
	<div class="col-6">
<form  class="container" action='/admin/services/update/{{$service->id}}' method="POST" enctype="multipart/form-data">
	@csrf

			<div class="form-group">
		<label for="exampleInputEmail1">service Title</label>
		<input value="{{$service->title}}" name="title" class="form-control"  id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">service Description</label>
		<textarea name="main_description" class="form-control" rows="5" id="comment" required>{{$service->main_description}}</textarea>
		
	</div>


				<div class="form-group">
		<label for="exampleInputEmail1">service Description</label>
		<textarea name="sub_description" class="form-control" rows="5" id="comment" required>{{$service->sub_description}}</textarea>
		
	</div>


	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img_name" enctype="multipart/form-data">
	<br><br>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update Agent</button>
</form>
	</div>
@endsection