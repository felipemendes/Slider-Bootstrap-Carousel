<?php

/* Bootstrap imports */

function bcfw_add_plugin_scripts() 
{
	wp_register_script( 'bcfw_bootstrap_js', plugins_url('assets/bootstrap.min.js', __FILE__ ), array('jquery'), '4.0.0');
	wp_register_style( 'bcfw_bootstrap_css', plugins_url('assets/bootstrap.min.css', __FILE__ ), array(), '4.0.0' );

	wp_enqueue_script( 'bcfw_bootstrap_js');
	wp_enqueue_style( 'bcfw_bootstrap_css' );
}
add_action( 'wp_enqueue_scripts', 'bcfw_add_plugin_scripts' );