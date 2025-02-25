@extends('frontend.layout')
@section('content')
    <!-- Page Header Section Start-->
    <section class="page-header-section section-bg border-bottom">
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

    

    <!-- Message section two start -->
    <section class="message-section message-section-two pt-120 position-relative section-bg style2">
      <div class="container">
        <div class="message-main rounded-20">
          <div class="row">
            <div class="col-lg-7">
              <div class="section-title style-two mb-30 text-start ">
                <h5 class="sub-title">Talk to us</h5>
                <h3 class="title z-5">Making Laundry Easier
                  with Best Service</h3>
              </div>
            </div>
          </div>
          <div class="row g-4">
            <div class="col-lg-7">
              <div class="message-text">
                <form action="#" class="message-form">
                  <div class="row g-3">
                    <div class="col-lg-6">
                      <div class="input-group">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control form-field shadow-none" placeholder="Adam Smith">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <label class="form-label">Your Email</label>
                        <input type="text" class="form-control form-field shadow-none"
                          placeholder="info.example@gmail.com">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <label class="form-label">Your Number</label>
                        <input type="text" class="form-control form-field shadow-none" placeholder="123456789">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="input-group">
                        <label class="form-label">Your Area</label>
                        <select class="form-select form-field shadow-none" aria-label="Default select example">
                          <option>New York City</option>
                          <option>Los Angeles</option>
                          <option>Chicago</option>
                          <option>Houston</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                        <label class="form-label">Message</label>
                        <textarea class="form-field textarea-control" placeholder="Message here.."></textarea>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <button type="submit"
                        class="theme-btn theme-btn-primary w-100 text-center  position-relative">Send Now</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="message-contact-info rounded-20">
                <h4 class="title text-white mb-40">Contact</h4>
                <ul class="list-unstyled contact-info">
                  <li class="d-flex align-items-center">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-paper-plane"></i></div>
                    <div class="text">
                      <p class="cn-title">Address </p>
                      <h5 class="cn-info">653 Halsey Street Brooklyn NY 11233</h5>
                    </div>
                  </li>
                  <li class="d-flex align-items-center flex-wrap flex-lg-nowrap">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-envelope"></i></div>
                    <div class="text">
                      <p class="cn-title">Email</p>
                      <h5 class="cn-info">
                        <a href="mailto:info@halseystreetlaundromat.com" class="text-wrap">info@halseystreetlaundromat.com</a>
                      </h5>
                    </div>
                  </li>
                  <li class="d-flex align-items-center">
                    <div class="icon flex-shrink-0"><i class="fa-solid fa-phone"></i></div>
                    <div class="text">
                      <p class="cn-title">Phone</p>
                      <h5 class="cn-info">
                        <a href="tel:929-442-5833">929-442-5833</a>
                      </h5>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Message section two end -->
@endsection