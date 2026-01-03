<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Movie System')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
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
            color: #ac9993ff !important;
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
        .movie-card {
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .movie-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
        }
        .btn {
            background-color: #5D4037;
            color: #fff;
        }
        .btn:hover {
            background-color: #ac9993ff;
            color: #fff;
        }

        .seat-hall {
            justify-content: center;
        }

        .seat-row {
            display: grid;
            grid-template-columns: repeat(10, 42px);
            gap: 8px;
        }

        .seat-btn {
            width: 42px;
            height: 42px;
            padding: 0;
            font-size: 12px;
            font-weight: 600;
            border-radius: 6px;
        }

        .seat-btn.btn-warning {
            background-color: #ac9993ff;
            border-color: #ac9993ff;
            color: #000;
        }

        .screen-label {
            width: 100%;
            max-width: 480px;
            text-align: center;
            padding: 8px 0;
            margin-bottom: 14px;
            font-weight: 700;
            letter-spacing: 3px;
            background: linear-gradient(to right, transparent, #444, transparent);
            color: #fff;
            border-radius: 4px;
            font-size: 13px;
        }



    </style>

</head>
<body>
    
<!-- TOP NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom shadow-sm cust-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                {{ config('Movie System', 'Movie') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#custNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="custNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customer') }}">Movie</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('/customer.booking') }}">Booking</a>
                    </li> -->

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/history') }}">History</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
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
