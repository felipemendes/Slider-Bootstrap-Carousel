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
 * @since             1.0.2
 * @package           slider-bootstrap-carousel
 *
 * @wordpress-plugin
 * Plugin Name:       Slider Bootstrap Carousel
 * Description:       Slider Bootstrap 4 Carousel
 * Version: 		  1.0.3
 * Author:            Felipe Mendes
 * Author URI:        https://github.com/felipemendes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       slider-bootstrap-carousel
 */
require_once('includes/lib/multi-post-thumbnails/multi-post-thumbnails.php');
add_action('init', 'bcfw_slider_bootstrap_carouse_for_wordpress_init');
function bcfw_slider_bootstrap_carouse_for_wordpress_init()
{
	$singular 	= 'Banner';
	$plural 	= 'Banners';

	$labels = array(
			'name'               	=> _x( $singular, 'post type general name', '' ),
			'singular_name'      	=> _x( $singular, 'post type singular name', '' ),
			'add_new'            	=> _x( 'Add New', 'print', '' ),
			'add_new_item'       	=> __( 'Add New ' . $singular, '' ),
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
			'supports'           	=> array( 'title', 'thumbnail', 'excerpt' )
	); 
	register_post_type('bootstrap_carousel', $args);
	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(array(
		'label' => 'Imagem Mobile',
		'id' => 'secondary-image',
		'post_type' => 'bootstrap_carousel'
		) );
	}
}

/* Thumbnails support */

add_theme_support('post-thumbnails');

/* Meta Box */

include 'includes/bcfw-meta-box.php';

/* Taxonomy Category */

include 'includes/bcfw-taxonomy-category.php';

/* Bootstrap imports */

include 'includes/bcfw-plugin-scripts.php';

/* Shortcode */

include 'includes/bcfw-shortcode.php';