<?php 
function jb_cst_disable_gutenburg_editor( $can_edit ) {
  // Run an ACF check, if enabled, remove editor from the post types listed below //
  if(class_exists('ACF')) {
    remove_post_type_support( 'page', 'editor' );
    // remove_post_type_support( 'post', 'editor' ); (remove post if you want to)
  } 
  // remove gutenburg //
  return false;
}
add_filter( 'use_block_editor_for_post_type', 'jb_cst_disable_gutenburg_editor', 10, 2 );
?>