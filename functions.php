<?php 
//-- [0] Cleanup --//
require_once( 'inc/wp-defaults-cleanup.php' );
//-- [1] Enqueues --//
require_once( 'inc/asset-enqueues.php' );
//--[1] Blocks Disable -- //
// This theme is for classic editor only so we want to disable the gutenburg view //
require_once( 'inc/disable-gutenburg.php' );
//-- [2] Theme Supports --//
require_once( 'inc/theme-supports.php' );
//-- [3] Help Functions --//
require_once( 'functions/helpers.php' );
// Testing an axios call - usually I'd put axios functions in a file of there own for cleanup, this is just for testing //
// action name: cst_base_theme_axios_function //
add_action( 'wp_ajax_nopriv_cst_base_theme_axios_function', 'base_theme_axios_test_call' );
add_action( 'wp_ajax_cst_base_theme_axios_function', 'base_theme_axios_test_call' );
function base_theme_axios_test_call() {
	// // vars //
	$name = $_POST['first-name'];
	$lastName = $_POST['last-name'];
  // you could make queries, store to database and so on here during the axios call //
  // Send back to axios result //
 	echo json_encode( array(
		'success' => 1,
    'first-name' => $name,
    'last-name' => $lastName,
	));
	die();
}
?>