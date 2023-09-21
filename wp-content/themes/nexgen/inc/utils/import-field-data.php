<?php
/**
 * @package Nexgen
 */

function nxg_add_header() {
	
  // Header
  if ( ! nxg_has_header() ) {

    // To Bar [left]
    add_row(
      'field_5e9fcfb4bdd86', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fas fa-clock',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => __( 'Open Hours: Mon - Sat - 9:00 - 18:00', 'nexgen' ), 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    // To Bar [right]
    add_row(
      'field_5fac420e1d40e', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fas fa-phone-alt',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => esc_html( '+1 (305) 1234-5678' ), 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    add_row(
      'field_5fac420e1d40e', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fas fa-envelope',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => esc_html( 'hello@example.com' ), 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    add_row(
      'field_5fac420e1d40e', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fab fa-facebook-f',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => '', 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    add_row(
      'field_5fac420e1d40e', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fab fa-twitter',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => '', 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    add_row(
      'field_5fac420e1d40e', array(
        'acf_fc_layout' => 'link_with_icon', 
        'icon_style'    => 'Awesome Icon', 
        'icon_fa'       => 'fab fa-linkedin-in',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => '', 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    // Navbar [left]
    add_row(
      'field_5fac7a2d9e0cc', array(
        'acf_fc_layout' => 'brand',
      ), 
      'option'
    );

    // Navbar [right]
    add_row(
      'field_6026a4f6efdfd', array(
        'acf_fc_layout' => 'menu', 
        'location'      => 'menu-1'
      ), 
      'option'
    );
    
    add_row(
      'field_6026a4f6efdfd', array(
        'acf_fc_layout'   => 'search_icon',
        'show_in_desktop' => true,
        'show_in_tablet'  => true,
        'show_in_mobile'  => false
      ), 
      'option'
    );
    
    add_row(
      'field_6026a4f6efdfd', array(
        'acf_fc_layout'   => 'button',
        'show_in_desktop' => true,
        'show_in_tablet'  => true,
        'show_in_mobile'  => false,	
        'button_style  '  => 'primary',			
        'link'            => array( 'url' => esc_url( '#' ), 'title' => __( 'CONTACT US', 'nexgen' ), 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );
  }
}

function nxg_add_footer() {

  // Footer
  if ( ! nxg_has_footer() ) {

    // Footer [columns]
    add_row(
      'field_60064223331ba', array(
        'acf_fc_layout' => 'link_list',
        'heading'       => __( 'Company', 'nexgen' ),
        'menu'          => 'menu-2',
      ), 
      'option'
    );

    add_row(
      'field_60064223331ba', array(
        'acf_fc_layout' => 'link_list',
        'heading'       => __( 'Services', 'nexgen' ),
        'menu'          => 'menu-3',
      ), 
      'option'
    );

    add_row(
      'field_60064223331ba', array(
        'acf_fc_layout' => 'link_list',
        'heading'       => __( 'Support', 'nexgen' ),
        'menu'          => 'menu-4',
      ), 
      'option'
    );

    // Bottom Bar [left]
    add_row(
      'field_5fbd60b0a95dd', array(
        'acf_fc_layout' => 'link',
        'link'          => array( 'url' => esc_url( '#' ), 'title' => get_bloginfo( 'name' ), 'target' => esc_attr( '_self' ) ),
      ), 
      'option'
    );

    // Bottom Bar [right]
    add_row(
      'field_5fbd60b0a99c8', array(
        'acf_fc_layout' => 'link',
        'link'          => array( 'url' => esc_url( 'https://wordpress.org' ), 'title' => __( 'Explore more themes like this on the <a href="https://codings.dev" target="_blank" rel="nofollow noopener">Author Page</a>..', 'nexgen' ) . bloginfo( 'description' ), 'target' => esc_attr( '_blank' ) ),
      ), 
      'option'
    );
  }
}