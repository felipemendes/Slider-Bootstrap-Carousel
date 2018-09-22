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
 * Version: 		  1.0.5
 * Author:            Felipe Mendes
 * Author URI:        https://github.com/felipemendes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       slider-bootstrap-carousel
 */

add_action('init', 'sbc_slider_bootstrap_carouse_for_wordpress_init');
function sbc_slider_bootstrap_carouse_for_wordpress_init()
{
	$singular 	= 'Carousel';
	$plural 	= 'Carousels';

	$labels = array(
			'name'               	=> _x( $singular, 'slider-bootstrap-carousel' ),
			'singular_name'      	=> _x( $singular, 'slider-bootstrap-carousel' ),
			'add_new'            	=> _x( 'Add New', 'print', 'slider-bootstrap-carousel' ),
			'add_new_item'       	=> sprintf(__( 'Add New %s', 'slider-bootstrap-carousel' ), $singular),
			'edit_item'          	=> sprintf(__( 'Edit %s', 'slider-bootstrap-carousel' ), $singular),
			'new_item'           	=> sprintf(__( 'Add %s', 'slider-bootstrap-carousel' ), $singular),
			'all_items'          	=> sprintf(__( 'All %s', 'slider-bootstrap-carousel' ), $plural),
			'view_item'          	=> sprintf(__( 'View %s', 'slider-bootstrap-carousel' ), $singular),
			'search_items'       	=> sprintf(__( 'Search %s', 'slider-bootstrap-carousel' ), $plural),
			'not_found'          	=> sprintf(__( 'No %s found', 'slider-bootstrap-carousel' ), $singular),
			'not_found_in_trash' 	=> sprintf(__( 'No %s found in Trash', 'slider-bootstrap-carousel' , $singular)),
			'menu_name'          	=> sprintf(__( $plural, 'slider-bootstrap-carousel' ), $singular)
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
}

/* Thumbnails support */

add_theme_support('post-thumbnails');

/* Meta Box */

include 'includes/sbc-meta-box.php';

/* Taxonomy Category */

include 'includes/sbc-taxonomy-category.php';

/* Bootstrap imports */

include 'includes/sbc-plugin-scripts.php';

/* Shortcode */

include 'includes/sbc-shortcode.php';

add_action('plugins_loaded', 'wip_load_textdomain');
function wip_load_textdomain() {
	load_plugin_textdomain( 'slider-bootstrap-carousel', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
}