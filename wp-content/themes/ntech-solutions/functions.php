<?php
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

//Tạo pagination
include(get_theme_file_path('/includes/pagination.php'));
include(get_theme_file_path('/includes/product-category-pagination.php'));

//Thêm get_field của ACF vào Contact Form 7

function wpcf7_tag_get_field_handler($tag) {
  return get_field($tag -> labels[0], $tag -> labels[1]);
}

add_action( 'wpcf7_init', 'wpcf7_add_form_tag_get_field' );

function wpcf7_add_form_tag_get_field() {
  wpcf7_add_form_tag('getfield', 'wpcf7_tag_get_field_handler');
}

/*_____________________________*/

function wpcf7_tag_get_field_img_handler($tag){
  return get_field($tag -> labels[0], $tag -> labels[1])['url'];
}

add_action('wpcf7_init', 'wpcf7_add_form_tag_get_field_img');

function wpcf7_add_form_tag_get_field_img() {
  wpcf7_add_form_tag('getfieldimg', 'wpcf7_tag_get_field_img_handler');
}



/* Tạo menu */

function register_my_menu() {
    register_nav_menu('main-menu',__( 'Menu_Page' , 'ntech' ));
}
add_action( 'init', 'register_my_menu' );

/*Tạo theme options*/

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme options', //Title hiển thị khi truy cập vào Options page
        'menu_title'    => 'Theme options', // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'theme-settings',// Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
}
/*Tạo Projects*/
function register_project_post_type(){
  $lang = get_bloginfo("language");
  $label = array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'add_new' => 'Add new'
  );
  $args = array(
    'labels' => $label,
    'description' => 'Listing Projects',
    'supports' => array(
      'title',
      'thumbnail',
      'revisions',
      'editor',
      'page-attributes'
    ),
    'hierarchical' => true,
    'taxonomies' => array('project_category'),
    'publicly_queryable' => true,
    'show_ui' => true,
    'public' => true,
    'exclude_from_search' => true,
    'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-site',
		'can_export' => true,
		'has_archive' => true,
    'rewrite' => array('slug' => 'chi-tiet-du-an', 'with_front' => false)
  );
  register_post_type('project', $args);
}

register_taxonomy('project_category', 'project', array('hierarchical' => true, 'label' => 'Projects Category', 'query_var' => true, 'rewrite' => true));
add_action('init', 'register_project_post_type');


/*Tạo Products*/
function register_product_post_type(){
  $lang = get_bloginfo("language");
  $label = array(
    'name' => 'Products',
    'singular_name' => 'Product',
    'add_new' => 'Add new'
  );
  $args = array(
    'labels' => $label,
    'description' => 'Listing Products',
    'supports' => array(
      'title',
      'thumbnail',
      'revisions',
      'editor',
      'page-attributes'
    ),
    'hierarchical' => true,
    // 'taxonomies' => array('product_category'),
    'publicly_queryable' => true,
    'show_ui' => true,
    'public' => true,
    'exclude_from_search' => true,
    'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
    'show_in_rest' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-site',
		'can_export' => true,
		'has_archive' => "chi-tiet-san-pham",
    'rewrite' => array('with_front' => false)
  );
  register_post_type('product', $args);
}

register_taxonomy('product_category', 'product', array('hierarchical' => true, 'show_in_rest' => true, 'label' => 'Products Category', 'rewrite' => array( 'with_front' => false)));
add_action('init', 'register_product_post_type');


/*Tạo Blogs*/
function register_blog_post_type(){
  $lang = get_bloginfo("language");
  $label = array(
    'name' => 'Blogs',
    'singular_name' => 'Blog',
    'add_new' => 'Add new'
  );
  $args = array(
    'labels' => $label,
    'description' => 'Blog',
    'supports' => array(
      'title',
      'thumbnail',
      'revisions',
      'editor',
      'page-attributes'
    ),
    'hierarchical' => true,
    'taxonomies' => array('blog_category'),
    'publicly_queryable' => true,
    'show_ui' => true,
    'public' => true,
    'exclude_from_search' => true,
    'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-site',
		'can_export' => true,
		'has_archive' => true,
    'rewrite' => array('slug' => 'chi-tiet-bai-viet', 'with_front' => false)
  );
  register_post_type('blog', $args);
}

register_taxonomy('blog_category', 'blog', array('hierarchical' => true, 'label' => 'Blogs Category', 'query_var' => true, 'rewrite' => true));
add_action('init', 'register_blog_post_type');

/*Tạo Brands*/
function register_brand_post_type(){
  $lang = get_bloginfo("language");
  $label = array(
    'name' => 'Brands',
    'singular_name' => 'Brand',
    'add_new' => 'Add new'
  );
  $args = array(
    'labels' => $label,
    'description' => 'Brand',
    'supports' => array(
      'title',
      'thumbnail',
      'revisions',
      'editor',
      'page-attributes'
    ),
    'hierarchical' => true,
    'taxonomies' => array('brand_category'),
    'publicly_queryable' => true,
    'show_ui' => true,
    'public' => true,
    'exclude_from_search' => true,
    'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-site',
		'can_export' => true,
		'has_archive' => true,
    'rewrite' => array('slug' => 'brand-detail', 'with_front' => false)
  );
  register_post_type('brand', $args);
}

register_taxonomy('brand_category', 'brand', array('hierarchical' => true, 'label' => 'Brands Category', 'query_var' => true, 'rewrite' => true));
add_action('init', 'register_brand_post_type');

/*Tạo Product Category*/
function register_product_cat_post_type(){
  $lang = get_bloginfo("language");
  $label = array(
    'name' => 'Product Categories',
    'singular_name' => 'Product Category',
    'add_new' => 'Add new'
  );
  $args = array(
    'labels' => $label,
    'description' => 'Listing Product Categories',
    'supports' => array(
      'title',
      'thumbnail',
      'revisions',
      'editor',
      'page-attributes'
    ),
    'hierarchical' => true,
    'taxonomies' => array('product_cat_category'),
    'publicly_queryable' => true,
    'show_ui' => true,
    'public' => true,
    'exclude_from_search' => true,
    'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-admin-site',
		'can_export' => true,
		'has_archive' => true,
    'rewrite' => array('slug' => 'danh-muc-san-pham', 'with_front' => false),
  );
  register_post_type('product_cat', $args);
}

// register_taxonomy('product_cat_category', 'product_cat', array('hierarchical' => true, 'label' => '', 'query_var' => false, 'rewrite' => true));
add_action('init', 'register_product_cat_post_type');

function alter_taxonomy_for_post() {
  unregister_taxonomy_for_object_type( 'product_category_category', 'product_category' );
}
add_action( 'init', 'alter_taxonomy_for_post' );

/*Thêm file SVG */
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


/*Handle searchform's parameter*/
add_filter('init', function(){
  global $wp;

  $wp->add_query_var( 'search_query' );
  $wp->remove_query_var( 's' );
} );


add_filter( 'request', function( $request ){
  if ( isset( $_REQUEST['search_query'] ) ){
      $request['s'] = $_REQUEST['search_query'];
  }

  return $request;
} );

/*pagination*/

include(get_theme_file_path('/includes/pagination.php'));

?>
