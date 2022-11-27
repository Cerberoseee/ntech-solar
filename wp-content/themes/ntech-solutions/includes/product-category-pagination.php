<?php
$url_image = get_template_directory_uri().'/page-templates';
if(!function_exists('glw_custom_product_cat_pagination')){
     function glw_custom_product_cat_pagination( WP_Query $wp_query = null, $echo = true ) {
	if ( $wp_query === null  ) {
          global $wp_query;

	}
  //var_dump($wp_query);
  ?>
  <?php
	$pages = paginate_links(array(
	   'base'         => @add_query_arg('paged','%#%'),
	   'format'       => '?paged=%#%',
	   'current'      => max( 1, get_query_var( 'paged' ) ),
	   'total'        => $wp_query->max_num_pages,
	   'type'         => 'array',
	   'show_all'     => false,
	   'end_size'     => 3,
	   'mid_size'     => 1,
	   'prev_next'    => true,
	   'prev_text'    => '<img src="'.get_template_directory_uri().'/assets/images/vector-left-arrow.png" alt="">',
	   'next_text'    => '<img src="'.get_template_directory_uri().'/assets/images/vector-right-arrow.png" alt="">',
	   'add_args'     => false,
	   'add_fragment' => ''
	   )
  );
  if ( is_array( $pages ) ) {
    $pagination = '<div class="form-pagination"><ul class="list-page">';
    foreach ($pages as $page) {
       $pagination .= '<li'.(strpos($page,'current')!== false ? ' class="active body-14" ':' class="body-14"').'>';
       if(strpos($page,'current')!== false){
           if(get_query_var('paged') > 1){
              $pagination .= '<a>'. get_query_var('paged') .'</a>';
           }else{
           $pagination .= '<a>'. 1 .'</a>';
           }
       }else{
           $pagination .= str_replace('class="page-numbers"', '', $page);
       }
          $pagination .= '</li>';
	   }
	   $pagination .= '</ul></div>';
     if($echo === true){
        echo $pagination;
     }else{
        return $pagination;
     }
	}
	return null;
  }
}
?>
