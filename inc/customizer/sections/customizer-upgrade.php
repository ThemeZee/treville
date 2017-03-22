<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Treville
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function treville_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'treville_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'treville' ),
		'priority' => 70,
		'panel' => 'treville_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'treville_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Treville_Customize_Upgrade_Control(
		$wp_customize, 'treville_theme_options[upgrade]', array(
		'section' => 'treville_section_upgrade',
		'settings' => 'treville_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'treville_customize_register_upgrade_settings' );
