<?php
/**
 * The template for displaying large posts in Magazine Post widgets
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'large-post clearfix' ); ?>>

	<?php treville_post_image( 'treville-thumbnail-large' ); ?>

	<div class="post-content clearfix">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php treville_magazine_entry_meta(); ?>

		</header><!-- .entry-header -->

	</div>

</article>
