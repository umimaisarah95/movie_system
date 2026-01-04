@extends('layouts.admin-layout')

@section('content')

<div class="container mt-4">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Movie Details</h2>

        <div>
            <a href="{{ route('movie.edit', $movie) }}" class="btn btn-warning me-2">
                Edit Movie
            </a>

            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                Back to Movie List
            </a>
        </div>
    </div>

    <!-- MAIN CARD -->
    <div class="card shadow-sm border-0">
        <div class="row g-0">

            <!-- POSTER -->
            <div class="col-md-4">
                <img 
                    src="{{ Storage::url($movie->image_path) }}" 
                    alt="Movie Poster"
                    class="img-fluid rounded-start"
                    style="height: 100%; object-fit: cover;"
                >
            </div>

            <!-- DETAILS -->
            <div class="col-md-8">
                <div class="card-body p-4">

                    <h3 class="fw-bold mb-3">
                        {{ $movie->movie_title }}
                    </h3>

                    <!-- META INFO -->
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <strong>Director:</strong><br>
                            {{ $movie->director }}
                        </div>

                        <div class="col-md-6 mb-2">
                            <strong>Duration:</strong><br>
                            @php
                                $hours = intdiv($movie->duration, 60);
                                $minutes = $movie->duration % 60;
                            @endphp

                            Duration:
                            {{ $hours > 0 ? $hours . 'h ' : '' }}
                            {{ $minutes }}m
                        </div>
                    </div>

                    <div class="mb-3">
                        <strong>Cast:</strong>
                        <div class="mt-1 text-muted">
                            {{ $movie->cast }}
                        </div>
                    </div>

                    <div class="mb-4">
                        <strong>Description:</strong>
                        <p class="mt-2 text-muted" style="line-height: 1.6;">
                            {{ $movie->description }}
                        </p>
                    </div>

                    <!-- PROMOTION INFO -->
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <span class="badge bg-success px-3 py-2">
                                Promo Start: {{ $movie->promotion_start_date }}
                            </span>
                        </div>

                        <div class="col-md-6 mb-2">
                            <span class="badge bg-danger px-3 py-2">
                                Promo End: {{ $movie->promotion_end_date }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- DELETE BUTTON -->
    <div class="mt-4 text-end">
        <form action="{{ route('movie.destroy', $movie) }}" method="POST">
            @csrf
            @method('DELETE')
            <button 
                type="submit" 
                class="btn btn-danger btn-delete"
                onclick="return confirm('Are you sure you want to delete this movie?')">
                Delete Movie
            </button>
        </form>
    </div>

</div>

@endsection
