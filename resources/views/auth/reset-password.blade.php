


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Halsey Street Laundromat </title>
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
                                </div>
                                <div class="auth-brand p-12 d-flex justify-content-center align-items-center">
                                    @if (!empty($siteSetting->favicon))
                                        <a href="{{ url('/') }}" class="logo-dark">
                                            <img src="{{ asset($siteSetting ? $siteSetting->favicon : '') }}" alt="dark logo" height="150">
                                        </a>
                                    @endif
                                </div>

                                <div class="p-4 pt-0 my-auto">
                                    <h4 class="fs-20">Sign In</h4>
                                    <p class="text-muted mb-3">Enter your email address
                                    </p>
                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Email address</label>
                                            <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Password</label>
                                            <input class="form-control" type="password" name="password" placeholder="Enter new password" required>

                                        </div>

                                        <div class="mb-3">
                                            <label for="emailaddress" class="form-label">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm new password" required>
                                        </div>

                                        <div class="mb-0 text-start">
                                            <button class="btn btn-soft-primary w-100" type="submit"><i
                                                    class="ri-login-circle-fill me-1"></i> <span class="fw-bold">Reset Password</span> </button>
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
</body>

</html>


