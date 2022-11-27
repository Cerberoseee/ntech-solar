<?php
$
$url_image = get_template_directory_uri().'/assets/image';
if(!function_exists('glw_custom_pagination')){
     function glw_custom_pagination( WP_Query $wp_query = null, $echo = true ) {
	if ( $wp_query === null  ) {
          global $wp_query;

	}
  //var_dump($wp_query);
	$pages = paginate_links(array(
	   'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
	   'format'       => '?paged=%#%',
	   'current'      => max( 1, get_query_var( 'paged' ) ),
	   'total'        => $wp_query->max_num_pages,
	   'type'         => 'array',
	   'show_all'     => false,
	   'end_size'     => 3,
	   'mid_size'     => 1,
	   'prev_next'    => true,
	   'prev_text'    => "<",
	   'next_text'    => '>',
	   'add_args'     => false,
	   'add_fragment' => ''
	   )
        );
        if ( is_array( $pages ) ) {
          $pagination = '<div class="form-pagination"><ul class="list-page">';
          if (get_query_var('paged') > 1) {
            $pagination .= '<li> <span> <a href="';
            $pagination .= get_permalink();
            $pagination .= '"> << </a> </span>';
          }
          foreach ($pages as $page) {
             $pagination .= '<li><span'.(strpos($page,'current')!== false ? ' class="active" ':'').'>';
             if(strpos($page,'current')!== false){
                 if(get_query_var('paged') > 1){
                    $pagination .= '<a>'. get_query_var('paged') .'</a>';
                 }else{
                 $pagination .= '<a>'. 1 .'</a>';
                 }
             }else{
                 $pagination .= str_replace('class="page-numbers"', '', $page);
             }
                $pagination .= '</span></li>';
	       }

     if (get_query_var('paged') <  ceil($wp_query -> max_num_pages/$wp_query -> post_count )) {
       $temp_link = get_permalink()."page/".ceil($wp_query -> max_num_pages/$wp_query -> post_count );
       $pagination .= '<li> <span> <a href="';
       $pagination .= $temp_link;
       $pagination .= '"> >> <a> </span>';
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
<?php
  // session_start();
  // $wp_query -> max_num_pages = $_SESSION['maxpage'];
  // echo $wp_query -> max_num_pages;
?>
