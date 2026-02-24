<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  
  <title><?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta property="og:type" content="website">
  <!-- https://realfavicongenerator.net/ -->
  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()?>/assets/imgs/favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri()?>/assets/imgs/favicon/favicon.svg" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/assets/imgs/favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri()?>/assets/imgs/favicon/apple-touch-icon.png" />
  <meta name="apple-mobile-web-app-title" content="Base Theme" />
  <link rel="manifest" href="<?php echo get_template_directory_uri()?>/assets/imgs/favicon/site.webmanifest" />
	<meta name="theme-color" content="#FFF" media="(prefers-color-scheme: light)">
	<meta name="theme-color" content="#000" media="(prefers-color-scheme: dark)">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="global-header-cst" class="header-cst">
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
<main id="main-content-wrap-cst">