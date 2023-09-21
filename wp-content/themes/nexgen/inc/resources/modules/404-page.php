<?php
/**
 * @package Nexgen
 */
	
// Intro [heading]
nxg_get_text_style( 
	get_field( 'nxg_404_page_intro_h6', 'option' ), 
	'.page404 .intro-item h6', 
	'page404-intro-h6' 
);

// Intro [search Term]
nxg_get_text_style( 
	get_field( 'nxg_404_page_intro_h3', 'option' ), 
	'.page404 .intro-item h3', 
	'page404-intro-h3' 
);

// Intro [description]
nxg_get_text_style( 
	get_field( 'nxg_404_page_intro_p', 'option' ), 
	'.page404 .intro-item p', 
	'page404-intro-p' 
);

// Intro [button]
nxg_get_button_style( 
	get_field( 'nxg_404_page_intro_button', 'option' ), 
	'.page404 .intro-item .primary-button, .page404 .intro-item .primary-button:visited, .page404 .intro-item .primary-button:active, .page404 .intro-item .secondary-button, .page404 .intro-item .secondary-button:visited, .page404 .intro-item .secondary-button:active, .page404 .intro-item input[type="submit"]', 
	'.page404 .intro-item .primary-button:hover, .page404 .intro-item .secondary-button:hover, .page404 .intro-item input[type="submit"]:hover', 
	'page404-intro-button' 
);

// Intro [field]
nxg_get_field_style( 
	get_field( 'nxg_404_page_intro_field', 'option' ), 
	'.page404 .intro-item input, .page404 .intro-item textarea, .page404 .intro-item select',
	'.page404 .intro-item input:hover, .page404 .intro-item textarea:hover, .page404 .intro-item select:hover, .page404 .intro-item input:focus, .page404 .intro-item textarea:focus, .page404 .intro-item select:focus',
	'.page404 .intro-item input::placeholder, .page404 .intro-item textarea::placeholder, .page404 .intro-item select::placeholder',
	'page404-intro-field' 
);

// Content [section]
nxg_get_section_style(
	get_field( 'nxg_404_page_content_section', 'option' ),
	'section.page404',
	'section.page404 .container'
);