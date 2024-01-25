<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Treville
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function treville_gutenberg_support() {

	// Add theme support for dimension controls.
	add_theme_support( 'custom-spacing' );

	// Add theme support for custom line heights.
	add_theme_support( 'custom-line-height' );

	// Define block color palette.
	$color_palette = apply_filters(
		'treville_color_palette',
		array(
			'primary_color'    => '#1177aa',
			'secondary_color'  => '#005e91',
			'tertiary_color'   => '#004477',
			'accent_color'     => '#11aa44',
			'highlight_color'  => '#aa1d11',
			'light_gray_color' => '#e5e5e5',
			'gray_color'       => '#999999',
			'dark_gray_color'  => '#454545',
		)
	);

	// Add theme support for block color palette.
	add_theme_support(
		'editor-color-palette',
		apply_filters(
			'treville_editor_color_palette_args',
			array(
				array(
					'name'  => esc_html_x( 'Primary', 'block color', 'treville' ),
					'slug'  => 'primary',
					'color' => esc_html( $color_palette['primary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Secondary', 'block color', 'treville' ),
					'slug'  => 'secondary',
					'color' => esc_html( $color_palette['secondary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Tertiary', 'block color', 'treville' ),
					'slug'  => 'tertiary',
					'color' => esc_html( $color_palette['tertiary_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Accent', 'block color', 'treville' ),
					'slug'  => 'accent',
					'color' => esc_html( $color_palette['accent_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Highlight', 'block color', 'treville' ),
					'slug'  => 'highlight',
					'color' => esc_html( $color_palette['highlight_color'] ),
				),
				array(
					'name'  => esc_html_x( 'White', 'block color', 'treville' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => esc_html_x( 'Light Gray', 'block color', 'treville' ),
					'slug'  => 'light-gray',
					'color' => esc_html( $color_palette['light_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Gray', 'block color', 'treville' ),
					'slug'  => 'gray',
					'color' => esc_html( $color_palette['gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Dark Gray', 'block color', 'treville' ),
					'slug'  => 'dark-gray',
					'color' => esc_html( $color_palette['dark_gray_color'] ),
				),
				array(
					'name'  => esc_html_x( 'Black', 'block color', 'treville' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
			)
		)
	);

	// Check if block style functions are available.
	if ( function_exists( 'register_block_style' ) ) {

		// Register Widget Title Block style.
		register_block_style(
			'core/heading',
			array(
				'name'         => 'widget-title',
				'label'        => esc_html__( 'Widget Title', 'treville' ),
				'style_handle' => 'treville-stylesheet',
			)
		);
	}
}
add_action( 'after_setup_theme', 'treville_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function treville_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'treville-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20210306', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'treville_block_editor_assets' );
