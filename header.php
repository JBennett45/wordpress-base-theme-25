<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php bloginfo( 'name' ); ?></title>
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <header>
    <?php get_template_part( 'template-parts/header/header-content' ); ?>
  </header>
<main>