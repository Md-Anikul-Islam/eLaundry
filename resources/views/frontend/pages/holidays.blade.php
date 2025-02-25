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
                        <h1 class="page-header-title">Holidays</h1>
                        <ul class="list-unstyled d-flex justify-content-center justify-content-md-end align-items-center">
                            <li><a href="/">Home</a></li>
                            <li>Holidays</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Header Section End-->
    <section class="py-50 holidays-section">
        <div class="container">
            <div class="section-title col-lg-10 mx-auto mb-60">
                <h1 class="title text-center split-text right text-black">
                    We will be closed for the following holidays:
                </h1>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday-1.jpg') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>New Year's Day</p>
                                <h4 class="title">
                                    January 1st
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday-2.jpg') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>Memorial Day</p>
                                <h4 class="title">
                                    Last Monday in May
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday-3.jpg') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>Independence Day</p>
                                <h4 class="title">
                                    July 4th
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday_4.jpg') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>Labor Day</p>
                                <h4 class="title">
                                    First Monday in September
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday-5.jpg') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>Thanks Giving Day</p>
                                <h4 class="title">
                                    4th Thursday in November
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="holiday-item position-relative">
                        <div class="img reveal zoom-out overflow-hidden rounded-20">
                            <img src="{{ URL::to('frontend/images/holidays/holiday-6.webp') }}" alt="holiday-img"
                                class="img-fluid w-100">
                        </div>
                        <div class="overlay position-absolute">
                            <div class="text">
                                <p>Christmas Day</p>
                                <h4 class="title">
                                    December 25th
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection