<?php

/* Taxonomy Category */

function sbc_slider_bootstrap_carousel_category()
{
	$singular = __('Category', 'slider-bootstrap-carousel');
	$plural = __('Categories', 'slider-bootstrap-carousel');

	$labels = array(
		'name'                       => _x( $singular, 'Taxonomy General Name', 'slider-bootstrap-carousel' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'slider-bootstrap-carousel' ),
		'menu_name'                  => _x( $singular, 'slider-bootstrap-carousel' ),
		'all_items'                  => sprintf(__( 'All %s', 'slider-bootstrap-carousel' ), $plural),
		'parent_item'                => sprintf(__( 'Parent %s', 'slider-bootstrap-carousel' ), $singular),
		'parent_item_colon'          => sprintf(__( 'Parent %s', 'slider-bootstrap-carousel' ), $singular),
		'new_item_name'              => sprintf(__( 'New %s', 'slider-bootstrap-carousel' ), $singular),
		'add_new_item'               => sprintf(__( 'Add new %s', 'slider-bootstrap-carousel' ), $singular),
		'edit_item'                  => sprintf(__( 'Edit %s', 'slider-bootstrap-carousel' ), $singular),
		'update_item'                => sprintf(__( 'Update %s', 'slider-bootstrap-carousel' ), $singular),
		'view_item'                  => sprintf(__( 'View %s', 'slider-bootstrap-carousel' ), $singular),
		'separate_items_with_commas' => sprintf(__( 'Separate %s with commas', 'slider-bootstrap-carousel' ), $plural),
		'add_or_remove_items'        => sprintf(__( 'Add or remove %s', 'slider-bootstrap-carousel' ), $singular),
		'choose_from_most_used'      => sprintf(__( 'Choose from the most used', 'slider-bootstrap-carousel' )),
		'popular_items'              => sprintf(__( 'Popular %s', 'slider-bootstrap-carousel' ), $plural),
		'search_items'               => sprintf(__( 'Search %s', 'slider-bootstrap-carousel' ), $singular),
		'not_found'                  => sprintf(__( 'Not Found', 'slider-bootstrap-carousel' )),
	);
	
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => false,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy_category', array( 'bootstrap_carousel' ), $args );
}
add_action( 'init', 'sbc_slider_bootstrap_carousel_category', 0 );