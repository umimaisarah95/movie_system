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

    public function booking($id)
    {
        $movie = movie::findOrFail($id);

        return view('customer.booking', compact('movie'));
    }


    /**
     * Store booking data
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'booking_date'     => 'required|date',
            'booking_time'     => 'required',
            'seat_num'    => 'required',
            'total_price'    => 'required|numeric',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'booking_date'     => $request->date,
            'booking_time'     => $request->time,
            'seat_num'    => $request->seats,
            'total_price'    => $request->total,
            'status'   => 'PAID',
        ]);

        return redirect()->route('customer.index')
            ->with('success', 'Booking confirmed!');
    }
}
