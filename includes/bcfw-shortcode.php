<?php

/* Shortcode */

function bcfw_bootstrap_carousel_function( $atts )
{
	extract( shortcode_atts( array( 'category' => '' ), $atts ) );

	$args = array(
		'post_type' => 'bootstap_carousel',
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

	<div id="bootstrap-carousel" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">
			<?php
			if ( $banners_query->have_posts() ) : while ( $banners_query->have_posts() ) : $banners_query->the_post();
				$bulletClass = "";
				if ( $count == 0 ) $bulletClass = "active";
				?>
					<li data-target="#bootstrap-carousel" data-slide-to="<?=$count?>" class="<?=$bulletClass?>"></li>
				<?php
				$count++;
			endwhile; endif;
			wp_reset_query();
			?>
		</ol>
		
		<div class="carousel-inner">
			<?php
			if ( $banners_query->have_posts() ) : while ( $banners_query->have_posts() ) : $banners_query->the_post();
				$link = get_post_meta( get_the_ID(), 'link_id', true );
				$item_class = $first ? "item active" : "item";
				if ($first) $first = false;
				?>
					<div class="carousel-<?=$item_class?>">
						<?php if ( !empty ($link ) ) : ?>
							<a href="<?=$link;?>">
								<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
							</a>
						<?php else: ?>
							<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
						<?php endif; ?>
					</div>	
				<?php
				$i++;
			endwhile; endif;
			wp_reset_postdata();
			?>
		</div><!-- carousel-inner -->
		
		<a class="carousel-control-prev" href="#bootstrap-carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#bootstrap-carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div><!-- #bootstrap-carousel -->
	
<?php
}
add_shortcode('bootstrap_carousel', 'bcfw_bootstrap_carousel_function');