<?php
// vars //
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 2,
  'order' => 'DESC',
  'orderby' => 'date',
  'post_status' => 'publish',
  'paged'    =>  $paged
);
// the below allows you to toggle each option (axios or paginated) when you come to build, you will need to get rid of this and use the option you want //
// The if statements are to control the example only, in normal case you'd want these hard coded on the first item //
?>
<section id="post-selection-mastwrapp-cst">
  <div class="container-cst"> 
    <div class="jb-tabbed-content-wrapp-cst">
      <div class="tabbed-content-controller-cst">
        <div class="tabbed-control-input-cst <?php if($paged == 1) { echo 'active-tabbed-control-input-cst'; } ?>" data-tabid="axios" data-url-refresh="<?php echo get_permalink(get_option('page_for_posts')); ?>">
          On Page Load
        </div>
        <div class="tabbed-control-input-cst <?php if($paged != 1) { echo 'active-tabbed-control-input-cst'; } ?>" data-tabid="paginated">
          Paginated Loading
        </div>
      </div>
      <div class="tabbed-content-display-cst">
        <div class="tabbed-control-output-cst <?php if($paged == 1) { echo 'active-tabbed-control-output-cst'; } ?>" data-tabid="axios">
          <?php echo get_template_part( 'template-parts/queries/post-axios', null, $args ); ?>
        </div>
        <div class="tabbed-control-output-cst <?php if($paged != 1) { echo 'active-tabbed-control-output-cst'; } ?>" data-tabid="paginated">
          <?php echo get_template_part( 'template-parts/queries/post-pagination', null, $args ); ?>
        </div>
      </div>
    </div>
  </div>
</section>