<?php
  /*
    Template Name: Search
  */
?>
<?php
  $search_value = urldecode($_GET[ 's' ]);
  $args = array(
    'post_type' => 'product',
    'post_status' => array( 'publish' )
  );
  $final_query = [];
  $the_query = new WP_query($args);
  while( $the_query -> have_posts() ) {
    $the_query -> the_post();
    if ( str_contains( strtolower(get_the_title()), strtolower($search_value) )) array_push($final_query, $the_query->post);
  }
?>
<?= get_header() ?>
<main class="search-page">
  <div class="directory-bar fw-5 font-nunito">
    <div class="container">
      <a href="<?= get_site_url() ?>">Trang chủ</a>
      <span> / </span>
      <a href="<?= get_permalink()?>" class="current-page">Tìm kiếm</a>
    </div>
  </div>

  <div class="title-wrapper">
    <div class="container font-nunito">
      <h2 class="fw-7">Kết quả tìm kiếm</h2>
      <?php if (strlen($search_value) < 2) {
         $result = "Vui lòng nhập từ khóa tìm kiếm ít nhất 2 ký tự";
         $final_query = [];
       }
      else $result = "Tìm thấy ".count($final_query)." kết quả với từ khóa: <span class='fw-8'>".$search_value."</span>";
      ?>
      <p><?= $result ?></p>
    </div>
  </div>


  <div class="search-result-list">
    <div class="container">
      <?php foreach ($final_query as $item): ?>
        <div class="product-panel">
          <a href="<?= get_permalink( $item -> ID ) ?>"></a>
          <div class="content">
            <img src="<?= get_field('thumbnail', $item -> ID)['url'] ?>" alt="">
            <div class="title">
              <h5><?= get_the_title( $item -> ID ) ?></h5>
              <p class="desc"><?= get_field('brand', $item -> ID) ?> - <?= get_field('power', $item -> ID) ?></p>
            </div>
            <div class="price">
              <?php $strikethrough = null ?>
              <?php if (get_field('price_saled_price', $item -> ID) != null) $strikethrough = 'strikethrough' ?>
              <span><?= get_field('price_saled_price', $item -> ID) ?>&nbsp;&nbsp;</span>
              <span class="<?= $strikethrough ?>"><?= get_field('price_original', $item -> ID) ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</main>
<?= get_footer() ?>
