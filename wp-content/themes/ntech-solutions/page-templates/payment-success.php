<?php
  /*Template name: Payment Success */
  ?>
<?= get_header() ?>
<?php $temp_uri = get_template_directory_uri(); ?>
  <main class="payment-success">
      <section class="payment-success-section">
        <div class="container">
          <div class="cart-nav">
            <a href="#">
              <svg width="12" height="12" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"></path></svg>
              <span class="align-middle font-nunito">Tiếp tục mua sắm</span>
            </a>
          </div>
          <div class="payment-success-header">
            <h1>THANK YOU</h1>
            <div class="payment-success-header-subtitle">
              Đơn đặt hàng của bạn đã hoàn tất
            </div>
        </div>
        <div class="payment-success-body">
          <div class="order-success-status">
            <div class="success-icon">
              <img src="<?= $temp_uri?>/assets/image/check-icon.png" alt="">
            </div>
          </div>
          <div class="order-summary text-center">
            <div>
              Chúng tôi sẽ gửi xác nhận đơn hàng của bạn đến email&nbsp;<strong class="payment-email"></strong>
            </div>
            <div>Nếu có bất kỳ thắc mắc về đơn hàng của bạn, vui lòng liên hệ với chúng tôi hoặc dùng chức năng theo dõi đơn hàng</div>
          </div>
          <div class="profile-content-section">
            <div class="profile-content-title">
              <h4>Chi tiết đơn hàng</h4>
            </div>
            <div class="profile-content-order-detail">
              <div class="panel">
                <div class="panel-body1">
                  <div class="customer-details row">
                    <div class="customer-details col-md-4 mb-4">
                      <h3 class="customer-details-item-header ">Địa chỉ nhận hàng</h3>
                      <div class="info1 info-col">

                      </div>

                    </div>
                    <div class="customer-details col-md-4 mb-4">
                      <h3 class="customer-details-item-header ">Thông tin thanh toán</h3>
                      <div class="info2 info-col">

                      </div>
                    </div>
                    <div class="customer-details col-md-4 mb-4">
                      <h3 class="customer-details-item-header ">Phương thức thanh toán</h3>
                      <div class="info3 info-col">

                      </div>
                    </div>
                  </div>
                  <div class="order-details">
                    <div class="order-details-table">
                      <div class="order-details-row">
                        <div class="order-details-th order-details-col1">
                          Sản phẩm
                        </div>
                        <div class="order-details-th order-details-col2 special">
                          <span class="label-product-mobile">Sản phẩm</span>
                        </div>
                        <div class="order-details-th order-details-col3">
                          SL
                        </div>
                        <div class="order-details-th order-details-col4">
                          Giá
                        </div>
                        <div class="order-details-th order-details-col5">
                          Tạm tính
                        </div>
                      </div>
                      <div class="list-product">
                      </div>
                      <div class="order-details-row order-details-totalrow subtotal clearfix">
                        <div class="order-details-td order-details-total-col1"></div>
                        <div  class="order-details-td order-details-total-col2">
                          <div class="price">
                            Tổng cộng
                          </div>
                        </div>
                        <div id="preSum3" class="order-details-td order-details-total-col3">

                        </div>
                      </div>
                      <div class="order-details-row order-details-totalrow subtotal clearfix">
                        <div class="order-details-td order-details-total-col1"></div>
                        <div class="order-details-td order-details-total-col2">
                          <div class="price">
                            Thuế (VAT 10%)
                          </div>
                        </div>
                        <div id="tax3" class="order-details-td order-details-total-col3">

                        </div>
                      </div>
                      <div class="order-details-row order-details-totalrow total clearfix">
                        <div class="order-details-td order-details-total-col1"></div>
                        <div class="order-details-td order-details-total-col2">
                          <div class="price">
                              Thành tiền
                          </div>
                        </div>
                        <div id="show-sum3" class="order-details-td order-details-total-col3">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?= get_footer() ?>
