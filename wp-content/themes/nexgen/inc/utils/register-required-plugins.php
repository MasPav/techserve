<?php
/**
 * @package Nexgen
 */

require_once ( get_template_directory() . '/inc/utils/tgm-plugin-activation.php' );

function nxg_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Nexgen Core',
			'slug'               => 'nexgen-core',
			'version'            => '1.0.8',
      'source'             => esc_url( 'https://codings.dev/package/plugins/nexgen-core.zip' ),
			'required'           => true,
		),

		array(
			'name'               => 'Advanced Custom Fields PRO',
			'slug'               => 'advanced-custom-fields-pro',
			'version'            => '6.1.7',
      'source'             => esc_url( 'https://codings.dev/package/plugins/advanced-custom-fields-pro.zip' ),
			'required'           => true,
		),

		array(
			'name'               => 'ACF: Font Awesome',
			'slug'               => 'advanced-custom-fields-font-awesome',
			'version'            => '4.0.5',
			'required'           => true,
		),

		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'version'            => '5.7.7',
			'required'           => true,
		),

		array(
			'name'               => 'One Click Demo Import',
			'slug'               => 'one-click-demo-import',
			'version'            => '3.1.2',
			'required'           => true,
		),
		
		array(
			'name'               => 'Envato Market',
			'slug'               => 'envato-market',
			'version'            => '2.0.8',
      'source'             => esc_url( 'https://codings.dev/package/plugins/envato-market.zip' ),
			'required'           => true,
		),
	);

	$config = array(
		'id'           => 'nexgen',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => false,
		'is_automatic' => false,
		'default_path' => false
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'nxg_register_required_plugins' );