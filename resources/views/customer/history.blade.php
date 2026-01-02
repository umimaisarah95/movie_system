@extends('layouts.cust-layout')

@section('title', 'History')

@push('styles')
<style>
    body {
        background-color: #f5f5f5;
    }

    .ticket-card {
        background-color: #2f2f2f;
        color: #fff;
        border-radius: 18px;
    }

    .ticket-divider {
        border-top: 1px dashed #666;
        margin: 24px 0;
    }
</style>
@endpush

@section('content')

<div class="container my-5">

    <!-- PAGE TITLE -->
    <h3 class="fw-bold mb-4">Purchase History</h3>

    <div class="row g-4 justify-content-center">

        @for ($i = 1; $i <= 3; $i++)
        <div class="col-md-6 col-lg-4">

            <!-- TICKET CARD -->
            <div class="card ticket-card shadow-lg p-3">

                <div class="card-body">

                    <!-- MOVIE TITLE -->
                    <h5 class="fw-bold mb-1">Movie Name</h5>
                    <small class="text-muted">P12</small>

                    <!-- DIVIDER -->
                    <div class="ticket-divider"></div>

                    <!-- CONFIRMATION ID -->
                    <p class="text-center mb-4">
                        <small class="text-muted">Confirmation ID</small><br>
                        <span class="fw-bold fs-5">#4778{{ $i }}</span>
                    </p>

                    <!-- CINEMA -->
                    <div class="mb-3">
                        <small class="text-muted">Cinema</small>
                        <div class="fw-bold">Kuala Lumpur – MyTown</div>
                    </div>

                    <!-- DATE & TIME -->
                    <div class="row mb-3">
                        <div class="col">
                            <small class="text-muted">Date</small>
                            <div class="fw-bold">Thu 25 Dec</div>
                        </div>
                        <div class="col">
                            <small class="text-muted">Time</small>
                            <div class="fw-bold">3:25 PM</div>
                        </div>
                    </div>

                    <!-- HALL -->
                    <div class="mb-3">
                        <small class="text-muted">Hall</small>
                        <div class="fw-bold">HALL 1</div>
                    </div>

                    <!-- TICKET TYPE -->
                    <div class="mb-3">
                        <small class="text-muted">Ticket Type</small>
                        <div class="fw-bold">Adult-MBR : 2</div>
                    </div>

                    <!-- SEATS -->
                    <div class="mb-3">
                        <small class="text-muted">Seat(s)</small>
                        <div class="fw-bold">A10, A11</div>
                    </div>

                    <!-- E-COMBO -->
                    <div class="mb-4">
                        <small class="text-muted">e-Combo</small>
                        <div class="fw-bold">N/A</div>
                    </div>

                    <!-- STATUS -->
                    <span class="badge bg-success w-100 py-2">PAID</span>

                </div>
            </div>

        </div>
        @endfor

    </div>

</div>

@endsection
