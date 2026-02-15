<?php 
if(class_exists('ACF')) {
  add_action('acf/init', function() {
    if( function_exists('acf_add_options_page') ) {
      acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-global-options',
        'capability'    => 'edit_posts',
        'redirect'      => false
      ));
      acf_add_options_sub_page(array(
        'page_title'    => 'Sub Page Theme Options',
        'menu_title'    => 'Sub Page Theme Options',
        'parent_slug'   => 'theme-global-options',
      ));
    }
  });
}
?>