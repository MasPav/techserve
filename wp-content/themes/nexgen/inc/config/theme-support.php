<?php
/**
 * @package Nexgen
 */
	
function nxg_support() {

	load_theme_textdomain( 'nexgen', get_template_directory() . '/languages' );

	register_nav_menus( array( 'menu-1' => esc_html__( 'Menu 1', 'nexgen' ) ) );

	if ( nxg_required_plugins() ) {

		register_nav_menus( array( 'menu-2' => esc_html__( 'Menu 2', 'nexgen' ) ) );
		register_nav_menus( array( 'menu-3' => esc_html__( 'Menu 3', 'nexgen' ) ) );
		register_nav_menus( array( 'menu-4' => esc_html__( 'Menu 4', 'nexgen' ) ) );
		register_nav_menus( array( 'menu-5' => esc_html__( 'Menu 5', 'nexgen' ) ) );
	}

	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 120,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'nxg_support' );

function nxg_widgets_init() {

	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar 1', 'nexgen' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here. You can display this sidebar on the blog, posts, pages, and portfolio.', 'nexgen' ),
			'before_widget' => '<div id="%1$s" class="row item widget %2$s"><div class="col-12 p-0 align-self-center">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>',
		)
	);

	if ( nxg_required_plugins() ) {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 2', 'nexgen' ),
				'id'            => 'sidebar-2',
				'description'   => esc_html__( 'Add widgets here. You can display this sidebar on the blog, posts, pages, and portfolio.', 'nexgen' ),
				'before_widget' => '<div id="%1$s" class="row item widget %2$s"><div class="col-12 p-0 align-self-center">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="title">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 3', 'nexgen' ),
				'id'            => 'sidebar-3',
				'description'   => esc_html__( 'Add widgets here. You can display this sidebar on the blog, posts, pages, and portfolio.', 'nexgen' ),
				'before_widget' => '<div id="%1$s" class="row item widget %2$s"><div class="col-12 p-0 align-self-center">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="title">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 4', 'nexgen' ),
				'id'            => 'sidebar-4',
				'description'   => esc_html__( 'Add widgets here. You can display this sidebar on the blog, posts, pages, and portfolio.', 'nexgen' ),
				'before_widget' => '<div id="%1$s" class="row item widget %2$s"><div class="col-12 p-0 align-self-center">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="title">',
				'after_title'   => '</h4>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar 5', 'nexgen' ),
				'id'            => 'sidebar-5',
				'description'   => esc_html__( 'Add widgets here. This sidebar is reserved for WooCommerce pages.', 'nexgen' ),
				'before_widget' => '<div id="%1$s" class="row item widget %2$s"><div class="col-12 p-0 align-self-center">',
				'after_widget'  => '</div></div>',
				'before_title'  => '<h4 class="title">',
				'after_title'   => '</h4>',
			)
		);

	}
}

add_action( 'widgets_init', 'nxg_widgets_init' );

function nxg_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nxg_content_width', 780 );
} 

add_action( 'after_setup_theme', 'nxg_content_width', 0 );

function nxg_image_threshold( $imagesize, $file, $attachment_id ){
	return 3600;
}

add_filter( 'big_image_size_threshold', 'nxg_image_threshold', 10, 3 );

function nxg_excerpt_length( $length ) {
  return 20;
}

add_filter( 'excerpt_length', 'nxg_excerpt_length', 999 );

function nxg_excerpt_more( $more ) {
  return '...';
}

add_filter( 'excerpt_more', 'nxg_excerpt_more' );

function nxg_pingback_header() {
	
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

add_action( 'wp_head', 'nxg_pingback_header' );

if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}