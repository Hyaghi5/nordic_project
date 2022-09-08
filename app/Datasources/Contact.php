<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
         protected $fillable = [
        'phone', 'address','email','facebook','twitter','youtube','instagram'
    ];



  public static function get_all()
    {
        $contact=Contact::first();
        return $contact;
    }

    public static function get($id)
    {
    	$contact=Contact::find($id);
    	return $contact;
    }

    public static function contact_create($phone,$address,$email,$facebook,$twiiter,$youtube,$instagram)
    {
    	$Contact=new Contact();
    	$Contact->phone=$phone;
    	$Contact->address=$address;
    	$Contact->email=$email;
    	$Contact->facebook=$facebook;
    	$Contact->twitter=$twitter;
    	$Contact->youtube=$youtube;
        $Contact->instagram=$instagram;
    	$Contact->save();
    	return $Contact;
    }

     public static function contact_update($id,$phone,$address,$email,$facebook,$twitter,$youtube,$instagram)
    {
    	$Contact=Contact::find($id);
    	$Contact->phone=$phone;
    	$Contact->address=$address;
    	$Contact->email=$email;
    	$Contact->facebook=$facebook;
    	$Contact->twitter=$twitter;
    	$Contact->youtube=$youtube;
        $Contact->instagram=$instagram;
    	$Contact->save();
    	return $Contact;
    }
}
