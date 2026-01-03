@extends('layouts.cust-layout')

@section('title', 'Booking')

@section('content')

<div class="container my-5">

    <h3 class="fw-bold mb-4">Movie Booking</h3>

    <div class="row g-4">
        <!-- LEFT: MOVIE INFO -->
        <div class="col-md-5">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4 text-center">
                    
                    <img 
                        src="#" 
                        class="img-fluid rounded mb-3"
                        alt="{{ $movie->movie_title }}">

                    <h5 class="fw-bold">{{ $movie->movie_title }}</h5>

                    <p class="text-muted mb-1">
                        @php
                            $hours = intdiv($movie->duration, 60);
                            $minutes = $movie->duration % 60;
                        @endphp
                        Duration:
                        {{ $hours > 0 ? $hours . 'h ' : '' }}{{ $minutes }}m
                    </p>

                </div>
            </div>
        </div>

        <!-- RIGHT: BOOKING FORM -->
        <div class="col-md-7">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf

                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <input type="hidden" name="total" id="totalPrice" value="24">
                        <input type="hidden" name="seats" id="selectedSeats">

                        <!-- DATE -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <!-- TIME -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Time</label>
                            <select name="time" class="form-select" required>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="1:30 PM">1:30 PM</option>
                                <option value="3:25 PM">3:25 PM</option>
                                <option value="8:00 PM">8:00 PM</option>
                            </select>
                        </div>

                        <!-- SEATS -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Select Seats</label>
                            <div class="d-flex flex-wrap gap-2">
                                @for($i=1; $i<=10; $i++)
                                    <button 
                                        type="button"
                                        class="btn btn-outline-dark btn-sm seat-btn"
                                        data-seat="A{{ $i }}">
                                        A{{ $i }}
                                    </button>
                                @endfor
                            </div>
                        </div>

                        <!-- SUMMARY -->
                        <div class="border-top pt-3 mb-4">
                            <p class="mb-1">
                                Seats: <strong id="seatText">None</strong>
                            </p>
                            <p class="mb-1">Price per ticket: RM12</p>
                            <h6 class="fw-bold">
                                Total: RM<span id="totalText">0</span>
                            </h6>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold">
                            Confirm Booking
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<!-- SEAT SELECTION SCRIPT -->
<script>
    const seatButtons = document.querySelectorAll('.seat-btn');
    const selectedSeats = [];
    const seatText = document.getElementById('seatText');
    const totalText = document.getElementById('totalText');
    const seatInput = document.getElementById('selectedSeats');
    const totalInput = document.getElementById('totalPrice');
    const pricePerSeat = 12;

    seatButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const seat = btn.dataset.seat;

            if (selectedSeats.includes(seat)) {
                selectedSeats.splice(selectedSeats.indexOf(seat), 1);
                btn.classList.remove('btn-warning');
                btn.classList.add('btn-outline-dark');
            } else {
                selectedSeats.push(seat);
                btn.classList.remove('btn-outline-dark');
                btn.classList.add('btn-warning');
            }

            seatText.innerText = selectedSeats.join(', ') || 'None';
            const total = selectedSeats.length * pricePerSeat;
            totalText.innerText = total;
            seatInput.value = selectedSeats.join(',');
            totalInput.value = total;
        });
    });
</script>
@endsection
