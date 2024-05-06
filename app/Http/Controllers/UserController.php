<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->usertype != 'admin')
        {
            return view('users.index');
        }
         else{
            return view('admin.index');
    }
}
}
