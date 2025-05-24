<?php
get_header();
// nothing to see here yet //

?>
  <div class="container-cst">
    <form id="testing-form-base-theme">
      <input type="hidden" name="security" value="<?= wp_create_nonce('test_ajax_base_theme_nce'); ?>">
      <input type="text" name="first_name" />
      <input type="text" name="last_name" />
      <button type="submit">
        <span>Test Ajax Call</span>
      </button>
    </form>
  </div>
<?php
get_footer();
?>
