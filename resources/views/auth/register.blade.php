<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Movie System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .btn-register{
            background-color: #5D4037;
            color: #fff;
        }
        .form-control{
            background-color: ghostwhite;
        }

    </style>
</head>
<body>

<div class="container-fluid min-vh-100">
    <div class="row min-vh-100 g-0">

        <!-- LEFT IMAGE -->
        <div class="col-md-7 d-none d-md-block"
             style="
                background-image: url('{{ asset('images/movie.png') }}');
                background-size: cover;
                background-position: center;
             ">
        </div>

        <!-- RIGHT REGISTER -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
            <div class="card shadow-lg w-75 rounded-4 border-0">
                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">Register</h4>

                    <form method="POST" action="#">
                        @csrf

                        <!-- USER TYPE -->
                        <div class="mb-3">
                            <label class="form-label">Register As</label>
                            <select class="form-select" name="user_type" required>
                                <option value="customer" selected>Customer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- NAME -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name" required>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Enter password" required>
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm password" required>
                        </div>

                        <!-- REGISTER BUTTON -->
                        <button type="submit" class="btn w-100 fw-bold btn-register">
                            Register
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <small>
                            Already have an account?
                            <a href="{{ url('/login') }}" class="fw-bold">Login</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
