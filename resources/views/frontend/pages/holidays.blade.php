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
    <p class="fs-1 text-center text-uppercase py-120 mt-1">
        we are working on this page, please check back later
    </p>
@endsection
