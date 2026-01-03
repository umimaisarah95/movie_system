@extends('layouts.admin-layout')
@section('content')

<div class="container">
<form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>

    <div class="mb-3">
        <label for="imagePath" class="form-label, fw-semibold">Movie Image</label>
        <input type="file" class="form-control" id="imagePath" name="image_path" required>
    </div>

    <div class="mb-3">
        <label for="movieTitle" class="form-label, fw-semibold">Movie Title</label>
        <input type="text" class="form-control" id="movieTitle" name="movie_title" placeholder="Enter movie title" required>
    </div>

    <div class="mb-3">
        <label for="director" class="form-label, fw-semibold">Director</label>
        <input type="text" class="form-control" id="director" name="director" placeholder="Enter director name" required>
    </div>

    <div class="mb-3">
        <label for="cast" class="form-label, fw-semibold">Cast</label>
        <input type="text" class="form-control" id="cast" name="cast" placeholder="Enter cast names" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label, fw-semibold">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter movie description" required></textarea>
    </div>

    <div class="mb-3">
        <label for="duration" class="form-label, fw-semibold">Duration</label>
        <input type="integer" class="form-control" id="duration" name="duration" required>
    </div>

    <div class="mb-3">
        <label for="promotionStart" class="form-label, fw-semibold">Promotion Start Date</label>
        <input type="date" class="form-control" id="promotionStart" name="promotion_start_date" required>
    </div>

    <div class="mb-3">
        <label for="promotionEnd" class="form-label, fw-semibold">Promotion End Date</label>
        <input type="date" class="form-control" id="promotionEnd" name="promotion_end_date" required>
    </div>

    <button type="submit" class="btn btn-primary">Add New Movie</button>
</form>
</div>
@endsection

