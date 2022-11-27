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
$place = get_field('place')
?>
  <main class="news-detail-page">
    <div class="directory-bar fw-5 font-nunito">
      <div class="container">
        <a href="<?= get_site_url() ?>">Trang chủ</a>
        <span> / </span>
        <a href="<?= get_site_url()?>/blog" >Blog</a>
        <span> / </span>
        <a href="<?= $link?>" class="current-page"><?= $title ?></a>
      </div>
    </div>
    <div class="container">
      <div class="news-detail">
      <div class="news-detail-wrapper">
        <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <header class="news-detail-header">
            <h1 class="section-sitemap-title"><?= $title ?></h1>
            <div class="news-date-share">
              <div class="row">
                <div class="col-md-6 mb-md-0 mb-3 flex-align">
                  <div class="news-updated-at">
                    Đăng ngày: <span><?= $date ?></span>
                  </div>
                </div>
                <div class="col-md-6">
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
          </header>
          <div class="news-detail-body">
              <?= $description ?>
              <?= $image ?>
        </div>
        <div class="elife-post-others">
          <div>
            <strong>Bài viết khác</strong>
          </div>
          <ul>
            <?php
           $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
           $args = [
               "post_type" => ["blog"],
               "posts_per_page" => 4,
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
             <li>
               <a href="<?= $link?>"><?=$title?></a>
             </li>
           <?php endwhile; endif?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  </main>
<?= get_footer() ?>
