<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;

class movieController extends Controller
{
    public function home()
    {
        // Get all movies for "Now Showing"
        $movies = movie::all();

        return view('customer.index', compact('movies'));
    }   

    public function show($id)
    {
        // Fetch movie by ID
        $movie = Movie::findOrFail($id);

        // Return details page
        return view('customer.details', compact('movie'));
    }


}