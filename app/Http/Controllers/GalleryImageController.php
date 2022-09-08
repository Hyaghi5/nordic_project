<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gallery_id=$request['gallery_id'];
        $galleryimages=GalleryImage::get_by_gallery($gallery_id);
        return view('admin.gallery_image.index',compact('galleryimages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id=$request['gallery_id'];
        $gallery=Gallery::get($id);
        return view('admin.gallery_image.create',compact('gallery'));
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
        $gallery_id=$request['gallery_id'];
             if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $img_name=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
         GalleryImage::gallery_image_insert($gallery_id,$img_name);
         return redirect('/admin/gallery_images/index/'.$gallery_id);
    }
      return Redirect::back()->withErrors('The image input must not be empty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function show(GalleryImage $galleryImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request['id'];
      $gallery_image=GalleryImage::get($id);
      return view('admin.gallery_image.update',compact('gallery_image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $id=$request['id'];
        $gallery_id=$request['gallery_id'];
             $data=$request->all();
             if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $img_name=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }


         GalleryImage::gallery_image_update($id,$gallery_id,$img_name);
    }
    else
    {
        $gallery_image=GalleryImage::get($id);

         GalleryImage::gallery_image_update($id,$gallery_id,$gallery_image->image);;
    }

         return redirect('/admin/gallery_images/index/'.$gallery_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryImage  $galleryImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(GalleryImage $galleryImage)
    {
        //
    }
}
