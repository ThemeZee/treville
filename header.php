<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Treville
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<?php do_action( 'treville_before_site' ); ?>

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'treville' ); ?></a>

		<?php do_action( 'treville_before_header' ); ?>

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

					<?php treville_site_logo(); ?>
					<?php treville_site_title(); ?>
					<?php treville_site_description(); ?>

				</div><!-- .site-branding -->

				<?php get_template_part( 'template-parts/header/top', 'navigation' ); ?>

			</div><!-- .header-main -->

			<?php get_template_part( 'template-parts/header/main', 'navigation' ); ?>

		</header><!-- #masthead -->

		<?php treville_header_image(); ?>

		<?php treville_slider(); ?>

		<?php treville_breadcrumbs(); ?>

		<?php do_action( 'treville_after_header' ); ?>

		<div id="content" class="site-content container clearfix">
