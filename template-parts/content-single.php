<?php
/**
 * The template for displaying single posts
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php treville_entry_meta(); ?>

	</header><!-- .entry-header -->

	<?php treville_post_image_single(); ?>

	<div class="post-content">

		<div class="entry-content clearfix">

			<?php the_content(); ?>

			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'treville' ),
				'after'  => '</div>',
			) ); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php treville_entry_categories(); ?>
			<?php treville_entry_tags(); ?>

		</footer><!-- .entry-footer -->

	</div>

	<?php do_action( 'treville_author_bio' ); ?>

	<?php treville_post_navigation(); ?>

</article>
