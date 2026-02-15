<h4>Example Swiper:</h4>
<div 
  class="swiper swiper-multiple-cst"
  data-swiper-loop="false"
  data-swiper-mobile-count="1"
  data-swiper-tablet-count="2"
  data-swiper-smalldesktop-count="3"
  data-swiper-middesktop-count="3"
  data-swiper-largedesktop-count="4"
  data-swiper-mobile-margin="10"
  data-swiper-desktop-margin="15"
  data-swiper-cst-controls="true"
  data-swiper-cst-pagination="true"
  data-swiper-cst-autoplay="true"
  data-swiper-cst-autoplay-speed="5000"
>
  <div class="swiper-wrapper">
    <?php for ($i = 0; $i < 8; $i++) { ?>
      <div class="swiper-slide">
        <h3>Slide <?php echo $i; ?></h3>
        <p>Replace with proper content</p>
      </div>
    <?php } ?>
  </div>
  <div class="swiper-navivation-cst">
    <div class="swiper-ctrls-btn swiper-ctrls-btn-previous" data-dir="prev">
      <?php echo file_get_contents( get_template_directory_uri() . '/assets/imgs/bootstrap-icons/chevron-left.svg'); ?>
    </div>
    <div class="swiper-ctrls-btn swiper-ctrls-btn-next" data-dir="next">
      <?php echo file_get_contents( get_template_directory_uri() . '/assets/imgs/bootstrap-icons/chevron-right.svg'); ?>
    </div>
  </div>
  <div class="swiper-pagination-cst"></div>
</div>