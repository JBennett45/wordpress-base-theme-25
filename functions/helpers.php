<?php 
// [0] Get & Return Menu based off title // 
function jbfunction_check_menu_exists($menuName, $navWrapper) {
  $menuReturn = wp_get_nav_menu_object($menuName);
  if($menuReturn) {
    if($navWrapper) { echo '<nav>'; }
      wp_nav_menu(array(
        'container' => false,
        'menu' => __( $menuReturn->name, 'base-theme' ),
        'menu_class' => 'main-nav'
      ));
    if($navWrapper) { echo '</nav>'; }
  }
}
// [1] ACF - return active field with tag (h tag etc) //
function returnActiveField($field, $tag) {
  if(class_exists('ACF')) {
    if($field) { 
      if($tag) { 
          echo '<' . $tag . '>' . $field . '</' . $tag . '>';
        return;
      } else {
        echo $field;
        return;
      }
    }
  } 
  else {
    echo 'ACF isn\'t active, please install and activate the plugin or don\'t use this helper function.';
  }
}
?>