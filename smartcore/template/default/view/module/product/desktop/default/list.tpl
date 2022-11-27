<?php
    $this->document->addPageStyle("module/product/desktop/default/css/list.css");

    $this->document->addStyle(URL_THEME . "custom-select/custom-select.min.css");
    $this->document->addScript(URL_THEME . "custom-select/custom-select.min.js");
?>

<div class="container">
<section class="product-section">

    <div class="category-section-header clearfix">
        <div class="category-image">
            <?php if ($current_category['imagepath'] != "") { ?>
            <picture>
                <source srcset="<?php echo URL_USERIMAGE ?>fixsize-940x528/<?php echo $current_category['imagepath'] ?>.webp?v=<?php echo IMAGE_VERSION ?>" type="image/webp" />
                <source srcset="<?php echo URL_USERIMAGE ?>fixsize-470x264/<?php echo $current_category['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?>" type="image/png" />
                <img width="470" height="264"
                     srcset="<?php echo URL_USERIMAGE ?>fixsize-470x264/<?php echo $current_category['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?> 1x,
                             <?php echo URL_USERIMAGE ?>fixsize-940x528/<?php echo $current_category['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?> 2x"
                     src="<?php echo URL_USERIMAGE ?>fixsize-470x264/<?php echo $current_category['imagepath'] ?>?v=<?php echo IMAGE_VERSION ?>" />
            </picture>
            <?php } else { ?>
            <img width="470" height="264"
                 srcset="<?php echo URL_USERIMAGE ?>fixsize-470x264/default/default.png?v=<?php echo IMAGE_VERSION ?> 1x, <?php echo URL_USERIMAGE ?>fixsize-980x460/default/default.png?v=<?php echo IMAGE_VERSION ?> 2x"
                 src="<?php echo URL_USERIMAGE ?>fixsize-470x264/default/default.png?v=<?php echo IMAGE_VERSION ?>" />
            <?php } ?>
        </div>
        <div class="category-info">
            <div class="category-title"><h1 class="section-sitemap-title"><?php echo $current_category['categoryname'] ?></h1></div>
            <div class="category-summary"><?php echo htmlspecialchars_decode($current_category['summary']) ?></div>
        </div>
    </div>

    <div class="product-filter">
        <div class="row">
            <div class="col-lg-3">
                <div class="my-custom-select">
                    <select id="filter-brand">
                        <option value="">Lọc theo thương hiệu</option>
                        <?php if(!empty($brands)) { ?>
                        <?php foreach($brands as $brand) { ?>
                        <option value="<?php echo $brand['manufacturercode'] ?>" <?php echo $this->request->get['brand'] == $brand['manufacturercode'] ? 'selected' : '' ?>><?php echo $brand['name'] ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <?php if(!empty($product_types)) { ?>
            <div class="col-lg-3">
                <div class="my-custom-select">
                    <select id="filter-product-type">
                        <option value="">Lọc theo loại</option>
                        <?php foreach($product_types as $product_type) { ?>
                        <option value="<?php echo $product_type ?>" <?php echo $this->request->get['product_type'] == $product_type ? 'selected' : '' ?>><?php echo $product_type ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php } ?>

            <?php if(!empty($product_wattages)) { ?>
            <div class="col-lg-3">
                <div class="my-custom-select">
                    <select id="filter-product-wattage">
                        <option value="">Lọc theo công suất</option>
                        <?php foreach($product_wattages as $product_wattage) { ?>
                        <option value="<?php echo $product_wattage ?>" <?php echo $this->request->get['product_wattage'] == $product_wattage ? 'selected' : '' ?>><?php echo $product_wattage ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php } ?>

            <div class="col-lg-3">
                <a id="reset-filter-btn" class="btn btn--blue">Bỏ lọc</a>
            </div>
        </div>
    </div>

    <div id="product-content" class="product-content">
        <div class="product-list-wrapper">
            <div class="product-list-body">
                <?php echo $this->load->controller("module/product", "getComponentProductList", array($products, 0, 'desktop', 'default')); ?>
            </div>
            <div class="text-center">
                <ul class="pagination justify-content-center">
                    <?php echo $pagination ?>
                </ul>
            </div>
        </div>
    </div>
</section>
</div>


<?php $this->document->addPageScript("module/product/desktop/default/js/list.js") ?>
