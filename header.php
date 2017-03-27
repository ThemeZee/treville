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

	<div id="page" class="hfeed site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'treville' ); ?></a>

		<header id="masthead" class="site-header clearfix" role="banner">

			<div class="header-main container clearfix">

				<div id="logo" class="site-branding clearfix">

					<?php treville_site_logo(); ?>
					<?php treville_site_title(); ?>
					<?php treville_site_description(); ?>

				</div><!-- .site-branding -->

				<div class="main-navigation-wrap">

					<nav id="main-navigation" class="primary-navigation navigation clearfix" role="navigation">

						<div class="main-navigation-menu-wrap">
						<?php
							// Display Main Navigation.
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'container' => false,
								'menu_class' => 'main-navigation-menu',
								'echo' => true,
								'fallback_cb' => 'treville_default_menu',
							) );
						?>
						</div>

					</nav><!-- #main-navigation -->

				</div>

			</div><!-- .header-main -->

			<?php if ( has_nav_menu( 'secondary' ) ) : ?>

				<div id="header-navigation-wrap" class="header-navigation-wrap clearfix">

					<nav id="header-navigation" class="secondary-navigation navigation container clearfix" role="navigation">
						<?php
							// Display Main Navigation.
							wp_nav_menu( array(
								'theme_location' => 'secondary',
								'container' => false,
								'menu_class' => 'header-navigation-menu',
								'echo' => true,
								'fallback_cb' => '',
								)
							);
						?>
					</nav><!-- #header-navigation -->

				</div>

			<?php endif; ?>

		</header><!-- #masthead -->

		<?php treville_header_image(); ?>

		<?php treville_slider(); ?>

		<?php treville_breadcrumbs(); ?>

		<div id="content" class="site-content container clearfix">
