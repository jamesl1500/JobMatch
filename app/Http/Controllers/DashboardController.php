<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Main dashboard page
    public function index()
    {
        if(auth()->user()->role === 'admin') 
        {
            return view('dashboard.admin');
        }else if(auth()->user()->role === 'employer') 
        {
            return view('dashboard.employer');
        }else if(auth()->user()->role === 'job_seeker') 
        {
            return view('dashboard.job_seeker');
        }
    }
}
