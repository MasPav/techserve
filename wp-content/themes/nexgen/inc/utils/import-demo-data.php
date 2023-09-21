<?php
/**
 * @package Nexgen
 */

function nxg_import_demos() {
	
	$version = wp_get_theme('nexgen')->get( 'Version' );
	$url     = 'https://codings.dev/package/demo-data/nexgen/All.xml';

	return array( 
		array(
			'import_file_name' => 'Nexgen WordPress Theme ' . $version,
			'import_file_url'  => esc_url( $url )
		)
	);
}

add_filter( 'pt-ocdi/import_files', 'nxg_import_demos' );

function nxg_after_import( $selected ) {
		
	// Set Pages
	$home = get_page_by_title( 'Home 1' );
	$blog = get_page_by_title( 'Blog 1 Column' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home->ID );
	update_option( 'page_for_posts', $blog->ID );

	// Set Menu 1
	$menu_1               = get_term_by( 'name', '[Nexgen] Menu 1', 'nav_menu' );
	$location_1           = get_theme_mod( 'nav_menu_locations' );
	$location_1['menu-1'] = $menu_1->term_id;
	set_theme_mod( 'nav_menu_locations', $location_1 );

	// Set Menu 2
	$menu_2               = get_term_by( 'name', '[Nexgen] Footer 1', 'nav_menu' );
	$location_2           = get_theme_mod( 'nav_menu_locations' );
	$location_2['menu-2'] = $menu_2->term_id;
	set_theme_mod( 'nav_menu_locations', $location_2 );

	// Set Menu 3
	$menu_3               = get_term_by( 'name', '[Nexgen] Footer 2', 'nav_menu' );
	$location_3           = get_theme_mod( 'nav_menu_locations' );
	$location_3['menu-3'] = $menu_3->term_id;
	set_theme_mod( 'nav_menu_locations', $location_3 );

	// Set Menu 4
	$menu_4               = get_term_by( 'name', '[Nexgen] Footer 3', 'nav_menu' );
	$location_4           = get_theme_mod( 'nav_menu_locations' );
	$location_4['menu-4'] = $menu_4->term_id;
	set_theme_mod( 'nav_menu_locations', $location_4 );

	// Set Fields
	nxg_add_header();
	nxg_add_footer();
}

add_action( 'pt-ocdi/after_import', 'nxg_after_import' );

function ocdi_register_plugins( $plugins ) {

  $theme_plugins = [
    [
      'name'        => 'Nexgen Core',
      'slug'        => 'nexgen-core',
      'description' => __( 'This plugin provides the full functionality of the Nexgen WordPress Theme.', 'nexgen' ),
      'source'      => esc_url( 'https://codings.dev/package/plugins/nexgen-core.zip' ),
      'required'    => true,
    ],
    [
      'name'        => 'Advanced Custom Fields PRO',
      'slug'        => 'advanced-custom-fields-pro',
      'description' => __( 'Responsible for the entire operation of the theme settings of the theme.', 'nexgen' ),
      'source'      => esc_url( 'https://codings.dev/package/plugins/advanced-custom-fields-pro.zip' ),
      'required'    => true,
    ],
    [
      'name'        => 'ACF: Font Awesome',
      'slug'        => 'advanced-custom-fields-font-awesome',
      'description' => __( 'Adds "Font Awesome Icon" to the theme settings of the theme.', 'nexgen' ),
      'preselected' => true,
    ],
		[
			'name'        => 'Elementor',
			'slug'        => 'elementor',
      'description' => __( 'The best drag and drop page builder for customizing pages.', 'nexgen' ),
      'preselected' => true,
		],
		[
			'name'        => 'Contact Form 7',
			'slug'        => 'contact-form-7',
      'description' => __( 'Adds "Font Awesome Icon" to the theme settings of the theme.', 'nexgen' ),
      'preselected' => true,
		],
  ];
 
  return array_merge( $plugins, $theme_plugins );
}

add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
add_filter( 'ocdi/regenerate_thumbnails_in_content_import', '__return_false' );