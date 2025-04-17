<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSignupController extends Controller
{
    public function showSignupForm()
    {
        return view('frontend.pages.userSignup');
    }
}
