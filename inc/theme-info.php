<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package Treville
 */

/**
 * Add Theme Info page to admin menu
 */
function treville_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'treville' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'treville' ),
		'edit_theme_options',
		'treville',
		'treville_theme_info_page'
	);

}
add_action( 'admin_menu', 'treville_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function treville_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

	<div class="wrap theme-info-wrap">

		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'treville' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ); ?></h1>

		<div class="theme-description"><?php echo $theme->display( 'Description' ); ?></div>

		<hr>
		<div class="important-links clearfix">
			<p><strong><?php esc_html_e( 'Theme Links', 'treville' ); ?>:</strong>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/treville/', 'treville' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=treville&utm_content=theme-page' ); ?>" target="_blank"><?php esc_html_e( 'Theme Page', 'treville' ); ?></a>
				<a href="http://preview.themezee.com/?demo=treville&utm_source=theme-info&utm_campaign=treville" target="_blank"><?php esc_html_e( 'Theme Demo', 'treville' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/treville-documentation/', 'treville' ) . '?utm_source=theme-info&utm_medium=textlink&utm_campaign=treville&utm_content=documentation' ); ?>" target="_blank"><?php esc_html_e( 'Theme Documentation', 'treville' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/treville/reviews/?filter=5', 'treville' ) ); ?>" target="_blank"><?php esc_html_e( 'Rate this theme', 'treville' ); ?></a>
			</p>
		</div>
		<hr>

		<div id="getting-started">

			<h3><?php printf( esc_html__( 'Getting Started with %s', 'treville' ), $theme->display( 'Name' ) ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Theme Documentation', 'treville' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'treville' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/docs/treville-documentation/', 'treville' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=treville&utm_content=documentation' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'treville' ), 'Treville' ); ?>
							</a>
						</p>
					</div>

					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'treville' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'treville' ), $theme->display( 'Name' ) ); ?>
						</p>
						<p>
							<a href="<?php echo wp_customize_url(); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'treville' ); ?></a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.jpg" />

				</div>

			</div>

		</div>

		<hr>

		<div id="more-features">

			<h3><?php esc_html_e( 'Get more features', 'treville' ); ?></h3>

			<div class="columns-wrapper clearfix">

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Pro Version Add-on', 'treville' ); ?></h4>

						<p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on and get additional features and advanced customization options.', 'treville' ), 'Treville' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( __( 'https://themezee.com/addons/treville-pro/', 'treville' ) . '?utm_source=theme-info&utm_medium=button&utm_campaign=treville&utm_content=pro-version' ); ?>" target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'treville' ), 'Treville' ); ?>
							</a>
						</p>
					</div>

				</div>

				<div class="column column-half clearfix">

					<div class="section">
						<h4><?php esc_html_e( 'Recommended Plugins', 'treville' ); ?></h4>

						<p class="about">
							<?php esc_html_e( 'Extend the functionality of your WordPress website with our free and easy to use plugins.', 'treville' ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=search&type=author&s=themezee' ) ); ?>" class="button button-secondary">
								<?php esc_html_e( 'Install Plugins', 'treville' ); ?>
							</a>
						</p>
					</div>

				</div>

			</div>

		</div>

		<hr>

		<div id="theme-author">

			<p>
				<?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'treville' ),
					$theme->display( 'Name' ),
					'<a target="_blank" href="' . __( 'https://themezee.com/', 'treville' ) . '?utm_source=theme-info&utm_medium=footer&utm_campaign=treville" title="ThemeZee">ThemeZee</a>',
					'<a target="_blank" href="' . __( 'https://wordpress.org/support/theme/treville/reviews/?filter=5', 'treville' ) . '" title="' . esc_attr__( 'Review Treville', 'treville' ) . '">' . esc_html__( 'rate it', 'treville' ) . '</a>'
				); ?>
			</p>

		</div>

	</div>

	<?php
}

/**
 * Enqueues CSS for Theme Info page
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function treville_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_treville' != $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'treville-theme-info-css', get_template_directory_uri() . '/css/theme-info.css' );

}
add_action( 'admin_enqueue_scripts', 'treville_theme_info_page_css' );
