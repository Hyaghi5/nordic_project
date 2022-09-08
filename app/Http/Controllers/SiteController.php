<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Gallery;
use App\GalleryImage;
use App\Slider;
use App\Testimonial;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::get_all();
        $services=Service::get_all();
        $testimonials=Testimonial::get_all();
        return view('main_site.index',compact('sliders','testimonials','services'));
    }


    public function about()
    {
        return view('main_site.about');
    }

    public function single()
    {
        return view('main_site.product_single');
    }


    public function contact()
    {
      return view('main_site.contact');
    }


    public function services()
    {
        $services=Service::get_all();
     return view('main_site.services',compact('services'));
    }

    public function products_by_category(Request $request)
    {
        $category_id=$request['category_id'];
        $products=Product::get_by_category($category_id);
        return view('main_site.products',compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function gallery(Request $request)
    {
        $gallery_id=$request['gallery_id'];
        $gallery=Gallery::get($gallery_id);
       return view('main_site.gallery',compact('gallery'));
    }


      public function galleries(Request $request)
    {
        $galleries=Gallery::get_all();
       return view('main_site.galleries',compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function commercial()
   {
       return view('main_site.commercial');
   }
}
