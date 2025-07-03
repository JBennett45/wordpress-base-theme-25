<?php
// action name: cst_load_more_posts //
add_action( 'wp_ajax_nopriv_cst_load_more_posts', 'cst_load_more_posts_cb' );
add_action( 'wp_ajax_cst_load_more_posts', 'cst_load_more_posts_cb' );
function cst_load_more_posts_cb() {
	// prepare our arguments for the query
	$recieve_query = $_POST['query']; // query_posts() takes care of the necessary sanitization
	// data serialized in the default queries
	$decode_seri_postdata = unserialize(base64_decode($recieve_query));
	$params = $decode_seri_postdata; // query_posts() takes care of the necessary sanitization
	$params['paged'] = $_POST['currentpage'] + 1; // we need next page to be loaded
	// Setup //
	$load_more_query = new WP_Query( $params );
  // get posts //
	if ( $load_more_query->have_posts() ) {
		while ( $load_more_query->have_posts() ) : $load_more_query->the_post();
			echo get_template_part('template-parts/snippets/post-snippet'); 
		endwhile;
	}
	else {
		echo '<span class="error-filter-cst">Sorry, nothing found with that criteria.</span>';
	}
  // end //
  die();
}
?>
