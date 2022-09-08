<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
   protected $fillable = [
        'title','main_description','sub_description',
    ];


        public function images()
    {
        return $this->HasMany('App\ServiceImage');
    }

     public static function get_all()
    {
        $services = Service::with('images')->get();
        return $services;
    }

      public static function get($id)
    {
        $Service = Service::where('id',$id)->with('images')->first();
        return $Service;
    }



       public static function Service_insert($title,$main_description,$sub_description)
    {
        $Service = new Service;
        $Service->title=$title;
        $Service->main_description=$main_description;
        $Service->sub_description=$sub_description;
        $Service->save();
        return $Service;
    }

         public static function Service_update($id,$title,$main_description,$sub_description)
    {

        $Service = Service::find($id);
        $Service->title=$title;
        $Service->main_description=$main_description;
        $Service->sub_description=$sub_description;
        $Service->save();
        return $Service;
    }

      public static function Service_delete($id)
    {
    	$Service=Service::find($id);
    	$Service->delete();
    }
}
