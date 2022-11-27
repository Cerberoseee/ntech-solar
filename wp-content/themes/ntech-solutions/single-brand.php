<?= get_header() ?>
<main class="brand-details" style="padding-top: 70px;">

  <!-- <?php
    $product_cat_param = $_GET['brand'];
    $power_param = '';
    $type_param = 'poly';
  ?>

  <?php
    $the_query = get_field('category');
    if( $the_query ):
      foreach ($the_query as $item):
        $post_id = $item -> ID;

        $power_category = get_terms( array(
          'taxonomy' => 'product_category',
          'object_ids' => $post_id
        ))[0] -> slug;

        $type_category = get_terms( array(
          'taxonomy' => 'product_category',
          'object_ids' => $post_id
        ))[1] -> slug;

        if ($power_category == $power_param || $power_param == ""):
          if ($type_category == $type_param || $type_param == ""):
            echo $power_category;
          endif;
        endif;

      endforeach;
    endif;
  ?> -->

  <?= get_the_ID() ?>

</main>
<?= get_footer() ?>
