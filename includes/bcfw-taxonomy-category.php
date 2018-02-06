<?php

/* Taxonomy Category */

function bcfw_bootstrap_carousel_category()
{
	$singular = 'Category';
	$plural = 'Categories';

	$labels = array(
		'name'                       => _x( $singular, 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( $singular, 'text_domain' ),
		'all_items'                  => __( 'All ' . $plural, 'text_domain' ),
		'parent_item'                => __( 'Parent ' . $singular, 'text_domain' ),
		'parent_item_colon'          => __( 'Parent ' . $singular, 'text_domain' ),
		'new_item_name'              => __( 'New ' . $singular, 'text_domain' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'text_domain' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'text_domain' ),
		'update_item'                => __( 'Update ' . $singular, 'text_domain' ),
		'view_item'                  => __( 'View ' . $singular, 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate ' . $plural . ' com vírgulas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove ' . $singular, 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular ' . $plural . '', 'text_domain' ),
		'search_items'               => __( 'Search ' . $singular, 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
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
	register_taxonomy( 'taxonomy_category', array( 'bootstap_carousel' ), $args );
}
add_action( 'init', 'bcfw_bootstrap_carousel_category', 0 );