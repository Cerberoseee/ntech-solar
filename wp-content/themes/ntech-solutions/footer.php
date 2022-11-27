<?php $temp_uri = get_template_directory_uri(); ?>
  <footer>
    <!-- <div class="footer-top">
      <div class="banner-wrapper">
        <div class="banner-bar">
          <?php $items = get_field('footer_banner-bar_qualities', 'option') ?>
          <?php if ($items) : ?>
            <?php foreach ($items as $item) : ?>
              <div class="banner-quality">
                <img class="quality-logo"src="<?= $item['quality_logo']['url']?>" alt="">
                <p class="quality-title"><?= $item['quality_title']  ?></p>
                <p class="quality-text"><?= $item['quality_text']  ?></p>
              </div>
            <?php endforeach; endif ?>
          </div>
          <div class="discount">
            <?php $item = get_field('footer_banner-bar', 'option') ?>
            <div class="">
              <img src="<?= $item['discount_icon']['url'] ?>" alt="" class="discount-logo">
            </div>
            <div class="">
              <h5 class="discount-title">Chiết khấu hấp dẫn</h3>
                <p class="discount-text"><?= $item['discount-text'] ?></p>
            </div>
            </div>
      </div>
    </div> -->
    <div class="footer-bottom">
      <div class="container">
        <div class="big-wrapper">
          <div class="wrapper">
            <div class="first-col content">
              <div class="logo">
                <a class="header-logo" href="#">
                  <img src="<?= $temp_uri?>/assets/image/logo.svg" alt="">
                </a>
              </div>
              <p class="motto size-14 fw-4 font-nunito color-white"><?= get_field('footer_motto', 'option')?></p>
              <div class="network">
                <p class="size-14 fw-7 color-white">NTech trên social network</p>
                <div class="media">
                  <?php $items = get_field('footer_media', 'option') ?>
                  <?php if ($items) : ?>
                    <?php foreach ($items as $item) : ?>
                      <div class="social">
                        <a href="<?= $item['link']['url']?>">
                          <img src="<?=$item['social']['url']?>" alt="">
                        </a>
                      </div>
                    <?php endforeach; endif ?>
                  </div>
                </div>
              </div>

                  <div class="sub-wrapper">
                    <div class="content">
                      <p class="size-14 fw-7 color-white">Thông tin</p>
                      <?php $items = get_field('footer_information', 'option') ?>
                      <?php if ($items) : ?>
                        <?php foreach ($items as $item) : ?>
                          <a href="<?= $item['link']['url']?>">
                            <p class="opa-7 size-13 fw-4 font-nunito color-white"><?= $item['description']?></p>
                          </a>
                        <?php endforeach; endif ?>
                      </div>
                    <div class="content">
                      <p class="size-14 fw-7 color-white">Chính sách</p>
                      <?php $items = get_field('footer_policy', 'option') ?>
                      <?php if ($items) : ?>
                        <?php foreach ($items as $item) : ?>
                          <a href="<?= $item['link']['url']?>">
                            <p class="opa-7 size-13 fw-4 font-nunito color-white"><?= $item['description']?></p>
                          </a>
                        <?php endforeach; endif ?>
                      </div>
                      <div class="content">
                        <div class="sub-content">
                          <p class="size-14 fw-7 color-white">Địa chỉ</p>
                          <?php $items = get_field('footer_address', 'option') ?>
                          <?php if ($items) : ?>
                            <?php foreach ($items as $item) : ?>
                              <a href="<?= $item['link']['url']?>">
                                <p class="opa-7 size-13 fw-4 font-nunito color-white"><?= $item['description']?></p>
                              </a>
                            <?php endforeach; endif ?>
                          </div>
                          <div class="sub-content">
                            <p class="size-14 fw-7 color-white">Liên hê</p>
                            <div class="contact">
                              <p class="opa-7 size-12 color-white font-nunito fw-4">Hotline: </p>
                              <a href="#" class="size-12 font-nunito fw-4 color-light-blue"><?= get_field('footer_contact_hotline', 'option')?></a>
                            </div>
                            <div class="contact">
                              <p class="opa-7 size-12 color-white font-nunito fw-4">Email: </p>
                              <a href="#" class="size-12 font-nunito fw-4 color-light-blue"><?= get_field('footer_contact_email', 'option')?></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="footer-content">
                      <p class="size-12 fw-4 font-nunito color-white"><?= get_field('footer_sub_description', 'option')?></p>
                      <img src="<?= $temp_uri?>/assets/image/bo-cong-thuong.svg" alt="">
                    </div>
                  </div>
                </div>
    </div>
  </footer>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/javascript">
    function minTwoDigits(n) {
      return (n < 10 ? '0' : '') + n;
    }
    (function () {
      const second = 1000,
            minute = second * 60,
            hour = minute * 60;

      const expireDay = "<?= $GLOBALS['flash_sale']  ?>";
      console.log(expireDay);
      const countDown = new Date(expireDay).getTime();
      const x = setInterval(function() {

        const now = new Date().getTime(),
              distance = countDown - now;
        document.getElementById("hours").innerText = minTwoDigits(Math.floor((distance) / (hour))),
        document.getElementById("minutes").innerText = minTwoDigits(Math.floor((distance % (hour)) / (minute))),
        document.getElementById("seconds").innerText = minTwoDigits(Math.floor((distance % (minute)) / second));
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("hours").innerText = '00';
          document.getElementById("minutes").innerText = '00',
          document.getElementById("seconds").innerText = '00';
        }
      }, 0)
    }());
  </script>
  <?php wp_footer(); ?>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/header.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/cart.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/product-detail.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/payment-confirm.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/homepage.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/payment-success.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/product.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/product-category.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/project-detail.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/contact.js?ver=<?= rand(111,999)?>"></script>
  <script type="text/javascript" src="<?= get_template_directory_uri() ?>/assets/js/footer.js?ver=<?= rand(111,999)?>"></script>

</html>
