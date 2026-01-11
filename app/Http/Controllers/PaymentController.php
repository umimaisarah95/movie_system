<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class PaymentController extends Controller
{
    // Fake payment page
    public function show(Booking $booking)
    {
        return view('customer.payment', compact('booking'));
    }

    // Confirm fake payment
    public function confirm(Booking $booking)
    {
        
        $booking->update([
            'payment_status' => 'PAID',
        ]);

        // dd($booking->payment_status);


        return redirect()->route('customer.history')
            ->with('success', 'Payment successful! Booking confirmed.');
    }
}

