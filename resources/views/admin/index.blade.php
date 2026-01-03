
@extends('layouts.admin-layout')

@section('content') 

<div class="container mt-4">

    @if (session('success'))
    <div class="alert alert-success" role="alert">  
    <div>{{ session('success') }}</div>
</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <h2>Movie List</h2>
        <a href="{{ route('admin.movie_create') }}" class="btn btn-primary">Add Movie</a>
    </div>

    <table class="table table-bordered table-striped table-secondary">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Movie Image</th>
                <th>Movie Title</th>
                <th>Director</th>
                <th>Cast</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Promotion Start Date</th>
                <th>Promotion End Date</th>
                <th width="180">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->movie_id }}</td>
                <td><img src="{{ Storage::url($movie->image_path) }}" class="card-img-top" alt="Movie" style="width: 100px; height: auto;"></td>
                <td>{{ $movie->movie_title }}</td>
                <td>{{ $movie->director }}</td>
                <td>{{ $movie->cast }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->duration }} mins</td>
                <td>{{ $movie->promotion_start_date }}</td>
                <td>{{ $movie->promotion_end_date }}</td>
                <td>
                    <a href="{{ route('movie.edit', $movie) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('movie.destroy', $movie) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
