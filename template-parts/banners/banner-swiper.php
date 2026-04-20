<banner-swiper class="banner-swiper-cst">
  <div class="outer-wrap">
    <div class="swiper">

      <div class="swiper-wrapper">
        <?php for ($x = 1; $x <= 5; $x++) { ?>
          <div class="swiper-slide">
            <h2>Slide <?php echo $x; ?></h2>
          </div>
          <?php } ?>
      </div>

      <div class="swiper-pagination"></div>

      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>
  </div>
</banner-swiper>