@extends('frontend.layout')
@section('content')
    <div class="app-container py-5">
        <div class="d-flex align-items-center justify-content-center min-vh-100">
            <div class="d-flex flex-column justify-content-center align-items-center gap-3 w-100 p-4 border rounded-5 shadow-sm">
                <form class="w-100 app-form"  method="post" action="{{route('signup.store')}}">
                    @csrf
                    <div class="step active" data-step="1">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3 w-100">
                            <div class="logo">
                                <img src="{{URL::TO('frontend/images/logo/logo-1.webp')}}" alt="logo">
                            </div>
                            <h2>Sign Up</h2>
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
                            <button type="button" class="app-btn next-btn">Sign Up</button>
                        </div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3 w-100">
                            <div class="logo">
                                <img src="{{URL::TO('frontend/images/logo/logo-1.webp')}}" alt="logo">
                            </div>
                            <h2>Introduce Yourself</h2>
                            <p class="text-capitalize text-center">Who do we have the pleasure of serving?</p>
                            <div class="row g-1 w-100">
                                <div class="col-6">
                                    <div class="position-relative w-100">
                                        <input type="text" class="app-input form-control" name="first_name" id="firstName" aria-describedby="firstName"
                                               placeholder="First Name" required>
                                        <span class="app-input-icon"><i class="fa-solid fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="col-6"><div class="position-relative w-100">
                                        <input type="text" class="app-input form-control" name="last_name" id="lastName" aria-describedby="lastName"
                                               placeholder="Last Name" required>
                                        <span class="app-input-icon"><i class="fa-solid fa-user"></i></span>
                                    </div></div>
                            </div>
                            <div class="position-relative w-100">
                                <span class="app-input-icon"><i class="fa-solid fa-lock-keyhole"></i></span>
                                <input type="tel" class="app-input form-control" name="phone"  id="phone" placeholder="Phone Number" required>

                            </div>
                            <div class="w-100">
                                <p>Are you using Poplin for Personal use or Business?*</p>
                                <div class="d-flex justify-content-start align-items-center gap-3 w-100">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type" value="Personal" id="Personal" required>
                                        <label class="form-check-label" for="Personal">
                                            Personal
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="business_type" value="Business" id="Business" required>
                                        <label class="form-check-label" for="Business">
                                            Business
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <p class="text-start">Are you 65 or over?*</p>
                                <div class="d-flex justify-content-start align-items-center gap-3 w-100">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ageDefault" id="No" required>
                                        <label class="form-check-label" for="No">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="ageDefault" id="Yes" required>
                                        <label class="form-check-label" for="Yes">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                        I Want to receive marketing/ promotional notifications via text message.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkChecked" >
                                    <label class="form-check-label" for="checkChecked">
                                        I want to receive account notifications via text message.
                                    </label>
                                </div>
                            </div>
                            <div class="w-100 d-flex align-items-center justify-content-between">
                                <button type="button" class="app-prev-btn prev-btn">Previous</button>
                                <button type="submit" class="app-next-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="stepper mb-4">
                    <div class="circle step-circle" data-step="1">1</div>
                    <div class="circle step-circle" data-step="2">2</div>
                </div>
            </div>

        </div>
    </div>

@endsection
