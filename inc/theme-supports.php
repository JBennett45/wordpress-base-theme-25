<?php 
function jb_cst_theme_supports() {
  // Admin Styles //
  function jb_cst_admin_style(){
    wp_register_style( 'cst_wp_admin_css', get_bloginfo('stylesheet_directory') . '/assets/css/admin-styles.css', false, '1.0.0' );
    wp_register_script( 'cst_wp_admin_js', get_bloginfo('stylesheet_directory') . '/assets/js/admin-scripts.js', false, '1.0.0' );
    wp_enqueue_style( 'cst_wp_admin_css' ); // optional 
    wp_enqueue_script( 'cst_wp_admin_js' ); // optional 
  }
  add_action('admin_enqueue_scripts', 'jb_cst_admin_style');
  // Post Thumbnail Support //
	add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 250, 125, array( 'center', 'center')  );
  // RSS //
	add_theme_support('automatic-feed-links');
  // Menus //
	add_theme_support( 'menus' );
	register_nav_menus(
		array(
			'main-nav' => __( 'Header Menu', 'base-theme' ),  
			'footer-links' => __( 'Footer Links', 'base-theme' )
		)
	);
}
add_action( 'after_setup_theme', 'jb_cst_theme_supports' );
?>