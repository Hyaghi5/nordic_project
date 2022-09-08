@extends('layouts.admin_layout')
@section('content')


@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

	<div class="col-6">
<form  class="container" action='/admin/services/create' method="POST" enctype="multipart/form-data">
	@csrf

			<div class="form-group">
		<label for="exampleInputEmail1">Service name</label>
		<input name="title" class="form-control"  id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Product Main Description</label>
		<textarea name="main_description" class="form-control" rows="5" id="comment" required></textarea>
		
	</div>


					<div class="form-group">
		<label for="exampleInputEmail1">Product Sub Description</label>
		<textarea name="sub_description" class="form-control" rows="5" id="comment" required></textarea>
		
	</div>


	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img_name[]" enctype="multipart/form-data" required multiple>
	<br><br>
	<button  type="submit" class="btn btn-success"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Create Product</button>
</form>
	</div>
@endsection