<?php
// Vars //
$taxonomy = 'category';
$post_type = 'post';
$filter_criteria = get_categories();
$limit = 3;
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => $limit,
  'order' => 'DESC',
  'orderby' => 'date',
  'post_status' => 'publish',
  'paged' =>  $paged,
);
?>
<section class="post-archive-listing-cst news-listings-cst">
  <div class="container-cst">
    <?php 
      if($filter_criteria) {
        echo '<div id="filter-post-wrap-cst" class="news-listings-cst__filter-wrap" data-taxonomy="'.$taxonomy.'" data-post-type="'.$post_type.'">';
        ?>
          <div class="filter-value-cst news-listings-cst__filter-wrap__item news-listings-cst__filter-wrap--active" data-term-id="all">
            <div class="filter-item-checkbox-cst"></div>
            <span>All</span>
          </div>  
        <?php
          foreach($filter_criteria as $filter) {
            $name = $filter->name;
            $id = $filter->term_id;
            ?>
              <div class="filter-value-cst news-listings-cst__filter-wrap__item" data-term-id="<?php echo $id; ?>">
                <div class="filter-item-checkbox-cst"></div>
                <span><?php echo $name; ?></span>
              </div>
            <?php
          }
        echo '</div>';
      }
    ?>
  </div>
  <div class="container-cst archive-three-listing-cst">
    <?php 
      $wp_query = new WP_Query( $args );
      while ( $wp_query->have_posts() ) : $wp_query->the_post();
        echo get_template_part('template-parts/cards/news'); 
      endwhile;
    ?>
  </div>
  <div class="container-cst news-listings-cst__load-more">
    <button class="load-more-posts-btn-cst button-cst button-cst__icon-btn">
      <span>Load more</span>
    </button>
  </div>
</section>
<div 
  id="post-parameter-info-cst" 
  data-queryvars="<?php echo base64_encode(serialize($wp_query->query_vars)) ?>"
  data-paged="<?php echo $wp_query->query_vars['paged'] ?>"
  data-postcount="<?php echo $wp_query->post_count ?>"
  data-maxpages="<?php echo $wp_query->max_num_pages ?>"
  data-posttype="<?php echo $wp_query->query_vars['post_type'] ?>"
></div>
<?php wp_reset_query(); ?>