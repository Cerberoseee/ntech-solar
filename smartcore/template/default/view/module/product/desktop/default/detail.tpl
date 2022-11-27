  <?php
$this->document->addStyle(URL_THEME . "photoswipe/photoswipe.min.css");
$this->document->addStyle(URL_THEME . "photoswipe/photoswipe-default-skin.min.css");
$this->document->addScript(URL_THEME . "photoswipe/photoswipe.min.js");
$this->document->addScript(URL_THEME . "photoswipe/photoswipe-ui-default.min.js");

$this->document->addStyle(URL_THEME . "swiper/swiper.min.css");
$this->document->addScript(URL_THEME . "swiper/swiper.min.js", "inline");

$this->document->addStyle(URL_THEME . "we-barchart/webarchart.min.css");
$this->document->addScript(URL_THEME . "we-barchart/webarchart.min.js");

$this->document->addStyle(URL_THEME . "we-rating/werating.min.css");
$this->document->addScript(URL_THEME . "we-rating/werating.min.js");

//$this->document->addScript(URL_JS . "jquery.validate-1.15.0.min.js");

//wenumberic control
$this->document->addStyle(URL_THEME . "we-numberic/wenumberic.min.css");
$this->document->addScript(URL_THEME . "we-numberic/wenumberic.min.js");

//custom select
//$this->document->addStyle(URL_THEME . "custom-select/custom-select.css");
//$this->document->addScript(URL_THEME . "custom-select/custom-select.js");


$this->document->addPageStyle("module/product/desktop/default/component/css/product_list.css");
$this->document->addPageStyle("module/product/desktop/default/css/detail.css");
?>
<script>
    var priceSizeList = JSON.parse('<?php echo addslashes(json_encode($priceSizeList)) ?>');
</script>
<div class="container">
    <section class="product-detail">
        <div class="product-detail-wrapper clearfix">

            <div class="product-detail-image clearfix">

                <div id="slider-nav" class="slider-nav more-data">
                    <div id="slider-nav-swiper" class="slider-nav-swiper swiper-container">
                        <div class="swiper-wrapper">
                            <?php if(!empty($product['product_subimages'])) { ?>
                            <?php foreach($product['product_subimages'] as $image) { ?>

                            <div class="swiper-slide product-thumb-item">
                                <img width="80" height="80" class="swiper-lazy"
                                     data-srcset="<?php echo URL_USERIMAGE ?>fixsize-160x160/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?> 2x"
                                     data-src="<?php echo URL_USERIMAGE ?>fixsize-80x80/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?>">
                            </div> 

                            <?php } ?>
                            <?php } ?>
                        </div>
                    </div>

                    <?php if (count($product['product_subimages']) > 5) { ?>
                    <div class="slider-nav-button-prev">
                        <svg width="32" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 1184q0 13-10 23l-50 50q-10 10-23 10t-23-10l-393-393-393 393q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg>
                    </div>
                    <div class="slider-nav-button-next">
                        <svg width="32" height="20" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1395 736q0 13-10 23l-466 466q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l393 393 393-393q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg>
                    </div>
                    <?php } ?>
                </div>

                <div class="slider-slick-img">
                    <!-- Slider main container -->
                    <div id="slider-for" class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper photoswipe-gallery">
                            <!-- Slides -->
                            <?php if(!empty($product['product_subimages'])) { ?>
                            <?php foreach($product['product_subimages'] as $image_index => $image) { ?>

                            <?php if ($image_index == 0) { ?>
                            <figure class="swiper-slide thumb-item store-image" itemprop="associatedMedia" itemscope>
                                <a class="thumb-item-zoom" href="<?php echo URL_USERIMAGE ?>resize-700x0/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?>" itemprop="contentUrl" data-size="700x700">
                                    <img width="430" height="430"
                                         srcset="<?php echo URL_USERIMAGE ?>fixsize-600x600/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?> 2x"
                                         src="<?php echo URL_USERIMAGE ?>fixsize-430x430/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?>" />
                                </a>
                            </figure>
                            <?php } else { ?>
                            <figure class="swiper-slide thumb-item store-image" itemprop="associatedMedia" itemscope>
                                <a class="thumb-item-zoom" href="<?php echo URL_USERIMAGE ?>resize-700x0/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?>" itemprop="contentUrl" data-size="700x700">
                                    <img width="430" height="430" class="swiper-lazy"
                                         data-srcset="<?php echo URL_USERIMAGE ?>fixsize-600x600/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?> 2x"
                                         data-src="<?php echo URL_USERIMAGE ?>fixsize-430x430/<?php echo $image['image'] ?>?v=<?php echo IMAGE_VERSION ?>"
                                         src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='430' height='430'><rect style='fill:rgb(245,245,245);' width='100%' height='100%' /></svg>" />
                                    <div class="swiper-lazy-preloader"></div>
                                </a>
                            </figure>
                            <?php } ?>


                            <?php } ?>
                            <?php } ?>
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination productpreview-pagination"></div>
                    </div>
                </div>
            </div>

            <div class="product-detail-info">
                <div class="product-detail-title">
                    <?php if(!empty($brand)) { ?>
                    <div class="product-brand">
                        <a class="product-brand-title" href="<?php echo $brand[link] ?>"><?php echo $brand['name'] ?></a>
                    </div>
                    <?php } ?>

                    <div class="product-detail-name">
                        <h1><?php echo $product['name'] ?></h1>
                    </div>

                    <div class="row">
                        <?php if ($product['sell_type'] == 1) { ?>
                        <div class="col-md-6">
                            <div class="product-detail-sale-price">
                                <?php if($product['price'] > 0) { ?>
                                <?php if($product['saleoff'] > 0) { ?>
                                <span class="detail-saleoff"><?php echo $this->string->numberFormate($product['saleoff']);?><?php echo CURRENCY_CODE ?></span>
                                <span class="detail-priceroot"><?php echo $this->string->numberFormate($product['price']);?><?php echo CURRENCY_CODE ?></span>
                                <?php } else { ?>
                                <span class="detail-saleoff"><?php echo $this->string->numberFormate($product["price"]) ?><?php echo CURRENCY_CODE ?></span>
                                <span class="detail-priceroot"></span>
                                <?php } ?>
                                <?php } else { ?>
                                <span class="detail-saleoff">Call</span>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-6 <?php echo $product['sell_type'] == 1 ? 'text-right' : '' ?>">
                            <div class="product-detail-share">
                                <span class="share-label align-middle">Share</span>
                                <ul class="share-social-list align-middle clearfix">
                                    <li>
                                        <a class="share-social-icon fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($this->smartweb->weburl) ?>" target="_blank" rel="noreferrer">
                                            <svg width="8" height="15" class="icon"><use xlink:href="<?php echo URL_IMAGE ?>icons.svg#facebook-f"></use></svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="share-social-icon twitter" href="https://twitter.com/share?url=<?php echo urlencode($this->smartweb->weburl) ?>" target="_blank" rel="noreferrer">
                                            <svg width="15" height="12" class="icon"><use xlink:href="<?php echo URL_IMAGE ?>icons.svg#twitter"></use></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>




                    <!--
                    <div class="product-rating-share clearfix">
                        <div class="product-detail-rating-summary float-left">
                            <div class="mb-1">
                                <div class="we-rating-detail-product we-rating" data-rating="<?php echo $average ?>"></div>
                                <?php if($totalreview > 0) { ?>
                                <a href="#product-review-section" class="highlight"><?php echo $totalreview ?>&nbsp;<?php echo $lang_text_rating ?></a>
                                <?php } else { ?>
                                <a href="#product-review-section" class="highlight"><?php echo $lang_text_no_rating ?></a>
                                <?php } ?>
                            </div>
                            <?php if(!empty($brand)) { ?>
                            <div class="product-brand">
                                <span class="product-brand-title"><?php echo $lang_text_brand ?></span>&nbsp;<a class="highlight" href="<?php echo $brand[link] ?>"><?php echo $brand['name'] ?></a>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="product-detail-share-social float-right">
                            <ul class="list-inline list-unstyled mb-0">
                                <li class="share-nav-li list-inline-item">
                                    <span class="share-nav">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="28" viewBox="0 0 30 32"><path d="M314.208,9.752a4.876,4.876,0,1,1,4.876-4.876A4.882,4.882,0,0,1,314.208,9.752Zm0-7.8a2.926,2.926,0,1,0,2.926,2.926A2.929,2.929,0,0,0,314.208,1.95Zm0,0" transform="translate(-289.751)" fill="#222"/><path d="M314.208,361.752a4.876,4.876,0,1,1,4.876-4.876A4.882,4.882,0,0,1,314.208,361.752Zm0-7.8a2.926,2.926,0,1,0,2.926,2.926A2.929,2.929,0,0,0,314.208,353.95Zm0,0" transform="translate(-289.751 -329.752)" fill="#222"/><path d="M4.876,185.752a4.876,4.876,0,1,1,4.876-4.876A4.882,4.882,0,0,1,4.876,185.752Zm0-7.8A2.926,2.926,0,1,0,7.8,180.876,2.929,2.929,0,0,0,4.876,177.95Zm0,0" transform="translate(0 -164.876)" fill="#222"/><path d="M120.665,104.389a.975.975,0,0,1-.484-1.822l12.065-6.878a.975.975,0,0,1,.965,1.694l-12.065,6.878a.977.977,0,0,1-.481.127Zm0,0" transform="translate(-112.03 -89.528)" fill="#222"/><path d="M132.749,280.378a.967.967,0,0,1-.481-.129L120.2,273.371a.975.975,0,0,1,.965-1.694l12.065,6.878a.976.976,0,0,1-.484,1.823Zm0,0" transform="translate(-112.051 -254.41)" fill="#222"/></svg>
                                    </span>
                                    <div class="share-popup overlay overlay-with-arrow">
                                        <div class="share-content-dialog">
                                            <div class="share-label">Share</div>
                                            <div class="d-inline-block">
                                                <ul class="list-unstyle list-inline mb-0">
                                                    <li class="list-inline-item">
                                                        <a target="_blank" class="share-social-icon fb no-link"
                                                           href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($this->smartweb->weburl) ?>"
                                                           onclick="window.open(this.href, 'share-facebook','left=50,top=50,width=600,height=320,toolbar=0'); return false;"     >
                                                            <svg width="18" height="20" fill="#fff" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1343 12v264h-157q-86 0-116 36t-30 108v189h293l-39 296h-254v759h-306v-759h-255v-296h255v-218q0-186 104-288.5t277-102.5q147 0 228 12z"></path></svg>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a target="_blank" class="share-social-icon twitter no-link"
                                                           href="https://twitter.com/share?url=<?php echo urlencode($this->smartweb->weburl) ?>">
                                                            <svg width="20" height="20" fill="#fff" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1684 408q-67 98-162 167 1 14 1 42 0 130-38 259.5t-115.5 248.5-184.5 210.5-258 146-323 54.5q-271 0-496-145 35 4 78 4 225 0 401-138-105-2-188-64.5t-114-159.5q33 5 61 5 43 0 85-11-112-23-185.5-111.5t-73.5-205.5v-4q68 38 146 41-66-44-105-115t-39-154q0-88 44-163 121 149 294.5 238.5t371.5 99.5q-8-38-8-74 0-134 94.5-228.5t228.5-94.5q140 0 236 102 109-21 205-78-37 115-142 178 93-10 186-50z"></path></svg>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a target="_blank" class="share-social-icon pinterest no-link"
                                                           href="https://pinterest.com/pin/create/bookmarklet/?url=<?php echo urlencode($this->smartweb->weburl) ?>">
                                                            <svg width="18" height="20" fill="#fff" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M256 597q0-108 37.5-203.5t103.5-166.5 152-123 185-78 202-26q158 0 294 66.5t221 193.5 85 287q0 96-19 188t-60 177-100 149.5-145 103-189 38.5q-68 0-135-32t-96-88q-10 39-28 112.5t-23.5 95-20.5 71-26 71-32 62.5-46 77.5-62 86.5l-14 5-9-10q-15-157-15-188 0-92 21.5-206.5t66.5-287.5 52-203q-32-65-32-169 0-83 52-156t132-73q61 0 95 40.5t34 102.5q0 66-44 191t-44 187q0 63 45 104.5t109 41.5q55 0 102-25t78.5-68 56-95 38-110.5 20-111 6.5-99.5q0-173-109.5-269.5t-285.5-96.5q-200 0-334 129.5t-134 328.5q0 44 12.5 85t27 65 27 45.5 12.5 30.5q0 28-15 73t-37 45q-2 0-17-3-51-15-90.5-56t-61-94.5-32.5-108-11-106.5z"></path></svg>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a target="_blank" class="share-social-icon glus no-link"
                                                           href="https://plus.google.com/share?url=<?php echo urlencode($this->smartweb->weburl) ?>">
                                                            <svg width="20" height="20" fill="#fff" viewBox="0 0 2304 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1437 913q0 208-87 370.5t-248 254-369 91.5q-149 0-285-58t-234-156-156-234-58-285 58-285 156-234 234-156 285-58q286 0 491 192l-199 191q-117-113-292-113-123 0-227.5 62t-165.5 168.5-61 232.5 61 232.5 165.5 168.5 227.5 62q83 0 152.5-23t114.5-57.5 78.5-78.5 49-83 21.5-74h-416v-252h692q12 63 12 122zm867-122v210h-209v209h-210v-209h-209v-210h209v-209h210v209h209z"></path></svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="favorite-nav-li list-inline-item">
                                    <a href="javascript:void(0)" class="favorite-nav no-link <?php echo $addedToWishlist ? 'active' : '' ?>"
                                       onclick="addWishList(this, '<?php echo $wishlist[groupcode] ?>', '<?php echo $product[productcode] ?>')">
                                        <svg width="26" height="26" fill="#cecfd1" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M896 1664q-26 0-44-18l-624-602q-10-8-27.5-26t-55.5-65.5-68-97.5-53.5-121-23.5-138q0-220 127-344t351-124q62 0 126.5 21.5t120 58 95.5 68.5 76 68q36-36 76-68t95.5-68.5 120-58 126.5-21.5q224 0 351 124t127 344q0 221-229 450l-623 600q-18 18-44 18z"/></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    -->

                    <?php if(trim($product['summary']) != "") { ?>
                    <div class="product-detail-summary">
                        <div><?php echo htmlspecialchars_decode($product['summary']) ?></div>
                    </div>
                    <?php } ?>

                    <?php if ($product['sell_type'] == 0 || $product['outofstock'] == 1) { ?>
                    <div class="product-detail-quote">
                        <a class="btn btn--blue btn--w-large quote-link">YÊU CẦU BÁO GIÁ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn--light btn--w-larger" href="tel:<?php echo $this->config->get('config_hotline') ?>">HOTLINE <?php echo $this->config->get('config_hotline') ?></a>
                    </div>
                    <?php } else { ?>
                    <div class="qty-section">
                        <div class="row">
                            <!--<div class="qty-section-title col-md-3"><?php echo $lang_text_qty ?>:</div>-->
                            <div class="col-md-4">
                                <div id="order-qty" class="enumber-control">
                                    <input title="quantity" id="qty" aria-label="<?php echo $lang_text_qty ?>" value="1" maxlength="2" name="quantity" class="qty" type="text" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <a class="product-detail-submit btn btn--blue text-uppercase" pctoken="<?php echo $product[productcode] ?>" onclick="addToCart(this)"><?php echo $lang_text_add_to_cart ?></a>
                                <!--<a class="product-detail-submit btn btn--blue text-uppercase" pctoken="<?php echo $product[productcode] ?>" onclick="buynow(this)"><?php echo $lang_text_buy_now ?></a>-->
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>

        </div>
    </section>

    <section class="product-detail-content clearfix">
        <div class="product-detail-main-content">

            <div class="product-detail-main-content-wrapper">
                <div class="product-detail-tab clearfix">
                    <div class="product-detail-tab-item">
                        <a class="pd-tabitem-link active" nav="product-info-section">Tổng quan</a>
                    </div>
                    <div class="product-detail-tab-item">
                        <a class="pd-tabitem-link" nav="product-specification-section">Thông số kỹ thuật</a>
                    </div>
                    <div class="product-detail-tab-item">
                        <a class="pd-tabitem-link" nav="product-certificate-section">Chứng chỉ</a>
                    </div>
                    <div class="product-detail-tab-item">
                        <a class="pd-tabitem-link" nav="product-policy-section">Chính sách</a>
                    </div>
                    <div class="product-detail-tab-item">
                        <a class="pd-tabitem-link" nav="product-document-section">Tài liệu</a>
                    </div>
                </div>

                <div class="product-detail-description-list">

                    <div id="product-info-section" class="product-detail-description active">
                        <div class="product-detail-description-wrapper">
                            <!--<h4 class="product-detail-information-title"><?php echo $lang_text_product_detail_of ?></h4>-->
                            <div class="product-detail-info-content"><?php echo htmlspecialchars_decode($product['description']) ?></div>
                        </div>
                    </div>

                    <div id="product-specification-section" class="product-detail-description">
                        <div class="product-detail-description-wrapper">
                            <!--<h4 class="product-detail-information-title">Thông số kỹ thuật</h4>-->
                            <div><?php echo htmlspecialchars_decode($product['specification']) ?></div>
                        </div>
                    </div>

                    <div id="product-certificate-section" class="product-detail-description">
                        <div class="product-detail-description-wrapper">
                            <!--<h4 class="product-detail-information-title">Chứng chỉ</h4>-->

                            <?php if (!empty($certificates)) { ?>
                            <div class="row">
                                <?php foreach($certificates as $certificate) { ?>
                                <div class="col-md-4">
                                    <div class="certificate-box">
                                        <div class="certificate-header">
                                            <div class="certificate-icon">
                                                <img class="lazy"
                                                     data-srcset="<?php echo URL_USERIMAGE ?>fixsize-120x120/<?php echo $certificate['imagepath'] ?> 2x"
                                                     data-src="<?php echo URL_USERIMAGE ?>fixsize-60x60/<?php echo $certificate['imagepath'] ?>"
                                                     src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='60' height='60'><rect style='fill:rgb(245,245,245);' width='100%' height='100%' /></svg>" />
                                            </div>
                                            <div class="certificate-name"><?php echo $certificate['title']?></div>
                                        </div>
                                        <div class="certificate-summary"><?php echo htmlspecialchars_decode($certificate['summary']) ?></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>

                        </div>
                    </div>

                    <div id="product-policy-section" class="product-detail-description">
                        <div class="product-detail-description-wrapper">
                            <!--<h4 class="product-detail-information-title">Chính sách</h4>-->
                            <div><?php echo htmlspecialchars_decode($product['user_guide']) ?></div>
                        </div>
                    </div>

                    <div id="product-document-section" class="product-detail-description">
                        <div class="product-detail-description-wrapper limit-width">
                            <!--<h4 class="product-detail-information-title">Tài liệu</h4>-->
                            <div class="document-list">
                                <?php if(!empty($product['documents'])) { ?>
                                <?php foreach($product['documents'] as $document) { ?>
                                <div class="document-item">
                                    <div class="document-item-icon">
                                        <svg width="36" height="42" class="icon"><use xlink:href="<?php echo URL_IMAGE ?>icons.svg#file-archive-o"></use></svg>
                                    </div>
                                    <div class="document-item-content">
                                        <div class="document-item-name"><?php echo $document['name'] ?></div>
                                        <div class="document-item-date">Ngày cập nhật: <?php echo $document['date'] ?></div>
                                    </div>
                                    <div class="document-item-action"><a href="<?php echo URL_USERDOWNLOAD ?>root/<?php echo $document['file'] ?>" class="btn btn--white btn--border-blue">Tải về</a></div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- related product -->
            <?php if(!empty($related_products)) { ?>
            <div id="product-detail-related-product" class="product-detail-related-product" data-callback="loadRelatedProduct">
                <div class="related-product">
                    <h4 class="section-sitemap-title product">Sản phẩm liên quan</h4>

                    <div class="related-product-wrapper">
                        <div id="related-product-list" data-size="<?php echo count($related_products) ?>" class="product-list-wrapper swiper-container addon-product">
                            <?php echo $this->load->controller("module/product", "getComponentProductList", array($related_products, 2, 'desktop', 'default')); ?>
                        </div>
                        <?php if (count($related_products) >= 4) { ?>
                        <div class="swiper-button-prev relatedproduct-swiper-button-prev"></div>
                        <div class="swiper-button-next relatedproduct-swiper-button-next"></div>
                        <?php } ?>
                    </div>

                </div>
            </div>
            <?php } ?>

            <!-- related projects -->
            <?php if(!empty($related_projects)) { ?>
            <div id="product-detail-related-project" class="product-detail-related-project" data-callback="loadRelatedProject">
                <div class="related-project">
                    <div class="related-project-wrapper">
                        <h4 class="section-sitemap-title">Dự án thực tế</h4>

                        <div id="related-project-list" data-size="<?php echo count($related_projects) ?>" class="project-list-wrapper swiper-container">
                            <?php echo $this->load->controller("module/project", "getComponentProjectList", array($related_projects, 1, 'desktop', 'default')); ?>
                        </div>

                        <?php if(count($related_projects) >= 6) { ?>
                        <div class="swiper-button-prev related-project-sw-prev"></div>
                        <div class="swiper-button-next related-project-sw-next"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>

    </section>
</div>


<div class="product-detail-sticky">

    <div class="product-detail-sticky-info">
        <div class="container">
            <div class="row">
                <div class="col-7">
                    <div class="product-detail-sticky-col1 clearfix">
                        <div class="product-detail-sticky-logo float-left">
                            <img width="70" height="70"
                                 srcset="<?php echo URL_USERIMAGE ?>fixsize-70x70/<?php echo $product['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?> 1x, <?php echo URL_USERIMAGE ?>fixsize-140x140/<?php echo $product['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?> 1x, "
                                 src="<?php echo URL_USERIMAGE ?>fixsize-70x70/<?php echo $product['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?>">
                        </div>
                        <div class="product-detail-sticky-content float-left">
                            <?php if(!empty($brand)) { ?>
                            <div class="product-brand">
                                <a class="product-brand-title" href="<?php echo $brand[link] ?>"><?php echo $brand['name'] ?></a>
                            </div>
                            <?php } ?>
                            <div class="product-detail-sticky-title"><?php echo $product['name'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-5 text-right">
                    <?php if ($product['sell_type'] == 0 || $product['outofstock'] == 1) { ?>
                    <div class="product-detail-sticky-col2 text-right">
                        <a class="btn btn--blue btn--w-large quote-link">YÊU CẦU BÁO GIÁ</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn--light btn--w-larger" href="tel:<?php echo $this->config->get('config_hotline') ?>">HOTLINE <?php echo $this->config->get('config_hotline') ?></a>
                    </div>
                    <?php } else { ?>
                    <a class="product-detail-submit btn btn--blue control-width-small text-uppercase" pctoken="<?php echo $product[productcode] ?>" onclick="addToCart(this)"><?php echo $lang_text_add_to_cart ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>


    <div class="product-detail-sticky-tab">
        <div class="container">
            <div class="submenu-product-list clearfix">
                <div class="submenu-product-item float-left">
                    <a class="submenu-product-item-link active" nav="product-info-section">Tổng quan</a>
                </div>
                <div class="submenu-product-item float-left">
                    <a class="submenu-product-item-link" nav="product-specification-section">Thông số kỹ thuật</a>
                </div>
                <div class="submenu-product-item float-left">
                    <a class="submenu-product-item-link" nav="product-certificate-section">Chứng chỉ</a>
                </div>
                <div class="submenu-product-item float-left">
                    <a class="submenu-product-item-link" nav="product-policy-section">Chính sách</a>
                </div>
                <div class="submenu-product-item float-left">
                    <a class="submenu-product-item-link" nav="product-document-section">Tài liệu</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- popup quote -->
<noscript id="quote-form-popup" class="quote-form-popup" style="display: none">
    <div class="quote-content clearfix">
        <div class="section-sitemap-title">Liên hệ báo giá</div>
        <div class="quote-form-summary">Cám ơn bạn đã quan tâm tới sản phẩm&nbsp;<span class="product-quote"><?php echo $product['name']?></span>&nbsp;của chúng tôi. Vui lòng điền form bên dưới, thông tin của bạn sẽ được gửi tới chúng tôi ngay.</div>
        <form class="form" method="post" id="quote-form" name="quoteForm">
            <input type="hidden" name="message_type" value="quote" />
            <input type="hidden" name="productname" value="<?php echo $product['name'] ?>" />

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <input id="quote-fullname" name="fullname" placeholder="Họ và tên *" value=""
                               autocomplete="off" autocorrect="off"
                               type="text" class="form-control full-width control-width-large" />
                        <div id="fullname-error" class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6">
                        <input id="quote-email" name="email" placeholder="Email *" value=""
                               autocomplete="off" autocorrect="off" autocapitalize="none"
                               type="text" class="form-control full-width control-width-large" />
                        <div id="email-error" class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <input id="quote-phone" name="phone" placeholder="Số điện thoại *" value=""
                               autocomplete="off" autocorrect="off"
                               type="text" class="form-control full-width control-width-large" />
                        <div id="phone-error" class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6">
                        <select class="form-control custom-select" name="used">
                            <option value="">Bạn mua sản phẩm để làm gì? *</option>
                            <option value="Để sử dụng">Để sử dụng</option>
                            <option value="Để lắp cho khách hàng khác">Để lắp cho khách hàng khác</option>
                        </select>
                        <div id="used-error" class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6 mb-lg-0 mb-3">
                        <input id="quote-quantity" name="quantity" placeholder="Số lượng/Công suất cần báo giá? *" value=""
                               autocomplete="off" autocorrect="off"
                               type="text" class="form-control full-width control-width-large" />
                        <div id="quantity-error" class="help-block with-errors"></div>
                    </div>
                    <div class="col-lg-6">
                        <input id="quote-location" name="location" placeholder="Tỉnh/Thành phố *" value=""
                               autocomplete="off" autocorrect="off"
                               type="text" class="form-control full-width control-width-large" />
                        <div id="location-error" class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="text-center"><button class="btn btn--blue btn--w-large">Gửi tới chúng tôi</button></div>
        </form>
    </div>
</noscript>


<?php include($this->document->getViewPath("component/desktop/default/photoswipe.tpl")) ?>
<?php include($this->document->getViewPath("component/desktop/skinA/addtocart.tpl")) ?>
<?php
    $this->document->addPageScript("module/product/desktop/default/js/detail.js");
    $this->document->addPageScript("module/product/desktop/default/js/list.js");
?>
