<div class="pwrap-top-content-cst">
  <h4>On Page - Axios</h4>
  <p>This output demonstrates the on page loading and filtering</p>
</div>
<?php 
  $wp_query = new WP_Query( $args );
  while ( $wp_query->have_posts() ) : $wp_query->the_post();
    echo get_template_part('template-parts/snippets/post-snippet'); 
  endwhile;
  wp_reset_postdata();
?>