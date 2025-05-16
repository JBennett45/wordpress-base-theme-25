<?php 
// Scripts //
function jb_cst_theme_scripts() {
  wp_enqueue_script(
		'jb-main-js', 
		get_template_directory_uri() . '/assets/js/scripts.min.js', 
		array(),
		wp_get_theme()->get( 'Version' ),
		array( 'in_footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_scripts' );
// Stylesheets //
function jb_cst_theme_styles() {
  wp_enqueue_style( 
    'jb-main-css', 
    get_template_directory_uri() . '/assets/css/styles.min.css', 
    array(),
    wp_get_theme()->get( 'Version' ) 
  );
}
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_styles' );
?>