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
	$wp_customize->add_section( 'treville_section_post', array(
		'title'    => esc_html__( 'Post Settings', 'treville' ),
		'priority' => 30,
		'panel'    => 'treville_options_panel',
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'treville_theme_options[excerpt_length]', array(
		'default'           => 50,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'treville_theme_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 10,
	) );

	// Add Post Details Headline.
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[post_meta_headline]', array(
			'label'    => esc_html__( 'Post Meta', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => array(),
			'priority' => 20,
		)
	) );

	// Add Meta Date setting and control.
	$wp_customize->add_setting( 'treville_theme_options[meta_date]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[meta_date]', array(
		'label'    => esc_html__( 'Display post date', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_date]',
		'type'     => 'checkbox',
		'priority' => 30,
	) );

	// Add Meta Author setting and control.
	$wp_customize->add_setting( 'treville_theme_options[meta_author]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[meta_author]', array(
		'label'    => esc_html__( 'Display post author', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_author]',
		'type'     => 'checkbox',
		'priority' => 40,
	) );

	// Add Meta Comments setting and control.
	$wp_customize->add_setting( 'treville_theme_options[meta_comments]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[meta_comments]', array(
		'label'    => esc_html__( 'Display post comments', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_comments]',
		'type'     => 'checkbox',
		'priority' => 50,
	) );

	// Add Meta Category setting and control.
	$wp_customize->add_setting( 'treville_theme_options[meta_category]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[meta_category]', array(
		'label'    => esc_html__( 'Display post categories', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_category]',
		'type'     => 'checkbox',
		'priority' => 60,
	) );

	// Add Single Posts Headline.
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[single_post_headline]', array(
			'label'    => esc_html__( 'Single Posts', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => array(),
			'priority' => 70,
		)
	) );

	// Add Meta Tags setting and control.
	$wp_customize->add_setting( 'treville_theme_options[meta_tags]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[meta_tags]', array(
		'label'    => esc_html__( 'Display post tags on single posts', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[meta_tags]',
		'type'     => 'checkbox',
		'priority' => 80,
	) );

	// Add Post Navigation setting and control.
	$wp_customize->add_setting( 'treville_theme_options[post_navigation]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[post_navigation]', array(
		'label'    => esc_html__( 'Display post navigation on single posts', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[post_navigation]',
		'type'     => 'checkbox',
		'priority' => 90,
	) );

	// Add Featured Images Headline.
	$wp_customize->add_control( new Treville_Customize_Header_Control(
		$wp_customize, 'treville_theme_options[featured_images]', array(
			'label'    => esc_html__( 'Featured Images', 'treville' ),
			'section'  => 'treville_section_post',
			'settings' => array(),
			'priority' => 100,
		)
	) );

	// Add Setting and Control for featured images on blog and archives.
	$wp_customize->add_setting( 'treville_theme_options[post_image_archives]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[post_image_archives]', array(
		'label'    => esc_html__( 'Display on blog and archives', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[post_image_archives]',
		'type'     => 'checkbox',
		'priority' => 110,
	) );

	// Add Setting and Control for featured images on single posts.
	$wp_customize->add_setting( 'treville_theme_options[post_image_single]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'treville_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'treville_theme_options[post_image_single]', array(
		'label'    => esc_html__( 'Display on single posts', 'treville' ),
		'section'  => 'treville_section_post',
		'settings' => 'treville_theme_options[post_image_single]',
		'type'     => 'checkbox',
		'priority' => 120,
	) );

	// Add Partial for Excerpt Length and Post Images on blog and archives.
	$wp_customize->selective_refresh->add_partial( 'treville_blog_layout_partial', array(
		'selector'         => '.site-main .post-wrapper',
		'settings'         => array(
			'treville_theme_options[excerpt_length]',
			'treville_theme_options[post_image_archives]',
		),
		'render_callback'  => 'treville_customize_partial_blog_layout',
		'fallback_refresh' => false,
	) );
}
add_action( 'customize_register', 'treville_customize_register_post_settings' );

/**
 * Render the blog layout for the selective refresh partial.
 */
function treville_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content' );
	}
}
