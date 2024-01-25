<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Treville
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function treville_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section(
		'treville_section_general',
		array(
			'title'    => esc_html__( 'General Settings', 'treville' ),
			'priority' => 10,
			'panel'    => 'treville_options_panel',
		)
	);

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting(
		'treville_theme_options[layout]',
		array(
			'default'           => 'right-sidebar',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[layout]',
		array(
			'label'    => esc_html__( 'Theme Layout', 'treville' ),
			'section'  => 'treville_section_general',
			'settings' => 'treville_theme_options[layout]',
			'type'     => 'radio',
			'priority' => 10,
			'choices'  => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'treville' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'treville' ),
			),
		)
	);
}
add_action( 'customize_register', 'treville_customize_register_general_settings' );
