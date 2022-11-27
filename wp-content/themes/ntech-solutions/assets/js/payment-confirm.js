$(document).ready(function(){
  $(".wpcf7-form").bind("submit", preventDefault);

  $(document).on('keypress',function(e) {
    if(e.which == 13) {
      $(".payment-confirm-submit").click();
    }
  });
  console.log($('.wpcf7-email').val())
  let payment_method = "Nhận hàng trả tiền";
  let note = ""
  $('#bank-list-toggle').click(function() {
    payment_method = "Nhận hàng trả tiền"
  })
  $('#bank-list-toggle1').click(function() {
    payment_method = "Chuyển khoản"
  })
  $('.order-submit').click(function() {
    var info =
    {
        name: $('.name').val(),
        phone: $('.phone-number').val(),
        email: $('.wpcf7-email').val(),
        address: $('.address').val(),
        province: $('.province-dropdown').val(),
        district: $('.district-dropdown').val(),
        ward: $('.ward-dropdown').val(),
        // prodLink:
    }
    note_detail = $('.wpcf7-textarea').text()
    info["method"] =payment_method;
    info["note"] = note_detail;
    localStorage.setItem('info', JSON.stringify(info));
  })

  $(".payment-submit").click(function(){

    if ( !$(".name").val() ) {
      $(".name-error").css("display", "block")
    }
    else {
      $(".name-error").css("display", "none")
    }
    function validateEmail($email) {
     var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
     return emailReg.test( $email );
    }
    if ( !$(".email-field").val() || !validateEmail( $(".email-field").val() ) ) {
      $(".email-error").css("display", "block")
    }
    else {
      $(".email-error").css("display", "none")
    }
    // console.log($(".phone-number").val());
    if ( !$(".phone-number").val()  ) {
      $(".phone-error").css("display", "block")
    }
    else {
      $(".phone-error").css("display", "none")
    }
    if ( !$(".address").val()  ) {
      $(".address-error").css("display", "block")
    }
    else {
      $(".address-error").css("display", "none")
    }
    if ( $(".province-dropdown").val()  == 0 ) {
      $(".province-error").css("display", "block")
    }
    else {
      $(".province-error").css("display", "none")
    }
    if ( $(".district-dropdown").val() == 0 ) {
      $(".district-error").css("display", "block")
    }
    else {
      $(".district-error").css("display", "none")
    }
    if ( $(".ward-dropdown").val()  == 0 ) {
      $(".ward-error").css("display", "block")
    }
    else {
      $(".ward-error").css("display", "none")
    }
    if ( ($(".email-field").val() || validateEmail( $(".email-field").val() ) ) &&
          $(".name").val() &&
          $(".phone-number").val() &&
          $(".address").val() &&
          $(".province-dropdown").val() != 0 &&
          $(".district-dropdown").val() != 0 &&
          $(".ward-dropdown").val() != 0 ) {
            $('.checkout-location').addClass('hide');
            $('.checkout-payment').removeClass('hide');
            $(".wpcf7-form").unbind("submit", preventDefault);
            $(document).on('keypress',function(e) {
              if(e.which == 13) {
                $(".payment-confirm .wpcf7-submit").click();
              }
            });
            firstFormSubmitted = true;
    }
  })



  var preSum =0;
  var tax=0;
  var sum =0
  if (JSON.parse(localStorage.getItem('uniqueID')) && JSON.parse(localStorage.getItem('uniqueID')) !== " " ) {
    var size = Object.keys(JSON.parse(localStorage.getItem('uniqueID'))).length;
    var order = "";

    for (let i = 0; i < 10000; i++ ) {
      if (JSON.parse(localStorage.getItem(i)) && JSON.parse(localStorage.getItem(i)) !== " " && JSON.parse(localStorage.getItem(i)) !== null) {
        let showProduct = JSON.parse(localStorage.getItem(i))
        console.log(showProduct)
        order += `${showProduct.prodName}` + "| Số lượng: " + `${showProduct.prodNum}` + "\n";

        $('.list-product-confirm').append(`<tr><td class="order-product-name">
        <a href="" class="order-product-name-title">${showProduct.prodName}</a>
        </td><td class="order-product-qty">${showProduct.prodNum}</td><td class="order-product-price">
          <span>${showProduct.prodPrice}</span>
        </td></tr>`)
        var href = showProduct.prodLink
        $('.order-product-name-title').attr('href', href )
        preSum = preSum + (showProduct.prodNum*showProduct.prodPrice)
      $('#order-detail').val( order );
      tax = preSum*0.1
	    tax = Math.round(tax*1e2)/1e2
      sum = tax+preSum
      if (preSum !== NaN && tax !== NaN && sum !== NaN) {
        var showPreSum = '' + preSum
        var showTax = '' + tax
        var showSum = '' + sum
        $('#preSum2').text(showPreSum+"đ")
        $('#tax2').text(showTax+"đ")
        $('#show-sum2').text(showSum+"đ")

        $('#paying-price').val(showSum+"đ");
        cartNum = JSON.parse(localStorage.getItem('cartNum'))
        var amount = '' + cartNum
        $('.number-product-incart').text(amount +' ' + ' Sản phẩm')
      }
    }
    }
  }
  $("#bank-list-toggle input[type='radio']").prop("checked", true);

 $("#bank-list-toggle input[type='radio']").click(function() {
    if ( $("#bank-list-toggle1 input[type='radio']").is(":checked") ){
      $('#payment-confirm-bank-list').slideDown();
      $('#payment-confirm-shipping-note').slideUp();
      $(".first-bank-option input").prop("checked", true);
    } else {
      $('#payment-confirm-bank-list').slideUp();
      $('#payment-confirm-shipping-note').slideDown();
      $(".default-bank-option input").prop("checked", true);
    }
  });

  $("#bank-list-toggle1 input[type='radio']").click(function() {
    if ( $("#bank-list-toggle1 input[type='radio']").is(":checked") ){
      $('#payment-confirm-bank-list').slideDown();
      $('#payment-confirm-shipping-note').slideUp();
      $(".first-bank-option input").prop("checked", true);
    } else {
      $('#payment-confirm-bank-list').slideUp();
      $('#payment-confirm-shipping-note').slideDown();
      $(".default-bank-option input").prop("checked", true);
    }
  });
})

function preventDefault(e) {
    e.preventDefault();
}

document.addEventListener( 'wpcf7mailsent', function( event ) {
  window.location.replace(document.location.origin + "/thanh-toan-thanh-cong");
}, false );
