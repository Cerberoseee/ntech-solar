<?php
  /* Template name: Product */
 ?>
<?= get_header() ?>
<main class="product-page">
  <div class="directory-bar fw-5 font-nunito">
    <div class="container">
      <a href="<?= get_site_url() ?>">Trang chủ</a>
      <span> / </span>
      <a href="<?= get_permalink()?>" class="current-page">Sản phẩm</a>
    </div>
  </div>

    <?php
    $args = array(
      "post_type" => "product_cat",
      'post_status' => array( 'publish' ),
    );
    $the_query = new WP_query($args);
    ?>
    <?php while ( $the_query -> have_posts() ):
      $the_query -> the_post();
      $id = get_the_ID();
      $link = rtrim(get_permalink(get_the_ID()),'/');
      $cat = get_the_title();
      $cat_slug = get_post_field('post_name');
      $content = get_field('content');
      $brands = get_field('brand');
      $products = get_field('product');
    ?>
    <div class="product-cat-section">
      <div class="container">
        <div class="product-cat-overview">
          <div class="title-wrapper">
            <h5 class="font-nunito fw-7 color-dark-blue"><?= $cat ?></h5>
            <p class="font-nunito "><?= $content ?></p>
            <a class="font-nunito fw-7" href="<?= $link ?>">
              <button type="button" name="button">Xem thêm</button>
            </a>
          </div>
          <div class="brand-list-wrapper">
            <?php if ($brands): foreach ($brands as $brand): ?>
              <a href="<?= $link ?>?brand=<?= get_post_field('post_name', $brand->ID) ?>">
                <img src="<?= get_field('image', $brand->ID)['url'] ?>" alt="">
              </a>
            <?php endforeach; endif;?>
          </div>
        </div>

        <div class="product-list-wrapper">
          <div class="product-slider">
            <?php $args = array(
              'post_type' => 'product',
              'post_status'    => array( 'publish' ),
            ) ?>
            <?php $products = new WP_query($args); ?>
            <?php while ($products -> have_posts() ):
              $products -> the_post();
              if (sanitize_title(get_field('category')[0] -> post_title) == $cat_slug):
            ?>
              <div class="product-panel">
                <a href="<?= get_permalink() ?>"></a>
                <div class="content">
                  <img src="<?= get_field('thumbnail')['url'] ?>" alt="">
                  <div class="title">
                    <h5><?= get_the_title() ?></h5>
                    <p class="desc"><?= get_field('brand_name') ?> - <?= get_field('power') ?></p>
                  </div>
                  <div class="price">
                    <?php $strikethrough = null ?>
                    <?php if (get_field('price_saled_price') != null) $strikethrough = 'strikethrough' ?>
                    <span><?= get_field('price_saled_price') ?>&nbsp;&nbsp;</span>
                    <span class="<?= $strikethrough ?>"><?= get_field('price_original') ?></span>
                  </div>
                </div>
              </div>
            <?php endif; endwhile;?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</main>
<?= get_footer() ?>
