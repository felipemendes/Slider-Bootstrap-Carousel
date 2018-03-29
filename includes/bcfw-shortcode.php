<?php

/* Shortcode */

function bcfw_slider_bootstrap_carousel_function( $atts )
{
	extract( shortcode_atts( array( 'category' => '' ), $atts ) );

	$args = array(
		'post_type' => 'bootstrap_carousel',
		'orderby' 	=> 'date',
		'status' 	=> 'publish',
		'limit' 	=> -1
	);

	if( $category != '' )
	{
		$args['tax_query'] = array (
			array(
				'taxonomy' 	=> 'taxonomy_category',
				'field' 	=> 'slug',
				'terms' 	=> $category
			)
		);
	}

	$banners_query = new WP_Query( $args );

	$first = true;
	$count = 0;
	?>

	<div id="slider-bootstrap-carousel-<?=$category?>" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">
			<?php
			if ( $banners_query->have_posts() ) : while ( $banners_query->have_posts() ) : $banners_query->the_post();
				$bulletClass = "";
				if ( $count == 0 ) $bulletClass = "active";
				?>
					<li data-target="#slider-bootstrap-carousel-<?=$category?>" data-slide-to="<?=$count?>" class="<?=$bulletClass?>"></li>
				<?php
				$count++;
			endwhile; endif;
			wp_reset_query();
			?>
		</ol>
		
		<div class="carousel-inner">
			<?php
			if ( $banners_query->have_posts() ) : while ( $banners_query->have_posts() ) : $banners_query->the_post();
				
				$link 		= get_post_meta( get_the_ID(), 'image_link', true );
				$target 	= get_post_meta( get_the_ID(), 'target_link', true );
				$image_size = get_post_meta( get_the_ID(), 'image_size', true );

				$item_class = $first ? "item active" : "item";

				if ($first) $first = false;
				?>
					<div class="<?=$item_class?>">

						<?php if ( !empty ($link ) ) : ?>
							<a href="<?=$link;?>" target="<?=$target;?>">
								<?php the_post_thumbnail('full', array('class' => 'img-fluid ' . $image_size)); ?>
							</a>
						<?php else: ?>
							<?php the_post_thumbnail('full', array('class' => 'img-fluid ' . $image_size)); ?>
						<?php endif; ?>

						<?php if ( has_excerpt() ) : ?>
							<div class="carousel-caption d-none d-md-block">
								<h5><?=the_title();?></h5>
								<p><?=the_excerpt();?></p>
							</div>
						<?php endif; ?>

					</div><!-- carousel-item -->
				<?php
			endwhile; endif;
			wp_reset_postdata();
			?>
		</div><!-- carousel-inner -->
		
		<a class="left carousel-control" href="#slider-bootstrap-carousel-<?=$category?>" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#slider-bootstrap-carousel-<?=$category?>" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div><!-- #slider-bootstrap-carousel-<?=$category?> -->
	
<?php
}
add_shortcode('slider_bootstrap_carousel', 'bcfw_slider_bootstrap_carousel_function');
