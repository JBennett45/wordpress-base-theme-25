<custom-tabs class="custom-tabs-wrap">
  <div class="custom-tabs-wrap__titles">
    <?php for ($i = 0; $i < 3; $i++) { ?>
    <div class="custom-tabs-wrap__title-tab" data-target="<?php echo $i; ?>"
      <?php echo ($i == 0) ? 'data-active="true"' : ''; ?>>
      Tab Title <?php echo $i; ?>
    </div>
    <?php } ?>
  </div>
  <div class="custom-tabs-wrap__content">
    <?php for ($i = 0; $i < 3; $i++) { ?>
    <div class="custom-tabs-wrap__content-tab" data-target="<?php echo $i; ?>"
      <?php echo ($i == 0) ? 'data-active="true"' : ''; ?>>
      <p>Content <?php echo $i; ?> - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed ante a velit
        rutrum rhoncus ac in est. Nunc ultrices mauris lorem, quis dictum ex tempor eu. Morbi leo augue.</p>
    </div>
    <?php } ?>
  </div>
</custom-tabs>