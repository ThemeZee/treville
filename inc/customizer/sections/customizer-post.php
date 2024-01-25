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

	// Add Section for Post Settings.
	$wp_customize->add_section(
		'treville_section_post',
		array(
			'title'    => esc_html__( 'Post Settings', 'treville' ),
			'priority' => 30,
			'panel'    => 'treville_options_panel',
		)
	);

	// Add Post Details Headline.
	$wp_customize->add_control(
		new Treville_Customize_Header_Control(
			$wp_customize,
			'treville_theme_options[post_meta_headline]',
			array(
				'label'    => esc_html__( 'Post Details', 'treville' ),
				'section'  => 'treville_section_post',
				'settings' => array(),
				'priority' => 10,
			)
		)
	);

	// Add Meta Date setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[meta_date]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[meta_date]',
		array(
			'label'    => esc_html__( 'Display date', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[meta_date]',
			'type'     => 'checkbox',
			'priority' => 20,
		)
	);

	// Add Meta Author setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[meta_author]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[meta_author]',
		array(
			'label'    => esc_html__( 'Display author', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[meta_author]',
			'type'     => 'checkbox',
			'priority' => 30,
		)
	);

	// Add Meta Comments setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[meta_comments]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[meta_comments]',
		array(
			'label'    => esc_html__( 'Display comments', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[meta_comments]',
			'type'     => 'checkbox',
			'priority' => 40,
		)
	);

	// Add Single Posts Headline.
	$wp_customize->add_control(
		new Treville_Customize_Header_Control(
			$wp_customize,
			'treville_theme_options[single_post_headline]',
			array(
				'label'    => esc_html__( 'Single Posts', 'treville' ),
				'section'  => 'treville_section_post',
				'settings' => array(),
				'priority' => 50,
			)
		)
	);

	// Add Meta Category setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[meta_category]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[meta_category]',
		array(
			'label'    => esc_html__( 'Display categories', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[meta_category]',
			'type'     => 'checkbox',
			'priority' => 60,
		)
	);

	// Add Meta Tags setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[meta_tags]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[meta_tags]',
		array(
			'label'    => esc_html__( 'Display tags', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[meta_tags]',
			'type'     => 'checkbox',
			'priority' => 70,
		)
	);

	// Add Post Navigation setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[post_navigation]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[post_navigation]',
		array(
			'label'    => esc_html__( 'Display previous/next post navigation', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[post_navigation]',
			'type'     => 'checkbox',
			'priority' => 80,
		)
	);

	// Add Featured Images Headline.
	$wp_customize->add_control(
		new Treville_Customize_Header_Control(
			$wp_customize,
			'treville_theme_options[featured_images]',
			array(
				'label'    => esc_html__( 'Featured Images', 'treville' ),
				'section'  => 'treville_section_post',
				'settings' => array(),
				'priority' => 90,
			)
		)
	);

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting(
		'treville_theme_options[post_image_archives]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[post_image_archives]',
		array(
			'label'    => esc_html__( 'Display images on blog and archives', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[post_image_archives]',
			'type'     => 'checkbox',
			'priority' => 100,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'treville_theme_options[post_image_archives]',
		array(
			'selector'         => '.site-main .post-wrapper',
			'render_callback'  => 'treville_customize_partial_blog_layout',
			'fallback_refresh' => false,
		)
	);

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting(
		'treville_theme_options[post_image_single]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[post_image_single]',
		array(
			'label'    => esc_html__( 'Display image on single posts', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => 'treville_theme_options[post_image_single]',
			'type'     => 'checkbox',
			'priority' => 110,
		)
	);
}
add_action( 'customize_register', 'treville_customize_register_post_settings' );
