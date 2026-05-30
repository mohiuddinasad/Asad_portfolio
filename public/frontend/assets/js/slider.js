$(function () {
  $(".slider").slick({
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    prevArrow: '<button type="button" class="slick-prev"><iconify-icon icon="basil:arrow-left-outline" width="24" height="24"></iconify-icon></button>',
    nextArrow: '<button type="button" class="slick-next"><iconify-icon icon="basil:arrow-right-outline" width="24" height="24"></iconify-icon></button>',
    // centerMode: true,
    // variableWidth: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: false,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
});
