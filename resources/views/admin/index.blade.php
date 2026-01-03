<!--

LATER REFER THIS CODE FOR BACK END LOGIC!
Refer coding studentdb. 
-->


@extends('layouts.admin-layout')

@section('content') 

<div class="container mt-4">

    <!-- Success alert (static for design) -->
    <div class="alert alert-success">Movie added successfully!</div>

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
            <!-- Dummy movie 1 -->
            <tr>
                <td>1</td>
                <td><img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Movie"></td>
                <td>Avengers: Endgame</td>
                <td>Anthony Russo</td>
                <td>Robert Downey Jr., Chris Evans</td>
                <td>Superheroes fight to save the universe.</td>
                <td>03:01:00</td>
                <td>2026-01-01</td>
                <td>2026-02-01</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="alert('Delete movie?')">Delete</button>
                </td>
            </tr>

            <!-- Dummy movie 2 -->
            <tr>
                <td>2</td>
                <td><img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Movie"></td>
                <td>Spider-Man: No Way Home</td>
                <td>Jon Watts</td>
                <td>Tom Holland, Zendaya</td>
                <td>Spider-Man faces multiverse villains.</td>
                <td>02:28:00</td>
                <td>2026-01-10</td>
                <td>2026-02-15</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="alert('Delete movie?')">Delete</button>
                </td>
            </tr>

            <!-- Add more dummy rows as needed -->
        </tbody>
    </table>
</div>

@endsection
