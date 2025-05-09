<?php 
//-- [0] Holding --//

//--[1] Blocks Disable -- //
// This theme is for classic editor only so we want to disable the gutenburg view //
function ea_disable_gutenberg( $can_edit ) {
  remove_post_type_support( 'page', 'editor' );
  return $can_edit;
}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );
//-- [2] Enqueues --//
// Scripts //
function jb_cst_theme_scripts() {
  wp_enqueue_script(
		'jb-main-js', 
		get_template_directory_uri() . '/assets/js/script.js', 
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
    get_template_directory_uri() . '/assets/css/style.css', 
    array(),
    wp_get_theme()->get( 'Version' ) 
  );
}
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_styles' );
?>