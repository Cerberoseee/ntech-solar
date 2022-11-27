<?php
 /* Template name: Project*/
  $status = 'doing';
  if (isset($_GET['status'])) {
    $status = $_GET['status'];
  }
 ?>
  <header id="elife-header" class="elife-header"><?php get_header() ?></header>
 <div id="sb-site" class="sb-site-container">
     <!-- HEADER -->

     <main class="project-page">
      <div class="directory-bar fw-5 font-nunito">
         <div class="container-top">
           <a href="<?= get_site_url() ?>">Trang chủ</a>
           <span> / </span>
           <a href="<?= get_permalink()?>" class="current-page">Dự án</a>
         </div>
      </div>
         <div class="elife-content">
             <div class="elife-wrapper clearfix">
                 <section class="project-page">
                     <div class="page-banner">
                         <picture>
                             <img class="img-bg" src="<?= get_field('img')['url'] ?>" alt="Liên hệ">
                         </picture>
                     </div>
                     <div class="container">
                         <div class="project-list-section">
                             <div class="project-list__header">
                                 <h1 class="section-sitemap-title text-center fw-7">
                                   <?php if ($status === 'doing'): ?>
                                     Dự án đang thực hiện

                                 </h1>
                                 <div class="project-list__summary text-center"><?= get_field('content')?></div>
                                <?php else: ?>
                                 Dự án hoàn thành
                                  <?php endif; ?>
                             </div>
                             <div class="project-list__body">
                               <div class="row">
                                   <div class="col-lg-4 col-md-6 project-list__item" style="max-width: 100%;">
                                       <div class="project-list__item-wrapper-1">
                                         <div class="">
                                           <?php
                                             $paged = get_query_var( 'projects' ) ? absint( get_query_var( 'paged' ) ) : 1;
                                             if ($status == 'doing') {
                                               $args = array(
                                                   "post_type" => "project",
                                                   'posts_per_page' => 6,
                                                   'taxonomy' => 'project_category',
                                                   'order'=>'desc',
                                                   'paged' => $paged,
                                                   'term' => 'du-an-dang-thuc-hien',
                                               );
                                             }
                                             else {
                                               $args = [
                                                   "post_type" => "project",
                                                   'posts_per_page' => 1,
                                                   'taxonomy' => 'project_category',
                                                   'order'=>'desc',
                                                   'paged' => $paged,
                                                   'term' => 'du-an-hoan-thanh',
                                               ];
                                             }
                                             $the_query = new WP_query($args);
                                           ?>
                                         </div>
                                         <div class="loop-list">
                                           <?php if ($the_query->have_posts()):
                                           while ( $the_query->have_posts() ) :
                                             $the_query->the_post(); ?>
                                              <?php
                                                 $post_id = get_the_ID();
                                                 $title = wp_trim_words(get_the_title(), 10);
                                                 $description = wp_trim_words(get_the_excerpt(),22);
                                                 $link = get_field('link');
                                                 $category = get_the_terms( get_the_ID(), 'category');
                                                 $day = get_field('day');
                                                 $client = get_field('client');
                                                 $image = get_field('img')['url'];
                                                 $wattage = get_field('wattage');
                                                 $area = get_field('are');
                                                 $place = get_field('place')
                                               ?>
                                               <a class="project-list__item-link" href="<?= $link['url']?>">
                                          <div class="project-list__item-wrapper">

                                               <img class="image" width="370" height="208"
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
                             </div>
                             <?php glw_custom_pagination(); ?>
                         </div>
                     </div>
                 </section>
             </div>
         </div>
       </div>
    </main>
     <footer id="elife-footer">
         <?php get_footer()?>
     </footer>
 </div>
