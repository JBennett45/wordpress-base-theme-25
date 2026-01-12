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
// require_once( 'inc/admin/post-types/example-cst.php' );
//-- [3] Help Functions --//
require_once( 'functions/helpers.php' );
//-- [4] Requests --//
require_once( 'inc/requests/load-more-posts.php' );
require_once( 'inc/requests/filter-posts.php' );
//-- [5] Misc --//
require_once( 'inc/misc/cf7-hooks.php' ); // - add if required with ACF
?>