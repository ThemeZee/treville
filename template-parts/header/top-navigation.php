<?php
/**
 * Top Navigation
 *
 * @version 1.1
 * @package Treville
 */
?>

<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) || has_nav_menu( 'social' ) ) : ?>

	<button class="mobile-menu-toggle menu-toggle" aria-controls="primary-menu secondary-menu" aria-expanded="false" <?php treville_amp_menu_toggle(); ?>>
		<?php
		echo treville_get_svg( 'menu' );
		echo treville_get_svg( 'close' );
		?>
		<span class="menu-toggle-text screen-reader-text"><?php esc_html_e( 'Menu', 'treville' ); ?></span>
	</button>

<?php endif; ?>

<?php if ( has_nav_menu( 'secondary' ) || has_nav_menu( 'social' ) ) : ?>

	<div class="secondary-navigation" <?php treville_amp_secondary_menu_is_toggled(); ?>>

		<?php if ( has_nav_menu( 'secondary' ) ) : ?>

			<nav id="header-navigation" class="top-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Secondary Menu', 'treville' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary',
						'menu_id'        => 'secondary-menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		<?php endif; ?>

		<?php do_action( 'treville_header_area' ); ?>

	</div><!-- .secondary-navigation -->

<?php endif; ?>
