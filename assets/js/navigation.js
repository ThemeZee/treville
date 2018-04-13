/**
 * Navigation Menu Plugin
 *
 * Copyright 2016 ThemeZee
 * Free to use under the GPLv2 and later license.
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Author: Thomas Weichselbaumer (themezee.com)
 *
 * @package Treville
 */

(function($) {

	/**--------------------------------------------------------------
	# Add Desktop Dropdown Animation
	--------------------------------------------------------------*/
	$.fn.addDropdownAnimation = function() {

		/* Add dropdown animation for desktop navigation menu */
		$( this ).find( 'ul.sub-menu' ).css( { display: 'none' } );
		$( this ).find( 'li.menu-item-has-children' ).hover( function() {
			$( this ).find( 'ul:first' ).css( { visibility: 'visible', display: 'none' } ).slideDown( 300 );
		}, function() {
			$( this ).find( 'ul:first' ).css( { visibility: 'hidden' } );
		} );

		/* Make sure menu does not fly off the right of the screen */
		$( this ).find( 'li ul.sub-menu li.menu-item-has-children' ).mouseenter( function() {
			if ( $( this ).children( 'ul.sub-menu' ).offset().left + 250 > $( window ).width() ) {
				$( this ).children( 'ul.sub-menu' ).css( { right: '100%', left: 'auto' } );
			}
		});

		// Add menu items with submenus to aria-haspopup="true".
		$( this ).find( 'li.menu-item-has-children' ).attr( 'aria-haspopup', 'true' ).attr( 'aria-expanded', 'false' );

		/* Properly update the ARIA states on focus (keyboard) and mouse over events */
		$( this ).find( 'li.menu-item-has-children > a' ).on( 'focus.aria mouseenter.aria', function() {
			$( this ).parents( '.menu-item' ).attr( 'aria-expanded', true ).find( 'ul:first' ).css( { visibility: 'visible', display: 'block' } );
		} );

		/* Properly update the ARIA states on blur (keyboard) and mouse out events */
		$( this ).find( 'li.menu-item-has-children > a' ).on( 'blur.aria  mouseleave.aria', function() {

			if( ! $( this ).parent().next( 'li' ).length > 0 && ! $( this ).next('ul').length > 0 ) {

				$( this ).closest( 'li.menu-item-has-children' ).attr( 'aria-expanded', false ).find( '.sub-menu' ).css( { display: 'none' } );

			}

		} );

	};

	/**--------------------------------------------------------------
	# Reset Desktop Dropdown Animation
	--------------------------------------------------------------*/
	$.fn.resetDropdownAnimation = function() {

		/* Reset desktop navigation menu dropdown animation on smaller screens */
		$( this ).find( 'ul.sub-menu' ).css( { display: 'block' } );
		$( this ).find( 'li ul.sub-menu' ).css( { visibility: 'visible', display: 'block' } );
		$( this ).find( 'li.menu-item-has-children' ).unbind( 'mouseenter mouseleave' );

		$( this ).find( 'li.menu-item-has-children ul.sub-menu' ).each( function() {
			$( this ).hide();
			$( this ).parent().find( '.submenu-dropdown-toggle' ).removeClass( 'active' );
		} );

		/* Remove ARIA states on mobile devices */
		$( this ).find( 'li.menu-item-has-children > a' ).unbind( 'focus.aria mouseenter.aria blur.aria  mouseleave.aria' );

	};

	/**--------------------------------------------------------------
	# Add submenus dropdowns for mobile menu
	--------------------------------------------------------------*/
	$.fn.addMobileSubmenu = function() {

		/* Add dropdown toggle for submenus on mobile navigation */
		$( this ).find('li.menu-item-has-children').prepend('<span class=\"submenu-dropdown-toggle\"></span>');
		$( this ).find('li.page_item_has_children').prepend('<span class=\"submenu-dropdown-toggle\"></span>');

		/* Add dropdown animation for submenus on mobile navigation */
		$( this ).find('.submenu-dropdown-toggle').on('click', function(){
			$( this ).parent().find('ul:first').slideToggle();
			$( this ).toggleClass('active');
		});

	};

	/**--------------------------------------------------------------
	# Setup Navigation Menus
	--------------------------------------------------------------*/
	$( document ).ready( function() {

		/* Variables */
		var top_menu = $('.top-navigation-menu'),
			main_menu = $('.main-navigation-menu'),
			social_menu = $('.header-area .social-icons-menu'),
			menu_wrap = $('.top-navigation-menu-wrap');

		/* Add Listener for screen size */
		if(typeof matchMedia == 'function') {
			var mq = window.matchMedia('(max-width: 60em)');
			mq.addListener(widthChange);
			widthChange(mq);
		}
		function widthChange(mq) {

			if (mq.matches) {

				/* Reset desktop navigation menu dropdown animation on smaller screens */
				top_menu.resetDropdownAnimation();
				main_menu.resetDropdownAnimation();

				/* Copy header navigation items to main navigation on mobile screens */
				main_menu.appendTo( menu_wrap ).addClass('mobile-header-menu');

				/* Copy social icons to main navigation on mobile screens */
				social_menu.appendTo( menu_wrap ).addClass('mobile-header-social-icons');

			} else {

				/* Add dropdown animation for desktop navigation menu */
				top_menu.addDropdownAnimation();
				main_menu.addDropdownAnimation();

				/* Copy Header Navigation back to original spot */
				$('.mobile-header-menu').removeClass('mobile-header-menu').appendTo( $('#main-navigation') );

				/* Copy Social Icons back to original spot */
				$('.mobile-header-social-icons').removeClass('mobile-header-social-icons').appendTo( $('.header-area .social-icons-navigation') );

			}

		}

		/* Add Menu Toggle Button for mobile navigation */
		$( '#header-navigation' ).prepend( '<button id=\"top-navigation-toggle\" class=\"top-navigation-toggle\"></button>' );

		/* Add dropdown slide animation for mobile devices */
		$( '#top-navigation-toggle' ).on( 'click', function() {
			menu_wrap.slideToggle();
			$( this ).toggleClass( 'active' );
		});

		/* Add submenus for mobile navigation menu */
		top_menu.addMobileSubmenu();
		main_menu.addMobileSubmenu();

	} );

}(jQuery));
