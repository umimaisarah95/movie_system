@extends('layouts.cust-layout')
@section('title', 'Movies')
@section('content')



<!-- HERO SECTION -->
<section class="hero text-center">
    <div class="container">
        <h1 class="display-5 fw-bold">Book Your Movie Tickets</h1>
        <p class="lead mt-3">Latest movies • Easy booking • Best seats</p>
        <!-- <a href="#" class="btn btn-warning btn-lg mt-4 px-5">Browse Movies</a> -->
    </div>
</section>

<!-- MOVIE LIST -->
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Now Showing</h3>
        <!-- <a href="#" class="btn btn-outline-dark btn-sm">View All</a> -->
    </div>

    <div class="row g-4">
        @foreach ($movies as $movie)


    <div class="col-md-4 col-lg-3">
        <div class="card">
            <img src="{{ asset('storage/' . $movie->image_path) }}" alt="{{ $movie->movie_title }}">
            <div class="card-body">
                <h4>{{ $movie->movie_title }}</h4>
                <small class="text-muted">
                @php
                    $hours = intdiv($movie->duration, 60);
                    $minutes = $movie->duration % 60;
                @endphp

                Duration:
                {{ $hours > 0 ? $hours . 'h ' : '' }}
                {{ $minutes }}m
                </small>
                <a href="{{ route('customer.details', $movie->movie_id) }}" class="btn btn-outline-primary btn-sm w-100">
                    View Details
                </a>
            </div>
        </div>
    </div>
@endforeach

    </div>
</div>

</div> {{-- end row --}}

<!-- TOP 5 MOVIES -->
<div class="container my-5">
    <h3 class="fw-bold mb-4">Top 5 Movies</h3>

    <table class="table table-borderless align-middle">
        <tbody>
            @for ($i = 1; $i <= 5; $i++)
            <tr class="border-bottom">
                
                <!-- RANK -->
                <td class="fw-bold fs-4 text-warning" style="width: 80px;">
                    {{ $i }}
                </td>

                <!-- MOVIE TITLE -->
                <td class="fw-bold">
                    Movie Title
                </td>

                <!-- ACTION -->
                <td class="text-end" style="width: 150px;">
                    <a href="{{ url('/booking') }}" class="btn  px-4">
                        Book
                    </a>
                </td>

            </tr>
            @endfor
        </tbody>
    </table>
</div>



@endsection
