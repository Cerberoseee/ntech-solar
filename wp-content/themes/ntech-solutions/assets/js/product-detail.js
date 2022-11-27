var pdTabItemLinks = document.querySelectorAll('.pd-tabitem-link');
var submenuProductItemLinks = document.querySelectorAll('.submenu-product-item-link');
var productDetailDescriptions = document.querySelectorAll('.product-detail-description');
var close = document.querySelectorAll('.close');
var totalAddCart = 1;
function checkExist(array1, array2) {

}
function containsDuplicates(array) {
  if (array.length !== new Set(array).size) {
    return true;
  }

  return false;
}

function getUnique(array){
        var uniqueArray = [];

        // Loop through array values
        for(var value of array){
            if(uniqueArray.indexOf(value) === -1){
                uniqueArray.push(value);
            }
        }
        return uniqueArray;
    }

$(".sub-1").addClass('active')
$(".tab-1").addClass('active')
$(".descrip-1").addClass('active')
pdTabItemLinks.forEach((item) => {
    item.addEventListener('click', (e) => {
      $(".sub-1").addClass('active')
      $(".tab-1").addClass('active')
      $(".descrip-1").addClass('active')
        pdTabItemLinks.forEach((link) => {
            link.classList.remove('active');
        });

        submenuProductItemLinks.forEach((link) => {
            link.classList.remove('active');
        });

        e.target.classList.add('active');

        var nav = e.target.getAttribute('nav');
        document.querySelector('.submenu-product-item-link[nav="' + nav + '"]').classList.add('active');

        productDetailDescriptions.forEach((item) => {
            item.classList.remove('active');
        });

        document.getElementById(nav).classList.add('active');


        var pos = document.getElementById(nav).offsetTop - 138;
        animate(document.scrollingElement || document.documentElement, "scrollTop", "", window.pageYOffset, pos, 300, true);
    });
});

submenuProductItemLinks.forEach((item) => {
    item.addEventListener('click', (e) => {
        submenuProductItemLinks.forEach((link) => {
            link.classList.remove('active');
        });

        pdTabItemLinks.forEach((link) => {
            link.classList.remove('active');
        });

        item.classList.add('active');

        var nav = e.target.getAttribute('nav');
        document.querySelector('.pd-tabitem-link[nav="' + nav + '"]').classList.add('active');

        productDetailDescriptions.forEach((item) => {
            item.classList.remove('active');
        });

        document.getElementById(nav).classList.add('active');

        var pos = document.querySelector('.product-detail-description-list').offsetTop - 250;
        console.log(pos)
        animate(document.scrollingElement || document.documentElement, "scrollTop", "", window.pageYOffset, pos, 300, true);
    });
});

$(document).ready(function() {
  $('.add-to-cart').on('click', function() {
    if (JSON.parse(localStorage.getItem('uniqueID'))) {
      var size = Object.keys(JSON.parse(localStorage.getItem('uniqueID'))).length;
      var order = "";
      let preSubSumText = '';
      let preSum = 0;
      let total = 0;
      let preSubSum = 0;
      let cartNum = JSON.parse(localStorage.getItem('cartNum')) + parseInt($('#qty-input').val());
      const amount = '' + cartNum;
      $('#total-cart-popup').text(amount +' ' + ' Sản phẩm');
      for (let i = 0; i < 1000; i++) {
        if (JSON.parse(localStorage.getItem(i)) && JSON.parse(localStorage.getItem(i)) !== " " && JSON.parse(localStorage.getItem(i)) !== null) {
          let showProduct = JSON.parse(localStorage.getItem(i));
          preSum = preSum + (showProduct.prodNum*showProduct.prodPrice);
          }
      }
      preSubSumText = ($('#detail-saleoff').text());
      preSubSum = preSubSumText.match(/\d/g);
      preSubSum = preSubSum.join("");
      total = preSum + parseInt(preSubSum)*parseInt($('#qty-input').val());
      if (total !== NaN) {
        let showPreSum = '' + total;
        $('.show-sum-popup').text(showPreSum+ " đ");
      }
    }
    else {
      let preSumText = '';
      let preSum = 0;
      let total = 0
      preSumText = ($('#detail-saleoff').text());
      preSum = preSumText.match(/\d/g);
      preSum = preSum.join("");
      total = parseInt(preSum)*parseInt($('#qty-input').val());
      if (total !== NaN) {
        let showPreSum = '' + total;
        $('.show-sum-popup').text(showPreSum+ " đ");
      }
    }
  })

  var uniqueID = []
  var showNum;
  let cartnum = 0;
  if (JSON.parse(localStorage.getItem('uniqueID'))) {
    showNum = Object.keys(JSON.parse(localStorage.getItem('uniqueID'))).length;
    var lastNum ='' + showNum
    // $('.item-number').text(lastNum)
  }
  else {
    // $('.item-number').text('0')
  }
  var prodId = $('.product-detail-info').attr("id");
  var localArray = []
  var reduced = $('.reduced');
  var increase = $('.increase');
  var final = ""
  var number = parseInt($('#qty-input').val())
  let index = 0;
  // uniqueID = JSON.parse(localStorage.getItem('uniqueID'));
  // console.log(showNum, 'showNum')
    $('.reduced').click(function() {
      if (number > 1) {
        number= number-1;
        final = '' + number
        totalAddCart -=1;
        $('.qty-input').val(final)
      }
    })
    $('.increase').click(function() {
      if (number < 1000) {
        number= number+1;
        totalAddCart +=1;
        final = '' + number
        $('.qty-input').val(final)
      }
     })

     $('.add-to-cart').on('click', function() {
       let moneyPriceText;
       let moneyPriceNumber;
       if ($('#detail-saleoff')) {
         moneyPriceText = ($('#detail-saleoff').text());
         moneyPriceNumber = moneyPriceText.match(/\d/g);
         moneyPriceNumber = moneyPriceNumber.join("");
       }
       else {
         moneyPriceText = ($('#detail-price').text());
         moneyPriceNumber = moneyPriceText.match(/\d/g);
         moneyPriceNumber = moneyPriceNumber.join("");
       }
       var arrayProductList = []
       var ID = $('.product-id').attr("id");
       var number = parseInt($('#qty-input').val())
       var products =
       {
           prodID: $('.product-id').attr("id"),
           prodName  :$('#product-name').text(),
           prodPrice : moneyPriceNumber,
           prodImage :$('#product-detail-thumbnail').attr('src'),
           prodNum: 0,
           prodLink: $('#product-detail-link').attr('href')
       }
       localArray.push(products)
       if (JSON.parse(localStorage.getItem('uniqueID'))) {
       uniqueID = JSON.parse(localStorage.getItem('uniqueID'));
       // console.log(JSON.parse(localStorage.getItem('uniqueID')), 'local')
     }
     if (JSON.parse(localStorage.getItem('cartNum'))) {
        cartnum = JSON.parse(localStorage.getItem('cartNum'))
        cartnum = cartnum + parseInt($('#qty-input').val())
      }
      else {
        cartnum =parseInt($('#qty-input').val())
      }
      showCartNum ='' + cartnum
      $('.item-number').text(showCartNum)
      $('#total-cart-popup').text(showCartNum)
      localStorage.setItem('cartNum', JSON.stringify(cartnum))



       uniqueID.push(products.prodID)
       if (containsDuplicates(uniqueID)) {
         uniqueID = getUnique(uniqueID)
       }

       showNum = uniqueID.length.toString()
       // $('.item-number').text(showNum)

       localStorage.setItem('uniqueID', JSON.stringify(uniqueID));

       for (var i =  1; i <= uniqueID.length; i++) {
          var check;
         if (uniqueID[i-1] == products.prodID) {
           index = i-1;
           localArray[0].prodNum = localArray[0].prodNum + number;
           localArray.splice(i,1);
           break;
         }
           else {
             for (var j = 1; j <= uniqueID.length; j++){
             if (uniqueID[j-1] == products.prodID) {
               check = false;
             }
             else  check = true;
          }
           if (check == true ) {
             number = parseInt($('.qty-input').val());
             products.prodNum =parseInt($('#qty-input').val())
             localArray[0].prodNum = localArray[0].prodNum + parseInt($('.qty-input').val());
             index = uniqueID.length-1
           }
            localArray.splice(i,1);
         }
             // for (for var j = )
             // number = parseInt($('.qty-input').val());
             // localArray.push(products)
             // index = uniqueID.length-1
             // console.log('2', i)
       }
       localStorage.setItem(index, JSON.stringify(localArray[0]));

       // for (var i = 1; i <localArray.length; i++) {
       //   console.log(localArray[i-1].prodID, 'pre')
       //   console.log(products.prodID, 'pre')
       //
       //   if (localArray[i-1].prodID == products.prodID ) {
       //     console.log(localArray[i-1].prodID)
       //     console.log(products.prodID)
       //     localArray[i-1].prodNum = localArray[i-1].prodNum + number;
       //     index = i-1;
       //      // console.log(parseInt($('.qty-input').val()))
       //      if (i != 0) {
       //        localArray.splice(i,1);
       //      }
       //    }
       //    else if (!(Object.values(localArray).indexOf(localArray[i-1].prodNum) > -1)) {
       //      console.log(Object.values(localArray).indexOf(localArray[i-1].prodNum) > -1, 'check exist')
       //      number = parseInt($('.qty-input').val());
       //      localArray.push(products)
       //      index = uniqueID.length-1
       //    }
       // }
       // console.log(localArray)

      });


   $('.swiper-wrapper-list-big').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows:false,
    fade: true,
    asNavFor: '.swiper-wrapper-list',
  	autoplay: false,
    dots:false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          dots:false
        }
      }
    ]
  });
  $('.swiper-wrapper-list').slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    asNavFor: '.swiper-wrapper-list-big',
    infinite: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows:true,
  	centerPadding: '0px',
    vertical: true,
    verticalSwiping: true,
    prevArrow: '<button class="vertical-slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow: '<button class="vertical-slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>',
  });
  $('.product-detail-slider').slick({
    autoplaySpeed: 2000,
    autoplay: true,
    // infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>',
    customPaging : function(slider, i) {
      return "<div class='square-dot'></div>";
    },
    responsive: [
      {
        breakpoint: 992,
          settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          arrows: false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false
        }
      }
    ]
  });

  $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
  });
  $('.slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    centerMode: true,
    focusOnSelect: true
  });

})
// open popup
$('.open-cart').click(function(){
  $('.popup-cart').addClass("show-popup");
  document.getElementById("title-left-popup").innerHTML = totalAddCart + " sản phẩm mới đã được thêm vào giỏ hàng của bạn";
  document.getElementById("total-cart-popup").innerHTML = cartNum + " sản phẩm";
});
// close the popup
$('.close').click(function(){
  $('.popup-cart').removeClass("show-popup");
});
