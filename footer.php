</main>
<footer id="base-master-fttr-cst" class="basetheme-footer-cst">
    <div class="container-cst basetheme-footer-cst__inner" data-contain="yes">
      <div class="basetheme-footer-cst__menu">
        <?php jbcst_wp_return_wpmenu('Footer Menu', 'ftr-optional-class', false); ?>
      </div>
      <div class="basetheme-footer-cst__terms">
        <span>&copy; <?php echo date("Y"); ?></span>
      </div>
    </div>
</footer>
<?php get_template_part( 'template-parts/overlays/mobile-menu' );  ?>
<?php wp_footer(); ?>
</body>
</html>