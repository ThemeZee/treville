<?php
/**
 * The template for displaying articles in the loop with post excerpts
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

	<div class="post-content">

		<div class="entry-content entry-excerpt clearfix">

			<?php the_excerpt(); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php treville_entry_categories(); ?>

		</footer><!-- .entry-footer -->

	</div>

</article>
