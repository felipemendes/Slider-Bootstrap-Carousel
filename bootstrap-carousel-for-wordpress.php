<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/felipemendes
 * @since             1.0.0
 * @package           bootstrap-carousel-for-wordpress
 *
 * @wordpress-plugin
 * Plugin Name:       Bootstrap Carousel for WordPress
 * Description:       Bootstrap 4 Carousel for WordPress 
 * Version: 		  1.0.0
 * Author:            Felipe Mendes
 * Author URI:        https://github.com/felipemendes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bootstrap-carousel-for-wordpress
 * Domain Path:       /languages
 */

add_action('init', 'bootstrap_carouse_for_wordpress_init');
function bootstrap_carouse_for_wordpress_init()
{
	$singular 	= 'Carousel';
	$plural 	= 'Carousels';

	$labels = array(
			'name'               	=> _x( $singular, 'post type general name', '' ),
			'singular_name'      	=> _x( $singular, 'post type singular name', '' ),
			'add_new'            	=> _x( 'Add', 'print', '' ),
			'add_new_item'       	=> __( 'Add ' . $singular, '' ),
			'edit_item'          	=> __( 'Edit ' . $singular, '' ),
			'new_item'           	=> __( 'Add ' . $singular, '' ),
			'all_items'          	=> __( 'All ' . $plural, '' ),
			'view_item'          	=> __( 'View ' . $singular, '' ),
			'search_items'       	=> __( 'Search ' . $plural, '' ),
			'not_found'          	=> __( 'No ' . $singular . ' found', '' ),
			'not_found_in_trash' 	=> __( 'No ' . $singular . ' found in Trash', '' ), 
			'parent_item_colon'  	=> '',
			'menu_name'          	=> __( $plural, '' )
	);
	
	$args = array(
			'labels'              	=> $labels,
			'public'              	=> false,
			'publicly_queryable'  	=> true,
			'show_ui'             	=> true, 
			'show_in_menu'        	=> true, 
			'query_var'           	=> true,
			'capability_type'     	=> 'post',
			'has_archive'         	=> true, 
			'hierarchical'       	=> false,
			'menu_position'       	=> null,
			'exclude_from_search' 	=> true,
			'publicly_queryable'  	=> true,
			'menu_icon' 			=> 'dashicons-format-gallery',
			'supports'           	=> array( 'title', 'thumbnail' )
	); 
	register_post_type('bootstap_carousel', $args);
}

/* Thumbnails support */

add_theme_support('post-thumbnails');

/* Meta Box */

include 'includes/meta-box.php';

/* Taxonomy Category */

include 'includes/taxonomy-category.php';

/* Bootstrap n jQuery imports */

include 'includes/plugin-scripts.php';