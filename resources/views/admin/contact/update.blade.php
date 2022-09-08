@extends('layouts.admin_layout')
@section('content')
	<div class="col-6">
<form  class="container" action='/admin/contact/update/{{$contact->id}}' method="POST" enctype="multipart/form-data">
	@csrf


			<div class="form-group">
		<label for="exampleInputEmail1">Contact Address</label>
		<input name="address" class="form-control"  value="{{$contact->address}}" id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Contact Email</label>
		<input name="email" class="form-control"  value="{{$contact->email}}" id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Contact Facebook</label>
		<input name="facebook" class="form-control"  value="{{$contact->facebook}}" id="comment" required>
		
	</div>

				<div class="form-group">
		<label for="exampleInputEmail1">Contact Twiiter</label>
		<input name="twitter" class="form-control"  value="{{$contact->twitter}}" id="comment" required>
		
	</div>


				<div class="form-group">
		<label for="exampleInputEmail1">Contact youtube</label>
		<input name="youtube" class="form-control"  value="{{$contact->youtube}}" id="comment" required>
		
	</div>


				<div class="form-group">
		<label for="exampleInputEmail1">Contact Phone</label>
		<input name="phone" class="form-control"  value="{{$contact->phone}}" id="comment" required>
		
	</div>


				<div class="form-group">
		<label for="exampleInputEmail1">Contact Instagram</label>
		<input name="instagram" class="form-control"  value="{{$contact->instagram}}" id="comment" required>
		
	</div>
	<button  type="submit" class="btn btn-primary"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> Edit Contact</button>
</form>
	</div>
@endsection