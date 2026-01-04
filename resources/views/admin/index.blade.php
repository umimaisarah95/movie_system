@extends('layouts.admin-layout')

@section('content')

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Movie Management</h2>
        <a href="{{ route('admin.movie_create') }}" class="btn">
            Add Movie
        </a>
    </div>

    <div class="movie-grid">

        @foreach ($movies as $movie)
        <div class="movie-card-item">

            <img src="{{ Storage::url($movie->image_path) }}" alt="Movie Poster">

            <div class="movie-card-body">

                <div class="movie-title">
                    {{ $movie->movie_title }}
                </div>

                <div class="movie-meta mb-2">
                    Duration: {{ $movie->duration }} mins
                </div>

                <!-- <div class="movie-meta">
                    {{ $movie->promotion_start_date }} → {{ $movie->promotion_end_date }}
                </div> -->

                <div class="movie-actions mt-3">
                    <!-- DETAILS -->
                    <a href="{{ route('admin.movie.details', $movie->movie_id) }}" class="btn btn-sm">
                        Details
                    </a>

                    <!-- EDIT -->
                    <a href="{{ route('movie.edit', $movie) }}" class="btn btn-sm">
                        Edit
                    </a>
                </div>

                <form action="{{ route('movie.destroy', $movie) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="btn btn-sm btn-danger w-100 btn-delete"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>

            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
