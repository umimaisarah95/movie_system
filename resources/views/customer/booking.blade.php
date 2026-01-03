@extends('layouts.cust-layout')

@section('title', 'Booking')

@section('content')

<div class="container my-5">

    <!-- PAGE TITLE -->
    <h3 class="fw-bold mb-4">Movie Booking</h3>

    <div class="row g-4">

        <!-- LEFT: MOVIE INFO -->
        <div class="col-md-5">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4">

                    <img src="{{ asset('images/') }}" class="img-fluid rounded mb-3" alt="Movie">

                    <h5 class="fw-bold">Movie Name</h5>
                    <p class="text-muted mb-1">Action • 2h 15m</p>
                    <p class="mb-0">Rating: ⭐ 4.8</p>

                </div>
            </div>
        </div>

        <!-- RIGHT: BOOKING FORM -->
        <div class="col-md-7">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4">

                    <form>

                        <!-- DATE -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" class="form-control">
                        </div>

                        <!-- TIME -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Time</label>
                            <select class="form-select">
                                <option>10:00 AM</option>
                                <option>1:30 PM</option>
                                <option>3:25 PM</option>
                                <option>8:00 PM</option>
                            </select>
                        </div>

                        <!-- SEATS -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Select Seats</label>
                            <div class="d-flex flex-wrap gap-2">
                                @for($i=1; $i<=10; $i++)
                                    <button type="button" class="btn btn-outline-dark btn-sm">
                                        A{{ $i }}
                                    </button>
                                @endfor
                            </div>
                        </div>

                        <!-- TICKET TYPE -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ticket Type</label>
                            <select class="form-select">
                                <option>Adult</option>
                                <option>Student</option>
                                <option>Child</option>
                            </select>
                        </div>

                        <!-- SUMMARY -->
                        <div class="border-top pt-3 mb-4">
                            <p class="mb-1">Seats: <strong>A1, A2</strong></p>
                            <p class="mb-1">Price per ticket: RM12</p>
                            <h6 class="fw-bold">Total: RM24</h6>
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit" class="btn  w-100 fw-bold btn-book">
                            Confirm Booking
                        </button>

                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
