<?php

/* Meta Box: Additional Information */

function add_meta_info_bootstap_carousel()
{
	add_meta_box(
		'info_bootstap_carousel',
		'Additional Information',
		'info_bootstap_carousel_view',
		'bootstap_carousel',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_meta_info_bootstap_carousel');

/* Meta Box styles */

function info_bootstap_carousel_view( $post )
{ 
	$bootstap_carousel_meta_data = get_post_meta( $post->ID );
	?>
	<div>
		<label for="bootstap_carousel_link_input">Image links:</label>
		<input id="bootstap_carousel_link_input" type="text" name="link_id" value="<?= $bootstap_carousel_meta_data['link_id'][0]; ?>">
	</div>
	<?php
}

/* Update Post Meta: Additional Information */

function save_meta_info_bootstap_carousel( $post_id )
{
	if( isset($_POST['link_id']) ) {
		update_post_meta( $post_id, 'link_id', sanitize_text_field( $_POST['link_id'] ) );
	}
}
add_action('save_post', 'save_meta_info_bootstap_carousel');