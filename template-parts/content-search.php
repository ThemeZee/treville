<?php
/**
 * The template for displaying articles in the search loop
 *
 * @package Treville
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</header><!-- .entry-header -->

	<div class="post-content">

		<div class="entry-content entry-excerpt clearfix">

			<?php the_excerpt(); ?>

		</div><!-- .entry-content -->

	</div>

</article>
