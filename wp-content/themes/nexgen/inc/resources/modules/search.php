<?php
/**
 * @package Nexgen
 */

// Intro [heading]
nxg_get_text_style( 
	get_field( 'nxg_search_intro_h6', 'option' ), 
	'.search-results .intro-item h6', 
	'search-intro-h6' 
);

// Intro [search Term]
nxg_get_text_style( 
	get_field( 'nxg_search_intro_h3', 'option' ), 
	'.search-results .intro-item h3', 
	'search-intro-h3' 
);

// Intro [description]
nxg_get_text_style( 
	get_field( 'nxg_search_intro_p', 'option' ), 
	'.search-results .intro-item p', 
	'search-intro-p' 
);

// Intro [button]
nxg_get_button_style( 
	get_field( 'nxg_search_intro_button', 'option' ), 
	'.search-results .intro-item .primary-button, .search-results .intro-item .primary-button:visited, .search-results .intro-item .primary-button:active, .search-results .intro-item .secondary-button, .search-results .intro-item .secondary-button:visited, .search-results .intro-item .secondary-button:active, .search-results .intro-item input[type="submit"]', 
	'.search-results .intro-item .primary-button:hover, .search-results .intro-item .secondary-button:hover, .search-results .intro-item input[type="submit"]:hover', 
	'search-intro-button' 
);

// Intro [field]
nxg_get_field_style( 
	get_field( 'nxg_search_intro_field', 'option' ), 
	'.search-results .intro-item input, .search-results .intro-item textarea, .search-results .intro-item select',
	'.search-results .intro-item input:hover, .search-results .intro-item textarea:hover, .search-results .intro-item select:hover, .search-results .intro-item input:focus, .search-results .intro-item textarea:focus, .search-results .intro-item select:focus',
	'.search-results .intro-item input::placeholder, .search-results .intro-item textarea::placeholder, .search-results .intro-item select::placeholder',
	'search-intro-field' 
);

// Content [section]
nxg_get_section_style(
	get_field( 'nxg_search_content_section', 'option' ),
	'.search-results section.search-results',
	'.search-results section.search-results .container'
);

// Post Item [block]
nxg_get_block_style( 
	get_field( 'nxg_search_post_item_block', 'option' ),
	'.search-results .card'
);

// Post Item [heading]
nxg_get_text_style( 
	get_field( 'nxg_search_post_item_h4', 'option' ), 
	'.search-results .card .card-body h4', 
	'search-post-item-h4' 
);

// Post Item [excerpt]
nxg_get_text_style( 
	get_field( 'nxg_search_post_item_p', 'option' ), 
	'.search-results .card .card-body p', 
	'search-post-item-p' 
);

// Post Item [link]
nxg_get_link_style( 
	get_field( 'nxg_search_post_item_link', 'option' ), 
	'.search-results .card .card-body a:not(.btn)', 
	'.search-results .card .card-body a:not(.btn):hover', 
	'search-post-item-link' 
);

// Modal [section]
nxg_get_section_style(
	get_field( 'nxg_search_modal_section', 'option' ),
	'.modal-search .modal-content'
);

// Modal [heading]
nxg_get_text_style( 
	get_field( 'nxg_search_modal_h2', 'option' ), 
	'.modal-search h2', 
	'search-modal-h2' 
);

// Modal [icon]
nxg_get_icon_style( 
	get_field( 'nxg_search_modal_icon', 'option' ), 
	'.modal-search .icon-close', 
	'.modal-search .icon-close:hover'
);

// Modal [button]
nxg_get_button_style( 
	get_field( 'nxg_search_modal_button', 'option' ), 
	'.modal-search .primary-button, .modal-search .primary-button:visited, .modal-search .primary-button:active, .modal-search .secondary-button, .modal-search .secondary-button:visited, .modal-search .secondary-button:active, .modal-search input[type="submit"]', 
	'.modal-search .primary-button:hover, .modal-search .secondary-button:hover, .modal-search input[type="submit"]:hover', 
	'search-modal-button' 
);

// Modal [field]
nxg_get_field_style( 
	get_field( 'nxg_search_modal_field', 'option' ), 
	'.modal-search input, .modal-search textarea, .modal-search select',
	'.modal-search input:hover, .modal-search textarea:hover, .modal-search select:hover, .modal-search input:focus, .modal-search textarea:focus, .modal-search select:focus',
	'.modal-search input::placeholder, .modal-search textarea::placeholder, .modal-search select::placeholder',
	'search-modal-field' 
);