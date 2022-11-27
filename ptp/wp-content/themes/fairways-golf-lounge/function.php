<?php

/* ____________________________*/

//  File này sẽ chứa tất cả các hàm để trang web có thể hoạt động,
//  uncomment từng hàm bằng Ctrl + / để hàm đó hoạt động.
//  Làm ngang đâu active ngang đó để hiểu

/* ____________________________*/


function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


/* Tạo menu */

function register_my_menu() {
    register_nav_menu('main-menu',__( 'Menu_Page' , 'uts' ));
}
add_action( 'init', 'register_my_menu' );


/*Tạo theme options*/

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme options', //Title hiển thị khi truy cập vào Options page
        'menu_title'    => 'Theme  options', // Tên menu hiển thị ở khu vực admin
        'menu_slug'     => 'theme-settings',// Url hiển thị trên đường dẫn của options page
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
}

// Thêm Featured Image POST
// if ( function_exists( 'add_theme_support' ) ) {
//     add_theme_support( 'post-thumbnails' );
// }
//
// /*Hàm tạo post Events*/
// function register_event_post_type(){
//   $lang=get_bloginfo("language");
//   $label = array(
// 		'name' => 'Events',
// 		'singular_name' => 'Event',
// 		'add_new' => 'Add new'
// 	);
//   $args = array(
// 		'labels' => $label,
// 		'description' => 'Listing Event',
// 		'supports' => array(
// 			'title',
// 			'thumbnail',
// 			'revisions',
// 			'editor',
// 			'page-attributes'
// 		),
// 		// 'taxonomies' => false,
// 		'hierarchical' => true,
// 		'taxonomies' => array('event_category'),
// 		'show_ui' => true,
// 		'public' => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable' => true,
// 		'exclude_from_search' => true,
// 		'show_in_admin_bar' => true,
// 		'show_in_nav_menus' => true,
// 		'query_var' => true,
// 		'capability_type' => 'post',
// 		'show_in_menu' => true,
// 		'menu_position' => 20,
// 		'menu_icon' => 'dashicons-admin-site',
// 		'can_export' => true,
// 		'has_archive' => true,
//     'rewrite' => array('slug' => 'su-kien-chi-tiet', 'with_front' => false)
// 	);
// 	register_post_type('event', $args);
// }
// register_taxonomy('event_category', 'event', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => true));
// /* Kích hoạt hàm tạo custom post type */
// add_action('init', 'register_event_post_type');

/*Hàm tạo post Khuyến mãi*/
// function register_promotion_post_type(){
//   $lang=get_bloginfo("language");
//   $label = array(
// 		'name' => 'Promotions',
// 		'singular_name' => 'Promotion',
// 		'add_new' => 'Add new'
// 	);
//   $args = array(
// 		'labels' => $label,
// 		'description' => 'Listing Promotion',
// 		'supports' => array(
// 			'title',
// 			'thumbnail',
// 			'revisions',
// 			'editor',
// 			'page-attributes',
//       'excerpts'
// 		),
// 		// 'taxonomies' => false,
// 		'hierarchical' => true,
// 		'taxonomies' => array('promotion_category'),
// 		'show_ui' => true,
// 		'public' => true,
// 		'exclude_from_search' => true,
// 		'publicly_queryable' => true,
// 		'exclude_from_search' => true,
// 		'show_in_admin_bar' => true,
// 		'show_in_nav_menus' => true,
// 		'query_var' => true,
// 		'capability_type' => 'post',
// 		'show_in_menu' => true,
// 		'menu_position' => 20,
// 		'menu_icon' => 'dashicons-admin-site',
// 		'can_export' => true,
// 		'has_archive' => true,
//     'rewrite' => array('slug' => 'khuyen-mai-chi-tiet', 'with_front' => false)
// 	);
// 	register_post_type('promotion', $args);
// }
// register_taxonomy('promotion_category', 'promotion', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => true));
// /* Kích hoạt hàm tạo custom post type */
// add_action('init', 'register_promotion_post_type');


//Tạo pagination
// include(get_theme_file_path('/includes/pagination.php'));

//Tracking infor submit
// Add the info to the email
// function wpshore_wpcf7_before_send_mail($array) {
// 	global $wpdb;
// 	if(wpautop($array['body']) == $array['body']) // The email is of HTML type
// 		$lineBreak = "<br/>";
// 	else
// 		$lineBreak = "\n";
// 	$trackingInfo .= $lineBreak . $lineBreak . '-- Tracking Info --' . $lineBreak;
// 	$trackingInfo .= 'URL điền form: ' . $_SERVER['HTTP_REFERER'] . $lineBreak;
// 	if (isset ($_SESSION['OriginalRef']) )
// 		$trackingInfo .= 'Người dùng đến từ trang: ' . $_SESSION['OriginalRef'] . $lineBreak;
// 	if (isset ($_SESSION['LandingPage']) )
// 		$trackingInfo .= 'Trang đích trước khi điền form: ' . $_SESSION['LandingPage'] . $lineBreak;
// 	if ( isset ($_SERVER["REMOTE_ADDR"]) )
// 	$trackingInfo .= 'IP người dùng: ' . $_SERVER["REMOTE_ADDR"] . $lineBreak;
// 	if ( isset ($_SERVER["HTTP_X_FORWARDED_FOR"]))
// 		$trackingInfo .= 'User\'s Proxy Server IP: ' . $_SERVER["HTTP_X_FORWARDED_FOR"] . $lineBreak . $lineBreak;
// 	if ( isset ($_SERVER["HTTP_USER_AGENT"]) )
// 		$trackingInfo .= 'Thông tin trình duyệt: ' . $_SERVER["HTTP_USER_AGENT"] . $lineBreak;
// 	$array['body'] = str_replace('[tracking-info]', $trackingInfo, $array['body']);
//     return $array;
// }
// add_filter('wpcf7_mail_components', 'wpshore_wpcf7_before_send_mail');


// Original Referrer
// function wpshore_set_session_values()
// {
// 	if (!session_id())
// 	{
// 		session_start();
// 	}
// 	if (!isset($_SESSION['OriginalRef']))
// 	{
// 		$_SESSION['OriginalRef'] = $_SERVER['HTTP_REFERER'];
// 	}
// 	if (!isset($_SESSION['LandingPage']))
// 	{
// 		$_SESSION['LandingPage'] = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
// 	}
// }
// add_action('init', 'wpshore_set_session_values');
//
// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// remove_action( 'wp_print_styles', 'print_emoji_styles' );


?>
