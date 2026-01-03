

@extends('layouts.admin-layout')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Edit Movie</h3>

    <form action="{{ route('movie.update', $movie->movie_id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-semibold">Movie Image</label>
            <input type="file" class="form-control" name="image_path">
            <small class="text-muted">Leave empty to keep current image</small>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Movie Title</label>
            <input type="text"
                   class="form-control"
                   name="movie_title"
                   value="{{ old('movie_title', $movie->movie_title) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Director</label>
            <input type="text"
                   class="form-control"
                   name="director"
                   value="{{ old('director', $movie->director) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Cast</label>
            <input type="text"
                   class="form-control"
                   name="cast"
                   value="{{ old('cast', $movie->cast) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea class="form-control"
                      name="description"
                      rows="4"
                      name="{{old ('description', $movie->description) }}"
                        required>{{ $movie->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Duration</label>
            <input type="integer"
                   class="form-control"
                   name="duration"
                   value="{{ old('duration', $movie->duration) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Promotion Start Date</label>
            <input type="date"
                   class="form-control"
                   name="promotion_start_date"
                   value="{{ old('promotion_start_date', $movie->promotion_start_date) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Promotion End Date</label>
            <input type="date"
                   class="form-control"
                   name="promotion_end_date"
                   value="{{ old('promotion_end_date', $movie->promotion_end_date) }}"
                   required>
        </div>

        <button type="submit" class="btn btn-warning">
            Update Movie
        </button>

        <a href="{{ route('admin.index') }}" class="btn btn-secondary ms-2">
            Cancel
        </a>
    </form>
</div>

@endsection
