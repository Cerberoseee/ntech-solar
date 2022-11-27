$(document).ready(function() {
  var rowSum = 0;
  var preSum =0;
  var tax = 0;
  var sum = 0;
  let info = []
  if (JSON.parse(localStorage.getItem('info'))) {
    info = JSON.parse(localStorage.getItem('info'))

      $('.info1').append(`
        <span>
        ${info.address}
        </span>
        <span>
        ${info.ward}, ${info.district}
        </span>
        <span>
        ${info.province}
        </span>
        <span>
        ${info.phone}
        </span>
        `)
        $('.info2').append(`
          <span>
          ${info.name}
          </span>
          <span>
          ${info.email}
          </span>
          <span>
          ${info.address}
          </span>
          <span>
          ${info.ward}, ${info.district}
          </span>
          <span>
          ${info.province}
          </span>
          <span>
          ${info.phone}
          </span>
          <span>
          ${info.note}
          </span>
          `)
      $('.info3').append(`
        <span>${info.method}
        </span>
        `)
      $('.payment-email').append(`${info.email}`)
  }
  if (JSON.parse(localStorage.getItem('uniqueID'))) {
    var size = Object.keys(JSON.parse(localStorage.getItem('uniqueID'))).length;
    for (var i = 0; i < 10000; i++) {
      if (JSON.parse(localStorage.getItem(i)) && JSON.parse(localStorage.getItem(i))!== " " && JSON.parse(localStorage.getItem(i)) !== null) {
        var showProduct = JSON.parse(localStorage.getItem(i))
        var img = showProduct.prodImage
        rowSum = showProduct.prodNum*showProduct.prodPrice
        var href = showProduct.prodLink

      $('.list-product').append(
        `<div class="order-details-row special-row">
          <div class="order-details-td order-details-col1">
            <a class="item-link" href="">
              <img class="item-image" src="">
            </a>
          </div>
          <div class="order-details-td order-details-col2">
            <div class="order-detail-order-info">
              <div class="product-image d-none">
                <a class="item-link" href="">
                  <img class="item-image" src="">
                </a>
              </div>
              <div class="product-name">
                <div class="name">
                  <a class="item-link" href="">${showProduct.prodName}</a>
                </div>
                <div class="order-detail-price-tem d-md-none d-block">Giá : ${showProduct.prodPrice}đ
                </div>
              </div>
            </div>
          </div>
            <div class="order-details-td order-details-col3">
              <span>${showProduct.prodNum}</span>
            </div>
            <div class="order-details-td order-details-col4">${showProduct.prodPrice}đ
            </div>
            <div class="order-details-td order-details-col5">${rowSum}đ
            </div
          </div>
          `)
          $('.item-link').attr('href', href)
          $('.item-image').attr('src', img)
          preSum = preSum + (showProduct.prodNum*showProduct.prodPrice)

    tax = preSum*0.1
	  tax = Math.round(tax*1e2)/1e2
    sum = tax+preSum
    var showPreSum = '' + preSum +'đ'
    var showTax = '' + tax + 'đ'
    var showSum = '' + sum +'đ'
    $('#preSum3').text(showPreSum)
    $('#tax3').text(showTax)
    $('#show-sum3').text(showSum)
    }
  }
  }
  // localStorage.clear();
  if (window.location.pathname == '/thanh-toan-thanh-cong/') {
    let cartnum = JSON.parse(localStorage.getItem('cartNum'))
    cartNum = 0;
    localStorage.setItem('cartNum', JSON.stringify(cartNum))
  }
})
