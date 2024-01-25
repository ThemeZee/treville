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

	// Add Section for Blog Settings.
	$wp_customize->add_section(
		'treville_section_blog',
		array(
			'title'    => esc_html__( 'Blog Settings', 'treville' ),
			'priority' => 25,
			'panel'    => 'treville_options_panel',
		)
	);

	// Add Blog Title setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[blog_title]',
		array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[blog_title]',
		array(
			'label'    => esc_html__( 'Blog Title', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[blog_title]',
			'type'     => 'text',
			'priority' => 10,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'treville_theme_options[blog_title]',
		array(
			'selector'         => '.blog-header .blog-title',
			'render_callback'  => 'treville_customize_partial_blog_title',
			'fallback_refresh' => false,
		)
	);

	// Add Blog Description setting and control.
	$wp_customize->add_setting(
		'treville_theme_options[blog_description]',
		array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[blog_description]',
		array(
			'label'    => esc_html__( 'Blog Description', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[blog_description]',
			'type'     => 'textarea',
			'priority' => 20,
		)
	);

	$wp_customize->selective_refresh->add_partial(
		'treville_theme_options[blog_description]',
		array(
			'selector'         => '.blog-header .blog-description',
			'render_callback'  => 'treville_customize_partial_blog_description',
			'fallback_refresh' => false,
		)
	);

	// Add Settings and Controls for blog layout.
	$wp_customize->add_setting(
		'treville_theme_options[blog_layout]',
		array(
			'default'           => 'excerpt',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'treville_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[blog_layout]',
		array(
			'label'    => esc_html__( 'Blog Layout', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[blog_layout]',
			'type'     => 'radio',
			'priority' => 30,
			'choices'  => array(
				'index'   => esc_html__( 'Display full posts', 'treville' ),
				'excerpt' => esc_html__( 'Display post excerpts', 'treville' ),
			),
		)
	);

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting(
		'treville_theme_options[excerpt_length]',
		array(
			'default'           => 50,
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[excerpt_length]',
		array(
			'label'    => esc_html__( 'Excerpt Length', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[excerpt_length]',
			'type'     => 'text',
			'priority' => 40,
		)
	);

	// Add Partial for Blog Layout and Excerpt Length.
	$wp_customize->selective_refresh->add_partial(
		'treville_blog_layout_partial',
		array(
			'selector'         => '.site-main .post-wrapper',
			'settings'         => array(
				'treville_theme_options[blog_layout]',
				'treville_theme_options[excerpt_length]',
			),
			'render_callback'  => 'treville_customize_partial_blog_layout',
			'fallback_refresh' => false,
		)
	);

	// Add Setting and Control for Read More Text.
	$wp_customize->add_setting(
		'treville_theme_options[read_more_text]',
		array(
			'default'           => esc_html__( 'Continue reading', 'treville' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[read_more_text]',
		array(
			'label'    => esc_html__( 'Read More Text', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[read_more_text]',
			'type'     => 'text',
			'priority' => 50,
		)
	);

	// Add Magazine Widgets Headline.
	$wp_customize->add_control(
		new Treville_Customize_Header_Control(
			$wp_customize,
			'treville_theme_options[blog_magazine_widgets_title]',
			array(
				'label'    => esc_html__( 'Magazine Widgets', 'treville' ),
				'section'  => 'treville_section_blog',
				'settings' => array(),
				'priority' => 60,
			)
		)
	);

	// Add Setting and Control for Magazine widgets.
	$wp_customize->add_setting(
		'treville_theme_options[blog_magazine_widgets]',
		array(
			'default'           => true,
			'type'              => 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'treville_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'treville_theme_options[blog_magazine_widgets]',
		array(
			'label'    => esc_html__( 'Display Magazine widgets on blog index', 'treville' ),
			'section'  => 'treville_section_blog',
			'settings' => 'treville_theme_options[blog_magazine_widgets]',
			'type'     => 'checkbox',
			'priority' => 70,
		)
	);
}
add_action( 'customize_register', 'treville_customize_register_blog_settings' );

/**
 * Render the blog title for the selective refresh partial.
 */
function treville_customize_partial_blog_title() {
	$theme_options = treville_theme_options();
	echo wp_kses_post( $theme_options['blog_title'] );
}

/**
 * Render the blog description for the selective refresh partial.
 */
function treville_customize_partial_blog_description() {
	$theme_options = treville_theme_options();
	echo wp_kses_post( $theme_options['blog_description'] );
}

/**
 * Render the blog layout for the selective refresh partial.
 */
function treville_customize_partial_blog_layout() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', esc_attr( treville_get_option( 'blog_layout' ) ) );
	}
}
