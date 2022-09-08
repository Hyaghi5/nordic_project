<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    
     protected $fillable = [
        'name', 'description','image','country'
    ];

    public static function get_all()
    {
    	$testimonials=Testimonial::all();
    	return $testimonials;
    }

    public static function get($id)
    {
    	$testimonial=Testimonial::find($id);
    	return $testimonial;
    }

    public static function testimonial_insert($name,$description,$image,$country)
    {
    	$testimonial=new Testimonial();
    	$testimonial->name=$name;
    	$testimonial->description=$description;
    	$testimonial->image=$image;
        $testimonial->image=$country;
    	$testimonial->save();
    	return $testimonial;
    }

       public static function testimonial_update($id,$name,$description,$image,$country)
    {
    	$testimonial=Testimonial::find($id);
    	$testimonial->name=$name;
    	$testimonial->description=$description;
    	$testimonial->image=$image;
        $testimonial->country=$country;
    	$testimonial->save();
    	return $testimonial;
    }

       public static function testimonial_delete($id)
    {
    	$testimonial=Testimonial::find($id);
        Storage::delete($testimonial->image);
    	$testimonial->delete();

    }


}
