<?php 
function ea_disable_gutenberg( $can_edit ) {
  remove_post_type_support( 'page', 'editor' );
  return $can_edit;
}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );
?>