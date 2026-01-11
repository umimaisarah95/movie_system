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
            'movie_id' => 'required|exists:movies,movie_id',
            'date'     => 'required|date',
            'time'     => 'required',
            'seats'    => 'required',
            'total'    => 'required|numeric',
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


        $booking = Booking::create([
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'booking_date' => $request->date,
            'booking_time' => $request->time,
            'seat_num' => $request->seats,
            'total_price' => $request->total,
            'status' => 'PENDING',
        ]);

        return redirect()
            ->route('customer.payment', $booking->booking_id);

        // return redirect()->route('customer.index')
        // return redirect()->route('customer.payment', $booking)
        //     ->with('success', 'Booking confirmed!');
    }
}
