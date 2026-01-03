@extends('layouts.admin-layout')

@section('title', 'Admin Profile')

@section('content')

<div class="container my-5">

    <!-- PAGE TITLE -->
    <h3 class="fw-bold mb-4">My Profile</h3>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body p-4">

                    <!-- PROFILE HEADER -->
                    <div class="text-center mb-4">
                        <div class="rounded-circle bg-secondary text-white d-inline-flex 
                                    align-items-center justify-content-center mb-3"
                             style="width: 90px; height: 90px; font-size: 32px;">
                            A
                        </div>
                        <h5 class="fw-bold mb-0">Iman Maleeq</h5>
                        <small class="text-muted">Admin</small>
                    </div>

                    <hr>

                    <!-- PROFILE FORM -->
                    <form>

                        <!-- NAME -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" value="Iman Maleeq">
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" value="iman@example.com">
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="text" class="form-control" value="012-3456789">
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" class="form-control" placeholder="********">
                        </div>

                        <!-- ACTION -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning fw-bold px-4">
                                Update Profile
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
