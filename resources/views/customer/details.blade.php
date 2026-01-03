@extends('layouts.cust-layout')
@section('title', $movie->movie_title)

@section('content')

<div class="container my-5">

    <div class="row g-5">

        <!-- MOVIE POSTER -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <img 
                    src="{{ asset('storage/' . $movie->image_path) }}" 
                    alt="{{ $movie->movie_title }}"
                    class="img-fluid rounded"
                >
            </div>
        </div>

        <!-- MOVIE DETAILS -->
        <div class="col-md-8">

            <!-- TITLE -->
            <h2 class="fw-bold mb-2">
                {{ $movie->movie_title }}
            </h2>

            <!-- DURATION -->
            <p class="text-muted mb-3">
                @php
                    $hours = intdiv($movie->duration, 60);
                    $minutes = $movie->duration % 60;
                @endphp

                Duration:
                {{ $hours > 0 ? $hours . 'h ' : '' }}
                {{ $minutes }}m
            </p>

            <!-- DIRECTOR -->
            <div class="mb-3">
                <h6 class="fw-semibold mb-1">Director</h6>
                <p class="mb-0 text-muted">
                    {{ $movie->director }}
                </p>
            </div>

            <!-- CAST -->
            <div class="mb-3">
                <h6 class="fw-semibold mb-1">Cast</h6>
                <p class="mb-0 text-muted">
                    {{ $movie->cast }}
                </p>
            </div>

            <!-- DESCRIPTION -->
            <div class="mb-4">
                <h6 class="fw-semibold mb-1">Description</h6>
                <p class="text-muted">
                    {{ $movie->description }}
                </p>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="d-flex gap-3">
                <a href="{{ url('/customer/booking') }}" class="btn btn-warning px-4">
                    Book Now
                </a>

                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    Back
                </a>
            </div>

        </div>

    </div>

</div>

@endsection
