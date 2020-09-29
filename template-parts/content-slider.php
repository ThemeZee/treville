<?php
/**
 * The template for displaying articles in the slideshow loop
 *
 * @package Treville
 */

?>

<li id="slide-<?php the_ID(); ?>" class="zeeslide clearfix">

	<?php treville_slider_image( 'treville-slider-image', array( 'class' => 'slide-image', 'loading' => false ) ); ?>

	<div class="slide-post">

		<div class="slide-container container">

			<div class="slide-content clearfix">

				<?php the_title( sprintf( '<h2 class="slide-title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

				<?php treville_slider_meta(); ?>

				<div class="entry-content clearfix">

					<?php the_excerpt(); ?>
					<?php treville_more_link(); ?>

				</div><!-- .entry-content -->

			</div>

		</div>

	</div>

</li>
