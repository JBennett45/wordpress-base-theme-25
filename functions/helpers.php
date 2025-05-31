<?php 
// [0] Get & Return Menu based off title, optional class for chevron // 
function jbcst_wp_return_wpmenu($menuName, $className, $chevron) {
  $menuReturn = wp_get_nav_menu_object($menuName);
  if(!$className) { $className = 'insert-nav-class-here'; }
  if(!$chevron) { $chevron = ''; }
  if($menuReturn) {
    echo '<nav>';
      if($chevron) {
        wp_nav_menu(array(
          'container' => false,
          'menu' => __( $menuReturn->name, 'base-theme' ),
          'menu_class' => $className,
          'link_after' => '<div class="bst-opt-chevron-active-cst">' . file_get_contents( get_template_directory_uri() . '/assets/imgs/bootstrap-icons/chevron-down.svg') . '</div>'
        ));
      } else {
        wp_nav_menu(array(
          'container' => false,
          'menu' => __( $menuReturn->name, 'base-theme' ),
          'menu_class' => $className
        ));
      }
    echo '</nav>';
  }
}
// [1] ACF - return active field with tag (h tag etc) //
function jbcst_acf_return_text_field($field, $tag) {
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
    echo 'Error #1: ACF helper function used without plugin instance.';
  }
}
?>