@extends('layouts.admin_layout')
@section('content')


@if($errors->any())
<div class="alert alert-danger col-lg-6">
  {{$errors->first()}}
</div>           
@endif

	<div class="col-6">
<form  class="container" action='/admin/sliders/create' method="POST" enctype="multipart/form-data">
	@csrf

				<div class="form-group">
		<label for="exampleInputEmail1">Slider Main Title</label>
		<input name="main_title" class="form-control"  id="comment" required>
		
	</div>
			<div class="form-group">
		<label for="exampleInputEmail1">Slider Sub Title</label>
		<input name="sub_title" class="form-control"  id="comment" required>
		
	</div>


	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img_url" enctype="multipart/form-data">
	<br><br>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Create Image For slider</button>
</form>
	</div>
@endsection