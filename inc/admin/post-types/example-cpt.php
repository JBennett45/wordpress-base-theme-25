<?php
// Services with service type taxonomy //
add_action( 'init', 'cpt_register_service_cpt' );
function cpt_register_service_cpt() {
  // label vars //
  $menu_position = 50;
  $cpt_singular_name = 'Service';
  $cpt_plural_name = 'Services';
  $cpt_name = 'client-name-service';
  $theme_name = 'client-name';
  $labels = array(
    'name'                  => _x( $cpt_plural_name, 'Post type general name', $theme_name ),
    'singular_name'         => _x( $cpt_plural_name, 'Post type singular name', $theme_name ),
    'menu_name'             => _x( $cpt_plural_name, 'Admin Menu text', $theme_name ),
    'name_admin_bar'        => _x( $cpt_plural_name, 'Add New on Toolbar', $theme_name ),
    'add_new'               => __( 'Add New', $theme_name ),
    'add_new_item'          => __( 'Add New '.$cpt_singular_name, $theme_name ),
    'new_item'              => __( 'New '.$cpt_plural_name, $theme_name ),
    'edit_item'             => __( 'Edit '.$cpt_plural_name, $theme_name ),
    'view_item'             => __( 'View '.$cpt_plural_name, $theme_name ),
    'all_items'             => __( 'All '.$cpt_plural_name, $theme_name ),
    'search_items'          => __( 'Search '.$cpt_plural_name, $theme_name ),
    'parent_item_colon'     => __( 'Parent '.$cpt_singular_name, $theme_name ),
    'not_found'             => __( 'No '.$cpt_plural_name.' found.', $theme_name ),
    'not_found_in_trash'    => __( 'No '.$cpt_plural_name.' found in Trash.', $theme_name ),
    'featured_image'        => _x(  $cpt_plural_name.' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', $theme_name ),
    'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', $theme_name ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', $theme_name ),
    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', $theme_name ),
    'archives'              => _x(  $cpt_plural_name.' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', $theme_name ),
    'insert_into_item'      => _x( 'Insert into '.$cpt_plural_name, 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', $theme_name ),
    'uploaded_to_this_item' => _x( 'Uploaded to this '.$cpt_singular_name, 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', $theme_name ),
    'filter_items_list'     => _x( 'Filter '.$cpt_plural_name.' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', $theme_name ),
    'items_list_navigation' => _x(  $cpt_plural_name.' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', $theme_name ),
    'items_list'            => _x(  $cpt_plural_name.' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', $theme_name ),
  );
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'menu_position'      => $menu_position,
    'menu_icon'          => 'dashicons-admin-tools',
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'our-services','with_front' => false ),
    'has_archive'        => false,
    'hierarchical'       => false,
    'supports'           => array( 'title' ),
  );
  register_post_type( $cpt_name, $args );
}
// Sector Taxonomy //
add_action( 'init', 'tax_register_services_sectors_cpt', 0 );
function tax_register_services_sectors_cpt() {
  // setup //
  $tax_singular_name = 'Service Sector';
  $tax_plural_name = 'Service Sectors';
  $tax_name = 'taxonomy-service-sectors';
  $cpt_name = 'client-name-service';
  $theme_name = 'client-name';
  // send //
	$labels = array(
		'name'              => _x( $tax_plural_name, 'taxonomy general name', $theme_name ),
		'singular_name'     => _x( $tax_singular_name, 'taxonomy singular name', $theme_name ),
		'search_items'      => __( 'Search ' . $tax_plural_name, $theme_name ),
		'all_items'         => __( 'All ' . $tax_plural_name, $theme_name ),
		'parent_item'       => __( 'Parent ' . $tax_singular_name, $theme_name ),
		'parent_item_colon' => __( 'Parent ' . $tax_singular_name, $theme_name ),
		'edit_item'         => __( 'Edit ' . $tax_singular_name, $theme_name ),
		'update_item'       => __( 'Update ' . $tax_singular_name, $theme_name ),
		'add_new_item'      => __( 'Add New ' . $tax_singular_name, $theme_name ),
		'new_item_name'     => __( 'New ' . $tax_singular_name . ' Name', $theme_name ),
		'menu_name'         => __( $tax_plural_name, $theme_name ),
	);
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
    // 'publicly_queryable' => false,
		'show_admin_column' => true,
    'rewrite'            => array( 'slug' => 'sectors','with_front' => false ),
    'show_in_rest'      => true,
    'sort'              => true,
		'query_var'         => true
	);
	register_taxonomy( $tax_name, array( $cpt_name ), $args );
}
?>
