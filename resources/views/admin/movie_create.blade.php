@extends('layouts.admin-layout')
@section('content')

<div class="container my-5">

    <!-- PAGE TITLE -->
    <div class="mb-4">
        <h3 class="fw-bold">Create Movie</h3>
        <p class="text-muted">Add a new movie to the system</p>
    </div>

    <!-- FORM CARD -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- IMAGE -->
                <div class="mb-4">
                    <label for="imagePath" class="form-label fw-semibold">Movie Image</label>
                    <input type="file" class="form-control" id="imagePath" name="image_path" required>
                </div>

                <!-- TITLE -->
                <div class="mb-3">
                    <label for="movieTitle" class="form-label fw-semibold">Movie Title</label>
                    <input type="text" class="form-control" id="movieTitle" name="movie_title"
                        placeholder="Enter movie title" required>
                </div>

                <!-- DIRECTOR & DURATION -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="director" class="form-label fw-semibold">Director</label>
                        <input type="text" class="form-control" id="director" name="director"
                            placeholder="Enter director name" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="duration" class="form-label fw-semibold">Duration (minutes)</label>
                        <input type="integer" class="form-control" id="duration" name="duration" required>
                    </div>
                </div>

                <!-- CAST -->
                <div class="mb-3">
                    <label for="cast" class="form-label fw-semibold">Cast</label>
                    <input type="text" class="form-control" id="cast" name="cast"
                        placeholder="Enter cast names" required>
                </div>

                <!-- DESCRIPTION -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control" id="description" name="description"
                        rows="4" placeholder="Enter movie description" required></textarea>
                </div>

                <!-- PROMOTION DATES -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label for="promotionStart" class="form-label fw-semibold">
                            Promotion Start Date
                        </label>
                        <input type="date" class="form-control" id="promotionStart"
                            name="promotion_start_date" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="promotionEnd" class="form-label fw-semibold">
                            Promotion End Date
                        </label>
                        <input type="date" class="form-control" id="promotionEnd"
                            name="promotion_end_date" required>
                    </div>
                </div>

                
                <div class="d-flex justify-content-end">

                    <a href="{{ route('admin.index') }}" class="btn btn-secondary me-2 btn-cancel">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4">
                        Add Movie
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection
