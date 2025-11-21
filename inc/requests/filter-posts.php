<?php
// Action name: cst_filter_posts //
add_action( 'wp_ajax_nopriv_cst_filter_posts', 'cst_filter_posts_cb' );
add_action( 'wp_ajax_cst_filter_posts', 'cst_filter_posts_cb' );
function cst_filter_posts_cb() {
  // Posted vars //
  $taxonomy = $_POST['taxonomy'];
  $type = $_POST['ptype'];
	$term_value = $_POST['term'];
  $limit = 2;
  $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
  $args = array(
    'post_type' => $type,
    'posts_per_page' => $limit,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
    'paged' =>  $paged
  );
  // Only injext taxonomy if term isn't all //
  if( $term_value != 'all' ) {
    $args['tax_query'] = array(
      array (
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $term_value
      )
    );
  }
  $wp_filter_query = new WP_Query( $args );
	if ( $wp_filter_query->have_posts() ) {
		ob_start();
		while ( $wp_filter_query->have_posts() ) : $wp_filter_query->the_post();
      echo get_template_part('template-parts/cards/news');
		endwhile;
		$filter_output = ob_get_contents();
		ob_end_clean();
		wp_reset_postdata();
  }
  else {
    $filter_output = '<p>No posts with that criteria were found.</p>';
  }
	// Send it //
 	echo json_encode( array(
		'success' => 1,
		'filter_output' => $filter_output,
    'new_query' => base64_encode(serialize($wp_filter_query->query_vars)),
		'new_current_page' => $wp_filter_query->query_vars['paged'],
		'new_max_page' => $wp_filter_query->max_num_pages,
		'new_all_page' =>	$wp_filter_query->found_posts
	));
  // end //
  die();
}
?>
