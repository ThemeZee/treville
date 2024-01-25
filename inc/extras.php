<?php
/**
 * Custom functions that are not template related
 *
 * @package Treville
 */


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function treville_body_classes( $classes ) {

	// Get theme options from database.
	$theme_options = treville_theme_options();

	// Switch sidebar layout to left.
	if ( 'left-sidebar' == $theme_options['layout'] ) {
		$classes[] = 'sidebar-left';
	}

	// Add Post Columns classes.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Hide Date?
	if ( false === $theme_options['meta_date'] ) {
		$classes[] = 'date-hidden';
	}

	// Hide Author?
	if ( false === $theme_options['meta_author'] ) {
		$classes[] = 'author-hidden';
	}

	// Hide Comments?
	if ( false === $theme_options['meta_comments'] ) {
		$classes[] = 'comments-hidden';
	}

	// Check for AMP pages.
	if ( treville_is_amp() ) {
		$classes[] = 'is-amp-page';
	}

	return $classes;
}
add_filter( 'body_class', 'treville_body_classes' );


/**
 * Hide Elements with CSS.
 *
 * @return void
 */
function treville_hide_elements() {

	// Get theme options from database.
	$theme_options = treville_theme_options();

	$elements = array();

	// Hide Site Title?
	if ( false === $theme_options['site_title'] ) {
		$elements[] = '.site-title';
	}

	// Hide Site Description?
	if ( false === $theme_options['site_description'] ) {
		$elements[] = '.site-description';
	}

	// Hide Categories?
	if ( false === $theme_options['meta_category'] ) {
		$elements[] = '.type-post .entry-footer .entry-categories';
	}

	// Hide Post Tags?
	if ( false === $theme_options['meta_tags'] ) {
		$elements[] = '.type-post .entry-footer .entry-tags';
	}

	// Hide Post Navigation?
	if ( false === $theme_options['post_navigation'] ) {
		$elements[] = '.type-post .post-navigation';
	}

	// Allow plugins to add own elements.
	$elements = apply_filters( 'treville_hide_elements', $elements );

	// Return early if no elements are hidden.
	if ( empty( $elements ) ) {
		return;
	}

	// Create CSS.
	$classes    = implode( ', ', $elements );
	$custom_css = $classes . ' { position: absolute; clip: rect(1px, 1px, 1px, 1px); width: 1px; height: 1px; overflow: hidden; }';

	// Add Custom CSS.
	wp_add_inline_style( 'treville-stylesheet', $custom_css );
}
add_filter( 'wp_enqueue_scripts', 'treville_hide_elements', 11 );


/**
 * Add custom CSS to scale down logo image for retina displays.
 *
 * @return void
 */
function treville_retina_logo() {
	// Return early if there is no logo image or option for retina logo is disabled.
	if ( ! has_custom_logo() or false === treville_get_option( 'retina_logo' ) ) {
		return;
	}

	// Get Logo Image.
	$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	// Create CSS.
	$css = '.site-branding .custom-logo { width: ' . absint( floor( $logo[1] / 2 ) ) . 'px; }';

	// Add Custom CSS.
	wp_add_inline_style( 'treville-stylesheet', $css );
}
add_filter( 'wp_enqueue_scripts', 'treville_retina_logo', 11 );


/**
 * Change excerpt length for default posts
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function treville_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	// Get theme options from database.
	$theme_options = treville_theme_options();

	// Return excerpt text.
	if ( isset( $theme_options['excerpt_length'] ) and $theme_options['excerpt_length'] >= 0 ) :
		return absint( $theme_options['excerpt_length'] );
	else :
		return 50; // Number of words.
	endif;
}
add_filter( 'excerpt_length', 'treville_excerpt_length' );


/**
 * Change excerpt more text for posts
 *
 * @param String $more_text Excerpt More Text.
 * @return string
 */
function treville_excerpt_more( $more_text ) {

	if ( is_admin() ) {
		return $more_text;
	}

	return '';
}
add_filter( 'excerpt_more', 'treville_excerpt_more' );
