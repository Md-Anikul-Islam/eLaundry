




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Halsey Street Laundromat </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS, ERP, etc." name="description" />
    <meta content="Your Name" name="author" />
    <link rel="shortcut icon" href="{{ URL::to('assets/images/etl.png') }}">
    <script src="{{ asset('backend/js/config.js') }}"></script>
    <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
@php
    $siteSetting = DB::table('site_settings')->first();
@endphp
<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="row g-0 align-items-center">
                        <div class="col-lg-12">
                            <div class="d-flex flex-column h-100">
                                <div class="auth-brand p-12 d-flex justify-content-center align-items-center">
                                    @if (!empty($siteSetting->favicon))
                                        <a href="{{ url('/') }}" class="logo-dark">
                                            <img src="{{ asset($siteSetting ? $siteSetting->favicon : '') }}" alt="dark logo" height="150">
                                        </a>
                                    @endif
                                </div>

                                <div class="p-4 pt-0 my-auto">
                                    <h4 class="fs-20">Forgot your password</h4>
                                    <p class="text-muted mb-3">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                                    </p>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control" type="email" id="emailaddress"
                                                   name="email" value="{{ old('email') }}" required
                                                   placeholder="Enter your email">
                                        </div>

                                        <div class="mb-0 text-start">
                                            <button class="btn btn-soft-primary w-100" type="submit"><i
                                                    class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Email Password Reset Link</span> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer footer-alt fw-medium">
    <span class="text-dark">
        <script>document.write(new Date().getFullYear())</script> ©  Halsey Street Laundromat.
    </span>
</footer>

<script src="{{ asset('backend/js/vendor.min.js') }}"></script>
<script src="{{ asset('backend/js/app.min.js') }}"></script>
<script>
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const togglePasswordButton = document.getElementById('togglePassword');

    togglePasswordButton.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Change eye icon based on password visibility
        eyeIcon.classList.toggle('ri-eye-fill');
        eyeIcon.classList.toggle('ri-eye-off-fill');
    });
</script>
</body>

</html>


