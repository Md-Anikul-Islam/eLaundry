(function ($) {
  "use strict";

 
  // fixed menu js
  $(window).on('scroll', function () {
    let scroll = $(window).scrollTop();
    if (scroll < 120) {
      $("#sticky-header").removeClass("sticky-menu");
      $("#header-fixed-height").removeClass("active-height");

    } else {
      $("#sticky-header").addClass("sticky-menu");
      $("#header-fixed-height").addClass("active-height");
    }
  });

  // Magnific popup image js
  $('.image-popup').magnificPopup({
    type: 'image',
    gallery: {
      enabled: true
    },
  });
  
  

  // Mobile menu js start
  $(".mobile-topbar .bars").on("click", function () {
    $(".mobile-menu-overlay,.mobile-menu-main").addClass("active");
  });

  $(".close-mobile-menu,.mobile-menu-overlay").on("click", function () {
    $(".mobile-menu-overlay,.mobile-menu-main").removeClass("active");
  });

  $('.sub-mobile-menu ul').hide();
  $(".sub-mobile-menu a").on("click", function () {
    $('.sub-mobile-menu ul').not($(this).next("ul")).slideUp(300);
    $(".sub-mobile-menu a i").not($(this).find("i")).removeClass("fa-chevron-up").addClass("fa-chevron-down");
    $(this).next("ul").slideToggle(300);
    $(this).find("i").toggleClass("fa-chevron-up fa-chevron-down");
  });

  

  /* Odometer Activeate js */
  $(document).ready(function () {
    $('.odometer').appear(function () {
      var odo = $(".odometer");
      odo.each(function () {
        var countNumber = $(this).attr("data-count");
        $(this).html(countNumber);
      });
    });
  });

  // Testimonial slider js
  $('.banner-slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    autoplay: true,
    // prevArrow: '<i class="fa-solid arrow arrow-prev fa-angle-left"></i>',
    // nextArrow: '<i class="fa-solid arrow arrow-next fa-angle-right"></i>',
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }]
  });

})(jQuery);