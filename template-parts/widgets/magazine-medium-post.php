<?php
/**
 * The template for displaying medium posts in Magazine Post widgets
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'medium-post clearfix' ); ?>>

	<?php treville_post_image( 'treville-thumbnail-medium' ); ?>

	<div class="post-content clearfix">

		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		</header><!-- .entry-header -->

	</div>

</article>
