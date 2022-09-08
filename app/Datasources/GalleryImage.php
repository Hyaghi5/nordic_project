<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{

	  protected $fillable = [
        'gallery_id','image',
    ];

  public function gallery()
    {
        return $this->belongsTo('App\Gallery','gallery_id');
    }
   

     public static function get_by_gallery($gallery_id)
    {
    	$gallery_images=GalleryImage::where('gallery_id',$gallery_id)->with('gallery')->get();
    	return $gallery_images;
    }


       public static function get($id)
    {
        $gallery_images=GalleryImage::where('id',$id)->with('gallery')->first();
        return $gallery_images;
    }



       public static function gallery_image_insert($gallery_id,$image)
    {
    	$gallery_image = new GalleryImage;
    	$gallery_image->gallery_id=$gallery_id;
    	$gallery_image->image=$image;
    	$gallery_image->save();
    	return $gallery_image;
    }



       public static function gallery_image_update($id,$gallery_id,$image)
    {
    	$gallery_image =GalleryImage::find($id);
   		$gallery_image->gallery_id=$gallery_id;
    	$gallery_image->image=$image;
    	$gallery_image->save();
    	return $gallery_image;
    }


       public static function gallery_image_delete($id)
    {
    	$gallery_image=GalleryImage::find($id);
    	$gallery_image->delete();
    }
}
