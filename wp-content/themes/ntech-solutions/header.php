<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ntech Solutions</title>
    <?php wp_head(); ?>
    <link rel="icon" type="image/x-icon" href="<?= get_template_directory_uri() ?>/assets/image/page-favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/header.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/payment-success.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/blog.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/pay-confirm.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/styles.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/homepage.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/footer.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/cart.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/project.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/blog-detail.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/project-detail.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/contact.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/product.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/product-category.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/search.css?ver=<?= rand(111,999)?>"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri()?>/assets/style/product-detail.css?ver=<?= rand(111,999)?>"/>
  </head>
  <?php $temp_uri = get_template_directory_uri(); ?>
  <body>
    <?php
    global $post;
    $post_slug = $post->post_name;
    $posts_array = get_posts(array(
      "post_type" => "product_cat",
      "post_status" => array( "publish" ),
      'post_parent' => 0
    ));
?>
    <?php if ($post_slug == "gio-hang" || $post_slug == "xac-nhan-thanh-toan"): ?>
      <div class="header-payment">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="header-payment-logo">
                <a href="<?= get_site_url() ?>">
                    <img src="<?= $temp_uri?>/assets/image/header-logo.svg" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="header-payment-body">
                <div class="text-right">
                  <div class="payment-status-item">
                    <a href="<?= get_site_url()?>/gio-hang">
                      <span class="payment-status-icon">1</span>
                      <span>Giỏ hàng</span>
                    </a>
                  </div>
                  <div class="payment-status-item">
                    <a href="<?= get_site_url()?>/xac-nhan-thanh-toan">
                      <span class="payment-status-icon">2</span>
                      <span>Thanh toán</span>
                    </a>
                  </div>
                  <div class="payment-status-item">
                    <span class="payment-status-icon">3</span>
                    <span>Hoàn tất</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php else : ?>
    <header id="header">
      <div class="desktop">
        <ul class="menu">
          <?php
            $index = 1;
            $array_menu = wp_get_nav_menu_items('main-menu'); ?>
          <?php foreach ($array_menu as $item): ?>

            <?php if ($index == 1): ?>
              <li>
                <a href="<?= $item->url?>" target="<?= $item->target ?>">
                  <img src="<?= $temp_uri?>/assets/image/header-logo.svg" alt="">
                </a>
              </li>
            <?php endif; ?>

            <?php if ($index == 2): ?>
              <li id="product-category-item" class="category-item product-category-item">
                <a class="main-item" href="<?= $item->url?>">
                  <?= $item->post_title ?>
                </a>
                <ul class="product-category-menu" style="display:none">
                  <?php foreach ($posts_array as $item): ?>
                    <li class="parent-category-list">
                      <?php $children_array = get_posts( array(
                        "post_type" => "product_cat",
                        'post_parent' => $item -> ID
                      ))?>
                      <a class="<?php if (!empty($children_array)) echo "arrow"; ?> ?>" href="<?= get_permalink($item -> ID) ?>"><?= get_the_title($item -> ID) ?></a>

                      <?php if (!empty($children_array)): ?>
                        <ul class="child-category-list">
                          <?php foreach ($children_array as $child):?>
                            <li class="child-category">
                              <?php $children_array_1 = get_posts( array(
                                "post_type" => "product_cat",
                                'post_parent' => $child -> ID
                              ))?>
                              <a class="<?php if (!empty($children_array_1)) echo "arrow" ?>" href="<?= get_permalink($child -> ID) ?>"><?= get_the_title($child -> ID) ?></a>

                              <?php if (!empty($children_array_1)): ?>
                                <ul class="child-1-category-list">
                                  <?php foreach ($children_array_1 as $child_1):?>
                                    <li class="child-1-category">
                                      <a href="<?= get_permalink($child_1 -> ID) ?>"><?= get_the_title($child_1 -> ID) ?></a>
                                    </li>
                                  <?php endforeach; ?>
                                </ul>
                              <?php endif ?>
                            </li>
                          <?php endforeach; ?>
                        </ul>
                      <?php endif ?>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php $index = $index + 1;
              continue;
            endif;?>

            <?php if ($index == 3): ?>
              <li id="project-category-item" class="category-item project-category-item">
                <a  class="main-item" href="<?= $item->url?>">
                  <?= $item->post_title ?>
                </a>
                <ul class="project-category-menu" style="display:none">
                  <li>
                    <a href="<?= get_site_url() ?>/du-an?status=done">Dự án hoàn thành </a>
                  </li>
                  <li>
                    <a href="<?= get_site_url() ?>/du-an">Dự án đang thực hiện</a>
                  </li>
                </ul>
              </li>
              <?php $index = $index + 1;
              continue;
            endif;?>

            <li>
              <a href="<?= $item->url?>">
                <?= $item->post_title ?>
              </a>
            </li>

            <?php $index = $index + 1;
          endforeach; ?>
        </ul>

        <div class="right-side-wrapper">
          <div class="search-bar-wrapper">
            <form class="search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' );?>/tim-kiem">
              <input class="search-bar" type="text" value="" name="s" id="s" placeholder="Tìm kiếm" />
              <button type="submit" id="search-submit">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32" fill="#1D3571"><path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path></svg>
              </button>
            </form>
          </div>

          <div class="telephone-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
            <a class="phone-number" href="tel:<?= get_field('header_phone_number', 'option') ?>"><?= get_field('header_phone_number', 'option') ?></a>
          </div>
          <a class="icon-cart" href="<?= get_site_url() ?>/gio-hang">

            <div class="cart-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
              </svg>
              <span class="item-number">0</span>
            </div >
          </a>
          <a class="last-btn" href="<?= $array_menu[$index-2]->url?>" target="<?= $array_menu[$index-2]->target ?>">
            Báo giá
          </a>
        </div>
      </div>

      <!-- <div class="new-desktop">
        <div class="upper-bar">
          <div class="container-xl">
            <div class="left-side-bar">
              <a class="header-logo" href="#">
                <img src="<?= $temp_uri?>/assets/image/header-logo.svg" alt="">
              </a>


              <div class="header-item-wrapper">
                <img class="list-button" src="<?= $temp_uri?>/assets/image/list-button.svg" alt="">

                <div class="text-wrapper">
                  <a class="font-nunito fw-6" href="#">Sản phẩm</a>
                  <a class="font-nunito fw-6" href="#">Khuyến mãi</a>
                  <a class="font-nunito fw-6" href="#">Báo giá cho tôi</a>
                </div>
              </div>
            </div>

            <div class="right-side-bar">
              <div class="search-bar-wrapper">
                <form class="search-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' );?>">
                  <input class="search-bar" type="text" value="" name="s" id="s" placeholder="Mã sản phẩm, tên sản phẩm, hãng..." />
                  <button type="submit" id="search-submit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32" fill="#1D3571"><path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path></svg>
                  </button>
                </form>
              </div>

              <div class="icon-wrapper">
                <a href="#" class="cart-button">
                  <img src="<?= $temp_uri?>/assets/image/cart-button.svg" alt="">
                  <span class="color-red fw-7 font-nunito">1</span>
                </a>

                <a href="#">
                  <img src="<?= $temp_uri?>/assets/image/shipping-button.svg" alt="">
                </a>

                <a href="#">
                  <img src="<?= $temp_uri?>/assets/image/noti-button.svg" alt="">
                </a>

                <a href="#">
                  <img src="<?= $temp_uri?>/assets/image/user-button.svg" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="lower-bar">
          <div class="container-xl">
            <div class="product-item">
              <a class="header-thumbnail" href="#">
                <img src="<?= $temp_uri?>/assets/image/test-product.png" alt="">
              </a>
              <a href="#">Test Product</a>
            </div>
            <div class="product-item">
              <a class="header-thumbnail" href="#">
                <img src="<?= $temp_uri?>/assets/image/test-product.png" alt="">
              </a>
              <a href="#">Test Product</a>
            </div>
            <div class="product-item">
              <a class="header-thumbnail" href="#">
                <img src="<?= $temp_uri?>/assets/image/test-product.png" alt="">
              </a>
              <a href="#">Test Product</a>
            </div>
            <div class="product-item">
              <a class="header-thumbnail" href="#">
                <img src="<?= $temp_uri?>/assets/image/test-product.png" alt="">
              </a>
              <a href="#">Test Product</a>
            </div>
          </div>
        </div>
      </div> -->

      <div class="mobile">
        <?php
          $index = 1;
          $array_menu = wp_get_nav_menu_items('main-menu'); ?>
        <?php foreach ($array_menu as $item): ?>

          <?php if ($index == 1): ?>
            <div class="header-mobile-nav-bar">
              <div class="wrapper-header-mb">
                <a class="logo" href="<?= $item->url?>" target="<?= $item->target ?>">
                  <img src="<?= $temp_uri?>/assets/image/header-logo.svg" alt="">
                </a>
                <div class="wrapper-button" >
                  <div class="wrapper-child">
                    <div class="overlay" id="button-open-header"></div>
                    <div class="button-open-header"></div>
                  </div>
                </div>
              </div>
            </div>


            <ul class="header-mobile-menu" style="display: none">
          <?php endif; ?>

            <?php if ($index == 2): ?>
              <li class="category-item" id="mobile-extension<?=$index-1 ?>">
                <a class="major-item" href="<?= $item->url ?>">
                  <?= $item->post_title ?>
                </a>
                <ul class="mobile-product-category-menu mobile-category-menu" style="display:none">
                  <?php foreach ($posts_array as $item): ?>
                    <li>
                      <a href="<?= get_permalink($item -> ID) ?>"><?= get_the_title($item -> ID) ?></a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <?php $index = $index + 1;
              continue;
            endif;?>

            <?php if ($index == 3): ?>
              <li class="category-item" id="mobile-extension<?=$index-1 ?>">
                <a class="major-item" href="<?= $item->url ?>">
                  <?= $item->post_title ?>
                </a>
                <ul class="mobile-project-category-menu mobile-category-menu" style="display:none">
                  <li>
                    <a href="<?= get_site_url() ?>/du-an?status=done">Dự án hoàn thành </a>
                  </li>
                  <li>
                    <a href="<?= get_site_url() ?>/du-an">Dự án đang thực hiện</a>
                  </li>
                </ul>
              </li>
              <?php $index = $index + 1;
              continue;
            endif;?>

            <li>
              <a href="<?= $item->url?>">
                <?= $item->post_title ?>
              </a>
            </li>

            <?php $index = $index + 1;
          endforeach; ?>
        </ul>
      </div>
    </header>
  <?php endif;?>
