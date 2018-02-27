<?php

/* Meta Box: Additional Information */

function bcfw_add_meta_info_slider_bootstrap_carousel()
{
	add_meta_box(
		'info_slider_bootstrap_carousel',
		'Additional Information',
		'bcfw_info_slider_bootstrap_carousel_view',
		'bootstrap_carousel',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'bcfw_add_meta_info_slider_bootstrap_carousel');

/* Meta Box styles */

function bcfw_info_slider_bootstrap_carousel_view( $post )
{ 
	$slider_bootstrap_carousel_meta_data = get_post_meta( $post->ID );

	if( isset($slider_bootstrap_carousel_meta_data['image_link_id'][0]) ){
		$imageValue = $slider_bootstrap_carousel_meta_data['image_link_id'][0];
	}

	if( isset($slider_bootstrap_carousel_meta_data['target_link_id'][0]) ){
		$targetValue = $slider_bootstrap_carousel_meta_data['target_link_id'][0];
	}

	?>
	<div>
		<label for="slider_bootstrap_carousel_link_input"><strong>Image link</strong></label>
		<input id="slider_bootstrap_carousel_link_input" type="text" name="image_link_id" style="width:100%;" value="<?= $imageValue; ?>">
	</div><br>
	<div>
		<label for="slider_bootstrap_carousel_link_input">
		<strong>Link target</strong></label><br>

		<label>
			<input type="radio" name="target_link_id" value="_blank" checked <?php checked( $targetValue, '_blank' ); ?>>
			_blank <small>(Load in a new window)</small>
		</label><br>

		<label>
			<input type="radio" name="target_link_id" value="_self" <?php checked( $targetValue, '_self' ); ?>>
			_self <small>(Load in the same frame as it was clicked)</small>
		</label><br>
	</div>
	<?php
}

/* Update Post Meta: Additional Information */

function bcfw_save_meta_info_slider_bootstrap_carousel( $post_id )
{
	if( isset($_POST['image_link_id']) ) {
		update_post_meta( $post_id, 'image_link_id', sanitize_text_field( $_POST['image_link_id'] ) );
	}
	if ( isset( $_POST['target_link_id'] ) ) {
		update_post_meta( $post_id, 'target_link_id', sanitize_text_field( $_POST['target_link_id'] ) ); 
	}
}
add_action('save_post', 'bcfw_save_meta_info_slider_bootstrap_carousel');
