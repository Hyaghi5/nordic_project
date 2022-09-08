@extends('layouts.admin_layout')
@section('content')
	<div class="col-6">
<form  class="container" action='/admin/sliders/update/{{$slider->id}}' method="POST" enctype="multipart/form-data">
	@csrf

				<div class="form-group">
		<label for="exampleInputEmail1">Slider Main Title</label>
		<input name="main_title" class="form-control" rows="5" value="{{$slider->main_title}}" id="comment" required>
		
	</div>
			<div class="form-group">
		<label for="exampleInputEmail1">Slider Sub Title</label>
		<input name="sub_title" class="form-control" rows="5" value="{{$slider->sub_title}}" id="comment" required>
		
	</div>


	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="img_url" enctype="multipart/form-data">
	<br><br>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update Image of slider</button>
</form>
	</div>
@endsection