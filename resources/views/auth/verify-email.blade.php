<!doctype html>
<html lang="en">

<head>
    <title>Verify Email</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('User/assets/css/style.css') }}">

    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 22px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        .otp-input:focus {
            border-color: #96CA4A;
            box-shadow: 0 0 6px rgba(150, 202, 74, 0.6);
            outline: none;
        }

        .verify-btn {
            border-radius: 10px;
            background-color: #96CA4A !important;
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .verify-btn:hover {
            background-color: #83b542 !important;
            transform: scale(1.02);
        }

        .card-shadow {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .login-wb {
            color: #2e2e2e;
        }

        a.text-primary {
            color: #96CA4A !important;
        }

        a.text-primary:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .otp-input {
                width: 45px;
                height: 45px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <main class="vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Left Side -->
                <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                    <img src="{{ asset('User/assets/img/logo.png') }}" alt="Logo" class="mb-3" style="width:120px;">
                    <h1 class="fw-bold login-wb">Verify Your Email</h1>
                    <p class="text-muted">
                        We’ve sent a 5-digit verification code to your email. Enter it below to verify your account.
                    </p>
                </div>

                <!-- Right Side -->
                <div class="col-md-5">
                    <div class="card card-shadow p-4 rounded-4 bg-white">
                        <h3 class="text-center mb-4 text-dark">Email Verification</h3>

                        <form method="POST" action="{{ route('verify.otp') }}">
                            @csrf

                            <div class="d-flex justify-content-center mb-4">
                                <input type="text" maxlength="1" name="otp[]" class="otp-input" required autofocus>
                                <input type="text" maxlength="1" name="otp[]" class="otp-input" required>
                                <input type="text" maxlength="1" name="otp[]" class="otp-input" required>
                                <input type="text" maxlength="1" name="otp[]" class="otp-input" required>
                                <input type="text" maxlength="1" name="otp[]" class="otp-input" required>
                            </div>

                            @error('otp')
                                <div class="text-danger text-center mb-3">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary w-100 verify-btn">Verify Email</button>
                        </form>

                        <div class="text-center mt-3">
                            <small>Didn’t receive the code?
                                <a href="{{ route('resend.otp') }}" class="text-primary text-decoration-none">
                                    Resend OTP
                                </a>
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto move to next input
        const inputs = document.querySelectorAll(".otp-input");
        inputs.forEach((input, index) => {
            input.addEventListener("input", (e) => {
                if (e.target.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });
            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && !e.target.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>

    <!-- {{-- Debug (optional, remove in production) --}}
    @if (session('model_otp'))
        <div style="color: green; font-weight: bold; text-align:center;">
            DEBUG: OTP from session = {{ session('model_otp') }}
        </div>
    @else
        <div style="color: red; font-weight: bold; text-align:center;">
            DEBUG: No OTP found in session
        </div>
    @endif -->

</body>
</html>
