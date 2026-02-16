<h4>Example Accordion:</h4>
<custom-accordion-el>
  <div class="jb-custom-accordion-cst">
    <?php for ($i = 0; $i < 3; $i++) { ?>
      <div class="jb-custom-accordion-cst__item" <?php echo ($i == 0) ? 'data-status="active"' : ''; ?>>
        <div class="jb-custom-accordion-cst__item__title">
          Accordion Title
        </div>
        <div class="jb-custom-accordion-cst__item__content accordion-vis-control-cst">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed ante a velit rutrum rhoncus ac in est. Nunc ultrices mauris lorem, quis dictum ex tempor eu. Morbi leo augue.</p>
        </div>
      </div>
    <?php } ?>
  </div>
</custom-accordion-el>