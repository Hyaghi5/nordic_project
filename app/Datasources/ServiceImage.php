<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{

	    protected $fillable = [
      'service_id','image'
    ];
       public function service()
    {
        return $this->belongsTo('App\Service','service_id');
    }


         public static function get_all()
    {
        $service_images = ServiceImage::with('service')->get();
        return $service_images;
    }

      public static function get($id)
    {
        $service_image = ServiceImage::where('id',$id)->with('service')->first();
        return $service;
    }


       public static function services_image_insert($service_id,$image)
    {
        $service_image = new ServiceImage;
        $service_image->service_id=$service_id;
        $service_image->image=$image;
        $service_image->save();
        return $service_image;
    }


          public static function services_image_update($id,$service_id,$image)
    {
        $service_image = ServiceImage::find($id);
        $service_image->service_id=$service_id;
        $service_image->image=$image;
        $service_image->save();
        return $service_image;
    }
}
