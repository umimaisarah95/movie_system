<!--
LATER REFER THIS CODE FOR BACK END LOGIC!
Refer coding studentdb.
-->

@extends('layouts.admin-layout')

@section('content') 

<div class="container mt-4">

    <!-- Success alert (static for design) -->
     @if (session('success'))
    <div class="alert alert-success" role="alert">  
    <div>{{ session('success') }}</div>
    </div>
    @endif
    <h2 class="mb-4">Booking List</h2>
    <table class="table table-bordered table-striped table-secondary">
        <thead class="table-dark">
            <tr>
                <th>Booking ID</th>
                <th>User ID</th>
                <th>Customer Name</th>
                <th>Movie ID</th>
                <th>Movie Title</th>
                <th>Seat Number</th>
                <th>Booking Date</th>
                <th>Booking Time</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->booking_id }}</td>
                <td>{{ $booking->user_id }}</td>
                <td>{{ $booking->user->name ?? 'N/A' }}</td> <!-- Assuming user has a 'name' field -->
                <td>{{ $booking->movie_id }}</td>
                <td>{{ $booking->movie->movie_title ?? 'N/A' }}</td>
                <td>{{ $booking->seat_num }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->booking_time }}</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <form action="#" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete booking?')">
                                Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
