<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes" />
    <title>Halsey Street - An E-Laundry & Dry Cleaning service.</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/fontawsome/css/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/odometer.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}" />




</head>

<body>
<!-- Header section start -->
<header class="header-section" id="sticky-header">
    <nav class="navbar navbar-expand-xl d-none d-xl-flex">
        <div class="container navbar-main">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="{{URL::to('frontend/images/logo/logo-1.webp')}}" style="max-width: 80px" class="img-fluid" alt="logo" />
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('holidays') ? 'active' : '' }}" href="{{route('holidays')}}">Holidays</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('locations') ? 'active' : '' }}" href="{{route('locations')}}">Locations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact.us') ? 'active' : '' }}" href="{{route('contact.us')}}">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show.signup')}}">Sign Up</a>
                    </li>
                </ul>
                <a href="tel:929-442-5833" class="call-to-action d-flex align-items-center">
                    <div class="icon rounded-pill">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="info">
                        <p>Need Help?</p>
                        <h6>929-442-5833</h6>
                    </div>
                </a>
            </div>
        </div>
    </nav>


    <!-- mobile navbar part start -->
    <div class="mobile-menu-area d-block d-xl-none">
        <div class="container">
            <!-- mobile topbar -->
            <div class="mobile-topbar">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{URL::to('frontend/images/logo/logo-1.webp')}}" style="max-width: 70px" class="img-fluid" alt="logo" />
                        </a>
                    </div>
                    <div class="bars">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="mobile-menu-overlay"></div>
        <div class="mobile-menu-main">
            <div class="d-flex align-items-center justify-content-between pe-2">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="{{URL::to('frontend/images/logo/logo-1.webp')}}" style="width: 100px" class="img-fluid" alt="logo" />
                    </a>
                </div>
                <div class="close-mobile-menu"><i class="fas fa-times"></i></div>
            </div>
            <div class="menu-body">
                <div class="menu-list">
                    <ul class="list-unstyled">
                        <li class="sub-mobile-menu">
                            <a href="{{route('home')}}">Home </a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a href="{{route('holidays')}}">Holidays</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a href="{{route('locations')}}">Locations</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a href="{{route('contact.us')}}">Contact Us</a>
                        </li>
                        <li class="sub-mobile-menu">
                            <a  href="{{route('show.signup')}}">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="call-us p-4">
                <a href="tel:929-442-5833" class="call-to-action d-flex align-items-center">
                    <div class="icon d-flex justify-content-center align-items-center rounded-pill">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="info">
                        <p class="help">Need help?</p>
                        <h5 class="number">929-442-5833</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Main area Start -->
<main>

    @yield('content')

</main>
<!-- Main area end -->

<!-- Footer section start -->
<footer class="footer-section position-relative z-1">
    <div class="shape">
        <img src="{{URL::to('frontend/images/shapes/cta-bg-1.svg')}}" class="cta-shape1 position-absolute top-0 start-0 z-n1"
             alt="cta-bg">
        <img src="{{URL::to('frontend/images/shapes/cta-bg-2.svg')}}" class="cta-shape2 position-absolute bottom-0 end-0 z-n1"
             alt="cta-bg">
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <div class="footer-logo mb-3">
                            <a href="{{route('home')}}" class="d-flex align-items-center gap-2 text-white fw-bold fs-1">
                                <img src="{{URL::to('frontend/images/logo/logo-1.webp')}}" style="max-width: 125px" class="img-fluid" alt="logo" />

                            </a>
                        </div>
                        <p class="footer-desc">
                            With over 25 years of industry expertise, our commitment to laundry excellence is unmatched. Passion drives every aspect of our service, ensuring meticulous care and unparalleled results for your garments. Trust us to exceed your expectations, as we bring decades of dedication and skill to every wash, fold, and cleaning endeavor.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 d-lg-flex justify-content-center">
                    <div class="footer-widget">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('holidays')}}">Holidays</a></li>
                            <li><a href="{{route('locations')}}">Locations</a></li>
                            <li><a href="{{route('contact.us')}}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-widget">
                        <h4 class="widget-title">Contact Us</h4>
                        <ul class="list-unstyled">
                            <li class="d-flex gap-2 align-items-start">
                                <i class="fa-solid fa-map-marker mt-2"></i>
                                <span>
                    653 Halsey Street Brooklyn NY 11233</span>
                            </li>
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-envelope"></i>

                                <a href="mailto:info@halseystreetlaundromat.com" class="text-lowercase">

                                    info@halseystreetlaundromat.com</a>
                            </li>
                            <li class="d-flex gap-2 align-items-center">
                                <i class="fa-solid fa-phone"></i>

                                <a href="tel:+8801719753784">
                                    929-442-5833</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© Copyright <span id="copyright_year"></span>. All Rights Reserved – Halset Street Laundromat</p>
    </div>
</footer>


<!-- All Js File -->
<script src="{{asset('frontend/js/vendor/jquery-3.6.4.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/js/gsap.js')}}"></script>
<script src="{{asset('frontend/js/gsap-scroll-trigger.js')}}"></script>
<script src="{{asset('frontend/js/gsap-split-text.js')}}"></script>
<script src="{{asset('frontend/js/jquery.appear.js')}}"></script>
<script src="{{asset('frontend/js/odometer.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
</body>

</html>
