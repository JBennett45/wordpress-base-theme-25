<?php 
// [0] Theme Supports & additional backend styles //
function jb_cst_theme_supports() {
	$user_check = wp_get_current_user();
	$masterUsr = strtolower( get_site_option( 'dev_mode_admin_usr_cst' ));
  // Admin Styles //
  function jb_cst_admin_style(){
    wp_register_style( 'cst_wp_admin_css', get_bloginfo('stylesheet_directory') . '/assets/css/admin-styles.css', false, '1.0.0' );
    wp_register_script( 'cst_wp_admin_js', get_bloginfo('stylesheet_directory') . '/assets/js/admin-scripts.js', false, '1.0.0' );
    wp_enqueue_style( 'cst_wp_admin_css' ); // optional 
    wp_enqueue_script( 'cst_wp_admin_js' ); // optional 
  }
  add_action('admin_enqueue_scripts', 'jb_cst_admin_style');
	if (!is_admin() && current_user_can('administrator') && $user_check->user_login != $masterUsr) {
		show_admin_bar(false);
	}
  // Post Thumbnail Support //
	add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 250, 125, array( 'center', 'center')  );
  // RSS //
	add_theme_support('automatic-feed-links');
  // Menus //
	add_theme_support( 'menus' );
	register_nav_menus(
		array(
			'main-nav' => __( 'Header Menu', 'base-theme' ),  
			'footer-links' => __( 'Footer Links', 'base-theme' )
		)
	);
	add_filter('wpcf7_autop_or_not', '__return_false');
}
add_action( 'after_setup_theme', 'jb_cst_theme_supports' );
// Pagination support //
function jb_cst_pagination_os($pages = '', $range = 2) {  
	// vars //
	$showitems = ($range * 2)+1;  
	global $paged;
	if(empty($paged)) $paged = 1;
	// setup query //
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}   
	// Output //
	if(1 != $pages) {
		echo "<div class='gbl-site-pagination-cst'>";
		// display back button //
		if($paged <= $pages  && $paged != 1) {
			echo "<a class='arrow-toggle-cst prev-cst' href='".get_pagenum_link($paged - 1)."'>".file_get_contents( get_template_directory_uri() . '/assets/imgs/bootstrap-icons/chevron-left.svg')."</a>";
		}
		// display each page link //
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<span class='current-cst'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}
		}
		// display next button //
		if($paged < $pages) {
			echo "<a class='arrow-toggle-cst next-cst' href='".get_pagenum_link($paged + 1)."'>".file_get_contents( get_template_directory_uri() . '/assets/imgs/bootstrap-icons/chevron-right.svg')."</a>";
		}
		echo "</div>";	
	}
}
?>