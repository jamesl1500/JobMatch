<?php

namespace App\Http\Controllers;

use App\Models\JobBoards;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;

class JobBoardController extends Controller
{
    // Index page
    public function index()
    {
        return view('boards.index');
    }

    /**
     * Create
     * -----
     * Show the form for creating a new job board.
     */
    public function create()
    {
        if(auth()->user()->role !== 'employer') 
        {
            return redirect()->route('dashboard.index');
        }

        return view('boards.crud.create');
    }

    /**
     * Store
     * -----
     * Store a newly created job board in storage.
     */
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'website' => 'required|url',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Store the logo...
        $logo = $request->file('logo');
        $logo_name = time() . '.' . $logo->extension();
        $logo->move(public_path('board_logos'), $logo_name);

        // Store the banner
        $banner = $request->file('banner');
        $banner_name = time() . '.' . $banner->extension();
        $banner->move(public_path('board_banners'), $banner_name);

        // Store the job board...
        JobBoards::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->website,
            'email' => $request->email,
            'logo' => $logo_name,
            'banner' => $banner_name,
        ]);

        return redirect()->route('job_board.index')->with('success', 'Job board created successfully.');
    }

    /**
     * View
     * -----
     * Display the specified job board.
     */
    public function show($id)
    {
        // Make sure board exists
        $board = JobBoards::find($id);

        if(!$board) 
        {
            return redirect()->route('job_board.index')->with('error', 'Job board not found.');
        }

        return view('boards.show', ['board' => $board]);
    }

    /**
     * Edit
     * -----
     * Show the form for editing the specified job board.
     */
    public function edit($id)
    {
        return view('job_board.edit', ['id' => $id]);
    }

    /**
     * Update
     * -------
     * Update the specified job board in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request...
    }

    /**
     * Destroy
     * -------
     * Remove the specified job board from storage.
     */
    public function destroy(Request $request, $id)
    {
        // Delete the job board...
    }
}
