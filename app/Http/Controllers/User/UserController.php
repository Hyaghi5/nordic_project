<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as user;

class UserController extends Controller
{
    

       public function index()
    {
       $users=user::get_all();

       return View('admin.user.index',compact('users'));
    }


       public function create()
    {
       return View('admin.user.create',compact('users'));
    }
}
