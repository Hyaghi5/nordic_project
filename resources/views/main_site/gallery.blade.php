@extends('layouts.main_layout')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
       <div class="container">
           
    
        <div class="row">

            @foreach ($gallery->images as $image)
            <a href="{{env('image_storage') }}/{{$image->image}}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
                <img style="margin-bottom: 10%" src="{{env('image_storage') }}/{{$image->image}}" class="img-fluid">
            </a>
            @endforeach  
        </div>
           </div>
        
    </div>
</div>

<script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
@endsection
