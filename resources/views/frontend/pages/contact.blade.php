@extends('frontend.layout')
@section('content')
    <!-- Page Header Section Start-->
    <section class="page-header-section section-bg">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5 align-self-center d-none d-md-block">
                    <div class="header-img">
                        <img src="{{URL::to('frontend/images/header/page_header_img.svg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-7 align-self-center">
                    <div class="bread-crumb text-center text-md-end">
                        <h1 class="page-header-title">Contact Us</h1>
                        <ul class="list-unstyled d-flex justify-content-center justify-content-md-end align-items-center">
                            <li><a href="/">Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Header Section End-->

    <!-- Contact section Start -->
    <section class="contact-section pt-120">
        <div class="container">
            <div class="contact-information">
                <div class="row">
                    <div class="col-lg-6 col-xl-4">
                        <div class="info-item d-flex align-items-center rounded-20 gap-4">
                            <div
                                class="icon rounded-pill flex-shrink-0 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Phone</h4>
                                <ul class="list-unstyled">
                                    <li><a href="tel:929-442-5833">929-442-5833</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="info-item d-flex align-items-center rounded-20 gap-4">
                            <div
                                class="icon rounded-pill flex-shrink-0 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Email</h4>
                                <ul class="list-unstyled">
                                    <li><a href="mailto:info@halseystreetlaundromat.com">info@halseystreetlaundromat.com</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4">
                        <div class="info-item d-flex align-items-center rounded-20 gap-4">
                            <div
                                class="icon rounded-pill flex-shrink-0 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="text">
                                <h4 class="title">Location</h4>
                                <ul class="list-unstyled">
                                    <li>653 Halsey Street Brooklyn NY 11233</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact section End -->
@endsection