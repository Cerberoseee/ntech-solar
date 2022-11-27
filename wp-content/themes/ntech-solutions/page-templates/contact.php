<?php
  /*Template name: Contact */
 ?>
 <?= get_header() ?>
 <div id="sb-site" class="sb-site-container">
     <!-- HEADER -->
     <main class="contact-page font-nunito">
       <div class="directory-bar fw-5 font-nunito">
         <div class="container-top">
           <a href="<?= get_site_url() ?>">Trang chủ</a>
           <span> / </span>
           <a href="<?= get_permalink()?>" class="current-page">Liên hệ</a>
         </div>
       </div>
         <div class="elife-content">
             <div class="elife-wrapper clearfix">
                 <section class="contactmap">
                     <div class="page-banner">
                         <picture>
                             <img class="img-bg" src="<?= get_field('img')['url'] ?>" alt="Liên hệ">
                         </picture>
                     </div>
                     <div class="container">
                         <div class="contactmap-content">
                             <div class="contactmap-info-section">
                                <div class="row">
                                   <div class="col-lg-8">
                                       <div class="contact-info">
                                           <h1 class="section-sitemap-title">Liên hệ với chúng tôi</h1>
                                           <?= do_shortcode('[contact-form-7 id="5" title="Contact form 1"]') ?>
                                       </div>
                                   </div>
                                   <div class="col-lg-4">
                                       <div class="company-info">
                                           <h2 class="section-sitemap-title dark font-nunito">Thông tin liên hệ</h2>
                                           <div class="company-info__name font-nunito fw-4 size-24"><?= get_field('name')?></div>
                                           <div class="company-info__address font-nunito">Địa chỉ chính:&nbsp;<?= get_field('address')?></div>
                                           <div class="company-info__address font-nunito">Showroom:&nbsp;<?= get_field('showroom')?></div>
                                           <div class="company-info__detail font-nunito">
                                               <div class="company-info__detail-item tel font-nunito"><span class="t-icon">t </span><?= get_field('phone')?></div>
                                               <div class="company-info__detail-item email font-nunito"><span class="t-icon">e </span><?= get_field('email')?></div>
                                               <div class="company-info__detail-item website font-nunito"><span class="t-icon">w </span><?= get_field('web')?></div>
                                           </div>
                                       </div>
                                   </div>
                                </div>
                             </div>
                         </div>
                     </div>
                     <div id="contactmap-map" class="contactmap-map" data-callback="loadMap">
                         <div class="map-canvas">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.03400743705!2d106.79944805071851!3d10.808707292261815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526c71f8d028d%3A0x221c71fa3269bc1e!2sPark%20Riverside%20Premium!5e0!3m2!1svi!2s!4v1661069806058!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                         </div>
                     </div>
                 </section>
               </div>
          </div>
     </main>

    <?= get_footer() ?>



 <?php
 // if ($this->smartweb->isMobile) {
 //     echo $mobilesidebarnav;
 // }
 ?>
