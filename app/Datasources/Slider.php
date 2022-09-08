<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
      protected $fillable = [
        'main_title','sub_title','img_url'
    ];



    public static function get_all()
    {
    	$sliders=Slider::all();
    	return $sliders;
    }

     public static function get($id)
    {
    	$slider=Slider::find($id);
    	return $slider;
    }

    public static function slider_insert($main_title,$sub_title,$img_url)
    {


    	$slider=new Slider();
    	$slider->main_title=$main_title;
    	$slider->sub_title=$sub_title;
        $slider->img_url=$img_url;
        $slider->save();
    	return $slider;
    }
    public static function slider_update($id,$main_title,$sub_title,$img_url)
    {

    
        $slider=Slider::find($id);
    	$slider->main_title=$main_title;
    	$slider->sub_title=$sub_title;
        $slider->img_url=$img_url;
        $slider->save();

    	return $slider;
    }

    public static function slider_delete($id)
    {
    	$slider=Slider::find($id);
    	$slider->delete();
    }

}
