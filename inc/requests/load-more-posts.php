<?php
// Action name: cst_load_more_posts //
add_action( 'wp_ajax_nopriv_cst_load_more_posts', 'cst_load_more_posts_cb' );
add_action( 'wp_ajax_cst_load_more_posts', 'cst_load_more_posts_cb' );
function cst_load_more_posts_cb() {
	// Setup vars //
	$recieve_query = $_POST['query'];
	$decode_seri_postdata = unserialize(base64_decode($recieve_query));
	$params = $decode_seri_postdata; 
	$params['paged'] = $_POST['currentpage'] + 1;
	// Setup //
	$load_more_query = new WP_Query( $params );

	ob_start();
  // Get posts content if found or pass message //
	if ( $load_more_query->have_posts() ) {
		while ( $load_more_query->have_posts() ) : $load_more_query->the_post();
			 get_template_part('template-parts/snippets/post-snippet'); 
		endwhile;
		$content = ob_get_contents();
	}
	else {
		$content = '<span class="error-filter-cst">Sorry, no more posts found.</span>';
	}
	// clear the buffer //
	ob_end_clean();
	// send it //
 	echo json_encode( array(
		'success' => 1,
		'output' => $content
	));
  // end //
  die();
}
?>
