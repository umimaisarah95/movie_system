@extends('layouts.cust-layout')

@section('title', 'Payment')

@section('content')

<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 500px;">
        <div class="card-body p-4 text-center">

            <h4 class="fw-bold mb-3">Payment Summary</h4>

            <p class="mb-1">
                <strong>Booking ID:</strong> {{ $booking->booking_id }}
            </p>

            <p class="mb-1">
                <strong>Total Amount:</strong> RM {{ $booking->total_price }}
            </p>

            <p class="text-muted mt-3">
                <strong>Scan QR to Pay</strong>
            </p>

            <img src="{{ asset('images/qr-payment.png') }}" 
                alt="QR Payment"
                class="img-fluid mx-auto d-block"
                style="max-width: 220px;">

            <form method="POST" action="{{ route('customer.payment.confirm', $booking->booking_id) }}">
                @csrf
                <button type="submit" class="btn btn-success w-100 mt-3">
                    Pay Now
                </button>
            </form>

            <a href="{{ route('customer.index') }}" class="btn btn-outline-secondary w-100 mt-2">
                Cancel
            </a>

        </div>
    </div>
</div>

@endsection
