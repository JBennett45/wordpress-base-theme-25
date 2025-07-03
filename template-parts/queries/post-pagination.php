<div class="pwrap-top-content-cst">
  <h4>Paginated Page Loading Content</h4>
  <p>This output demonstrates the on pagination support for classically loaded paged results.</p>
</div>
<?php 
  $wp_query = new WP_Query( $args );
  while ( $wp_query->have_posts() ) : $wp_query->the_post();
    echo get_template_part('template-parts/snippets/post-snippet'); 
  endwhile;
  wp_reset_postdata();
  // pagination //
  if (function_exists('jb_cst_pagination_os')) {
    jb_cst_pagination_os();
  }
?>