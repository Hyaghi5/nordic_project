<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function contactSaveData(Request $request)
   {
      ContactUS::create($request->all()); 
              Mail::send('emails.contactus', ['name' => $request->post('name'),'email'=> $request->post('email'),'message1'=>$request->post('message')], function ($m) use ($request) {
            $m->from('hamzayaghi5@gmail.com', 'Your Application');

            $m->to("hamzayaghi2@gmail.com","hamza")->subject('Contact Us E-Mail');
        });
 
    return back()->with('success', 'Thanks for contacting us!'); 
   }
}




