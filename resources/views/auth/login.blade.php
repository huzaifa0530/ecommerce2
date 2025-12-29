<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/style.css') }}">
</head>

<body>
    <main class="vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Left Side -->
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    <img src="{{ asset('User/assets/img/logo.jpeg') }}" alt="Logo" class="mb-3" style="width:120px;">
                    <h1 class="fw-bold login-wb">Welcome Back!</h1>
                    <p class="text-muted">
                        Please log in to continue accessing your account and manage your dashboard.
                    </p>
                </div>

                <!-- Right Side: Login Card -->
                <div class="col-md-5">
                    <div class="card card-shadow p-4 rounded-4">
                        <h3 class="text-center mb-4">Login</h3>

                        <!-- Laravel Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autofocus autocomplete="username"
                                    placeholder="Enter your email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    required autocomplete="current-password"
                                    placeholder="Enter your password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div> -->

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary w-100 login-btn">Continue</button>
                        </form>

                        <!-- Forgot Password + Sign up -->
                        <!-- <div class="text-center mt-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="d-block mb-2">Forgot your password?</a>
                            @endif
                            <small>Don’t have an account? <a href="{{ route('register') }}" class="signup-alternative">Sign up</a></small>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
