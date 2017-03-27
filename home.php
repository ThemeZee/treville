<?php
/**
 * The template for displaying the blog index (latest posts)
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Treville
 */

get_header(); ?>

	<section id="primary" class="content-archive content-area">
		<main id="main" class="site-main" role="main">

			<?php
			// Display Magazine Homepage Widgets.
			if ( ! is_paged() && is_active_sidebar( 'magazine-homepage' ) ) : ?>

				<div id="magazine-homepage-widgets" class="widget-area clearfix">

					<?php dynamic_sidebar( 'magazine-homepage' ); ?>

				</div><!-- #magazine-homepage-widgets -->

				<?php
			endif;

			treville_blog_title();

			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile;

				treville_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
