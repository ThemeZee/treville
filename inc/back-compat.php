<?php
/**
 * Treville back compat functionality
 *
 * Prevents Treville from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package Treville
 *
 * Original Code: Twenty Seventeen http://wordpress.org/themes/twentyseventeen
 * Original Copyright: the WordPress team and contributors.
 *
 * The following code is a derivative work of the code from the Twenty Seventeen theme,
 * which is licensed GPLv2 or later. This code therefore is also licensed under the terms
 * of the GNU Public License, version 2.
 */

/**
 * Prevent switching to Treville on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Treville 1.0
 */
function treville_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'treville_upgrade_notice' );
}
add_action( 'after_switch_theme', 'treville_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Treville on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function treville_upgrade_notice() {
	$message = sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'treville' ), 'Treville', '4.7', $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function treville_customize() {
	wp_die(
		sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'treville' ), 'Treville', '4.7', $GLOBALS['wp_version'] ),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'treville_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @global string $wp_version WordPress version.
 */
function treville_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( '%1$s requires at least WordPress version %2$s. You are running version %3$s. Please upgrade and try again.', 'treville' ), 'Treville', '4.7', $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'treville_preview' );
