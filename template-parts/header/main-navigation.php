<?php
/**
 * Main Navigation
 *
 * @version 1.0
 * @package Treville
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div class="primary-navigation-wrap">

		<div class="primary-navigation container">

			<?php do_action( 'treville_header_search' ); ?>

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'treville' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .primary-navigation -->

	</div>

<?php endif; ?>

<?php do_action( 'treville_after_navigation' ); ?>
