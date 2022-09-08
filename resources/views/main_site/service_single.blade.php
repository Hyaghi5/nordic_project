@extends('layouts.main_layout')
@section('content')
	 <section class="banner-bottom-w3ls py-lg-5 py-md-5 py-3">
        <div class="container">
            <div class="inner-sec-wthreelayouts py-lg-5  py-3">
                <h2 class="tittle text-center mb-lg-5 mb-3">
                   {{$service->title}}</h2>
                <div class="row mt-lg-5 mt-md-4 mt-4">
                    <!--left-->

                    <div class="col-lg-8 left-blog-info text-left">
                        <div class="card">

                             <div class="card-body">
                               
                                <h5 class="card-title ">
                                    <a href="single.html">{{$service->title}}</a>
                                </h5>
                                <p class="card-text">{{$service->description}} </p>

                            </div>

                             <ul class="blog-icons my-4">
                                    <li>
                                        <a href="#">
                                            <i class="far fa-calendar-alt"></i>{{$service->created_at}}</a>
                                    </li>

                                </ul>

                                @foreach ($service->images as $image1)
                                <img src="{{env('image_storage') }}/{{$image1->image}}" class="img-fluid" alt="">

                                @endforeach
                         


                        </div>



                    </div>
                    <!--//left-->
                    <!--right-->
                    <!--//right-->

                </div>
            </div>
        </div>
    </section>

    
@endsection
