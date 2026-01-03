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

}