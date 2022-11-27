$(document).ready(function() {
  $('.slide-banner').slick({
    arrows: true,
    dots: false,
    autoplay:false,
    slidesToShow: 2,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>'
  });

  $('.slide-ads').slick({
    arrows: true,
    dots: true,
    autoplay:false,
    slidesToShow: 1,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>'
  });
});

// Flash Sale Timer
  // var time = flash_sale_time;
  // var distance = time * 3600;
  // var x = setInterval(function() {
  //   distance = distance -1;
  //   var hours = Math.floor(distance / 3600);
  //   var minutes = Math.floor((distance % 3600)/ 60);
  //   var seconds = Math.floor((distance % 3600) % 60 );
  //   document.getElementById("demo").innerHTML = hours + ": "+ minutes + ": " + seconds;
  //   if (distance < 0) {
  //     clearInterval(x);
  //     document.getElementById("demo").innerHTML = "EXPIRED";
  //   }
  // }, 1000);
