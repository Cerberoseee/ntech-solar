<?= get_header() ?>
<?php
$post_id = get_the_ID();
$title = wp_trim_words(get_the_title(), 20);
$description = wpautop(get_the_content(null, false));
$link = esc_url( get_permalink() );
$category = get_the_terms( get_the_ID(), 'category');
$date = get_field('info_date');
$client = get_field('client');
$image = get_field('img')['url'];
$wattage = get_field('wattage');
$area = get_field('are');
$place = get_field('place');
// $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<body>
<main>
  <div class="directory-bar fw-5 font-nunito">
    <div class="container">
      <a href="<?= get_site_url() ?>">Trang chủ</a>
      <span> / </span>
      <a href="<?= $link?>" id="product-detail-link" class="current-page"><?= $title ?></a>
    </div>
  </div>
  <section class="product-detail-section">
    <div class="container">
      <section class="product-detail">
        <div class="product-detail-wrapper">
          <!-- Swiper list -->
          <div class="product-detail-image">
              <div class="swiper-wrapper-list">
                <?php $items = get_field('album_image') ?>

                <?php if ($items) : ?>
                  <?php foreach($items as $item) :?>
                    <div class="product-thumb-item">
                      <img class="slick-1"src="<?=$item['img-list']['url']?>" alt="">
                    </div>
                  <?php endforeach; endif ?>
                </div>

              <div class="swiper-wrapper-list-big" >
                  <?php $items = get_field('album_image') ?>
                <?php if ($items) : ?>
                  <?php foreach($items as $item) :?>
                    <div class="product-thumb-item">
                      <img src="<?=$item['img-list']['url']?>" alt="">
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="product-thumb-item">
                    <img src="<?=get_field('thumbnail')['url']?>" alt="">
                  </div>
                <?php endif; ?>
              </div>

            <!-- <div class="slider-slick-img">
              <div class="">
                main-img
              </div>
            </div> -->

           </div>

          <!-- End swiper  -->

          <!-- New Swiper -->
<!--
          <div class="swipe-list">
            <div class="slider-nav">
              <?php $items = get_field('image_list_image_detail') ?>
              <?php if ($items) : ?>
                <?php foreach($items as $item) :?>
                  <div class="small-img-swipe">
                    <img class=""src="<?=$item['image']['url']?>" alt="" style="max-width:50px">
                  </div>
                <?php endforeach; endif ?>
            </div>
            <div class="slider-for">
              <?php $items = get_field('image_list_image_detail') ?>
              <?php if ($items) : ?>
                <?php foreach($items as $item) :?>
                  <div class="big-img-swipe">
                    <img class=""src="<?=$item['image']['url']?>" alt=""style="max-width:200px">
                  </div>
                <?php endforeach; endif ?>
            </div>
          </div> -->

          <!-- End new swiper -->


          <div id="<?=get_the_ID()?>" class="product-detail-info product-id">
            <div class="product-detail-title">
              <div class="product-brand">
                <a href="<?= get_field('brand_link')['url']?>"><?= get_field('brand_name')?></a>
              </div>
              <div>
                <h1 class="product-detail-name" id="product-name"><?= $title ?></h1>
              </div>
              <div class="row">
                <div class="col-md-6 align-cent">
                  <div class="product-detai-sale-price">
                    <?php $saled_price=get_field('price_original') * (100 - abs(get_field('percent_discount'))) / 100  ?>
                    <span class="detail-saleoff" id="detail-saleoff"><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?>đ</span>
                    <span id="detail-price" class="strikethrough"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                  </div>
                </div>
                <div class="col-md-6 text-right">
                  <div class="product-detail-share">
                    <div class="share-social text-md-right text-left">
                      <span class="share-label align-middle">Share</span>
                      <ul class="share-social-list align-middle">
                        <li>
                          <a href="#" class="share-social-icon fb">
                            <img src="<?= get_template_directory_uri()?>/assets/image/face-32.svg" alt="">
                          </a>
                        </li>
                        <li>
                          <a href="#" class="share-social-icon twitter">
                            <img src="<?= get_template_directory_uri()?>/assets/image/twitter-32.svg" alt="">
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-detail-summary">
                <?= get_field('short_content') ?>
              </div>
              <div class="qty-section">
                <div class="row">
                  <div class="col-md-4  sub-qty">
                    <div class="qty-cart enumber-control inline">
                      <button type="button" class="reduced items-count" name="button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="4" viewBox="0 0 42 4"><rect width="42" height="4"/></svg>
                      </button>
                      <input type="text"  class="qty-input" id="qty-input" name="" value="1" readonly>
                      <button type="button" class="increase items-count" name="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42"><g transform="translate(-182 -188)"><rect width="42" height="4" transform="translate(182 207)"/><rect width="42" height="4" transform="translate(205 188) rotate(90)"/></g></svg>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-8  sub-qty open-cart">
                    <a href="#" class="add-to-cart">THÊM VÀO GIỎ</a>
                    <a href="<?= get_home_url() ?>/gio-hang" class="buy-now">MUA NGAY</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>

      <section class="footer-top">
        <div class="banner-wrapper">
          <div class="banner-bar">
            <?php $items = get_field('banner-section','option') ?>
            <?php if ($items) : ?>
              <?php foreach ($items as $item) : ?>
                <div class="banner-quality">
                  <img class="quality-logo"src="<?= $item['banner-img']['url']?>" alt="">
                  <p class="quality-title"><?= $item['banner-title']  ?></p>
                  <p class="quality-text"><?= $item['banner-text']  ?></p>
                </div>
              <?php endforeach; endif ?>
            </div>
        </div>
      </sec>


      <section class="product-detail-content">
        <div class="product-detail-main-content">
          <div class="product-detail-main-content-wrapper">
            <!--Loop here-->
            <!-- <div class="product-detail-tab">
            <?php $items = get_field('product_detail_list'); $index = 1; ?>
            <?php if ($items) :?>
              <?php foreach ($items as $item) : ?>
                  <div class="product-detail-tab-item ">
                    <a class="pd-tabitem-link tab-<?=$index?>" nav="nav-<?=$index?>">
                    <?= $item['tab'] ?>
                    </a>
                </div>
                <?php $index = $index +1; ?>
              <?php endforeach; endif?>
            </div> -->
              <div class="product-detail-description-list">
                <!-- <?php $items = get_field('product_detail_list'); $index = 1; ?>
                <?php if ($items) :?>
                  <?php foreach ($items as $item) : ?>
                      <div id="nav-<?=$index?>" class="product-detail-description descrip-<?=$index?>">
                        <?= $item['description'] ?>
                      </div>
                    <?php $index = $index +1; ?>
                  <?php endforeach; endif?> -->
                  <h4>Thông số kĩ thuật của <?= $title ?></h4>
                  <div class="specifications-wrapper">
                    <ul class="specifications">
                      <?php
                      $index = 1;
                      if( have_rows('specifications') ):
                        while( have_rows('specifications') ) : the_row();
                        $detail= get_sub_field('detail');
                        $param = get_sub_field('parameter');
                        ?>
                        <li style="background: <?php if ($index%2) echo"#f5f5f5;"?> ">
                          <p><?= $detail ?></p>
                          <div class="">
                            <?= $param ?>
                          </div>
                        </li>
                        <?php $index = $index + 1; ?>
                        <?endwhile;endif;?>
                      </ul>
                  </div>

                  <?= $description?>
              </div>
          </div>
        </div>
        <div class="product-detail-related-product">
          <div class="related-product">
            <h4 class="section-site-map-title-product">Sản phẩm liên quan</h4>
            <div class="related-product-wrapper">
              <div class="product-list-wrapper">
                <div class="product-detail-slider">
                  <?php
                 $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                 $args = [
                     "post_type" => ["product"],
                     "posts_per_page" => 4,
                     'taxonomy' => 'product_category',
                     'paged' => $paged,
                     'term' => $category,
                     "meta_query" => array(
                       "relation" => "AND",
                       array(
                         "key" => "is_extra_item",
                         "value" => true
                       )
                     )
                 ];
                ?>
                <?php $the_query = new WP_query($args); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                  <?php
                     $title = get_the_title();
                     $description = get_the_excerpt();
                     $link = esc_url( get_permalink() );
                     $image = get_field('feature_image_image');
                     $date = get_field('info_date')
                   ?>
                    <div class="product-panel">
                      <a href="<?= get_permalink() ?>"></a>
                      <div class="content">
                        <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
                        <div class="title">
                          <h5><?= get_the_title() ?></h5>
                          <?php if (get_field('brand') != '') :?>
                          <p class="desc"><?= get_field('brand') ?> - <?= get_field('power') ?></p>
                        <?php endif; ?>
                        </div>
                        <div class="price">
                          <?php $saled_price=get_field('price_original') * (100 - abs(get_field('percent_discount'))) / 100  ?>
                          <?php $strikethrough = null ?>
                          <?php if (get_field('price_saled_price') != null) $strikethrough = 'strikethrough' ?>
                          <span><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?>&nbsp;&nbsp;</span>
                          <span class="<?= $strikethrough ?>"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?></span>
                        </div>
                      </div>
                    </div>
                  <?php  endwhile;endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="product-detail-related-project">
          <div class="related-project">
            <div class="related-project-wrapper">
              <h4 class="section-sitemap-title">Phụ kiện thường mua cùng</h4>
              <div class="loop-list">
                <?php
                  $paged = get_query_var( 'projects' ) ? absint( get_query_var( 'paged' ) ) : 1;
                    $args = array(
                        "post_type" => "project",
                        'paged' => $paged,
                        "meta_query" => array(
                          "relation" => "AND",
                          array(
                            "key" => "is_extra_item",
                            "value" => true
                          )
                        )
                    );
                  $the_query = new WP_query($args);
                ?>
                <?php if ($the_query->have_posts()):
                while ( $the_query->have_posts() ) :
                  $the_query->the_post(); ?>
                   <?php
                      $post_id = get_the_ID();
                      $title = wp_trim_words(get_the_title(), 5);
                      $description = wp_trim_words(get_the_excerpt(),22);
                      $link = esc_url( get_permalink() );
                      $category = get_the_terms( get_the_ID(), 'category');
                      $day = get_field('day');
                      $client = get_field('client');
                      $image = get_field('img')['url'];
                      $wattage = get_field('wattage');
                      $area = get_field('are');
                      $place = get_field('place')
                    ?>
                    <a class="project-list__item-link" href="<?= $link?>">
               <div class="project-list__item-wrapper">

                    <img class="image" width="370" height="174"
                         src="<?= $image ?>" >
                <div class="project-list__item-info">
                    <div class="project-list__item-info-content text-center">
                        <div class="project-list__item-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                          </svg></div>
                        <div class="project-list__item-title font-nunito color-dark-blue"><?= $title ?></div>
                        <div class="project-list__item-detail font-nunito">Năm: <?= $day ?> - <?= $wattage?></div>
                    </div>
                </div>
                </div>
                </a>


            <?php endwhile; ?>
            <?php endif; $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages; wp_reset_postdata(); ?>
         </div>
            </div>
          </div>
        </div> -->
      </section>
    </div>
  </section>
</main>
<?php $title = wp_trim_words(get_the_title(), 20); ?>
<div class="popup-cart ">
  <div class="popup-outer">
    <div class="close"></div>
    <div class="popup-wrapper">
      <div class="popup-container">
        <div class="left-popup">
          <p class="title-left-popup" id="title-left-popup">
             sản phẩm mới đã được thêm vào giỏ hàng của bạn
          </p>
          <div class="left-bottom-popup">
            <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
            <div class="left-bottom-popup-content">
              <p class="title"><?= $title ?></p>
              <p class="saled-price"><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?></p>
              <p class="strikethrough"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?></p>
            </div>
          </div>
        </div>
        <div class="right-popup">
          <div class="right-popup-1">
            <h5>Giỏ hàng</h5>
            <div id="total-cart-popup"></div>
          </div>
          <div class="right-popup-2">
            <p>Tạm tính:</p>
            <p class="show-sum-popup"></p>
          </div>
          <div class="right-popup-3">
            <p>Thành tiền:</p>
            <p class="show-sum-popup"></p>
          </div>
          <p class="sub-desc">(Tổng số tiền thanh toán)</p>
          <div class="popup-button-wrapper">
            <a href="<?= get_home_url() ?>/gio-hang">Xem giỏ hàng & thanh toán</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
<?= get_footer() ?>
