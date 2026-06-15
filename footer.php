</main>
<footer id="global-footer-cst" class="footer-cst">
  <div class="container-cst footer-cst__inner">
    <div class="footer-cst__logo">
      <h4>Logo</h4>
    </div>
    <div class="footer-cst__menu">
      <?php jbcst_wp_return_wpmenu('Footer Menu', 'ftr-optional-class', false); ?>
    </div>
    <div class="footer-cst__terms">
      <span>
        &copy; <?php echo date('Y'); ?> - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet dui
        gravida felis efficitur volutpat sit amet et velit.
      </span>
    </div>
  </div>
</footer>
<?php get_template_part('template-parts/overlays/mobile-menu'); ?>
<?php wp_footer(); ?>
</body>

</html>