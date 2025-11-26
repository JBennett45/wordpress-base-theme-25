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
      } elseif(is_404()) {
        echo '<h5 class="error-txt-wrap">404 error found</h5>';
      }
    ?>
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
    <h4>Example Accordion:</h4>
    <div class="post-content-accordion-cst__wrap__right jb-custom-accordion-cst">
      <?php for ($i = 0; $i < 3; $i++) { ?>
        <div class="jb-custom-accordion-cst__item <?php echo ($i == 0) ? 'jb-custom-accordion-cst__item--active' : ''; ?>">
          <div class="jb-custom-accordion-cst__item__title">
            Accordion Title
          </div>
          <div class="jb-custom-accordion-cst__item__content content-to-switch-cst">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed ante a velit rutrum rhoncus ac in est. Nunc ultrices mauris lorem, quis dictum ex tempor eu. Morbi leo augue.</p>
          </div>
        </div>
      <?php } ?>
    </div>
    <h4>Example Tabbed Content:</h4>
    <div class="jb-custom-tabs-cst">
      <div class="jb-custom-tabs-title-cst">
        <?php for ($i = 0; $i < 3; $i++) { ?>
          <div class="jb-custom-tabs-title-cst__item <?php echo ($i == 0) ? 'jb-custom-tabs-title-cst__item--active' : ''; ?>" data-target="<?php echo $i; ?>">
            Tab Title <?php echo $i; ?>
          </div>
        <?php } ?>
      </div>
      <div class="jb-custom-tabs-content-cst">
        <?php for ($i = 0; $i < 3; $i++) { ?>
          <div class="jb-custom-tabs-content-cst__item <?php echo ($i == 0) ? 'jb-custom-tabs-content-cst__item--active' : ''; ?>" data-target="<?php echo $i; ?>">
            <p>Content <?php echo $i; ?> - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed ante a velit rutrum rhoncus ac in est. Nunc ultrices mauris lorem, quis dictum ex tempor eu. Morbi leo augue.</p>
          </div>
        <?php } ?>
      </div>
    </div>
    <h4>Example Button:</h4>
    <a href="<?php echo get_the_permalink(25); ?>" class="button-cst button-cst__icon--btn button-cst--black">
      <span>View all news</span>
    </a>
  </div>
</section>