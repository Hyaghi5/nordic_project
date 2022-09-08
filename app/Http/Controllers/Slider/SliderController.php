<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Storage;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders=Slider::get_all();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
        $main_title=$data['main_title'];
        $sub_title=$data['sub_title'];
 
      if($request->file('img_url')!= null){

            $path;
            if(request()->file('img_url')->isValid()){
                $path = $request->file('img_url')->storeAs('public', time().'.jpg');
                $img_url=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Slider::slider_insert($main_title,$sub_title,$img_url);
         return redirect('/admin/sliders/index');
    }
    return Redirect::back()->withErrors('The image input must not be empty');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request['id'];
        $slider=Slider::get($id);
        return view('admin.slider.update',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {   
        $data=$request->all();
        $id=$request['id'];
        $main_title=$data['main_title'];
        $sub_title=$data['sub_title'];
 
      if($request->file('img_url')!= null){

            $path;
            if(request()->file('img_url')->isValid()){
                $path = $request->file('img_url')->storeAs('public', time().'.jpg');
                $img_url=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
      Slider::slider_update($id,$main_title,$sub_title,$img_url);
    }
    else
    {
        $slider=Slider::get($id);
        Slider::slider_update($id,$main_title,$sub_title,$slider->img_url);
    }

       
         return redirect('/admin/sliders/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }

    public function delete(Request $request)
    {
        $id=$request['id'];
        $slider=Slider::get($id);
        Storage::delete('public/'.$slider->img_url);
        Slider::slider_delete($id);
         return redirect('/admin/sliders/index');
    }
}
