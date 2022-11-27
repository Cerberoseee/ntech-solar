<?php
  /*Template name: Cart */
  ?>
<?= get_header() ?>
  <main class="cart">
    <section class="cart-list-section">
      <div class="container">
        <div class="cart-list">
          <div class="cart-nav">
            <a href="#">
              <svg width="12" height="12" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"></path></svg>
              <span class="align-middle font-nunito">Tiếp tục mua sắm</span>
            </a>
          </div>
          <div class="cart-title">
            <h5 class="cart-title-text">Giỏ hàng</h5>
          </div>
          <div class="cart-main">
            <form id="list-cart" name="list-cart">
              <div class="cart-product-list">
                <div class="cart-product-item head">
                  <table class="cart-product-item-table">
                    <tr>
                      <td class="tableheader-col1">
                        <span class="cart-num">1 sản phẩm</span>
                      </td>
                      <td class="tableheader-col2"></td>
                      <td class="tableheader-col3">Số lượng</td>
                      <td class="tableheader-col4"></td>
                    </tr>
                  </table>
                </div>
                <div class="cart-product-item">
                  <table class="cart-product-item-table">
                    <tbody class="cart-table-body">
                      <!-- <tr>
                        <td class="tableheader-col1">
                          <a href="#" class="">
                            <img src="<?= get_field('test_image')['url']?>" alt="">
                          </a>
                        </td>
                        <td class="tableheader-col2">
                          <div class="product-description">
                            <a href="#">JD-A300 Đèn đường LED năng lượng mặt trời liền thể Jindian Công suất 300W</a>
                          </div>
                          <div class="product-price">
                            <span class="sale-price">2.250.000đ</span>
                          </div>
                        </td>
                        <td class="tableheader-col3">
                          <div class="qty-cart enumber-control inline">
                            <button type="button"  class="cart-reduced items-count" name="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="4" viewBox="0 0 42 4"><rect width="42" height="4"/></svg>
                            </button>
                            <input type="text" class="qty cart-qty" name="" value="1">
                            <button type="button" class="cart-increase items-count" name="button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42"><g transform="translate(-182 -188)"><rect width="42" height="4" transform="translate(182 207)"/><rect width="42" height="4" transform="translate(205 188) rotate(90)"/></g></svg>
                            </button>
                          </div>
                        </td>
                        <td class="tableheader-col4">
                          <a href="#" class="delete-item-cart"></a>
                        </td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="cart-order-summary">
                <div class="cart-summary ">
                  <h5 class="cart-summary-header">Thông tin đơn hàng</h5>
                  <div class="summary-main table">
                      <div class="summary-subtotal row">
                        <span class="col">Tạm tính:</span>
                        <span id="preSum" class="col text-right"></span>
                      </div>
                  </div>
                  <div class="summary-main table">
                      <div class="summary-subtotal row">
                        <span class="col">Thuế (VAT 10%):</span>
                        <span id="tax" class="col text-right"></span>
                      </div>
                  </div>
                  <div class="summary-total">
                    <div class="row">
                      <span class="col">
                        <span class="txt-bold txt-black">Thành tiền:</span>
                        <span class="txt-grey vat-minicart">(Tổng số tiền thanh toán):</span>
                      </span>
                      <div class="col text-right txt-bold txt-black">
                        <span id="show-sum"></span>
                      </div>
                    </div>
                  </div>
                  <div class="summary-control">
                    <div class="row">
                      <span class="continue-shopping-wrap col">
                        <a  class="cart-submit" href="<?= get_site_url()?>/xac-nhan-thanh-toan">
                          <button type="button" name="button">Tiến hành đặt hàng</button>
                        </a>
                      </span>
                    </div>
                  </div>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="cart-list-empty">
      <div class="container">
        <div class="cart-list-empty text-center">
          <h5>Chưa có sản phẩm trong giỏ hàng</h5>
          <a href="#" class="continue-shopping">Tiếp tục mua sắm</a>
        </div>
      </div>
    </section>

  </main>
<?= get_footer() ?>
