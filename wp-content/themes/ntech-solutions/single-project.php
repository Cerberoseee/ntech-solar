<div id="sb-site" class="sb-site-container">
    <!-- HEADER -->
    <header id="elife-header" class="elife-header"><?= get_header() ?></header>
    <?php
       $post_id = get_the_ID();
       $content = get_the_content();
       $title = wp_trim_words(get_the_title(), 20);
       $description = wp_trim_words(get_the_excerpt(),'full');
       $link = esc_url( get_permalink() );
       $category = get_the_terms( get_the_ID(), 'category');
       $day = get_field('day');
       $client = get_field('client');
       $image = get_field('img')['url'];
       $wattage = get_field('wattage');
       $area = get_field('are');
       $place = get_field('place')
     ?>
    <main class="project-detail-page">
      <div class="directory-bar fw-5 font-nunito">
        <div class="container-header">
          <a href="<?= get_site_url() ?>">Trang chủ</a>
          <span> / </span>
          <a href="<?= get_permalink()?>" >Blog</a>
          <span> / </span>
          <a href="<?= $link?>" class="current-page"><?= $title ?></a>
        </div>
      </div>
        <div class="elife-content">
            <div class="elife-wrapper clearfix">
              <h1 class="project-detail__title"><?= $title?></h1>
              <div class="project-detail__banner">

                  <!-- Slider main container -->
                  <div class="pd-banner">
                    <?php $items = get_field('banner') ?>
                    <?php if ($items) : ?>
                      <?php foreach($items as $item) :?>
                        <div class="">
                          <div class="product-thumb-item">
                            <img src="<?=$item['img']['url']?>" alt="">
                          </div>
                        </div>
                      <?php endforeach; endif ?>
                  </div>
              </div>
              <div class="project-detail">

                  <div class="container">



                      <div class="project-detail__content">
                          <div class="row">
                              <div class="col-lg-8 order-lg-0 order-1">
                                  <div class="project-detail__description">
                                      <div class="section-sitemap-title">Giới thiệu dự án</div>
                                      <div class="project-detail__description-content"><?= $content?></div>
                                  </div>
                              </div>
                              <div class="col-lg-4 order-lg-1 order-0">
                                  <div class="project-detail__info company-info">
                                      <div class="section-sitemap-title dark">Thông tin dự án</div>
                                      <div class="info-list column">
                                          <div class="col-lg-12 col-md-6 info-item">
                                              <div class="info-item__icon">
                                                <svg class="icon"xmlns="http://www.w3.org/2000/svg" width="27.857" height="30" viewBox="0 0 27.857 30">
                                                  <path d="M66.143,27.857h4.821V23.036H66.143Zm5.893,0h5.357V23.036H72.036Zm-5.893-5.893h4.821V16.607H66.143Zm5.893,0h5.357V16.607H72.036Zm-5.893-6.429h4.821V10.714H66.143ZM78.464,27.857h5.357V23.036H78.464ZM72.036,15.536h5.357V10.714H72.036ZM84.893,27.857h4.821V23.036H84.893Zm-6.429-5.893h5.357V16.607H78.464ZM72.571,7.5V2.679a.543.543,0,0,0-.536-.536H70.964a.543.543,0,0,0-.536.536V7.5a.543.543,0,0,0,.536.536h1.071a.543.543,0,0,0,.536-.536ZM84.893,21.964h4.821V16.607H84.893Zm-6.429-6.429h5.357V10.714H78.464Zm6.429,0h4.821V10.714H84.893ZM85.429,7.5V2.679a.543.543,0,0,0-.536-.536H83.821a.543.543,0,0,0-.536.536V7.5a.543.543,0,0,0,.536.536h1.071a.543.543,0,0,0,.536-.536Zm6.429-1.071V27.857A2.173,2.173,0,0,1,89.714,30H66.143A2.173,2.173,0,0,1,64,27.857V6.429a2.059,2.059,0,0,1,.636-1.507,2.059,2.059,0,0,1,1.507-.636h2.143V2.679A2.579,2.579,0,0,1,69.073.787,2.579,2.579,0,0,1,70.964,0h1.071a2.579,2.579,0,0,1,1.892.787,2.579,2.579,0,0,1,.787,1.892V4.286h6.429V2.679A2.579,2.579,0,0,1,81.93.787,2.579,2.579,0,0,1,83.821,0h1.071a2.579,2.579,0,0,1,1.892.787,2.579,2.579,0,0,1,.787,1.892V4.286h2.143a2.059,2.059,0,0,1,1.507.636A2.059,2.059,0,0,1,91.857,6.429Z" transform="translate(-64)" fill="#fff"/>
                                                </svg>
                                              </div>
                                              <div class="info-item__content">
                                                  <span>Ngày hoàn thành</span><br>
                                                  <span><?= $day ?></span>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-6 info-item">
                                              <div class="info-item__icon">
                                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 25 30">
                                                  <path d="M281,152.824a5.659,5.659,0,0,1-1.221,3.652A3.658,3.658,0,0,1,276.84,158H260.16a3.658,3.658,0,0,1-2.939-1.523A5.659,5.659,0,0,1,256,152.824a28.057,28.057,0,0,1,.166-3.135,16.847,16.847,0,0,1,.615-2.969,9.883,9.883,0,0,1,1.143-2.559,5.468,5.468,0,0,1,1.836-1.738,5.073,5.073,0,0,1,2.627-.674,8.724,8.724,0,0,0,12.227,0,5.073,5.073,0,0,1,2.627.674,5.468,5.468,0,0,1,1.836,1.738,9.883,9.883,0,0,1,1.143,2.559,16.847,16.847,0,0,1,.615,2.969A28.057,28.057,0,0,1,281,152.824ZM276,135.5a7.5,7.5,0,1,1-2.2-5.3A7.226,7.226,0,0,1,276,135.5Z" transform="translate(-256 -128)" fill="#fff"/>
                                                </svg>
                                              </div>
                                              <div class="info-item__content">
                                                  <span>Khách hàng</span><br>
                                                  <span><?= $client ?></span>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-6 info-item">
                                              <div class="info-item__icon">
                                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                                  <path d="M12,0,0,16H12L4,32,32,12H16L28,0Z" fill="#fff"/>
                                                </svg>
                                              </div>
                                              <div class="info-item__content">
                                                  <span>Công suất</span><br>
                                                  <span><?= $wattage ?></span>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-6 info-item">
                                              <div class="info-item__icon">
                                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="35.455" height="30" viewBox="0 0 35.455 30">
                                                  <path d="M80.364,147.091v8.182A2.765,2.765,0,0,1,77.636,158H66.727A2.765,2.765,0,0,1,64,155.273v-8.182a2.765,2.765,0,0,1,2.727-2.727H77.636a2.765,2.765,0,0,1,2.727,2.727Zm0-16.364v8.182a2.765,2.765,0,0,1-2.727,2.727H66.727A2.765,2.765,0,0,1,64,138.909v-8.182A2.765,2.765,0,0,1,66.727,128H77.636a2.765,2.765,0,0,1,2.727,2.727Zm19.091,16.364v8.182A2.765,2.765,0,0,1,96.727,158H85.818a2.765,2.765,0,0,1-2.727-2.727v-8.182a2.765,2.765,0,0,1,2.727-2.727H96.727a2.765,2.765,0,0,1,2.727,2.727Zm0-16.364v8.182a2.765,2.765,0,0,1-2.727,2.727H85.818a2.765,2.765,0,0,1-2.727-2.727v-8.182A2.765,2.765,0,0,1,85.818,128H96.727a2.765,2.765,0,0,1,2.727,2.727Z" transform="translate(-64 -128)" fill="#fff"/>
                                                </svg>
                                              </div>
                                              <div class="info-item__content">
                                                  <span>Diện tích triển khai</span><br>
                                                  <span><?= $place ?></span>
                                              </div>
                                          </div>
                                          <div class="col-lg-12 col-md-6 info-item">
                                              <div class="info-item__icon">
                                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 20 30">
                                                  <path d="M399,138a5,5,0,1,0-1.465,3.535A4.817,4.817,0,0,0,399,138Zm5,0a8.219,8.219,0,0,1-.645,3.5l-7.109,15.117a2.37,2.37,0,0,1-.928,1.016,2.527,2.527,0,0,1-2.637,0,2.25,2.25,0,0,1-.908-1.016L384.645,141.5A8.219,8.219,0,0,1,384,138a10,10,0,0,1,20,0Z" transform="translate(-384 -128)" fill="#fff"/>
                                                </svg>
                                              </div>
                                              <div class="info-item__content">
                                                  <span>Địa điểm</span><br>
                                                  <span><?= $place ?></span>
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
        </div>
    </div>
  </main>
    <!-- FOOTER -->
    <footer id="elife-footer">
        <?= get_footer()?>
    </footer>
</div>
