<?php

namespace App\Http\Controllers;
use App\Models\movie;
use App\Models\Booking;

use Illuminate\Http\Request;

class adminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = movie::all();
        return view('admin.index', compact('movies'));
    }

    public function bookings()
{
    // Eager load user and movie to avoid N+1 query problem
    $bookings = Booking::with(['user', 'movie'])->get();

    return view('admin.viewBooking', compact('bookings'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movie_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|max:2048',
            'movie_title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'cast' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'promotion_start_date' => 'required|date',
            'promotion_end_date' => 'required|date|after_or_equal:promotion_start_date',
        ]);

        // Handle file upload
        $imagePath = $request->file('image_path')->store('movies', 'public');

        // Create new movie record
        movie::create([
            'image_path' => $imagePath,
            'movie_title' => $request->movie_title,
            'director' => $request->director,
            'cast' => $request->cast,
            'description' => $request->description,
            'duration' => $request->duration,
            'promotion_start_date' => $request->promotion_start_date,
            'promotion_end_date' => $request->promotion_end_date,
        ]);

        return redirect()->route('admin.index')->with('success', 'Movie added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        return view('admin.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movie $movie)
    {
        $request->validate([
            'image_path' => 'nullable|image|max:2048',
            'movie_title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'cast' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer',
            'promotion_start_date' => 'required|date',
            'promotion_end_date' => 'required|date|after_or_equal:promotion_start_date',
        ]);

        // Handle file upload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('movies', 'public');
        } else {
            $imagePath = $movie->image_path;
        }

        // Update movie record
        $movie->update([
            'image_path' => $imagePath,
            'movie_title' => $request->movie_title,
            'director' => $request->director,
            'cast' => $request->cast,
            'description' => $request->description,
            'duration' => $request->duration,
            'promotion_start_date' => $request->promotion_start_date,
            'promotion_end_date' => $request->promotion_end_date,
        ]);

        return redirect()->route('admin.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.index')->with('success', 'Movie deleted successfully.');
    }
}
