<?php
 /* Template name: Blog */
 ?>

<?= get_header() ?>
<main class="blog-page">
  <div class="directory-bar fw-5 font-nunito">
    <div class="container-top">
      <a href="<?= get_site_url() ?>">Trang chủ</a>
      <span> / </span>
      <a href="<?= get_permalink()?>" class="current-page">Blog</a>
    </div>
  </div>
    <div class="elife-content">
        <div class="elife-wrapper clearfix">
          <div class="container">
              <section class="news-list">
                  <header class="news-list-header">
                      <h1 class="section-sitemap-title text-center">Blog</h1>
                  </header>
                  <div class="news-list-body">
                      <div class="row">
                          <div class="col-lg-12">
                            <div class="">
                              <?php
                                $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
                                  $args = array(
                                      "post_type" => "blog",
                                      'paged' => $paged,
                                      "posts_per_page" => 6,
                                  );
                                $the_query = new WP_query($args);
                                $final_query = [];
                              ?>
                            </div>
                            <div class="loop-list">
                              <?php if ($the_query->have_posts()):
                              while ( $the_query->have_posts() ) :
                                $the_query->the_post(); ?>
                                 <?php
                                    $post_id = get_the_ID();
                                    $title = wp_trim_words(get_the_title(), 20);
                                    $description = wp_trim_words(get_the_excerpt(),50);
                                    $link = esc_url( get_permalink() );
                                    $category = get_the_terms( get_the_ID(), 'category');
                                    $day = get_field('info_date');
                                    $image = get_field('feature_image_image')['url'];
                                  ?>
                              <article class="news-item">
                                  <div class="row">
                                      <div class="col-md-4 mb-md-0 mb-3">
                                          <div class="news-item-image">
                                              <a href="<?= $link ?>">
                                                  <img width="350" height="200" alt=""
                                                       src="<?= $image?>" />
                                              </a>
                                          </div>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="news-item-content">
                                              <div class="news-item-title color-dark-blue"><a class="no-link" href="<?= $link ?>"><?= $title ?></a></div>
                                              <div class="news-updated-at">
                                                  <span>Ngày cập nhật: <?= $day ?></span>
                                              </div>
                                              <div class="news-item-summary size-16"><?= $description ?></div>
                                              <div class="news-item-seemore font-nunito">
                                                  <a href="<?= $link?>">
                                                      <svg class="sitemap-list__icon" width="5" height="8"></svg>
                                                      <span>Xem thêm</span>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </article>
                              <!-- <div class="text-center">
                                  <ul class="pagination justify-content-center">
                                  </ul>
                              </div> -->
                            <?php endwhile;
                             ?>
                           <?php endif; $GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages; wp_reset_postdata(); ?>
                          </div>
                      </div>
                  </div>
                  <?php
                    // session_start();
                    // $_SESSION['maxpage'] = $wp_query-> max_num_pages
                  ?>
                  <?php glw_custom_pagination(); ?>
              </section>

          </div>
        </div>
    </div>
  </div>
</main>
<?= get_footer() ?>
