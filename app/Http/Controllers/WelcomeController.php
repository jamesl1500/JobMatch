<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Index page
    public function index()
    {
        return view('welcome.index');
    }

    // About page
    public function about()
    {
        return view('welcome.about');
    }

    // Contact page
    public function contact()
    {
        return view('welcome.contact');
    }
}
