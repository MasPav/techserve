<?php
/**
 * @package Nexgen
 */

require_once ( get_template_directory() . '/inc/config/theme-support.php' );
require_once ( get_template_directory() . '/inc/config/theme-functions.php' );
require_once ( get_template_directory() . '/inc/config/theme-settings.php' );
require_once ( get_template_directory() . '/inc/resources/enqueue-assets.php' );
require_once ( get_template_directory() . '/inc/component/breadcrumb.php' );
require_once ( get_template_directory() . '/inc/component/search-form.php' );
require_once ( get_template_directory() . '/inc/component/comment-callback.php' );
require_once ( get_template_directory() . '/inc/component/customizer.php' );
require_once ( get_template_directory() . '/inc/utils/navwalker.php' );
require_once ( get_template_directory() . '/inc/utils/register-required-plugins.php' );
require_once ( get_template_directory() . '/inc/utils/import-demo-data.php' );
require_once ( get_template_directory() . '/inc/utils/import-field-data.php' );
require_once ( get_template_directory() . '/inc/admin/release-notes.php' );

if ( function_exists( 'ACF' ) ) {
	require get_template_directory() . '/inc/support/acf.php';
}

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/support/woocommerce.php';
}

if ( defined( 'JETPACK__VERSION' ) ) {
	require_once ( get_template_directory() . '/inc/support/jetpack.php' );
}