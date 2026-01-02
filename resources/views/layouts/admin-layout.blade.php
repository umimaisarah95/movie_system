<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Admin Dashboard" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
            position: fixed;
            width: 250px;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center">Admin Dashboard</h4>
    </div>

    <div class="content">
        <h2 class="text-center">Admin Dashboard</h2>

        <div class="row mt-4">
            <!-- Manage Movies Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Movies</h5>
                        <p class="card-text">Add , edit and remove movies</p>
                        <a href="{{url('managemovie')}}" class="btn btn-primary">Go to Movies</a>
                    </div>
                </div>
            </div>

           

            <!-- Manage Bookings Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Bookings</h5>
                        <p class="card-text">View and manage customer bookings.</p>
                        <a href="{{url('managebooking')}}" class="btn btn-primary">Go to Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Movie Booking System. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>