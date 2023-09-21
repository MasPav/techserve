<?php
/**
 * @package Nexgen
 */

$GLOBALS['conditional_style'] = false;

function nxg_has_conditional() {
	if ( get_field( 'nxg_page_design_navbar_link_color' ) || get_field( 'nxg_page_design_navbar_sticky_link_color' ) || get_field( 'nxg_page_design_navbar_link_hover_color' )) {
		return true;
	}
}

function nxg_get_link_conditional_style( $field, $field_sticky, $field_hover, $elem, $elem_sticky, $elem_hover ) {

	if ( $field || $field_hover ) {

		$style = $elem.'{';

		// Color
		$text_color = $field;

		if ( $text_color ) {
			$style .= 'color:'.$text_color.';';
		}

		$GLOBALS['conditional_style'] .= $style.'}';

		$style = $elem_sticky.'{';

		// Sticky
		$text_sticky_color = $field_sticky;

		if ( $text_sticky_color ) {
			$style .= 'color:'.$text_sticky_color.';';
		}

		$GLOBALS['conditional_style'] .= $style.'}';

		$style = $elem_hover.'{';

		// Hover
		$text_hover_color = $field_hover;

		if ( $text_hover_color ) {
			$style .= 'color:'.$text_hover_color.';';
		}

		$GLOBALS['conditional_style'] .= $style.'}';
	}
}

// Navbar [link conditional]
nxg_get_link_conditional_style( 
	get_field( 'nxg_page_design_navbar_link_color' ), 
	get_field( 'nxg_page_design_navbar_sticky_link_color' ), 
	get_field( 'nxg_page_design_navbar_link_hover_color' ), 
	'body .navbar.sub .navbar-nav .nav-item a:not(.btn), body .navbar.sub .navbar-nav .dropdown-menu .nav-item a:not(.btn)', 
	'body .navbar.sub.navbar-sticky .nav-item a:not(.btn)', 
	'body .navbar.sub .navbar-nav .nav-item a:not(.btn).active, body .navbar.sub .navbar-nav .nav-item a:not(.btn):hover'
);

if ( nxg_has_conditional() ) {
  nxg_put_contents( '/nexgen/css/', 'post-'.get_the_ID().'.css', $GLOBALS['conditional_style'] );
}