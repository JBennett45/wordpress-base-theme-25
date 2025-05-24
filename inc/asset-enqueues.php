<?php 
function jb_cst_theme_styles_and_scripts() {
  if (!is_admin()) {
    // scripts setup //
    wp_register_script( 'cst-theme-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js', null, null, true );
		wp_register_script( 'axios-js', get_stylesheet_directory_uri() . '/assets/js/axios.min.js', null, null, true );
	  wp_register_script( 'cst-theme-ajax', get_stylesheet_directory_uri() . '/assets/js/theme-ajax.js', array( 'jquery' ));
    wp_localize_script( 'cst-theme-ajax', 'theme_ajax', array(
			'url'		=> admin_url( 'admin-ajax.php' ),
			'site_url' 	=> get_bloginfo('url'),
			'theme_url' => get_bloginfo('template_directory')
		));
		wp_enqueue_script( 'cst-theme-scripts' );
		wp_enqueue_script( 'axios-js' );
		wp_enqueue_script( 'cst-theme-ajax' );
    // Styles //
    wp_register_style( 'cst-main-css', get_stylesheet_directory_uri() . '/assets/css/styles.min.css', array(), '', 'all' );
		wp_enqueue_style( 'cst-main-css' );
  }
}
// enqueue base scripts and styles
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_styles_and_scripts', 999 );
?>