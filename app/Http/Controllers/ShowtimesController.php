<?php

namespace App\Http\Controllers;
use App\Models\movie;
use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimesController extends Controller
{
    //
    public function create(movie $movie)
    {
        return view('admin.showtimes', compact('movie'));

    }

    public function store(Request $request)
    {
        $movie = movie::findOrFail($request->movie_id);

        $request->validate([
            'show_date' => [
                'required',
                'date',
                'after_or_equal:' . $movie->promotion_start_date,
                'before_or_equal:' . $movie->promotion_end_date,
            ],
            'show_time' => 'required',
        ]);

        Showtime::create([
            'movie_id' => $movie->movie_id,
            'show_date' => $request->show_date,
            'show_time' => $request->show_time,
        ]);

        return redirect()
            ->route('admin.showtimes',$movie->movie_id)
            ->with('success', 'Showtime added successfully.');
    }
}
