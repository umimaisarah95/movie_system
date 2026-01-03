<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Movie System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .login-btn {
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

        <!-- RIGHT LOGIN -->
        <div class="col-md-5 d-flex align-items-center justify-content-center bg-light">
            <div class="card shadow w-75 rounded-4">
                <div class="card-body p-4">

                    <h4 class="fw-bold text-center mb-4">Login</h4>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- USER TYPE -->
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="user_type" required>
                                <option value="customer" name="customer" selected>Customer</option>
                                <option value="admin" name="admin">Admin</option>
                            </select>
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <label class="form-label" >email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <label class="form-label" >Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            <!-- <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword()"> -->
                                <i class="bi bi-eye" id="eyeIcon"></i>
                            <!-- </span> -->
                        </div>

                        <!-- REMEMBER -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember me
                            </label>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit" class="btn w-100 fw-bold login-btn">
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <small>
                            Don’t have an account?
                            <a href="{{ url('/register') }}">Register</a>
                        </small>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    }
</script>


</body>
</html>
