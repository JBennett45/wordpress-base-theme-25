<h4>Example Tabbed Content</h4>
<custom-tabs>
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
</custom-tabs>