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
function jbcst_acf_return_text_field($field, $tag = null) {
  if(class_exists('ACF')) {
    if($field) { 
      if($tag) { 
        echo '<' . $tag . '>' . $field . '</' . $tag . '>';
      } else {
        echo $field;
      }
      return;
    }
  } 
  else {
    echo 'Error #1: ACF helper function used without plugin instance.';
  }
}
// [1.1] ACF - return active image field wrapped in img & alt - has to be array rerutn //
function jbcst_acf_return_img_field($img, $class = null) {
  if(class_exists('ACF')) {
    // check value //
    if($img && is_array($img)) { 
      $returnedSrc = $img['url'];
      $returnedAlt = $img['alt'];
    } 
    else {
      $returnedSrc = get_template_directory_uri().'/screenshot.png';
      $returnedAlt = get_bloginfo() . ' - awaiting image'; 
    }
    $imgClass = $class ? 'class="' . $class . '"' : null;
    echo '<img src="' . $returnedSrc . '" alt="' . $returnedAlt . '" '. $imgClass .'>';
    return;
  } 
  else {
    echo 'Error #1: ACF helper function used without plugin instance.';
  }
}
// Return theme options instead of needing to do it each call //
function jbcst_acf_return_option_field($fieldname) {
  if(class_exists('ACF')) {
    $fieldname = get_field($fieldname, 'options');
    return $fieldname;
  }
}
// Split names //
function jbcst_split_name_field($name) {
  $name = trim($name);
  $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
  $first_name = trim( preg_replace('#'.preg_quote($last_name,'#').'#', '', $name ) );
  return array($first_name, $last_name);
}
// CF7 Custom Element return // 
function jbcst_cf7_element($formID) {
  echo '<cf-form-extension>';
    echo '<div class="wpcf-extension-wrap-cst">';
        echo do_shortcode('[contact-form-7 id="'.$formID.'"]');
    echo '</div>';
  echo '</cf-form-extension>';
}
?>