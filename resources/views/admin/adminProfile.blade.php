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
                            {{ strtoupper(substr(Auth::user()->profile->fullname ?? Auth::user()->name, 0, 1)) }}
                        </div>

                        <h5 class="fw-bold mb-0">
                            {{ Auth::user()->profile->fullname ?? Auth::user()->name }}
                        </h5>

                        <small class="text-muted">Admin</small>
                    </div>

                    <hr>

                    <!-- SUCCESS MESSAGE -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- PROFILE FORM -->
                    <form method="POST" action="{{ route('admin.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- FULL NAME -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input 
                                type="text"
                                name="fullname"
                                class="form-control @error('fullname') is-invalid @enderror"
                                value="{{ old('fullname', Auth::user()->profile->fullname ?? Auth::user()->name) }}"
                                required>

                            @error('fullname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input 
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', Auth::user()->email) }}"
                                required>

                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PHONE -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input 
                                type="text"
                                name="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', Auth::user()->profile->phone ?? '') }}">

                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- GENDER -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Gender</label>
                            <select 
                                name="gender"
                                class="form-select @error('gender') is-invalid @enderror">
                                <option value="">-- Select Gender --</option>

                                <option value="Male"
                                    {{ old('gender', Auth::user()->profile->gender ?? '') === 'Male' ? 'selected' : '' }}>
                                    Male
                                </option>

                                <option value="Female"
                                    {{ old('gender', Auth::user()->profile->gender ?? '') === 'Female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>

                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- BIRTHDATE -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Birthdate</label>
                            <input 
                                type="date"
                                name="birthdate"
                                class="form-control @error('birthdate') is-invalid @enderror"
                                value="{{ old('birthdate', Auth::user()->profile->birthdate ?? '') }}">

                            @error('birthdate')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
