<?php
/**
 * Post Settings
 *
 * Register Post Settings section, settings and controls for Theme Customizer
 *
 * @package Treville
 */

/**
 * Adds post settings in the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function treville_customize_register_post_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'treville_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'treville' ),
		'priority' => 30,
		'panel' => 'treville_options_panel',
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'treville_theme_options[excerpt_length]', array(
		'default'           => 20,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 1,
		)
	);

	// Add Post Meta Settings.
	$wp_customize->add_setting( 'treville_theme_options[post_meta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[post_meta_headline]', array(
		'label' => esc_html__( 'Post Meta', 'treville' ),
		'section' => 'treville_section_post',
		'settings' => 'treville_theme_options[post_meta_headline]',
		'priority' => 2,
		)
	) );

	$wp_customize->add_setting( 'treville_theme_options[meta_date]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 3,
		)
	);

	$wp_customize->add_setting( 'treville_theme_options[meta_author]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 4,
		)
	);

	// Add Single Post Meta Settings.
	$wp_customize->add_setting( 'treville_theme_options[single_post_meta_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[single_post_meta_headline]', array(
		'label' => esc_html__( 'Single Post Meta', 'treville' ),
		'section' => 'treville_section_post',
		'settings' => 'treville_theme_options[single_post_meta_headline]',
		'priority' => 5,
		)
	) );

	$wp_customize->add_setting( 'treville_theme_options[meta_category]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 6,
		)
	);

	$wp_customize->add_setting( 'treville_theme_options[meta_comments]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[meta_comments]', array(
		'label'    => esc_html__( 'Display post comments', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_comments]',
		'type'     => 'checkbox',
		'priority' => 7,
		)
	);

	$wp_customize->add_setting( 'treville_theme_options[meta_tags]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 8,
		)
	);

	// Add Single Post Settings.
	$wp_customize->add_setting( 'treville_theme_options[single_post_headline]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[single_post_headline]', array(
		'label' => esc_html__( 'Single Post Features', 'treville' ),
		'section' => 'treville_section_post',
		'settings' => 'treville_theme_options[single_post_headline]',
		'priority' => 9,
		)
	) );

	// Featured Image Setting.
	$wp_customize->add_setting( 'treville_theme_options[post_image_single]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display featured image on single posts', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 10,
		)
	);

	$wp_customize->add_setting( 'treville_theme_options[post_navigation]', array(
		'default'           => true,
		'type'           	=> 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'treville_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 11,
		)
	);

}
add_action( 'customize_register', 'treville_customize_register_post_settings' );
