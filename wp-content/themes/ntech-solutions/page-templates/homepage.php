s<?php
/*
  Template name: Homepage
*/
  $page_id = get_the_ID();
  $GLOBALS['flash_sale'] = get_field('time_sale_off');
?>
<?= get_header() ?>
<main class="homepage">
  <!-- <section>
    <div class="header_product">
      <?php $items = get_field('header_product') ?>
        <?php if ($items) : foreach ($items as $item): ?>
          <?php $img = $item['img'] ?>
          <div class="product-header">
            <a class="link-product" href="#">
              <img class="img-product" src="<?= $img['url'] ?>" alt="">
              <p class="name-product font-nunito"><?=$item['name'] ?></p>
            </a>
          </div>
          <?php endforeach; endif; ?>
    </div>

  </section> -->
  <section>
    <!-- <span class="slick-prev"><i class="fa-solid fa-angle-left"></i></span> -->
    <div class="section-1">
      <img src="<?= get_field('banner-behind')['url']?>" alt="" style="width:100%;object-fit: cover;
    aspect-ratio: 3/1;">
      <div class="slide-content">
        <div class="slide-banner">
          <?php $items = get_field('section_1') ?>
          <?php if ($items) : foreach ($items as $item): ?>
            <?php $img = $item['img'] ?>
            <div class="banner-display">
              <img class="img-banner" src="<?= $img['url'] ?>" alt="">
              <div class="banner-content">
                <p class="fw-7 color-dark-blue font-nunito title-banner"><?=$item['title'] ?></p>
                <p class="fw-7 color-dark-blue font-nunito text-banner"><?=$item['text'] ?></p>
              </div>
            </div>
          <?php endforeach; endif; ?>
        </div>
        <div class="footer-top">
          <div class="banner-wrapper">
            <div class="banner-bar">
              <?php $items = get_field('banner-section') ?>
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
        </div>
      </div>

    </div>
    <!-- <span class="slick-next"><i class="fa-solid fa-angle-right"></i></span> -->
  </section>
  <section>
    <div class="section-2 flash-sale">
      <p class="fw-7 size-36 color-dark-blue title-product font-nunito">
        Flash Sale &nbsp;
        <span id="hours">:</span>
        <span>:</span>
        <span id="minutes"></span>
        <span>:</span>
        <span id="seconds"></span>
      </p>
      <div class="product-list">
      <?php $args = array(
        "post_type" => "product",
        "posts_per_page" => 4,
        "meta_query" => array(
          "relation" => "AND",
          array(
            "key" => "is_sale_product",
            "value" => true
          )
        )
      ) ?>
      <?php $the_query = new WP_query($args) ?>
      <?php while($the_query -> have_posts() ): ?>
        <?php $the_query -> the_post(); ?>
          <div class="product-panel">
            <div class="product-note">
              <?if (get_field('show_new')) :  ?>
                <img src="<?= get_template_directory_uri() ?>/assets/image/new.png" alt="">
              <?php endif; ?>
              <?php if (get_field('show_hot')) : ?>
                <img src="<?= get_template_directory_uri() ?>/assets/image/hot.png" alt="">
              <?php endif; ?>
            </div>
            <a href="<?= get_permalink() ?>"></a>
            <div class="content">
              <div class="image-wrapper">
                <div class="image-container">
                  <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
                  <?php if (get_field('is_free_ship')): ?>
                    <p>FREESHIP</p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="title">
                <h5><?= get_the_title() ?></h5>
                <?php if (get_field('brand_name') != null) :  ?>
                  <p class="desc"><?= get_field('brand_name') ?> - <?= get_field('power') ?></p>
                <?php endif; ?>
              </div>
              <div class="price">
                <?php if (get_field('percent_discount') != null):?>
                <div class="sub-price">
                  <?php $saled_price=get_field('price_original') * (100 - abs(get_field('percent_discount'))) / 100  ?>
                  <?php $strikethrough = null ?>
                  <span style="text-align:left"><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?>đ &nbsp;&nbsp;</span>
                  <div class="discount-price">
                    <?php $strikethrough = 'strikethrough' ?>
                    <span class="<?= $strikethrough ?>"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                    <?php if(get_field('percent_discount') != 0): ?>
                      <span class="percent-discount"><?= get_field('percent_discount') ?>%</span>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endif; ?>
                <?php if (get_field('percent_discount') == null):?>
                <span><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                <?php endif; ?>
                <img class="procduct-cart-btn"src="<?= get_template_directory_uri() ?>/assets/image/cart-button.svg" alt="">
              </div>
              <?php if (get_field(total_import) != null and get_field(quantity_product) != null) : ?>
              <div class="total-line">
                <div class="quantity-line" style="width: calc(<?= get_field(quantity_product) / get_field(total_import) ?> * 100%) ;">
                  <div class="quantity-show">
                    Còn <?=get_field('quantity_product') ?> sp
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
          </div>
      <?php endwhile; ?>
      </div>

      <div class="button-area">
        <a class="button-all font-nunito fw-5 size-16 color-light-blue" href="#">Xem tất cả</a>
      </div>
    </div>
    <div class="section-2">
      <p class="fw-7 size-36 color-dark-blue title-product font-nunito">Sản phẩm nổi bật</p>
      <div class="product-list">
      <?php $args = array(
        "post_type" => "product",
        "posts_per_page" => 4,
        "meta_query" => array(
          "relation" => "AND",
          array(
            "key" => "is_hot_product",
            "value" => true
          )
        )
      ) ?>
      <?php $the_query = new WP_query($args) ?>
      <?php while($the_query -> have_posts() ): ?>
        <?php $the_query -> the_post(); ?>
          <div class="product-panel">
            <div class="product-note">
              <?if (get_field('show_new')) :  ?>
                <img src="<?= get_template_directory_uri() ?>/assets/image/new.png" alt="">
              <?php endif; ?>
              <?php if (get_field('show_hot')) : ?>
                <img src="<?= get_template_directory_uri() ?>/assets/image/hot.png" alt="">
              <?php endif; ?>
            </div>
            <a href="<?= get_permalink() ?>"></a>
            <div class="content">
              <div class="image-wrapper">
                <div class="image-container">
                  <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
                  <?php if (get_field('is_free_ship')): ?>
                    <p>FREESHIP</p>
                  <?php endif; ?>
                </div>
              </div>
              <div class="title">
                <h5><?= get_the_title() ?></h5>
                <p class="desc"><?= get_field('brand_name') ?> - <?= get_field('power') ?></p>
              </div>
              <div class="price">
                <?php if (get_field('percent_discount') != null):?>
                <div class="sub-price">
                  <?php $saled_price=get_field('price_original') * (100 - abs(get_field('percent_discount'))) / 100  ?>
                  <?php update_field('price_saled_price',$saled_price) ?>
                  <?php $strikethrough = null ?>
                  <span style="text-align:left"><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?>đ &nbsp;&nbsp;</span>
                  <div class="discount-price">
                    <?php $strikethrough = 'strikethrough' ?>
                    <span class="<?= $strikethrough ?>"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                    <?php if(get_field('percent_discount') != 0): ?>
                      <span class="percent-discount"><?= get_field('percent_discount') ?>%</span>
                    <?php endif; ?>
                  </div>
                </div>
                <?php endif; ?>
                <?php if (get_field('percent_discount') == null):?>
                <span><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                <?php endif; ?>
                <img class="procduct-cart-btn"src="<?= get_template_directory_uri() ?>/assets/image/cart-button.svg" alt="">
              </div>
              <?php if (get_field(total_import) != null and get_field(quantity_product) != null) : ?>
              <div class="total-line">
                <p>ĐANG BÁN CHẠY</p>
                <div class="quantity-line" style="width: calc(<?= get_field(quantity_product) / get_field(total_import) ?> * 100%) ;">
                </div>
              </div>
            <?php endif; ?>
            </div>
          </div>
      <?php endwhile; ?>
      </div>

      <div class="button-area">
        <a class="button-all font-nunito fw-5 size-16 color-light-blue" href="#">Xem tất cả</a>
      </div>
    </div>
    <div class="section-2">
      <?php
      $outer_args = array(
        "post_type" => "product_cat",
        "post_status" => array( "publish"),
        "meta_query" => array(
          array(
            "key" => "is_show_homepage",
            "value" => 1
          )
        )
      );
      $outer_query = new WP_query($outer_args) ?>
      <?php
      while($outer_query -> have_posts() ):
        $outer_query -> the_post();
        $link = get_permalink();
        $cat_param = get_the_ID();
      ?>
        <div class="section-2" >
          <p class="fw-7 size-36 color-dark-blue title-product font-nunito"><?= get_the_title() ?></p>
          <div class="section-ads">
            <div class="ads-wrapper">
              <div class="slide-ads">
                <?php
                if( have_rows('slide_image') ):
                  while( have_rows('slide_image') ) : the_row();
                  $sub_value = get_sub_field('image')['url'];
                  ?>
                  <img src="<?= $sub_value?>" alt="">
                <?php endwhile;
              endif; ?>
            </div>
            <div class="product-ads-list">
              <?php
              $index = 0;
              $inner_args = array(
                "post_type" => "product",
                "post_status" => array( "publish" )
              );
              $inner_query = new WP_query($inner_args);
              ?>
              <?php
              while($inner_query -> have_posts() && $index < 8):
                $inner_query -> the_post();
                $categories_array = get_post_ancestors(get_field('category')[0] -> ID); #
                array_push($categories_array, get_field('category')[0] -> ID); #
                if (in_array($cat_param, $categories_array)):
                  ?>
                  <div class="product-panel">
                    <a href="<?= get_permalink() ?>"></a>
                    <div class="content">
                      <div class="image-wrapper">
                        <div class="image-container">
                          <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
                          <?php if (get_field('is_free_ship')): ?>
                            <p>FREESHIP</p>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="title">
                        <h5><?= get_the_title() ?></h5>
                        <p class="desc"><?= get_field('brand_name') ?> - <?= get_field('power') ?></p>
                      </div>
                      <div class="price">
                        <?php if (get_field('percent_discount') != null):?>
                        <div class="sub-price">
                          <?php $saled_price=get_field('price_original') * (100 - abs(get_field('percent_discount'))) / 100  ?>
                          <?php update_field('price_saled_price',$saled_price) ?>
                          <?php $strikethrough = null ?>
                          <span><?= $english_format_number = number_format($saled_price, 0, '', '.'); ?>đ &nbsp;&nbsp;</span>
                          <div class="discount-price">
                            <?php $strikethrough = 'strikethrough' ?>
                            <span class="<?= $strikethrough ?>"><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                            <?php if(get_field('percent_discount') != 0): ?>
                              <span class="percent-discount"><?= get_field('percent_discount') ?>%</span>
                            <?php endif; ?>
                          </div>
                        </div>
                        <?php endif; ?>
                        <?php if (get_field('percent_discount') == null):?>
                        <span><?= $english_format_number = number_format(get_field('price_original'), 0, '', '.'); ?>đ</span>
                        <?php endif; ?>
                        <img class="procduct-cart-btn"src="<?= get_template_directory_uri() ?>/assets/image/cart-button.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <?php $index = $index + 1; endif; endwhile; ?>
                </div>
            </div>
        </div>
          <div class="button-area">
            <a class="button-all font-nunito fw-5 size-16 color-light-blue" href=<?= $link ?>>Xem tất cả</a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <section class="commerce-panel">
    <div class="container">
      <div class="panel shopee">
        <?php $item = get_field('commerce_section_shopee_panel_link_button', $page_id) ?>
        <a href="<?= $item['url'] ?>" target="<?= $item['target']?>">
          <img src="<?= get_template_directory_uri() ?>/assets/image/shopee-panel.png" alt="">
          <a href="<?= $item['url'] ?>" target="<?= $item['target']?>" class="title-wrapper">
            <p><?= get_field('commerce_section_shopee_panel_title', $page_id) ?></p>
            <p class="button" href="<?= $item['url'] ?>" target="<?= $item['target'] ?>"><?= $item['title'] ?></p>
          </a>
        </a>
      </div>
      <div class="panel lazada">
        <?php $item = get_field('commerce_section_lazada_panel_link_button', $page_id) ?>
        <a href="<?= $item['url'] ?>" target="<?= $item['target']?>">
          <img src="<?= get_template_directory_uri() ?>/assets/image/lazada-panel.png" alt="">
          <a href="<?= $item['url'] ?>" target="<?= $item['target']?>" class="title-wrapper">
            <p><?= get_field('commerce_section_lazada_panel_title', $page_id) ?></p>
            <p class="button" href="<?= $item['url'] ?>" target="<?= $item['target'] ?>"><?= $item['title'] ?></p>
          </a>
        </a>
      </div>
    </div>
  </section>

  <section class="homepage-news">
    <div class="container">
      <div class="wrapper">
        <p class="size-36 fw-7 font-nunito color-dark-blue">Tin mới nhất</p>
        <div class="list-news">
          <?php
         $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
         $args = [
             "post_type" => ["blog"],
             "posts_per_page" => 3,
             'taxonomy' => 'blog_category',
             'paged' => $paged,
             'term' => $category,
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
           <div class="item">
             <a href="<?=$link?>">
               <img src="<?= $image['url']?>" alt="">
             </a>
             <div class="description">
               <p class="color-light-gray fw-6 font-nunito size-14"><?= $date?></p>
               <a href="<?=$link?>">
                 <p class="color-dark-blue fw-6 font-Nunito size-16"><?= $title?></p>
               </a>

             </div>
           </div>
         <?php endwhile; endif ?>
        </div>
        <a href="#">
          <button class="watch-all color-light-blue size-16 fw-6 font-nunito" type="button" name="button">Xem tất cả</button>
        </a>
      </div>
    </div>
  </section>
</main>
<?= get_footer() ?>
