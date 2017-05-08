<?php
/**
* The template for displaying full image posts in Magazine Post widgets
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php treville_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php treville_post_image(); ?>

	<div class="post-content clearfix">

		<div class="entry-content entry-excerpt clearfix">

			<?php the_excerpt(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
