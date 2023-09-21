<?php
/**
 * @package Nexgen
 */

// Theme
nxg_get_theme_style();

// Section
nxg_get_section_style( 
	get_field( 'nxg_global_style_section', 'option' ), 
	'body' 
);

// Paragraph
nxg_get_text_style( 
	get_field( 'nxg_global_style_p', 'option' ), 
	'body, p, ul, ol', 
	'global-body' 
);

// Headings
nxg_get_text_style( get_field( 'nxg_global_style_h1', 'option' ), 'h1', 'global-h1' );
nxg_get_text_style( get_field( 'nxg_global_style_h2', 'option' ), 'h2', 'global-h2' );
nxg_get_text_style( get_field( 'nxg_global_style_h3', 'option' ), 'h3', 'global-h3' );
nxg_get_text_style( get_field( 'nxg_global_style_h4', 'option' ), 'h4', 'global-h4' );
nxg_get_text_style( get_field( 'nxg_global_style_h5', 'option' ), 'h5', 'global-h5' );
nxg_get_text_style( get_field( 'nxg_global_style_h6', 'option' ), 'h6', 'global-h6' );

// Link
nxg_get_link_style(
	get_field( 'nxg_global_style_link', 'option' ), 
	'a, a:not(.btn)', 
	'a:hover, a:not(.btn):hover', 
	'global-link' 
);

// Button
nxg_get_button_style( 
	get_field( 'nxg_global_style_button', 'option' ), 
	'.primary-button, .primary-button:visited, .primary-button:active, .secondary-button, .secondary-button:visited, .secondary-button:active, input[type="submit"]', 
	'.primary-button:hover, .secondary-button:hover, input[type="submit"]:hover', 
	'global-button' 
);

// Field
nxg_get_field_style( 
	get_field( 'nxg_global_style_field', 'option' ), 
	'input, textarea, select',
	'input:hover, textarea:hover, select:hover, input:focus, textarea:focus, select:focus',
	'input::placeholder, textarea::placeholder, select::placeholder',
	'global-field' 
);