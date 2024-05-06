<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function contact_us()
    {
        return view('contact_us');
    }
    public function about_us()
    {
        return view('about_us');
    }
}
