<?php
// Vars //
$taxonomy = 'category';
$post_type = 'post';
$filter_criteria = get_categories();
$limit = 3;
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $limit,
  'order' => 'DESC',
  'orderby' => 'date',
  'post_status' => 'publish',
  'paged' =>  $paged,
);
$wp_query = new WP_Query( $args );
if($wp_query) {
?>
  <section class="base-master-default-content-cst">
    <post-archive-control 
      data-queryvars="<?php echo base64_encode(serialize($wp_query->query_vars)) ?>"
      data-paged="<?php echo $wp_query->query_vars['paged'] ?>"
      data-postcount="<?php echo $wp_query->post_count ?>"
      data-maxpages="<?php echo $wp_query->max_num_pages ?>"
      data-posttype="<?php echo $wp_query->query_vars['post_type'] ?>"
    >
      <?php 
        if($filter_criteria) {
          echo '<div class="container-cst archive-post-filtering-cst" data-taxonomy="'.$taxonomy.'">';
          ?>
            <div class="filter-item-cst" data-term-id="all">
              <span>All</span>
            </div>  
          <?php
            foreach($filter_criteria as $filter) {
              $name = $filter->name;
              $id = $filter->term_id;
              ?>
                <div class="filter-item-cst" data-term-id="<?php echo $id; ?>">
                  <span><?php echo $name; ?></span>
                </div>
              <?php
            }
          echo '</div>';
        }
      ?>
      <div class="container-cst archive-post-listing-cst archive-post-listing-cst__col-3">
        <?php 
          while ( $wp_query->have_posts() ) : $wp_query->the_post();
            echo get_template_part('template-parts/cards/news'); 
          endwhile;
          echo get_template_part('template-parts/global/loader');
        ?>
      </div>
      <div class="container-cst news-listings-cst__load-more">
        <button class="load-more-posts-btn-cst button-cst button-cst__icon-btn">
          <span>Load more</span>
        </button>
      </div>
    </post-archive-listing>
  </section>
  <?php wp_reset_query(); ?>
<?php } ?>