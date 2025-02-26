@extends('frontend.layout')
@section('content')

    <!-- Banner Section Start -->
    <section class="banner-section" data-background="{{URL::to('frontend/images/banner/banner.png')}}">
        <div class="banner-main-content">
            <div class="container">
                <div class="banner-content">
                    <div class="text-content">
                        <h3 class="split-text right">Want to get your</h3>
                        <h1 class="banner-title position-relative">
                            <span class="split-text right">Clothes Cleaned?</span>

                            <svg class="position-absolute title-shape" xmlns="http://www.w3.org/2000/svg" width="85"
                                height="66" viewBox="0 0 85 66" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M61.9459 62.9644C65.1482 62.5979 68.3193 62.2634 71.5093 61.8037C72.1959 61.7073 72.6696 61.0762 72.5716 60.3943C72.4752 59.7077 71.8394 59.2324 71.1575 59.3303C67.9849 59.785 64.8407 60.1175 61.6605 60.4806C60.9736 60.5612 60.4823 61.1816 60.5596 61.8621C60.6402 62.549 61.2591 63.045 61.9459 62.9644Z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M46.0936 41.5332C52.9666 34.0169 59.4555 26.1579 66.1636 18.4999C66.6183 17.9781 66.5648 17.1897 66.0477 16.7365C65.5259 16.2819 64.7391 16.3307 64.2796 16.851C57.5856 24.4977 51.1109 32.3454 44.2487 39.8441C43.7813 40.3566 43.8189 41.1453 44.3266 41.6112C44.8391 42.0786 45.6277 42.0409 46.0936 41.5332Z"
                                    fill="currentColor" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.905 28.1354C13.1816 19.6204 14.2218 11.0565 15.5935 2.55601C15.6996 1.87608 15.237 1.23568 14.5585 1.12478C13.8754 1.01238 13.2335 1.47977 13.1226 2.15818C11.7526 10.6697 10.7094 19.2432 9.43456 27.7693C9.3332 28.4507 9.80208 29.088 10.4835 29.1893C11.1697 29.2922 11.8022 28.8217 11.905 28.1354Z"
                                    fill="currentColor" />
                            </svg>

                        </h1>
                        <p class="desc">We ensure delivery in the quickest of the turnaround time in the industry. Superior
                            quality of service
                            with speed!</p>
                        <div class="banner-btn text-center">
                            <a href="{{route('contact.us')}}" class="theme-btn theme-btn-primary text-uppercase">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About section start -->
    <section class="about-section pt-120 pb-5 section-bg">
        <div class="container">
            <div class="row g-5  g-xl-0">
                <div class="col-lg-6">
                    <div class="about-img ">
                        <div class="img-main position-relative mx-auto mx-lg-0">
                            <img src="{{URL::to('frontend/images/about/about-img-1.webp')}}"
                                class="w-100 img-fluid rounded-pill" alt="about-img-1" />
                            <img src="{{URL::to('frontend/images/about/about-shape.svg')}}" alt="about-shape"
                                class="about-shape position-absolute">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title">
                            <h5 class="sub-title text-uppercase split-text right">More than 25 Years of Experience</h5>
                            <h3 class="title split-text right">
                                Your Trusted Laundry Partner
                            </h3>
                        </div>
                        <p class="mb-30">
                            Welcome to Halsey Street Laundromat, your premier destination for comprehensive laundry services
                            in New York City. Located conveniently in the heart of the bustling metropolis, our
                            establishment stands as a beacon of reliability and efficiency in the realm of garment care. We
                            provide :
                        </p>


                        <div class="list-box mb-60">
                            <div class="row">
                                <div class="col-sm-6 list-wrapper">
                                    <ul class="list-unstyled list-info">
                                        <li><i class="fa-solid fa-circle-check"></i> Vision-Driven Service</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Diverse Offerings</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Customer Satisfaction</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Wash & Fold Expertise</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 list-wrapper">
                                    <ul class="list-unstyled list-info">
                                        <li><i class="fa-solid fa-circle-check"></i> Garment Care Commitment</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Professional Dry Cleaning</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Eco-Friendly Practices</li>
                                        <li><i class="fa-solid fa-circle-check"></i> Attention to Detail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="text-start text-lg-center text-xl-start">
                            <a class="theme-btn theme-btn-primary position-relative d-inline-flex align-items-center"
                                data-bs-toggle="collapse" href="#readMore" role="button" aria-expanded="false"
                                aria-controls="readMore">
                                Read More
                                <span class="btn-arrow">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_4443_62)">
                                            <path
                                                d="M13.4317 12.5381C13.4967 12.4215 13.535 12.2898 13.5367 12.1506L13.5733 7.95396C13.5758 7.60896 13.2992 7.32646 12.9483 7.32312C12.6058 7.32312 12.3258 7.59896 12.3233 7.94229L12.2975 10.8665L7.48917 6.05813C7.245 5.81396 6.84917 5.81396 6.605 6.05813C6.36083 6.30229 6.36083 6.69812 6.605 6.94229L11.4158 11.7531L8.59083 11.7831C8.245 11.7873 7.96833 12.0698 7.9725 12.4148C7.97583 12.7581 8.255 13.0331 8.60417 13.0331C8.60417 13.0331 12.6783 12.989 12.685 12.989C12.9967 12.9856 13.2842 12.8023 13.4325 12.539L13.4317 12.5381Z"
                                                fill="currentColor" class="btn-arrow-fill"></path>
                                            <path
                                                d="M9.99984 19.2219C9.29484 19.2219 8.59818 19.2094 7.91151 19.1853C4.06734 19.0503 0.949844 15.9328 0.81401 12.0869C0.789844 11.3994 0.777344 10.7036 0.777344 9.99859C0.777344 9.29359 0.789844 8.59776 0.81401 7.91026C0.949844 4.06609 4.06734 0.948594 7.91151 0.813594C9.28651 0.76526 10.7148 0.76526 12.0882 0.813594C15.9323 0.948594 19.0498 4.06609 19.1857 7.91193C19.2098 8.59859 19.2223 9.29526 19.2223 10.0003C19.2223 10.7053 19.2098 11.4011 19.1857 12.0886C19.0498 15.9336 15.9323 19.0511 12.0882 19.1869C11.4015 19.2111 10.7048 19.2236 9.99984 19.2236V19.2219ZM9.99984 2.02609C9.31068 2.02609 8.62818 2.03859 7.95568 2.06276C4.76401 2.17443 2.17568 4.76276 2.06318 7.95443C2.03984 8.62776 2.02734 9.30859 2.02734 9.99859C2.02734 10.6886 2.03984 11.3703 2.06318 12.0428C2.17568 15.2344 4.76401 17.8236 7.95568 17.9344C9.30151 17.9836 10.699 17.9836 12.044 17.9344C15.2365 17.8228 17.8248 15.2344 17.9365 12.0428C17.9598 11.3694 17.9723 10.6886 17.9723 9.99859C17.9723 9.30859 17.9598 8.62693 17.9365 7.95443C17.824 4.76276 15.2357 2.17359 12.044 2.06276C11.3707 2.03859 10.689 2.02609 9.99984 2.02609Z"
                                                fill="currentColor" class="btn-arrow-fill"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description collapse" id="readMore">
                <p>At Halsey Street Laundromat, we understand the value of time and the significance of impeccable service.
                    Our dedicated team of professionals is committed to upholding the highest standards of excellence,
                    ensuring each customer receives personalized attention and a seamless laundry experience from start to
                    finish.</p>
                <p>Whether you’re a busy professional seeking convenience or a discerning individual in pursuit of quality
                    garment care, Halsey Street Laundromat stands ready to serve as your trusted laundry partner. Experience
                    the difference today and discover why we are the preferred choice for discerning clients across New York
                    City.</p>
            </div>
        </div>
    </section>

    <!-- Service section Start -->
    <div class="service-section py-120" data-background="assets/images/service/service-bg.png">
        <div class="container">
            <div class="section-title text-center mb-30 style-two">
                <h5 class="sub-title text-uppercase">Our Services</h5>
                <h3 class="title split-text right text-center">
                    Clean Clothes, Delivered with Care !
                </h3>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="service-card w-100 h-100 rounded-20">
                        <div class="icon text-center">
                            <img src="{{URL::to('frontend/images/feature/icon1.png')}}" class="img-fluid" alt="icon">
                            <h4 class="title">We pick your Clothes</h4>
                            <p class="desc">
                                We pick your clothes at your doorstep service in schedule a pickup time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card w-100 h-100 rounded-20">
                        <div class="icon text-center">
                            <img src="{{URL::to('frontend/images/feature/icon2-1.png')}}" class="img-fluid" alt="icon">
                            <h4 class="title">Quicker Delivery</h4>
                            <p class="desc">
                                Our expert wash and fold your clothes meticulously cleaned, neatly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card w-100 h-100 rounded-20">
                        <div class="icon text-center">
                            <img src="{{URL::to('frontend/images/feature/icon3.png')}}" class="img-fluid" alt="icon">
                            <h4 class="title">Delivery at the doorstep!</h4>
                            <p class="desc">
                                Your laundry is cleaned and delivered back to you promptly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-btn text-center">
                <a href="{{route('contact.us')}}" class="theme-btn theme-btn-primary text-uppercase">Contact Us</a>
            </div>
        </div>
    </div>

    <!-- Feature section start -->
    <section class="service-section-two z-1 py-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 text-center">
                    <div class="section-title style-two mb-60">
                        <h5 class="sub-title text-uppercase">Our Features</h5>
                        <h3 class="title split-text right">
                            Advancing Laundry Technology for A Better Cleaning Experience
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row services-slider-two">
                <div class="col-lg-4">
                    <div class="service-card rounded-20">
                        <div class="img-part position-relative">
                            <div class="img overflow-hidden">
                                <div class="d-block w-100" tabindex="0">
                                    <img src="{{URL::to('frontend/images/service/image-3.png')}}" alt="service-one-img"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div
                                class="box-icon rounded-20 d-flex justify-content-center align-items-center position-absolute start-50 translate-middle-x">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                        </div>
                        <div class="service-text text-center">
                            <h4 class="service-title">Pick-up and Delivery</h4>
                            <p>Enjoy the convenience of our doorstep service – schedule a pickup time, and we’ll handle the
                                rest, ensuring your laundry is cleaned and delivered back to you promptly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card rounded-20">
                        <div class="img-part position-relative">
                            <div class="img overflow-hidden">
                                <div class="d-block w-100" tabindex="0">
                                    <img src="{{URL::to('frontend/images/service/image-4.png')}}" alt="service-one-img"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div
                                class="box-icon primary rounded-20 d-flex justify-content-center align-items-center position-absolute start-50 translate-middle-x">
                                <i class="fas fa-hands-bubbles"></i>
                            </div>
                        </div>
                        <div class="service-text text-center">
                            <h4 class="service-title">Wash & Fold</h4>
                            <p>Let us take the hassle out of laundry day with our expert Wash and Fold service, where your
                                clothes are meticulously cleaned, neatly folded, and ready for you to enjoy.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card rounded-20">
                        <div class="img-part position-relative">
                            <div class="img overflow-hidden">
                                <div class="d-block w-100" tabindex="0">
                                    <img src="{{URL::to('frontend/images/service/image-5.png')}}" alt="service-one-img"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div
                                class="box-icon rounded-20 d-flex justify-content-center align-items-center position-absolute start-50 translate-middle-x">
                                <i class="fas fa-tshirt"></i>
                            </div>
                        </div>
                        <div class="service-text text-center">
                            <h4 class="service-title">Dry Cleaning</h4>

                            <p>Trust our professional Dry Cleaning service to preserve the quality and integrity of your
                                garments, using advanced techniques to remove stains and refresh fabrics to with heartiest
                                care.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-card rounded-20">
                        <div class="img-part position-relative">
                            <div class="img overflow-hidden">
                                <div class="d-block w-100" tabindex="0">
                                    <img src="{{URL::to('frontend/images/service/image-4.png')}}" alt="service-one-img"
                                        class="img-fluid w-100">
                                </div>
                            </div>
                            <div
                                class="box-icon primary section-bg rounded-20 d-flex justify-content-center align-items-center position-absolute start-50 translate-middle-x">
                                <i class="fas fa-hands-bubbles"></i>
                            </div>
                        </div>
                        <div class="service-text text-center">
                            <h4 class="service-title">Wash & Fold</h4>
                            <p>Let us take the hassle out of laundry day with our expert Wash and Fold service, where your
                                clothes are meticulously cleaned, neatly folded, and ready for you to enjoy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service-details section Start -->
    <section class="service-details-section">
        <div class="container">
            <div class="section-title mb-60 style-two col-lg-7 mx-auto">
                <h3 class="title split-text right text-center">
                We Clean Everything Laundry Service
                </h3>
            </div>

            <div class="row g-5">
                <div class="col-md-6 align-self-center">
                    <div class="main-img reveal left">
                        <img src="{{URL::to('frontend/images/service/image-6.png')}}" class="img-fluid rounded-20" alt="service-img">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="service-details">
                        <div class="desc">
                            <p>
                                At Halsey Street Laundromat, we take pride in offering our signature “We Clean Everything”
                                Laundry Service, ensuring that all your garments receive the care and attention they
                                deserve. Here’s what sets our laundry service apart:
                            </p>
                            <p>
                                <span>Comprehensive Care:</span> With our “We Clean Everything” Laundry Service, we handle a
                                wide variety of garments and fabrics, from everyday clothing items like shirts, pants, and
                                dresses to delicate fabrics such as silk, wool, and cashmere. No matter the material or type
                                of garment, you can trust us to clean it thoroughly and safely.
                            </p>
                            <p>
                                <span>Advanced Techniques:</span> Our team of skilled professionals employs advanced laundry
                                techniques and state-of-the-art equipment to ensure optimal cleanliness and garment care.
                                From pre-treating stains to selecting the appropriate wash cycle and temperature, we take
                                every measure to deliver superior results.
                            </p>
                            <p>
                                <span>Eco-Friendly Practices: </span> At Halsey Street Laundromat, we are committed to
                                sustainability and eco-friendly practices. That’s why we use environmentally safe detergents
                                and cleaning agents that effectively remove dirt and stains while minimizing our impact on
                                the environment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-md-6 align-self-center">
                    <div class="service-details">
                        <div class="desc">
                            <p>
                            <span> Customized Solutions: </span> We understand that every garment is unique, which is why we offer customized solutions to meet your specific needs and preferences. Whether you have special instructions for handling delicate fabrics or require stain removal for stubborn marks, we tailor our approach to ensure your complete satisfaction.
                            </p>
                            <p>
                            <span>Convenient Options:</span>  With our convenient Pick up and Delivery service, getting your laundry done has never been easier. Simply schedule a pickup time that works for you, and we’ll take care of the rest. You can also choose our Wash and Fold service for added convenience, where we neatly fold your clean laundry for easy storage and organization.
                            </p>
                            <p>
                            <span>Quality Assurance:</span>  Your satisfaction is our top priority, which is why we stand behind the quality of our “We Clean Everything” Laundry Service. If for any reason you’re not completely satisfied with the results, simply let us know, and we’ll make it right.
                            </p>
                            <p>
                            Experience the convenience and quality of our “We Clean Everything” Laundry Service at Halsey Street Laundromat. Trust us with your laundry needs, and let us exceed your expectations every time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="main-img reveal right">
                        <img src="{{URL::to('frontend/images/service/image-7.jpg')}}" class="img-fluid rounded-20" alt="service-img">
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Service-details section Start -->

    <!-- Why section Start -->

    <section class="why-section py-120 section-bg">
        <div class="container">
            <div class="section-title style-two text-center mb-1">
                <h4 class="sub-title">Why Choose Us</h4>
                <h2 class="title split-text right">
                    Your Trusted Laundry Service
                </h2>
            </div>
            <div class="row mt-3 mt-lg-5 g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">01</div>
                            <h4 class="why-title">Comprehensive Services</h4>
                            <p class="why-desc text-center">
                                At Halsey Street Laundromat, we offer a full suite of laundry services to meet all your
                                needs under one roof. From Pick up and Delivery to meticulous Wash and Fold and professional
                                Dry Cleaning, we have you covered from start to finish.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">02</div>
                            <h4 class="why-title">Unparalleled Convenience</h4>
                            <p class="why-desc text-center">
                                Our Pick up and Delivery service eliminates the hassle of laundry day by bringing our
                                exceptional services directly to your doorstep. Say goodbye to the time-consuming chore of
                                lugging heavy laundry bags to and from the laundromat – we’ll handle it all for you.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">03</div>
                            <h4 class="why-title">Exceptional Quality</h4>
                            <p class="why-desc text-center">
                                We take pride in our commitment to delivering exceptional quality with every garment. Our
                                team of skilled professionals utilizes industry-leading techniques and eco-friendly
                                practices to ensure your clothing receives the utmost care and attention it deserves.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">04</div>
                            <h4 class="why-title">Personalized Attention</h4>
                            <p class="why-desc text-center">
                                At Halsey Street Laundromat, every customer is important to us. We believe in providing
                                personalized attention to address your unique needs and preferences, ensuring your complete
                                satisfaction with every service we offer.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">05</div>
                            <h4 class="why-title">Reliable Service</h4>
                            <p class="why-desc text-center">
                                When you choose Halsey Street Laundromat, you can trust that your laundry is in good hands.
                                We prioritize reliability and consistency in our services, so you can rest assured that your
                                garments will be handled with care and returned to you in pristine condition, every time.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="why-card p-5 bg-white rounded-3 border-1 border border-primary">
                        <div class="why-content d-flex flex-column align-items-center gap-2">
                            <div class="number">06</div>
                            <h4 class="why-title">Advanced Techniques</h4>
                            <p class="why-desc text-center">
                                Our team of skilled professionals employs advanced laundry techniques and state-of-the-art
                                equipment to ensure optimal cleanliness and garment care. From pre-treating stains to
                                selecting the appropriate wash cycle and temperature, we take every measure to deliver
                                superior results.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why section End -->
@endsection
