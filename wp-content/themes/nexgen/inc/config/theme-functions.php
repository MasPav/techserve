<?php
/**
 * @package Nexgen
 */

function nxg_theme_check() {
	
	if ( get_option( 'nxg_licence_key' ) ) {
		return true;
	}
}

function nxg_translate( $text ) {

	$locale = get_locale();
	$string = explode( '['.$locale.']', $text );

	if ( isset( $string[1] ) ) {
		$string = explode( '[/'.$locale.']', $string[1] );
	}

	return $string[0];
}

function nxg_required_plugins() {

	if ( class_exists( 'NXG\nxg_base_class' ) && function_exists( 'ACF' ) ) {
		return true;
	}
}

function nxg_has_header() {

	if ( nxg_required_plugins() ) {
		
		$nxg_top_bar_left  = get_field( 'nxg_top_bar_left', 'option' );
		$nxg_top_bar_right = get_field( 'nxg_top_bar_right', 'option' );
		$nxg_navbar_left   = get_field( 'nxg_navbar_left', 'option' );
		$nxg_navbar_right  = get_field( 'nxg_navbar_right', 'option' );

		if ( isset( $nxg_top_bar_left ) || isset( $nxg_top_bar_right ) || isset( $nxg_navbar_left ) || isset( $nxg_navbar_right ) ) {
			return true;
		}
	}
}

function nxg_has_footer() {

	if ( nxg_required_plugins() ) {
		
		$nxg_footer_columns   = get_field( 'nxg_footer_columns', 'option' );
		$nxg_bottom_bar_left  = get_field( 'nxg_bottom_bar_left', 'option' );
		$nxg_bottom_bar_right = get_field( 'nxg_bottom_bar_right', 'option' );

		if ( isset( $nxg_footer_columns ) || isset( $nxg_bottom_bar_left ) || isset( $nxg_bottom_bar_right ) ) {
			return true;
		}
	}
}

function nxg_is_woocommerce_page() {

	if ( class_exists( 'WooCommerce' ) ) {		
		if ( is_cart() || is_checkout() || is_account_page() ) {
			return true;
		}
	}
}

function nxg_elementor_do_location( $location ) {
	return ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( $location );
}

function nxg_posted_on() {

	$archive_year  = get_the_time( 'Y' ); 
	$archive_month = get_the_time( 'm' ); 
	$archive_day   = get_the_time( 'd' );

	$time_link     = get_day_link( $archive_year, $archive_month, $archive_day );
	
	$time_string   = '<a href="' . $time_link . '" class="author"><i class="fas fa-calendar-alt"></i><time class="entry-date published updated" datetime="%1$s">%2$s</time></a>';

	return sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);
}

function nxg_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) );
}

function nxg_posted_by() {

	return sprintf(
		'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="date"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>'
	);
}

function nxg_author_display_name() {
	return get_the_author_meta( 'display_name' );
}

function nxg_comment_count() {

	$number = get_comments_number();

	if ( $number > 0 ) {
		return $number . __( ' Comments', 'nexgen' );

	} else {
		return __( 'Be the first to comment', 'nexgen' );
	}
}

function nxg_render_icon( $icon_style, $icon, $icon_fa, $class = null ) {

	if ( $icon_style == 'Line Icon' && $icon ) {
		return '<i class="icon-' . $icon . ' ' . $class . '"></i>';
				
	} elseif ( $icon_style == 'Awesome Icon' && $icon ) {
		return '<i class="' . $icon_fa . ' ' . $class . '"></i>';
	}
}

function nxg_render_image( $src, $alt, $class = null, $attr_tag = null, $attr_value = null ) {
	if ( $src ) {
		if ( $attr_tag ) {
			$attr = $attr_tag.'="'.$attr_value.'"';
		} else {
			$attr = null;
		}
		return '<img src="'.$src.'" alt="'.$alt.'" class="'.$class.'" '.$attr.'/>';
	}
}

function nxg_render_link( $href, $target, $title, $class = null ) {
	if ( $href ) {
		return '<a href="'.esc_attr( $href ).'" target="'.esc_attr( $target ).'" class="'.esc_attr( $class ).'">'.$title.'</a>';
	}
}