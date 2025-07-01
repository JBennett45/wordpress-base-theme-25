<h4>Pagination</h4>
<?php 
  $wp_query = new WP_Query( $args );
  while ( $wp_query->have_posts() ) : $wp_query->the_post();
    echo get_the_title() . '<br/>';
  endwhile;
  wp_reset_postdata();
  // pagination //
  if (function_exists('jb_cst_pagination_os')) {
    jb_cst_pagination_os();
  }
?>