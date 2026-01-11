<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use App\Models\movie;
use Illuminate\Support\Facades\Auth;
use App\Models\Showtime;


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

        $showtimes = $movie->showtimes()
            ->orderBy('show_date')
            ->orderBy('show_time')
            ->get()
            ->map(function ($s) {
             return [
                'date'  => $s->show_date,   // MUST be Y-m-d
                'time'  => $s->show_time,
                'label' => date('h:i A', strtotime($s->show_time)),
            ];
        })
        ->values();
        // });


        return view('customer.booking', compact('movie', 'showtimes'));
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

        // Check if selected date + time really exists for this movie
        $exists = Showtime::where('movie_id', $request->movie_id)
            ->where('show_date', $request->date)
            ->where('show_time', $request->time)
            ->exists();

        if (! $exists) {
            return back()->withErrors([
                'time' => 'Selected time is not available for the chosen date.',
            ])->withInput();
        }


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
