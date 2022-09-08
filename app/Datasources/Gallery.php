<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
      
    protected $fillable = [
        'title',
    ];
    


     public function images()
    {
        return $this->HasMany('App\GalleryImage');
    }

    public static function get_all()
    {
    	$galleries=Gallery::All();
    	return $galleries;
    }

        public static function get($id)
    {
        $gallery=Gallery::where('id',$id)->with('images')->first();
        return $gallery;
    }


       public static function gallery_insert($title)
    {
    	$gallery = new Gallery;
    	$gallery->title=$title;
    	$gallery->save();
    	return $gallery;
    }



       public static function gallery_update($id,$title)
    {
    	$gallery =Gallery::find($id);
    	$gallery->title=$title;
    	$gallery->save();
    	return $gallery;
    }


       public static function gallery_delete($id)
    {
    	$gallery=Gallery::find($id);
    	$gallery->delete();
    }


}
