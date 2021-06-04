<?php
/**
 * Post Slider Setup
 *
 * Enqueues scripts and styles for the slideshow
 * Sets slideshow excerpt length and slider animation parameter
 *
 * The template for displaying the slideshow can be found under /template-parts/post-slider.php
 *
 * @package Treville
 */

/**
 * Enqueue slider scripts and styles.
 */
function treville_slider_scripts() {

	// Get theme options from database.
	$theme_options = treville_theme_options();

	// Register and enqueue FlexSlider JS and CSS if necessary.
	if ( ( true === $theme_options['slider_active'] && is_front_page() ) && ! treville_is_amp() ) :

		// FlexSlider JS.
		wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), '2.6.0' );

		// Register and enqueue slider setup.
		wp_enqueue_script( 'treville-slider', get_template_directory_uri() . '/assets/js/slider.js', array( 'jquery-flexslider' ), '20170421' );

	endif;
}
add_action( 'wp_enqueue_scripts', 'treville_slider_scripts' );


/**
 * Function to change excerpt length for post slider
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function treville_slider_excerpt_length( $length ) {
	return 15;
}


if ( ! function_exists( 'treville_slider_image' ) ) :
	/**
	 * Displays the featured image of the post as slider image
	 *
	 * @param string $size Post thumbnail size.
	 * @param array  $attr Post thumbnail attributes.
	 */
	function treville_slider_image( $size = 'post-thumbnail', $attr = array() ) {

		// Display Post Thumbnail.
		if ( has_post_thumbnail() ) : ?>

			<a class="slide-image-link" href="<?php the_permalink(); ?>" rel="bookmark">
				<figure class="slide-image-wrap">
					<?php the_post_thumbnail( $size, $attr ); ?>
				</figure>
			</a>

		<?php else : ?>

			<a class="slide-image-link" href="<?php the_permalink(); ?>" rel="bookmark">
				<figure class="slide-image-wrap">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/default-slider-image.png" class="slide-image default-slide-image wp-post-image" />
				</figure>
			</a>

		<?php endif;
	}
endif;


if ( ! function_exists( 'treville_slider_meta' ) ) :
	/**
	 * Displays the date and author on slider posts
	 */
	function treville_slider_meta() {

		$postmeta = treville_meta_date();
		$postmeta .= treville_meta_author();

		echo '<div class="entry-meta">' . $postmeta . '</div>';

	}
endif;


/**
 * Sets slider animation effect
 *
 * Passes parameters from theme options to the javascript files (js/slider.js)
 */
function treville_slider_options() {

	// Get theme options from database.
	$theme_options = treville_theme_options();

	// Set parameters array.
	$params = array();

	// Set slider animation.
	$params['animation'] = ( 'fade' === $theme_options['slider_animation'] ) ? 'fade' : 'slide';

	// Set slider speed.
	$params['speed'] = absint( $theme_options['slider_speed'] );

	// Passing parameters to Flexslider.
	wp_localize_script( 'treville-slider', 'treville_slider_params', $params );

}
add_action( 'wp_enqueue_scripts', 'treville_slider_options' );


/**
 * Display Post Slider
 */
function treville_slider() {

	// Get theme options from database.
	$theme_options = treville_theme_options();

	// Display post slider only if activated.
	if ( ( true === $theme_options['slider_active'] && is_front_page() ) && ! treville_is_amp() ) :

		get_template_part( 'template-parts/post-slider' );

	endif;
}
