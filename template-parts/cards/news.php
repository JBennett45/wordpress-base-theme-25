<?php 
// vars //
$title = get_the_title(); 
$link = get_the_permalink(); 
?>
<div class="archivable-card-cst post-snippet-output-cst">
  <h4><?php echo $title; ?></h4>
  <a href="<?php echo $link; ?>">Read More</a>
</div>  