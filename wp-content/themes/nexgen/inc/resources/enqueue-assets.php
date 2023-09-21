<?php
/**
 * @package Nexgen
 */

function nxg_google_fonts_url( $font ) {

	$font_url = '';

	if ( 'off' !== _x( 'on', 'Google font: on or off', 'nexgen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( $font.':100,200,300,400,500,600,700,800,900' ), '//fonts.googleapis.com/css' );
	}
	
	return $font_url;
}

function nxg_enqueue_style( $id, $file ) {
	wp_enqueue_style( $id, get_template_directory_uri() . '/assets/' . $file, array(), wp_get_theme('nexgen')->get( 'Version' ));
} 

function nxg_enqueue_script( $id, $file ) {
	wp_enqueue_script( $id, get_template_directory_uri() . '/assets/' . $file, array( 'jquery' ), wp_get_theme('nexgen')->get( 'Version' ), true );
}

function nxg_enqueue_assets() {

	if ( nxg_required_plugins() ) {

		require_once ( get_template_directory() . '/inc/resources/file-system.php' );
		require_once ( get_template_directory() . '/inc/resources/get-style.php' );
		require_once ( get_template_directory() . '/inc/resources/conditional.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/global-style.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/header.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/footer.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/blog.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/single-post.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/portfolio.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/single-portfolio.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/single-page.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/search.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/404-page.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/preloader.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/scroll-to-top.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/cookie-notice.php' );
		require_once ( get_template_directory() . '/inc/resources/modules/advanced-css.php' );

		nxg_put_contents( '/nexgen/css/', 'custom.css', $GLOBALS['custom_style'] );
	}
		
	if ( is_rtl() ) {
		nxg_enqueue_style( 'nexgen-bootstrap-rtl', 'css/support/bootstrap.rtl.min.css' );

	} else {
		nxg_enqueue_style( 'nexgen-bootstrap', 'css/vendor/bootstrap.min.css' );
	}

	nxg_enqueue_style( 'nexgen-slider', 'css/vendor/slider.min.css' );
	
	wp_enqueue_style( sanitize_title( 'Inter' ), nxg_google_fonts_url( 'Inter' ), array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_style( sanitize_title( 'Montserrat' ), nxg_google_fonts_url( 'Montserrat' ), array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_style( 'nexgen-main', get_template_directory_uri() . '/style.css', array(), wp_get_theme('nexgen')->get( 'Version' ));

	if( is_child_theme() ) {
		wp_enqueue_style( 'nexgen-child-main', get_stylesheet_uri(), array(), wp_get_theme('nexgen')->get( 'Version' ));
		wp_enqueue_script( 'nexgen-child-main', str_replace( 'style.css', 'main.js', get_stylesheet_uri() ), array( 'jquery' ), wp_get_theme('nexgen')->get( 'Version' ), true );
	}

	nxg_enqueue_style( 'nexgen-default', 'css/default.css' );

	if ( nxg_required_plugins() ) {
		if ( nxg_has_conditional() ) {
			wp_enqueue_style( 'nexgen-post-' . get_the_ID(), site_url() . '/wp-content/uploads' . '/nexgen/css/post-'.get_the_ID().'.css', array(), wp_get_theme('nexgen')->get( 'Version' ));
		}
	}

	wp_enqueue_style( 'nexgen-custom', site_url() . '/wp-content/uploads' . '/nexgen/css/custom.css', array(), wp_get_theme('nexgen')->get( 'Version' ) . time() );

	nxg_enqueue_style( 'nexgen-icons', 'css/vendor/icons.min.css' );
	nxg_enqueue_style( 'nexgen-icons-fa', 'css/vendor/icons-fa.min.css' );
	nxg_enqueue_style( 'nexgen-animation', 'css/vendor/animation.min.css' );
	nxg_enqueue_style( 'nexgen-gallery', 'css/vendor/gallery.min.css' );
	nxg_enqueue_style( 'nexgen-cookie-notice', 'css/vendor/cookie-notice.min.css' );
	nxg_enqueue_style( 'nexgen-wordpress', 'css/support/wordpress.css' );
	nxg_enqueue_style( 'nexgen-elementor', 'css/support/elementor.css' );
	nxg_enqueue_style( 'nexgen-contact-form-7', 'css/support/contact-form-7.css' );
	
	if ( class_exists( 'WooCommerce' ) ) {
		nxg_enqueue_style( 'nexgen-woocommerce', 'css/support/woocommerce.css' );
	}

	if ( is_rtl() ) {
		nxg_enqueue_style( 'nexgen-main-rtl', 'css/support/main.rtl.css' );
	}
    
	nxg_enqueue_script( 'nexgen-jquery-easing', 'js/vendor/jquery.easing.min.js' );
	nxg_enqueue_script( 'nexgen-jquery-inview', 'js/vendor/jquery.inview.min.js' );
	nxg_enqueue_script( 'nexgen-popper', 'js/vendor/popper.min.js' );

	if ( is_rtl() ) {
		nxg_enqueue_script( 'nexgen-bootstrap-rtl', 'js/support/bootstrap.rtl.min.js' );

	} else {
		nxg_enqueue_script( 'nexgen-bootstrap', 'js/vendor/bootstrap.min.js' );
	}

  nxg_enqueue_script( 'nexgen-ponyfill', 'js/vendor/ponyfill.min.js' );    
	nxg_enqueue_script( 'nexgen-slider', 'js/vendor/slider.min.js' );
  nxg_enqueue_script( 'nexgen-animation', 'js/vendor/animation.min.js' );
	nxg_enqueue_script( 'nexgen-progress-radial', 'js/vendor/progress-radial.min.js' );
	nxg_enqueue_script( 'nexgen-bricklayer', 'js/vendor/bricklayer.min.js' );
	nxg_enqueue_script( 'nexgen-gallery', 'js/vendor/gallery.min.js' );	
	nxg_enqueue_script( 'nexgen-shuffle', 'js/vendor/shuffle.min.js' );
	nxg_enqueue_script( 'nexgen-particles', 'js/vendor/particles.min.js' );
	nxg_enqueue_script( 'nexgen-cookie-notice', 'js/vendor/cookie-notice.min.js' );
	nxg_enqueue_script( 'nexgen-main', 'js/main.js' );
	nxg_enqueue_script( 'nexgen-elementor', 'js/support/elementor.js' );
	
	if ( ! is_admin() ) {
		if ( is_singular() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' );
		}
  }
}

add_action( 'wp_enqueue_scripts', 'nxg_enqueue_assets' );

function nxg_add_inline_script() {

	if ( nxg_required_plugins() ) {

		$cookie_notice_script = '';

		$cookie_notice_popup             = get_field( 'nxg_cookie_notice_section', 'option' ); 
		$cookie_notice_popup_description = get_field( 'nxg_cookie_notice_p', 'option' ); 
		$cookie_notice_popup_button      = get_field( 'nxg_cookie_notice_button', 'option' ); 

		if ( isset( $cookie_notice_popup['disable'] ) && ! $cookie_notice_popup['disable'] )  {
			$cookie_notice_description  = nxg_translate( $cookie_notice_popup_description['text'] );
			$cookie_notice_button_label = nxg_translate( $cookie_notice_popup_button['text'] );
			$cookie_notice_script .= "let cookieNotice=!0;cookieNotice&&(gdprCookieNoticeLocales.en={description:'".str_replace( array( "\n", "\r" ), '', $cookie_notice_description )."',settings:'',accept:'".$cookie_notice_button_label."',statement:'',save:'',always_on:'',cookie_essential_title:'',cookie_essential_desc:'',cookie_performance_title:'',cookie_performance_desc:'',cookie_analytics_title:'',cookie_analytics_desc:'',cookie_marketing_title:'',cookie_marketing_desc:''},statement_url='',gdprCookieNotice({locale:'en',timeout:2000,expiration:30,domain:window.location.hostname,implicit:0,statement:statement_url,performance:['JSESSIONID'],analytics:['ga'],marketing:['SSID']}));";
		}

		wp_add_inline_script( 'nexgen-cookie-notice', $cookie_notice_script, 'after' );
		
		$custom_script = '';

		$advanced_custom_script = get_field( 'nxg_advanced_custom_script', 'option' );

		if ( isset( $advanced_custom_script['js'] ) && $advanced_custom_script['js'] ) {
			$custom_script .= $advanced_custom_script['js'];
		}

		wp_add_inline_script( 'nexgen-bootstrap', $custom_script, 'after' );
	}
}

add_action('wp_enqueue_scripts', 'nxg_add_inline_script');

function nxg_enqueue_assets_admin_init() {
	wp_register_style( 'nexgen-init-admin', false );
	wp_enqueue_style( 'nexgen-init-admin' );
	wp_add_inline_style( 'nexgen-init-admin', '.acf-settings-wrap{opacity:0}.toplevel_page_nexgen-theme-settings-global-style:not(body) .wp-menu-image.dashicons-before:before, .toplevel_page_nexgen-release-notes:not(body) .wp-menu-image.dashicons-before:before, .toplevel_page_nexgen-import-demo-data:not(body) .wp-menu-image.dashicons-before:before {content: "N.";width: 100%;height: 100%;padding: 0;border-radius: 0 100px 100px 0;font-family: "Montserrat", sans-serif;font-size: 20px;font-weight: 700;line-height: 35px;letter-spacing: 0;}' );
	wp_register_script( 'nexgen-init-admin', false );
	wp_enqueue_script( 'nexgen-init-admin' );
	wp_add_inline_script( 'nexgen-init-admin', 'jQuery(function($){$(".acf-settings-wrap h1").text("Theme Settings");})', 'after');
}

add_action('admin_init', 'nxg_enqueue_assets_admin_init', 99);

function nxg_enqueue_assets_admin_head() {
	wp_enqueue_style( 'nexgen-admin-icons', get_template_directory_uri() . '/assets/' . 'css/vendor/icons.min.css', array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_style( 'nexgen-admin-main', get_template_directory_uri() . '/assets/' . 'css/admin/main.css', array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_style( 'nexgen-admin-acf', get_template_directory_uri() . '/assets/' . 'css/admin/acf.css', array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_style( 'nexgen-admin-ocdi', get_template_directory_uri() . '/assets/' . 'css/admin/ocdi.css', array(), wp_get_theme('nexgen')->get( 'Version' ));
	wp_enqueue_script( 'nexgen-admin-main', get_template_directory_uri() . '/assets/' . 'js/admin/main.js', array( 'jquery' ), wp_get_theme('nexgen')->get( 'Version' ), 'in_footer' );
	wp_enqueue_script( 'nexgen-admin-acf', get_template_directory_uri() . '/assets/' . 'js/admin/acf.js', array( 'jquery' ), wp_get_theme('nexgen')->get( 'Version' ), 'in_footer' );
}

add_action( 'admin_head', 'nxg_enqueue_assets_admin_head' );