<?php

/* Meta Box: Additional Information */

function sbc_add_meta_info_slider_bootstrap_carousel()
{
	add_meta_box(
		'info_slider_bootstrap_carousel',
		__('Additional Information', 'slider-bootstrap-carousel'),
		'sbc_info_slider_bootstrap_carousel_view',
		'bootstrap_carousel',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'sbc_add_meta_info_slider_bootstrap_carousel');

/* Meta Box styles */

function sbc_info_slider_bootstrap_carousel_view( $post )
{ 
	$slider_bootstrap_carousel_meta_data = get_post_meta( $post->ID );

	if( isset($slider_bootstrap_carousel_meta_data['image_link'][0]) ){
		$imageValue = $slider_bootstrap_carousel_meta_data['image_link'][0];
	}

	if( isset($slider_bootstrap_carousel_meta_data['target_link'][0]) ){
		$targetValue = $slider_bootstrap_carousel_meta_data['target_link'][0];
	}

	if( isset($slider_bootstrap_carousel_meta_data['image_size'][0]) ){
		$sizeValue = $slider_bootstrap_carousel_meta_data['image_size'][0];
	}

	?>
	<div>
		<label for="slider_bootstrap_carousel_link_input"><strong><?php _e('Image link', 'slider-bootstrap-carousel') ?></strong></label>
		<input id="slider_bootstrap_carousel_link_input" type="text" name="image_link" style="width:100%;" value="<?= $imageValue; ?>">
	</div><br>
	
	<div>
		<label for="slider_bootstrap_carousel_target_link">
		<strong><?php _e('Link target', 'slider-bootstrap-carousel') ?></strong></label><br>

		<label>
			<input type="radio" name="target_link" value="_self" checked <?php checked( $targetValue, '_self' ); ?>>
			_self <small>(<?php _e('Load in the same frame as it was clicked', 'slider-bootstrap-carousel') ?>)</small>
		</label><br>

		<label>
			<input type="radio" name="target_link" value="_blank" <?php checked( $targetValue, '_blank' ); ?>>
			_blank <small>(<?php _e('Load in a new window', 'slider-bootstrap-carousel') ?>)</small>
		</label><br>
	</div><br>

	<div>
		<label for="slider_bootstrap_carousel_image_size">
		<strong><?php _e('Image size', 'slider-bootstrap-carousel') ?></strong></label><br>

		<label>
			<input type="radio" name="image_size" value="d-block" checked <?php checked( $sizeValue, 'd-block' ); ?>>
			<?php _e('Normal', 'slider-bootstrap-carousel') ?>
		</label><br>

		<label>
			<input type="radio" name="image_size" value="d-block w-100" <?php checked( $sizeValue, 'd-block w-100' ); ?>>
			<?php _e('Fullscreen', 'slider-bootstrap-carousel') ?>
		</label><br>
	</div>

	<?php
}

/* Update Post Meta: Additional Information */

function sbc_save_meta_info_slider_bootstrap_carousel( $post_id )
{
	if( isset($_POST['image_link']) ) {
		update_post_meta( $post_id, 'image_link', sanitize_text_field( $_POST['image_link'] ) );
	}
	if ( isset( $_POST['target_link'] ) ) {
		update_post_meta( $post_id, 'target_link', sanitize_text_field( $_POST['target_link'] ) ); 
	}
	if ( isset( $_POST['image_size'] ) ) {
		update_post_meta( $post_id, 'image_size', sanitize_text_field( $_POST['image_size'] ) ); 
	}
}
add_action('save_post', 'sbc_save_meta_info_slider_bootstrap_carousel');

/* Meta Box: Additional Information */

function sbc_add_meta_shortcode_slider_bootstrap_carousel()
{
	add_meta_box(
		'shortcode_slider_bootstrap_carousel',
		'Shortcodes',
		'sbc_shortcode_slider_bootstrap_carousel_view',
		'bootstrap_carousel',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'sbc_add_meta_shortcode_slider_bootstrap_carousel');

/* Meta Box styles */

function sbc_shortcode_slider_bootstrap_carousel_view()
{ 
	?>
	<div>
		<p for="slider_bootstrap_carousel_link_input">
			<span>[slider_bootstrap_carousel]</span><br/>
			<span>[slider_bootstrap_carousel category='your_category_slug']</span>
		</p>
		<p for="slider_bootstrap_carousel_link_input">
			<?php _e('Displaying on code', 'slider-bootstrap-carousel') ?>
			<span>do_shortcode("[slider_bootstrap_carousel]")</span>
		</p>
	</div>
	<?php
}