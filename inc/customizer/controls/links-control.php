<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Treville
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Treville_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'treville' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/treville/', 'treville' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=treville&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'treville' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=treville&utm_source=customizer&utm_campaign=treville" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'treville' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/treville-documentation/', 'treville' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=treville&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'treville' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=treville/', 'treville' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'treville' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/treville/reviews/', 'treville' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'treville' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
