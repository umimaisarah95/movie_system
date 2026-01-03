

@extends('layouts.admin-layout')

@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Edit Movie</h3>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- for update later --}}

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
                   value="Avengers: Endgame"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Director</label>
            <input type="text"
                   class="form-control"
                   name="director"
                   value="Anthony Russo"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Cast</label>
            <input type="text"
                   class="form-control"
                   name="cast"
                   value="Robert Downey Jr., Chris Evans"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea class="form-control"
                      name="description"
                      rows="4"
                      required>Superheroes fight to save the universe.</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Duration</label>
            <input type="time"
                   class="form-control"
                   name="duration"
                   value="03:01"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Promotion Start Date</label>
            <input type="date"
                   class="form-control"
                   name="promotion_start_date"
                   value="2026-01-01"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Promotion End Date</label>
            <input type="date"
                   class="form-control"
                   name="promotion_end_date"
                   value="2026-02-01"
                   required>
        </div>

        <button type="submit" class="btn btn-warning">
            Update Movie
        </button>

        <a href="#" class="btn btn-secondary ms-2">
            Cancel
        </a>
    </form>
</div>

@endsection
