<?php 
// vars //
global $template;
$fileName = basename($template);
$show_form = get_field('show_form_example');
$show_accordion = get_field('show_accordion_example');
$show_tabs = get_field('show_tabbed_example');
?>
<section class="base-master-default-content-cst">
  <div class="container-cst">
    <h5>Current template: <?php echo $fileName; ?></h5>
    <p>A minimal starter theme with Vite processing and basic UI elements to be built on.</p>
    <?php 
      if(is_singular('post')) { 
        while ( have_posts() ) : the_post();
          echo '<h5>Article content:</h5>';
          echo get_the_content();
        endwhile; 
      } 
      if($show_form) {
        get_template_part('template-parts/parts/example-form');
      }
      if($show_accordion) {
        get_template_part('template-parts/parts/example-accordion');
      }
      if($show_tabs) {
        get_template_part('template-parts/parts/example-tabs');
      }
    ?>
  </div>
</section>