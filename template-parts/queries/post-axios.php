<h4>AXIOS</h4>
<?php 
  $wp_query = new WP_Query( $args );
  while ( $wp_query->have_posts() ) : $wp_query->the_post();
    echo get_the_title() . '<br/>';
  endwhile;
  wp_reset_postdata();
?>