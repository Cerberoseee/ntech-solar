<?php $content_data = get_the_content() ?>
<?= get_header() ?>
<main class="product-category-page">
  <div class="directory-bar fw-5 font-nunito">
    <div class="container">
      <a href="<?= get_site_url() ?>">Trang chủ</a>
      <span> / </span>
      <a href="<?= get_site_url() ?>/san-pham">Sản phẩm</a>
      <span> / </span>
      <a href="<?= get_permalink() ?>" class="current-page"><?= get_the_title() ?></a>
    </div>
  </div>
  <?php
    $brand_param = $_GET['brand'];
    $cat_param = get_the_ID();
    $power_param = $_GET['power'];
    $type_param = $_GET['type'];
  ?>

  <div class="category-overview">
    <div class="container">
      <img src="<?= get_field('image')['url'] ?>" alt="">
      <div class="title-wrapper">
        <h5 class="fw-7 color-dark-blue font-nunito"><?= get_the_title() ?></h5>
        <p class="font-nunito"><?= get_field('content') ?></p>
      </div>
    </div>
  </div>

  <div class="product-list-section">
    <div class="container">
      <div class="filter-menu">
        <div class="select-bar">
          <?php
          $value = get_the_title( url_to_postid('brand-detail/'.$brand_param) );
          if ($brand_param == "") $value = "Lọc theo thương hiệu";
          ?>
          <p id="brand-menu" class="font-nunito fw-5 selected-value"><?= $value ?></p>
          <ul id="brand-dropdown" style="display:none">
            <li class="first-item">
              <?php $link = remove_query_arg('brand', false); ?>
              <a href="<?= get_permalink().$link ?>"></a>
              <p class="item">Lọc theo thương hiệu</p>
            </li>
            <?php
              $brands = get_field('brand');
              $index = 1;
              $last_index = count($brands);
            ?>
            <?php if ($brands): foreach ($brands as $brand): ?>
              <li class="<?php if ($index == $last_index) echo 'last-item' ?>">
                <?php $link = add_query_arg('brand', get_post_field('post_name', $brand->ID) , false); ?>
                <a href="<?= get_permalink().$link ?>"></a>
                <p class="item"><?= get_the_title( $brand -> ID ); ?></p>
              </li>
            <?php $index = $index + 1; endforeach; endif;?>
          </ul>
        </div>

        <?php if (get_field('type_group') != null): ?>
          <div class="select-bar">
            <?php
            $items = get_field('type_group');
            $type_flag = true;
            foreach ($items as $item) {
              if ( sanitize_title_with_dashes( $item['type'] ) == $type_param) {
                $type_value = $item['type'];
                $type_flag = false;
              }
            }
            if($type_flag) $type_value = "Lọc theo loại";
            ?>
            <p id="type-menu" class="font-nunito fw-5 selected-value"><?= $type_value ?></p>
            <ul id="type-dropdown" style="display:none">
              <li class="first-item">
                <?php $link = remove_query_arg('type', false) ?>
                <a href="<?= get_permalink().$link ?>"></a>
                <p class="item">Lọc theo loại</p>
              </li>
              <?php
                $types = get_field('type_group');
                $index = 1;
                $last_index = count($types);
              ?>
              <?php if ($types): foreach ($types as $type): ?>
                <li class="<?php if ($index == $last_index) echo 'last-item' ?>">
                  <?php $link = add_query_arg('type', sanitize_title_with_dashes( $type['type'] ) , false) ?>
                  <a href="<?= get_permalink().$link ?>"></a>
                  <p class="item"><?= $type['type'] ?></p>
                </li>
              <?php $index = $index + 1; endforeach; endif;?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if (get_field('power_group') != null): ?>
          <div class="select-bar">
            <?php
            $power_items = get_field('power_group');
            $power_flag = true;
            foreach ($power_items as $item) {
              if ( sanitize_title_with_dashes( $item['power'] ) == $power_param) {
                $power_value = $item['power'];
                $power_flag = false;
              }
            }
            if($power_flag) $power_value = "Lọc theo công suất";
            ?>
            <p id="power-menu" class="font-nunito fw-5 selected-value"><?= $power_value ?></p>
            <ul id="power-dropdown" style="display:none">
              <li class="first-item">
                <?php $link = remove_query_arg('power', false) ?>
                <a href="<?= get_permalink().$link ?>"></a>
                <p class="item">Lọc theo công suất</p>
              </li>
              <?php
                $types = get_field('power_group');
                $index = 1;
                $last_index = count($types);
              ?>
              <?php if ($types): foreach ($types as $type): ?>
                <li class="<?php if ($index == $last_index) echo 'last-item' ?>">
                  <?php $link = add_query_arg('power', sanitize_title_with_dashes( $type['power'] ) , false) ?>
                  <a href="<?= get_permalink().$link ?>"></a>
                  <p class="item"><?= $type['power'] ?></p>
                </li>
              <?php $index = $index + 1; endforeach; endif;?>
            </ul>
          </div>
        <?php endif; ?>

        <?php $link = remove_query_arg(array('type', 'power', 'brand'), false) ?>
        <a class="font-nunito remove-filter" href="<?= $link ?>">Bỏ lọc</a>
      </div>
      <div class="list">
        <?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1; ?>
        <?php $args = array(
          'post_type' => 'product',
          'post_status' => array( 'publish' ),
          'posts_per_page' => -1,
          'paged' => $paged,
        )?>
        <?php
          $wp_query = new WP_query($args);
        ?>
        <?php
          while( $wp_query -> have_posts() ):
            $wp_query -> the_post();
			$categories_array = get_post_ancestors(get_field('category')[0] -> ID);
            array_push($categories_array, get_field('category')[0] -> ID);
            if (in_array($cat_param, $categories_array)):
              if ($brand_param == sanitize_title(get_field('brand_name')) || $brand_param == ""):
                if ($power_param == sanitize_title(get_field('power')) || $power_param == ""):
                  if ($type_param == sanitize_title(get_field('type')) || $type_param == ""):
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
        <?php
      endif;endif;endif;endif;
        endwhile;
        ?>
        <div class="pagination-bar">
          <?php
          // glw_custom_product_cat_pagination();
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="near-footer-content container">
    <?= apply_filters('the_content', $content_data); ?>
  </div>
</main>
<?= get_footer() ?>
