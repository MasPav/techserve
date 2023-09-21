<?php
/**
 * @package Nexgen
 */

require_once ( ABSPATH . 'wp-admin/includes/file.php' );

function nxg_put_contents( $dir, $file, $content ) {

  global $wp_filesystem;

	$upload_dir = wp_upload_dir();

	wp_mkdir_p( $upload_dir['basedir'] . $dir );

	WP_Filesystem();

	$wp_filesystem->put_contents( $upload_dir['basedir'] . $dir . $file, $content, 0644 );
}