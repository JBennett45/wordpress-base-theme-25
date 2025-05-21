<?php 
// [0] Head Cleanup //
function jb_cst_head_cleanup() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'jb_cst_head_cleanup' );
?>