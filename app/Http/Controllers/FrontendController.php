<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function holidays()
    {
        return view('frontend.pages.holidays');
    }

    public function location()
    {
        return view('frontend.pages.location');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

}
