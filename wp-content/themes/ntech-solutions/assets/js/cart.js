$(document).ready(function() {
  var cartNum = JSON.parse(localStorage.getItem('cartNum'))
  var showCartNum = '' + cartNum + ' Sản phẩm'
  var finalInputNum
  var arrNumber =[]
  var arrID = []
  var arrPrice = []
  var arrCart = []
  var preSum = 0;
  var tax = 0;
  var sum = 0;
  var showArrNum = [];
  if (JSON.parse(localStorage.getItem('uniqueID'))) {
    var size = Object.keys(JSON.parse(localStorage.getItem('uniqueID'))).length;
    for (let i = 0; i < 1000; i++ ) {
      if (JSON.parse(localStorage.getItem(i)) && JSON.parse(localStorage.getItem(i)) !== " " && JSON.parse(localStorage.getItem(i)) !== null ) {
        var showProduct = JSON.parse(localStorage.getItem(i));
        if (showProduct && showProduct.prodPrice !== NaN) {
          arrNumber[i]  = showProduct.prodNum
          arrID[i] = showProduct.prodID
          showArrNum[i] = '' + arrNumber[i]
          if (showProduct.prodPrice && parseInt(showProduct.prodPrice)!== NaN) {
            arrPrice[i]  = parseInt(showProduct.prodPrice)
          }
          else arrPrice[i] = 0;
          preSum = preSum + arrNumber[i]*arrPrice[i]
        }
        arrCart.push(showProduct)

      var img = showProduct.prodImage
      var href = showProduct.prodLink
      $('.cart-table-body').append(`
        <tr class="row-${i}">
          <td class="tableheader-col1">
            <a href="" class="cart-link">
              <img src="" class="cart-img">
            </a>
          </td>
          <td class="tableheader-col2">
            <div class="product-description">
              <a href="" class="cart-link">${showProduct.prodName}
              </a>
            </div>
            <div class="product-price"
              <span class="sale-price">${showProduct.prodPrice}
              </span>
            </div>
          </td>
          <td class="tableheader-col3">
            <div class="qty-cart enumber-control inline">
              <button type="button"  class="cart-reduced minus-${i} items-count" name="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="4" viewBox="0 0 42 4"><rect width="42" height="4"/></svg>
              </button>
              <input type="text" class="qty-${i} cart-qty" name="" value="${showArrNum[i]}" readonly>
              <button type="button" class="cart-increase plus-${i} items-count" name="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42"><g transform="translate(-182 -188)"><rect width="42" height="4" transform="translate(182 207)"/><rect width="42" height="4" transform="translate(205 188) rotate(90)"/></g></svg>
              </button>
            </div>
          </td>
          <td class="tableheader-col4">
            <p class="delete-item-cart delete-${i}">X</p>
          </td>
        </tr>
        `)
        $('.cart-link').attr('href', href)
        $('.cart-img').attr('src', img)
      }
    }
    var showSum= "";
    var showPreSum = "";
    var showTax = "";

    tax = preSum*0.1
	  tax = Math.round(tax*1e2)/1e2
    sum = tax + preSum
    showPreSum = '' + preSum
    showTax = '' + tax
    showSum = '' + sum
    $('#preSum').text(showPreSum+"đ")
    $('#tax').text(tax+"đ")
    $('#show-sum').text(showSum+"đ")
    $('.cart-num').text(showCartNum)
    for(let i = 0; i < 1000; i++) {
      $('.minus-'+i.toString() ).click(function(){
        let inputNum = parseInt($('.qty-'+i.toString()).val())
        if( inputNum > 1) {
          inputNum = inputNum -1;
          cartNum = cartNum -1;
          arrNumber[i] = inputNum;
          preSum = preSum - arrPrice[i]
          tax = preSum*0.1;
          tax = Math.round(tax*1e2)/1e2
          sum = preSum + tax;
          showPreSum = '' + preSum
          showTax = '' + tax
          showSum = '' + sum
          $('#preSum').text(showPreSum+"đ")
          $('#tax').text(showTax+"đ")
          $('#show-sum').text(showSum+"đ")
          showProduct.prodNum = inputNum
          showCartNum = '' + cartNum + ' Sản phẩm'
          $('.cart-num').text(showCartNum)
          finalInputNum = '' + inputNum
          $('.qty-'+i.toString()).val(finalInputNum)
        }
      });

      $('.plus-'+i.toString()).click(function(){
        let inputNum = parseInt($('.qty-'+i.toString()).val())
        if (inputNum < 1000) {
          inputNum = inputNum +1;
          cartNum = cartNum +1;
          arrNumber[i] = inputNum;
          preSum = preSum + arrPrice[i]
          tax = preSum*0.1;
          tax = Math.round(tax*1e2)/1e2
          sum = preSum + tax;
          showPreSum = '' + preSum
          showTax = '' + tax
          showSum = '' + sum

          $('#preSum').text(showPreSum+"đ")
          $('#tax').text(showTax+"đ")
          $('#show-sum').text(showSum+"đ")
          showCartNum = '' + cartNum + ' Sản phẩm'
          $('.cart-num').text(showCartNum)
          finalInputNum = '' + inputNum
          $('.qty-'+i.toString()).val(finalInputNum)
        }
      });
      $('.delete-' + i.toString()).click(function() {
        let uniqueID = JSON.parse(localStorage.getItem('uniqueID'));
        if (uniqueID[i] == arrID[i]) {
          uniqueID.splice(i,1)
        }
        let inputNum = parseInt($('.qty-'+i.toString()).val())
        arrCart[i].prodNum = 0;
        cartNum = cartNum - inputNum;
        arrNumber[i] = 0;
        preSum = preSum - (arrPrice[i]*inputNum)
        tax = preSum*0.1;
        tax = Math.round(tax*1e2)/1e2
        sum = preSum + tax;
        showPreSum = '' + preSum
        showTax = '' + tax
        showSum = '' + sum
        $('#preSum').text(showPreSum+"đ")
        $('#tax').text(showTax+"đ")
        $('#show-sum').text(showSum+"đ")
        showCartNum = '' + cartNum + ' Sản phẩm'
        $('.cart-num').text(showCartNum)
        // arrCart.splice(i, 1)
        localStorage.setItem('uniqueID', JSON.stringify(uniqueID))
        localStorage.setItem(i, JSON.stringify(arrCart[i]))
        arrCart.splice(i, 1, " ")
        localStorage.setItem(i, JSON.stringify(arrCart[i]))
        localStorage.setItem('cartNum', JSON.stringify(cartNum))
        $('.row-'+i.toString()).remove()
      })
      $('.cart-submit').click(function() {
        if (parseInt($('.qty-'+i.toString()).val()) && parseInt($('.qty-'+i.toString()).val())  !==  NaN) {
          let inputNum = parseInt($('.qty-'+i.toString()).val())
          arrCart[i].prodNum = inputNum;
          if (arrCart[i]) {
            localStorage.setItem(i, JSON.stringify(arrCart[i]))
            localStorage.setItem('cartNum', JSON.stringify(cartNum))
          }
        }
      })
    }
    // $('.cart-reduced').click(function() {
    //   if (inputNum != null || inputNum > 1) {
    //     inputNum = inputNum -1;
    //     finalInputNum = '' + inputNum
    //     $('.cart-qty').val(finalInputNum)
    //     cartNum = inputNum
    //     showCartNum = '' + cartNum + ' Sản phẩm'
    //     $('.cart-num').text(showCartNum)
    //   }
    // })
    // $('.cart-increase').click(function() {
    //   inputNum = inputNum +1;
    //   finalInputNum = '' + inputNum
    //   $('.cart-qty').val(finalInputNum)
    //   cartNum = inputNum
    //   showCartNum = '' + cartNum + ' Sản phẩm'
    //   $('.cart-num').text(showCartNum)
    // })
  }
})
