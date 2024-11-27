<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobPostings;

class JobController extends Controller
{
    // Display all jobs for user
    public function index()
    {
        return view('jobs.index');
    }

    // Display a job
    public function show(Request $request, $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // Create a job
    public function create()
    {
        if(auth()->user()->role !== 'employer') 
        {
            return redirect()->route('dashboard.index');
        }

        return view('jobs.crud.create');
    }

    // Store a job
    public function store(Request $request)
    {
        // If not logged in
        if(!auth()->check()) 
        {
            return redirect()->route('login');
        }

        // If not an employer
        if(auth()->user()->role !== 'employer') 
        {
            return redirect()->route('dashboard.index');
        }

        // Validate the request...
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'salary' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Store the job
        $job = JobPostings::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'status' => $request->type,
            'user_id' => auth()->user()->id,
        ]);

        // Redirect to the job
        return redirect()->route('jobs.edit', ['job' => $job]);
    }

    // Edit a job
    public function edit(Request $request, $job)
    {
        if(auth()->user()->role !== 'employer') 
        {
            return redirect()->route('dashboard.index');
        }

        return view('jobs.crud.edit', ['job' => $job]);
    }

    // Store a job

}
