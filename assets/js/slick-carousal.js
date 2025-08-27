$(document).ready(function () {
  $(".carousel-slick").slick({
    slidesToShow: 3,
    autoplay: false,
    autoplaySpeed: 2000,
    dots: true,
    arrows: false,
    centerMode: false,
    infinite: true,
    touchMove: true,
    touchThreshold: 10,
    responsive: [
      {
        breakpoint: 1190,
        settings: {
          slidesToShow: 2,
          centerMode: false,
        },
      },
      {
        breakpoint: 720,
        settings: {
          slidesToShow: 1,
          centerMode: false,
        },
      },
    ],
  });
});
