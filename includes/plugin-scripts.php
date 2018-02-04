<?php

/* Bootstrap n jQuery imports */

function add_plugin_scripts() 
{
	?>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<?php
}
add_action( 'wp_enqueue_scripts', 'add_plugin_scripts' );