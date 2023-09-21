<?php
/*
Plugin Name: Nexgen Core
Plugin URI: https://nexgen.codings.dev
Author: Codings
Author URI: https://codings.dev
Description: This plugin provides the full functionality of the Nexgen WordPress Theme.
Version: 1.0.8
Text Domain: nexgen-core
Domain Path: /languages
License: GNU General Public License v2 or later
License URI: https://themeforest.net/licenses/standard
Tested up to: 5.0
Requires PHP: 7.0
*/

namespace NXG;

defined( 'ABSPATH' ) || die();

if ( ! defined( 'NXG_DIR' ) ) {
  define( 'NXG_DIR', plugin_dir_path( __FILE__ ) );
}

require_once( __DIR__ . '/inc/functions.php' );
require_once( __DIR__ . '/inc/support.php' );
require_once( __DIR__ . '/inc/content.php' );
require_once( __DIR__ . '/inc/style.php' );
require_once( __DIR__ . '/inc/script.php' );
require_once( __DIR__ . '/inc/portfolio.php' );

class nxg_base_class {

  const DEVELOPMENT = false;
  const VERSION = '1.0.7';
	const MINIMUM_ELEMENTOR_VERSION = '3.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	
	private static $_instance = null;

	public function __construct() {
			
		if ( self::DEVELOPMENT ) {
			$this->version = esc_attr( uniqid() );

		} else {
			$this->version = self::VERSION;
		}
		
		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );
	}

  public function i18n() {
		load_plugin_textdomain( 'nexgen-core' );
	}

  public function init() {

		if ( ! defined( 'nxg_dir' ) ) {
			define( 'nxg_dir', plugin_dir_path( __FILE__ ) );
		}

		if ( ! in_array( wp_get_theme()->get( 'TextDomain' ), array( 'nexgen', 'nexgen-child' ) ) ) {
			add_action( 'admin_notices', [ $this, 'nxg_admin_notice_missing_theme' ] );
			return;
		}

		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'nxg_admin_notice_missing_elementor' ] );
			return;
		}

		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'nxg_admin_notice_minimum_elementor_version' ] );
			return;
		}

		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'nxg_admin_notice_minimum_php_version' ] );
			return;
		}

    add_action( 'elementor/elements/categories_registered', array($this,'nxg_add_widget_category')  );
		add_action( 'elementor/widgets/register', [ $this, 'nxg_init_widgets' ] ); 
  }
	
  public function nxg_admin_notice_missing_theme() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s to be installed and activated.', 'nexgen-core' ),
			'<strong>' . esc_html__( 'Nexgen Core', 'nexgen-core' ) . '</strong>',
			'<a href="'. admin_url() .'themes.php?theme=nexgen"><strong>' . esc_html__( 'Nexgen WordPress Theme', 'nexgen-core' ) . '</strong></a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
	
  public function nxg_admin_notice_missing_elementor() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(			
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s plugin to be installed and activated.', 'nexgen-core' ),
			'<strong>' . esc_html__( 'Nexgen Core', 'nexgen-core' ) . '</strong>',
			'<a href="'. admin_url() .'plugin-install.php?tab=plugin-information&plugin=elementor&TB_iframe=true&width=772&height=624" class="thickbox open-plugin-details-modal"><strong>' . esc_html__( 'Elementor Website Builder', 'nexgen-core' ) . '</strong></a>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}
    
  public function nxg_admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name, 2: Plugin version. */
			esc_html__( '%1$s plugin requires %2$s version %3$s or greater.', 'nexgen-core' ),
			'<strong>' . esc_html__( 'Nexgen Core', 'nexgen-core' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'nexgen-core' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function nxg_admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '%1$s plugin requires %2$s version %3$s or greater.', 'nexgen-core' ),
			'<strong>' . esc_html__( 'Nexgen Core', 'nexgen-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'nexgen-core' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	public function nxg_add_widget_category( $elements_manager ) {

		$elements_manager->add_category(
			'nxg_category',
			array(
				'title' => __( 'Nexgen Widgets', 'nexgen-core' ),
				'icon' => 'fa fa-plug',
			)
		);
	}

	public function nxg_init_widgets() {

		$widgets = wp_normalize_path( nxg_dir . '/widgets/*.php' );

		foreach( glob( $widgets ) as $widget ) {

			$class_name = basename( $widget, '.php' );
			$class_name = str_replace( '-', ' ', $class_name );
			$class_name = ucwords( $class_name );
			$class_name = str_replace( ' ', '_', $class_name );
			$class_name = '\NXG\Widgets\\' . $class_name;
			
			require_once( $widget );
			
			\Elementor\Plugin::instance()->widgets_manager->register( new $class_name );				
		}
	}
}

$nxg_base_class_instantiated = new nxg_base_class();