<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .btn {
            background-color: #5D4037;
            color: #fff;
        }

        .btn:hover {
            background-color: #ac9993ff;
            color: #fff;
        }

        .btn-delete:hover{
            background-color: #e28690ff;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #fff;    
        }

        .cust-navbar {
            background-color: #5D4037;
        }

        .navbar-brand,
        .nav-link {
            color: #fff !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ffcc80 !important;
        }

        /* Hero */
        .hero {
            background: linear-gradient(
                rgba(0,0,0,.6),
                rgba(0,0,0,.6)
            ), url('https://images.unsplash.com/photo-1581905764498-8dcb9c0f7b33');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 120px 0;
        }

        /* Movie card hover */
        /* .movie-card {
            transition: transform .3s ease, box-shadow .3s ease;
        } */

        .movie-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
        }

        .movie-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            padding: 24px;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background: #212529;
            z-index: 10;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .movie-img {
            width: 90px;
            height: 130px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .desc-box {
            max-height: 80px;
            overflow: hidden;
            position: relative;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .desc-box:hover {
            overflow-y: auto;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f3f5;
            transition: 0.2s;
        }

        .action-btns a,
        .action-btns button {
            margin-bottom: 6px;
            width: 80px;
        }

        .badge-date {
            font-size: 0.85rem;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 24px;
        }

        .movie-card-item {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .movie-card-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
        }

        .movie-card-item img {
            width: 100%;
            height: 320px;
            object-fit: cover;
        }

        .movie-card-body {
            padding: 16px;
        }

        .movie-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 6px;
        }

        .movie-meta {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .movie-actions {
            display: flex;
            gap: 8px;
            margin-top: 14px;
        }

        .movie-actions a,
        .movie-actions button {
            flex: 1;
        }

    </style>

</head>
<body>
    
<!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm cust-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                {{ config('Movie System', 'Admin Dashboard') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#custNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="custNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Manage Movie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.booking') }}">Manage Booking</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile') }}">Profile</a>
                    </li>

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">My Account</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item text-danger">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                   
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">

                <div class="col-md-6">
                    <h5 class="fw-bold">{{ config('Movie System') }}</h5>
                    <p class="mb-0">Customer-friendly platform built with Laravel.</p>
                </div>

                <div class="col-md-6 text-md-end">
                    <p class="mb-0">&copy; {{ date('Y') }} All rights reserved.</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional page-specific JS -->
    @stack('scripts')

</body>

</html>
