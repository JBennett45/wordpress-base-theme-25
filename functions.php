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
//-- [4] Requests --//
require_once( 'inc/requests/load-more-posts.php' );
//-- [5] Misc --//
?>