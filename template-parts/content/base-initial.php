<?php 
// vars //
global $template;
$fileName = basename($template);
?>
<section id="base-master-default-content-cst">
  <div class="container-cst">
    <h1>Base Theme</h1>
    <p>A minimal starter development theme for developers planning to build from the ground up with potential use of ACF</p>
    <h5>Current file/template: <?php echo $fileName; ?></h5>
    <?php 
      if(is_singular('post')) { 
        while ( have_posts() ) : the_post();
          echo '<h5>Post example content fetch:</h5>';
          echo get_the_content();
        endwhile; 
      }
    ?>
  </div>
</section>