@extends('layouts.main_layout')

@section('content')
    <section class="banner-bottom-w3ls bg-light py-md-5 py-4">
        <div class="container">
            <div class="inner-sec-wthreelayouts py-md-5 py-4">
                <h2 class="tittle text-center mb-lg-5 mb-3">
                    Featured Services</h2>
                <!--/services-grids-->
                <div class="service-mid-sec mt-lg-5 mt-4">
                      
                    <div class="middle-serve-content">
                      
                            {{-- expr --}}
                     
                        <div class="row middle-grids">
                            @foreach ($services as $service)
                            
                            <div class="col-lg-4 about-in middle-grid-info text-center">
                                <div class="card img">
                                    <a href="/products/{{$service->id}}">
                                    <div class="card-body img">
                                        <img src="{{env('image_storage')}}/{{$service->images[0]->image}}" alt="" class="img-fluid corner">
                                        <h5 class="card-title">{{$service->title}}</h5>
                                        <p class="card-text">{{$service->main_description}}
                                        </p>
                                    </div>
                                     </a>
                                </div>
                            </div>
                       
                              @endforeach
                        </div>
                      
                    </div>

                </div>
                <!--//services-grids-->
            </div>
        </div>
    </section>


@endsection