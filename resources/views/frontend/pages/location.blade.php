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
                            <h1 class="page-header-title">Location</h1>
                            <ul class="list-unstyled d-flex justify-content-center justify-content-md-end align-items-center">
                                <li><a href="/">Home</a></li>
                                <li>Location</li>
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
                <div class="row g-4">
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
                        <div class="info-item d-flex flex-wrap flex-sm-nowrap align-items-center rounded-20 gap-4">
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
        <div class="contact-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3025.5152933036306!2d-73.9287978235875!3d40.684647639289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25c725b17c71b%3A0x728b4717055723e2!2s653%20Halsey%20St%2C%20Brooklyn%2C%20NY%2011233%2C%20USA!5e0!3m2!1sen!2sbd!4v1740485911605!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>
    <!-- Contact section End -->
    
@endsection
