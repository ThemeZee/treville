<?php
/**
 * Blog Settings
 *
 * Register Blog Settings section, settings and controls for Theme Customizer
 *
 * @package Treville
 */

/**
 * Adds blog settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function treville_customize_register_blog_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'treville_section_blog', array(
		'title'    => esc_html__( 'Blog Settings', 'treville' ),
		'priority' => 25,
		'panel' => 'treville_options_panel',
	) );

	// Add Blog Title setting and control.
	$wp_customize->add_setting( 'treville_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'treville_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'treville' ),
		'section'  => 'treville_section_blog',
		'settings' => 'treville_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 10,
	) );

	// Add Blog Description setting and control.
	$wp_customize->add_setting( 'treville_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'treville_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'treville' ),
		'section'  => 'treville_section_blog',
		'settings' => 'treville_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 20,
	) );
}
add_action( 'customize_register', 'treville_customize_register_blog_settings' );
