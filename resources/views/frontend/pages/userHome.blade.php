@extends('frontend.layout')
@section('content')
    <section class="banner-section2 section-bg py-120">
        <div class="container">
            <div class="banner-slider">
                <div class="banner-item">
                    <img src="{{URL::TO('frontend/images/service/image-3.png')}}" alt="banner-img" class="w-100 img-fluid" />
                </div>
                <div class="banner-item">
                    <img src="{{URL::TO('frontend/images/service/image-4.png')}}" alt="banner-img" class="w-100 img-fluid" />
                </div>
                <div class="banner-item">
                    <img src="{{URL::TO('frontend/images/service/image-5.png')}}" alt="banner-img" class="w-100 img-fluid" />
                </div>
                <div class="banner-item">
                    <img src="{{URL::TO('frontend/images/banner/banner.png')}}" alt="banner-img" class="w-100 img-fluid" />
                </div>
            </div>
            <div class="service-btn text-center">
                <a href="{{route('user.order')}}" class="theme-btn theme-btn-primary text-uppercase">Order Now <span class="ms-2"><i
                            class="fa-solid fa-arrow-right"></i></span></a>
            </div>
        </div>
    </section>

@endsection
