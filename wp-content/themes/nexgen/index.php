<?php
/**
 * @package Nexgen
 */

get_header();

if ( nxg_required_plugins() ) {
	
	$single  = 'template-parts/single';
	$archive = 'template-parts/archive';
	$search  = 'template-parts/search';
	$page404 = 'template-parts/404';

} else {

	$single  = 'template-parts/single-basic';
	$archive = 'template-parts/archive-basic';
	$search  = 'template-parts/search-basic';
	$page404 = 'template-parts/404-basic';
}

if ( is_singular() ) {

	if ( nxg_elementor_do_location( 'single' ) ) { 
		get_template_part( $single );
	}

} elseif ( is_archive() || is_home() ) {

	if ( nxg_elementor_do_location( 'archive' ) ) { 
		get_template_part( $archive );
	}

} elseif ( is_search() ) {

	if ( nxg_elementor_do_location( 'archive' ) ) { 
		get_template_part( $search );
	}

} else {

	if ( nxg_elementor_do_location( 'single' ) ) { 
		get_template_part( $page404 );
	}
}

get_footer();