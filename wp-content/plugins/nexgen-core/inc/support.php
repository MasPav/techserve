<?php
/**
 * @package Nexgen Core
 */

function nxg_custom_upload_mimes( $mimes ) {
	$mimes['woff'] = 'application/x-font-woff';
	$mimes['woff2'] = 'application/x-font-woff2';
	return $mimes;
}

add_filter('upload_mimes', 'nxg_custom_upload_mimes');