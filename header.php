<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta property="og:type" content="website">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
wp_body_open(); 
get_template_part( 'template-parts/overlays/mobile-menu' ); 
?>
<header id="global-theme-hdr-cst" class="basetheme-header-cst">
  <div class="container-cst hdr-container-cst">
    <div class="hdr-container-cst__logo--wrap">
      <a href="<?php echo get_home_url(); ?>">
        <span>Logo</span>
      </a>
    </div>
    <div class="hdr-container-cst__menu--wrap">
      <?php jbcst_wp_return_wpmenu('Header Menu', 'hdr-optional-class', true); ?>
    </div>
    <div class="mbl-toggle-wrapp">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
</header>
<main>