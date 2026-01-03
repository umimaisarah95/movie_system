<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\movie;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Show booking page for a movie
     */
    public function create(Movie $movie)
    {
        return view('customer.booking', compact('movie'));
    }

    /**
     * Store booking data
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'date'     => 'required|date',
            'time'     => 'required',
            'seats'    => 'required',
            'total'    => 'required|numeric',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'date'     => $request->date,
            'time'     => $request->time,
            'seats'    => $request->seats,
            'total'    => $request->total,
            'status'   => 'PAID',
        ]);

        return redirect()->route('customer.index')
            ->with('success', 'Booking confirmed!');
    }
}
