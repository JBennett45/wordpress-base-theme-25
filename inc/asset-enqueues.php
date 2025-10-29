<?php 
function jb_cst_theme_styles_and_scripts() {
  if (!is_admin()) {
		// Other assets setup //
	  wp_register_script( 
			'cst-theme-ajax', 
			get_stylesheet_directory_uri() . '/assets/js/theme-ajax.js', 
			array( 'jquery' )
		);
    wp_localize_script( 'cst-theme-ajax', 'theme_ajax', array(
			'url'		=> admin_url( 'admin-ajax.php' ),
			'site_url' 	=> get_bloginfo('url'),
			'theme_url' => get_bloginfo('template_directory')
		));
		wp_enqueue_script( 'cst-theme-ajax' );
    // Bundled assets setup //
		$manifestPath = get_theme_file_path('assets/bundle/.vite/manifest.json');
    if (file_exists($manifestPath)) {
			$manifest = json_decode(file_get_contents($manifestPath), true);
			if (isset($manifest['src/js/scripts.js'])) {
				// CSS //
				wp_register_style(
					'cst-theme-css',
					get_theme_file_uri('assets/bundle/' . $manifest['src/js/scripts.js']['css'][0]) 
				);
				// JS //
				wp_register_script( 
					'cst-theme-js', 
					get_theme_file_uri('assets/bundle/' . $manifest['src/js/scripts.js']['file']), 
					'',
					'',
					array('in_footer' => true)
				);
				// send it //
				wp_enqueue_style( 'cst-theme-css' );
				wp_enqueue_script( 'cst-theme-js' );
			}
		}
  }
}
// enqueue base scripts and styles
add_action( 'wp_enqueue_scripts', 'jb_cst_theme_styles_and_scripts', 999 );
// Login Screen //
function jb_cst_theme_login_style() {
	wp_register_style(
		'cst-login-css',
		get_stylesheet_directory_uri() . '/assets/css/login.min.css', 
	);
	wp_enqueue_style( 'cst-login-css' );	
}
add_action( 'login_enqueue_scripts', 'jb_cst_theme_login_style' );
// preload fonts //
function jb_cst_font_preload() {
	echo '<link rel="preload" href="' . get_theme_file_uri() . '/assets/fonts/montserrat/montserrat-light.ttf' . '" as="font" type="font/woff" crossorigin>'; 
	echo '<link rel="preload" href="' . get_theme_file_uri() . '/assets/fonts/montserrat/montserrat-regular.ttf' . '" as="font" type="font/woff" crossorigin>'; 
	echo '<link rel="preload" href="' . get_theme_file_uri() . '/assets/fonts/montserrat/montserrat-bold.ttf' . '" as="font" type="font/woff" crossorigin>'; 
};
add_action( 'wp_head', 'jb_cst_font_preload' );
?>