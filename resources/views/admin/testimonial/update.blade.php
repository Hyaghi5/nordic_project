@extends('layouts.admin_layout')
@section('content')
	<div class="col-6">
<form  class="container" action='/admin/testimonials/update/{{$testimonial->id}}' method="POST" enctype="multipart/form-data">
	@csrf

			<div class="form-group">
		<label for="exampleInputEmail1">Testimonial Title</label>
		<input value="{{$testimonial->name}}" name="name" class="form-control"  id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Testimonial Description</label>
		<textarea name="description" class="form-control" rows="5" id="comment" required>{{$testimonial->description }}</textarea>
		
	</div>


		<div class="form-group">
		<label for="exampleInputEmail1">Testimonial Country</label>
		<input name="country" class="form-control"  id="comment" value="{{$testimonial->country}}" required>
		
	</div>



	<label for="exampleInputEmail1">Image</label>
	<input class="active" type="file" name="image" enctype="multipart/form-data">
	<br><br>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Update Testimonial</button>
</form>
	</div>
@endsection