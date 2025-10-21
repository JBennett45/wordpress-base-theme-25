<?php 
function jb_cst_theme_styles_and_scripts() {
  if (!is_admin()) {
    // Bundled assets //
		$manifestPath = get_theme_file_path('assets/bundle/.vite/manifest.json');
    if (file_exists($manifestPath)) {
			$manifest = json_decode(file_get_contents($manifestPath), true);
			if (isset($manifest['src/js/scripts.js'])) {
				wp_enqueue_script('mytheme', get_theme_file_uri('assets/bundle/' . $manifest['src/js/scripts.js']['file']));
				// Enqueue the CSS file
				wp_enqueue_style('mytheme', get_theme_file_uri('assets/bundle/' . $manifest['src/js/scripts.js']['css'][0]));
			}
    }
    // scripts setup //
	  wp_register_script( 'cst-theme-ajax', get_stylesheet_directory_uri() . '/assets/js/theme-ajax.js', array( 'jquery' ));
    wp_localize_script( 'cst-theme-ajax', 'theme_ajax', array(
			'url'		=> admin_url( 'admin-ajax.php' ),
			'site_url' 	=> get_bloginfo('url'),
			'theme_url' => get_bloginfo('template_directory')
		));
		wp_enqueue_script( 'cst-theme-ajax' );
  }
}
// enqueue base scripts and styles
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_styles_and_scripts', 999 );
?>