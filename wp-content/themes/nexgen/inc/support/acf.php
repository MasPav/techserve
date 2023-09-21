<?php
/**
 * @package Nexgen
 */

function nxg_acf_json_save_point( $path ) {
	$path = get_template_directory() . '/inc/acf-json';
  return $path;
}

add_filter( 'acf/settings/save_json', 'nxg_acf_json_save_point' );

function nxg_acf_json_load_point( $paths ) {
	$paths = array( get_template_directory() . '/inc/acf-json' );    
	if ( is_child_theme() ) {
		$paths[] = get_stylesheet_directory() . '/inc/acf-json';
	}
	return $paths;    
}

add_filter( 'acf/settings/load_json', 'nxg_acf_json_load_point' );

function nxg_advanced_admin_menu() {
	$advanced_admin_menu = get_field( 'nxg_advanced_admin_menu', 'option' );

	if ( isset( $advanced_admin_menu['disable_custom_fields_menu'] ) && $advanced_admin_menu['disable_custom_fields_menu'] ) {
		add_filter('acf/settings/show_admin', '__return_false');
	}
}

add_action( 'init', 'nxg_advanced_admin_menu' );