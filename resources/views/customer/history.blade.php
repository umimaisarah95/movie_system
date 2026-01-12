@extends('layouts.cust-layout')

@section('title', 'History')

@push('styles')

@if (session('success'))
    <div class="alert alert-success m-3">
        {{ session('success') }}
    </div>
@endif

<style>
    body {
        background-color: #f5f5f5;
    }

    .ticket-card {
        background-color: #2f2f2f;
        color: #fff;
        border-radius: 18px;
    }

    .ticket-divider {
        border-top: 1px dashed #666;
        margin: 24px 0;
    }
</style>
@endpush

@section('content')

<div class="container my-5">

    <!-- PAGE TITLE -->
    <h3 class="fw-bold mb-4">Purchase History</h3>

    <div class="row g-4 justify-content-center">

        @forelse ($bookings as $booking)
        <div class="col-md-6 col-lg-4">

            <!-- TICKET CARD -->
            <div class="card ticket-card shadow-lg p-3">

                <div class="card-body">

                    <!-- MOVIE TITLE -->
                    <h5 class="fw-bold mb-1">
                        {{ $booking->movie->movie_title ?? 'Unknown Movie' }}
                    </h5>
                    <small class="text-muted">
                        Booking #{{ $booking->booking_id }}
                    </small>

                    <!-- DIVIDER -->
                    <div class="ticket-divider"></div>

                    <!-- CONFIRMATION ID -->
                    <p class="text-center mb-4">
                        <small class="text-muted">Confirmation ID</small><br>
                        <span class="fw-bold fs-5">
                            #{{ $booking->booking_id }}
                        </span>
                    </p>

                    <!-- DATE & TIME -->
                    <div class="row mb-3">
                        <div class="col">
                            <small class="text-muted">Date</small>
                            <div class="fw-bold">
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('D d M Y') }}
                            </div>
                        </div>
                        <div class="col">
                            <small class="text-muted">Time</small>
                            <div class="fw-bold">
                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}
                            </div>
                        </div>
                    </div>

                    <!-- SEATS -->
                    <div class="mb-3">
                        <small class="text-muted">Seat(s)</small>
                        <div class="fw-bold">
                            {{ $booking->seat_num }}
                        </div>
                    </div>

                    <!-- TOTAL -->
                    <div class="mb-4">
                        <small class="text-muted">Total Paid</small>
                        <div class="fw-bold">
                            RM {{ number_format($booking->total_price, 2) }}
                        </div>
                    </div>

                    <!-- STATUS -->
                    <span class="badge 
                        {{ $booking->payment_status === 'PAID' ? 'bg-success' : 'bg-warning text-dark' }}
                        w-100 py-2">
                        {{ $booking->payment_status }}
                    </span>

                </div>
            </div>

        </div>
        @empty
        <div class="col-12 text-center text-muted">
            No booking history found.
        </div>
        @endforelse

    </div>

</div>

@endsection
