<?php

/* Bootstrap imports */

function sbc_add_plugin_scripts() 
{
	wp_register_script( 'sbc_bootstrap_js', plugins_url('assets/bootstrap.min.js', __FILE__ ), array('jquery'), '4.0.0');
	wp_register_style( 'sbc_bootstrap_css', plugins_url('assets/bootstrap.min.css', __FILE__ ), array(), '4.0.0' );

	wp_enqueue_script( 'sbc_bootstrap_js');
	wp_enqueue_style( 'sbc_bootstrap_css' );
}
add_action( 'wp_enqueue_scripts', 'sbc_add_plugin_scripts' );