@extends('layouts.admin-layout')

@section('content')

<div class="container my-5">

    <h3 class="fw-bold mb-4">Add Showtime</h3>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">

            <form method="POST" action="#">
                @csrf

                <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">

                <!-- MOVIE INFO -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Movie</label>
                    <input type="text" class="form-control" value="{{ $movie->movie_title }}" disabled>
                </div>

                <!-- DATE -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Show Date</label>
                    <input 
                        type="date"
                        name="show_date"
                        class="form-control"
                        required
                        min="{{ $movie->promotion_start_date }}"
                        max="{{ $movie->promotion_end_date }}"
                    >
                </div>

                <!-- TIME -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Show Time</label>
                    <input 
                        type="time"
                        name="show_time"
                        class="form-control"
                        required
                    >
                </div>

                <!-- ACTIONS -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.movie.details', $movie->movie_id) }}" class="btn">
                        Cancel
                    </a>

                    <button type="submit" class="btn">
                        Add Showtime
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
