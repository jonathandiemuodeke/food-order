const responsive = {
  0: {
    items: 1,
  },
  320: {
    items: 1,
  },
  560: {
    items: 2,
  },
  960: {
    items: 3,
  },
};

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    dots: false,
    nav: true,
    navText: [
      $(".owl-carousel-nav .owl-nav-prev"),
      $(".owl-carousel-nav .owl-nav-next"),
    ],
    responsive: responsive,
  });

  // AOS INIT
  AOS.init();
});
