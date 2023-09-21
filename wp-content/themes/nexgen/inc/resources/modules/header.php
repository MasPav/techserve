<?php
/**
 * @package Nexgen
 */

// Top Bar [section]
nxg_get_section_style( 
	get_field( 'nxg_top_bar_section', 'option' ), 
	'.navbar.top', 
	'.navbar.top .container' 
);

// Top Bar [link]
nxg_get_link_style( 
	get_field( 'nxg_top_bar_link', 'option' ), 
	'.navbar.top .navbar-nav .nav-item a:not(.btn)', 
	'.navbar.top .navbar-nav .nav-item a:not(.btn):hover', 
	'top-bar-link' 
);

// Navbar [section]
nxg_get_section_style( 
	get_field( 'nxg_navbar_section', 'option' ), 
	'.navbar.sub', 
	'.navbar.sub .container' 
);

// Navbar [logo]
nxg_get_image_style( 
	get_field( 'nxg_navbar_image', 'option' ), 
	'header .navbar-expand .navbar-brand img'
);

// Navbar [link]
nxg_get_link_style( 
	get_field( 'nxg_navbar_link', 'option' ), 
	'.navbar.sub .navbar-nav .nav-item a:not(.btn)', 
	'.navbar.sub .navbar-nav .nav-item a:not(.btn).active, .navbar.sub .navbar-nav .nav-item a:not(.btn):hover', 
	'navbar-link',
	'.navbar.sub .navbar-nav .nav-item .btn, header .navbar-expand .navbar-brand'
);

// Navbar [button]
nxg_get_button_style( 
	get_field( 'nxg_navbar_button', 'option' ), 
	'.navbar.sub .primary-button, .navbar.sub .primary-button:visited, .navbar.sub .primary-button:active, .navbar.sub .secondary-button, .navbar.sub .secondary-button:visited, .navbar.sub .secondary-button:active', 
	'.navbar.sub .primary-button:hover, .navbar.sub .secondary-button:hover', 
	'navbar-button' 
);

// Menu Responsive [section]
nxg_get_section_style( 
	get_field( 'nxg_menu_section', 'option' ), 
	'.modal-menu .modal-content'
);

// Menu Responsive [link]
nxg_get_link_style( 
	get_field( 'nxg_menu_link', 'option' ), 
	'.modal-menu .modal-content a:not(.btn)', 
	'.modal-menu .modal-content a:not(.btn):hover', 
	'menu-link' 
);

// Menu Responsive [button]
nxg_get_button_style( 
	get_field( 'nxg_menu_button', 'option' ), 
	'.modal-menu .primary-button, .modal-menu .primary-button:visited, .modal-menu .primary-button:active, .modal-menu .secondary-button, .modal-menu .secondary-button:visited, .modal-menu .secondary-button:active', 
	'.modal-menu .primary-button:hover, .modal-menu .secondary-button:hover', 
	'menu-button' 
);

// Menu Responsive [icon]
nxg_get_icon_style( 
	get_field( 'nxg_menu_icon', 'option' ), 
	'.modal-menu .icon-close', 
	'.modal-menu .icon-close:hover'
);