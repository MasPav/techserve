<?php
/**
 * @package Nexgen
 */

// Hero [section]
nxg_get_section_style( 
	get_field( 'nxg_single_page_hero_section', 'option' ),
	'.page:not(.page-template) section.hero', 
	'.page:not(.page-template) section.hero .slide-center' 
);

// Hero [divider]
nxg_get_divider_style( 
	get_field( 'nxg_single_page_hero_divider', 'option' ),
	'.page:not(.page-template) .divider svg ellipse'
);

// Hero [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_page_hero_h1', 'option' ), 
	'.page:not(.page-template) section.hero h1', 
	'single-page-hero-h1' 
);

// Breadcrumb [link]
nxg_get_link_style( 
	get_field( 'nxg_single_page_hero_link', 'option' ), 
	'.page:not(.page-template) .breadcrumb-item, .page:not(.page-template) .breadcrumb-item a:not(.btn), .page:not(.page-template) .breadcrumb-item+.breadcrumb-item::before', 
	'.page:not(.page-template) .breadcrumb-item.active, .page:not(.page-template) .breadcrumb-item a:not(.btn):hover', 
	'single-page-hero-link' 
);

// Content Area [section]
nxg_get_section_style( 
	get_field( 'nxg_single_page_content_section', 'option' ),
	'.page:not(.page-template) section.single', 
	'.page:not(.page-template) section.single .container' 
);

// Metadata [link]
nxg_get_link_style( 
	get_field( 'nxg_single_page_metadata_link', 'option' ), 
	'.page:not(.page-template) .post-meta a:not(.btn)', 
	'.page:not(.page-template) .post-meta a:not(.btn):hover', 
	'single-page-metadata-link' 
);

// Metadata [icon]
nxg_get_icon_style( 
	get_field( 'nxg_single_page_metadata_icon', 'option' ), 
	'.page:not(.page-template) .post-meta i'
);

// Comments [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_page_comments_h3', 'option' ), 
	'.page:not(.page-template) .comments h3, .page:not(.page-template) .comments h3 a:not(.btn)', 
	'single-page-comments-h3' 
);

// Comments [author name]
nxg_get_text_style( 
	get_field( 'nxg_single_page_comments_h4', 'option' ), 
	'.page:not(.page-template) .comments h4.comment-author, .page:not(.page-template) .comments h4.comment-author a:not(.btn)', 
	'single-page-comments-h4' 
);

// Comments [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_page_comments_p', 'option' ), 
	'.page:not(.page-template) .comments, .page:not(.page-template) .comments p, .page:not(.page-template) .comments span', 
	'single-page-comments-p' 
);

// Comments [link]
nxg_get_link_style( 
	get_field( 'nxg_single_page_comments_link', 'option' ), 
	'.page:not(.page-template) .comments a:not(.btn), .page:not(.page-template) .comments h3.comment-reply-title a:not(.btn)', 
	'.page:not(.page-template) .comments a:not(.btn):hover, .page:not(.page-template) .comments h3.comment-reply-title a:not(.btn):hover', 
	'single-page-comments-link' 
);

// Comments [button]
nxg_get_button_style( 
	get_field( 'nxg_single_page_comments_button', 'option' ), 
	'.page:not(.page-template):not(.content-section) .comments input[type="submit"]', 
	'.page:not(.page-template):not(.content-section) .comments input[type="submit"]:hover', 
	'single-page-comments-button' 
);

// Comments [field]
nxg_get_field_style( 
	get_field( 'nxg_single_page_comments_field', 'option' ), 
	'.page:not(.page-template):not(.content-section) .comments input', 
	'.page:not(.page-template):not(.content-section) .comments input:hover, .page:not(.page-template):not(.content-section) .comments input:focus',
	'.page:not(.page-template):not(.content-section) .comments input::placeholder', 
	'single-page-comments-field' 
);

// Sidebar [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_page_sidebar_h4', 'option' ), 
	'.page:not(.page-template) .sidebar h4', 
	'single-page-sidebar-h4' 
);

// Sidebar [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_page_sidebar_p', 'option' ), 
	'.page:not(.page-template) .sidebar', 
	'single-page-sidebar-p' 
);

// Sidebar [link]
nxg_get_link_style( 
	get_field( 'nxg_single_page_sidebar_link', 'option' ), 
	'.page:not(.page-template) .sidebar a:not(.btn)', 
	'.page:not(.page-template) .sidebar a:not(.btn):hover', 
	'single-page-sidebar-link' 
);

// Sidebar
nxg_get_button_style( 
	get_field( 'nxg_single_page_sidebar_button', 'option' ), 
	'.page:not(.page-template) .sidebar input[type="submit"]', 
	'.page:not(.page-template) .sidebar input[type="submit"]:hover', 
	'single-page-sidebar-button' 
);

// Sidebar
nxg_get_field_style( 
	get_field( 'nxg_single_page_sidebar_field', 'option' ), 
	'.page:not(.page-template) .sidebar input', 
	'.page:not(.page-template) .sidebar input:hover, .page:not(.page-template) .sidebar input:focus',
	'.page:not(.page-template) .sidebar input::placeholder', 
	'single-page-sidebar-field' 
);