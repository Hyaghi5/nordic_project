<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Redirect;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::get_all();
        return view('admin.testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
      {   
             $data=$request->all();
        $name=$data['name'];
        $description=$data['description'];
        $country=$data['country'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Testimonial::testimonial_insert($name,$description,$image,$country);
         return redirect('/admin/testimonials/index');
    }
return Redirect::back()->withErrors('The image input must not be empty');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request['id'];
        $testimonial=Testimonial::get($id);
        return view('admin.testimonial.update',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {   
        $data=$request->all();
        $id=$request['id'];
        $name=$data['name'];
        $description=$data['description'];
        $country=$data['country'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
      Testimonial::testimonial_update($id,$name,$description,$image,$country);
    }
    else
    {
        $testimonial=Testimonial::get($id);
        $image=$testimonial->image;
        Testimonial::testimonial_update($id,$name,$description,$image,$country);
    }

       
        return redirect('/admin/testimonials/index');

    }


    public function delete(Request $request)
    {
        $id=$request['id'];
        Testimonial::testimonial_delete($id);
        return redirect('/admin/testimonials/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }
}
