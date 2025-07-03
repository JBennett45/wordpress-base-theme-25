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
<div 
  id="lmax-post-request-wrapp-cst" 
  data-queryvars="<?php echo base64_encode(serialize($wp_query->query_vars)) ?>"
  data-paged="<?php echo $wp_query->query_vars['paged'] ?>"
  data-postcount="<?php echo $wp_query->post_count ?>"
  data-maxpages="<?php echo $wp_query->max_num_pages ?>"
  data-posttype="<?php echo $wp_query->query_vars['post_type'] ?>"
></div>
<button class="lmax-post-request-cst">
  <span>Load more posts</span>
</button>