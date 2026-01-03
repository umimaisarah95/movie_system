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
        <a href="#" class="btn btn-outline-dark btn-sm">View All</a>
    </div>

    <div class="row g-4">
        @for ($i = 0; $i < 6; $i++)
        <div class="col-md-4 col-lg-3">
            <div class="card movie-card h-100">
                <img src="https://via.placeholder.com/300x400" class="card-img-top" alt="Movie">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Movie Title</h6>
                    <small class="text-muted">Action • 2h 15m</small>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="#" class="btn btn-dark w-100">View Details</a>
                </div>
            </div>
        </div>
        @endfor
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
