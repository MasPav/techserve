<?php
/**
 * @package Nexgen
 */

function nxg_theme_settings() {

  if ( function_exists( 'acf_add_options_page' ) && function_exists( 'acf_add_options_sub_page' ) ) {

    acf_add_options_page(array(
      'page_title' => esc_html__( 'Theme Settings', 'nexgen' ),
      'menu_title' => esc_html__( 'Theme Settings', 'nexgen' ),
      'menu_slug'  => 'nexgen-theme-settings',
      'capability' => 'edit_posts',
      'position'    => '99'
    ) );
  
    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Global Style', 'nexgen' ),
      'menu_title' => esc_html__( 'Global Style', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-global-style',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Header', 'nexgen' ),
      'menu_title' => esc_html__( 'Header', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-header',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Footer', 'nexgen' ),
      'menu_title' => esc_html__( 'Footer', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-footer',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Blog', 'nexgen' ),
      'menu_title' => esc_html__( 'Blog', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-blog',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Single Post', 'nexgen' ),
      'menu_title' => esc_html__( 'Single Post', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-single-post',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Portfolio', 'nexgen' ),
      'menu_title' => esc_html__( 'Portfolio', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-portfolio',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Single Portfolio', 'nexgen' ),
      'menu_title' => esc_html__( 'Single Portfolio', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-single-portfolio',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
        'page_title' => esc_html__( 'Single Page', 'nexgen' ),
        'menu_title' => esc_html__( 'Single Page', 'nexgen' ),
        'menu_slug' => 'nexgen-theme-settings-single-page',
        'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Search', 'nexgen' ),
      'menu_title' => esc_html__( 'Search', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-search',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( '404 Page', 'nexgen' ),
      'menu_title' => esc_html__( '404 Page', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-404-page',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Preloader', 'nexgen' ),
      'menu_title' => esc_html__( 'Preloader', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-preloader',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Scroll To Top', 'nexgen' ),
      'menu_title' => esc_html__( 'Scroll To Top', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-scroll-to-top',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Cookie Notice', 'nexgen' ),
      'menu_title' => esc_html__( 'Cookie Notice', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-cookie',
      'parent_slug' => 'nexgen-theme-settings'
    ) );

    acf_add_options_sub_page( array(
      'page_title' => esc_html__( 'Advanced', 'nexgen' ),
      'menu_title' => esc_html__( 'Advanced', 'nexgen' ),
      'menu_slug' => 'nexgen-theme-settings-advanced',
      'parent_slug' => 'nexgen-theme-settings'
    ) );
  }
}

add_action( 'init', 'nxg_theme_settings' );