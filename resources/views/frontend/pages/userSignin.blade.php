@extends('frontend.layout')
@section('content')
    <div class="app-container py-5">
        <div class="d-flex align-items-center justify-content-center min-vh-100">
            <div class="d-flex flex-column justify-content-center align-items-center gap-3 w-100 p-4 border rounded-5 shadow-sm">
                <form class="w-100 app-form"  method="post" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3 w-100">
                            <div class="logo">
                                <img src="{{URL::TO('frontend/images/logo/logo-1.webp')}}" alt="logo">
                            </div>
                            <h2>Sign In</h2>
                            <p class="text-capitalize">Please enter your details</p>
                            <div class="mb-3 position-relative w-100">
                                <input type="email" class="app-input form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" name="email" placeholder="Email" required>
                                <span class="app-input-icon"><i class="fa-solid fa-envelope"></i></span>
                            </div>
                            <div class="mb-3 position-relative w-100">
                                <span class="app-input-icon"><i class="fa-solid fa-lock-keyhole"></i></span>
                                <input type="password" class="app-input form-control" id="exampleInputPassword1"
                                       placeholder="Password" name="password" required>
                                <span class="eye-icon position-absolute top-50 translate-middle-y"><i
                                        class="fa-solid fa-eye"></i></span>
                            </div>
                            <button type="submit" class="app-btn">Sign In</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

@endsection
