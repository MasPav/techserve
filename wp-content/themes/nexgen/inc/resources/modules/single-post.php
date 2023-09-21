<?php
/**
 * @package Nexgen
 */

// Hero [section]
nxg_get_section_style( 
	get_field( 'nxg_single_post_hero_section', 'option' ),
	'.single-post section.hero', 
	'.single-post section.hero .slide-center' 
);

// Hero [divider]
nxg_get_divider_style( 
	get_field( 'nxg_single_post_hero_divider', 'option' ),
	'.single-post .divider svg ellipse'
);

// Hero [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_post_hero_h1', 'option' ), 
	'.single-post section.hero h1', 
	'single-post-hero-h1' 
);

// Breadcrumb [link]
nxg_get_link_style( 
	get_field( 'nxg_single_post_breadcrumb_link', 'option' ), 
	'.single-post .breadcrumb-item, .single-post .breadcrumb-item a:not(.btn), .single-post .breadcrumb-item+.breadcrumb-item::before', 
	'.single-post .breadcrumb-item.active, .single-post .breadcrumb-item a:not(.btn):hover', 
	'single-post-hero-link' 
);

// Content Area [section]
nxg_get_section_style( 
	get_field( 'nxg_single_post_content_section', 'option' ),
	'.single-post section.single', 
	'.single-post section.single .container' 
);

// Metadata [link]
nxg_get_link_style( 
	get_field( 'nxg_single_post_metadata_link', 'option' ), 
	'.single-post:not(.content-section) .post-meta a:not(.btn)', 
	'.single-post:not(.content-section) .post-meta a:not(.btn):hover', 
	'single-post-metadata-link' 
);

// Metadata [icon]
nxg_get_icon_style( 
	get_field( 'nxg_single_post_metadata_icon', 'option' ), 
	'.single-post:not(.content-section) .post-meta i'
);

// Categories [button]
nxg_get_button_style( 
	get_field( 'nxg_single_post_categories_button', 'option' ), 
	'.single-post:not(.content-section) .badges .badge', 
	'.single-post:not(.content-section) .badges .badge:hover', 
	'single-post-categories-button' 
);

// Tags [icon]
nxg_get_icon_style( 
	get_field( 'nxg_single_post_tags_icon', 'option' ), 
	'.single-post:not(.content-section) .block-tags i'
);

// Tags [link]
nxg_get_link_style( 
	get_field( 'nxg_single_post_tags_link', 'option' ), 
	'.single-post:not(.content-section) .block-tags a:not(.btn)', 
	'.single-post:not(.content-section) .block-tags a:not(.btn):hover', 
	'single-post-tags-link' 
);

// Comments [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_post_comments_h3', 'option' ), 
	'.single-post:not(.content-section) .comments h3, .single-post:not(.content-section) .comments h3 a:not(.btn)', 
	'single-post-comments-h3' 
);

// Comments [author name]
nxg_get_text_style( 
	get_field( 'nxg_single_post_comments_h4', 'option' ), 
	'.single-post:not(.content-section) .comments h4.comment-author, .single-post:not(.content-section) .comments h4.comment-author a:not(.btn)', 
	'single-post-comments-h4' 
);

// Comments [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_post_comments_p', 'option' ), 
	'.single-post:not(.content-section) .comments, .single-post:not(.content-section) .comments p, .single-post:not(.content-section) .comments span', 
	'single-post-comments-p' 
);

// Comments [link]
nxg_get_link_style( 
	get_field( 'nxg_single_post_comments_link', 'option' ), 
	'.single-post:not(.content-section) .comments a:not(.btn), .single-post:not(.content-section) .comments h3.comment-reply-title a:not(.btn)', 
	'.single-post:not(.content-section) .comments a:not(.btn):hover, .single-post:not(.content-section) .comments h3.comment-reply-title a:not(.btn):hover', 
	'single-post-comments-link' 
);

// Comments [button]
nxg_get_button_style( 
	get_field( 'nxg_single_post_comments_button', 'option' ), 
	'.single-post:not(.content-section) .comments input[type="submit"]', 
	'.single-post:not(.content-section) .comments input[type="submit"]:hover', 
	'single-post-comments-button' 
);

// Comments [field]
nxg_get_field_style( 
	get_field( 'nxg_single_post_comments_field', 'option' ), 
	'.single-post:not(.content-section) .comments input', 
	'.single-post:not(.content-section) .comments input:hover, .single-post:not(.content-section) .comments input:focus',
	'.single-post:not(.content-section) .comments input::placeholder', 
	'single-post-comments-field' 
);

// Sidebar [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_post_sidebar_h4', 'option' ), 
	'.single-post .sidebar h4', 
	'single-post-sidebar-h4' 
);

// Sidebar [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_post_sidebar_p', 'option' ), 
	'.single-post .sidebar', 
	'single-post-sidebar-p' 
);

// Sidebar [link]
nxg_get_link_style( 
	get_field( 'nxg_single_post_sidebar_link', 'option' ), 
	'.single-post .sidebar a:not(.btn)', 
	'.single-post .sidebar a:not(.btn):hover', 
	'single-post-sidebar-link' 
);

// Sidebar
nxg_get_button_style( 
	get_field( 'nxg_single_post_sidebar_button', 'option' ), 
	'.single-post .sidebar input[type="submit"]', 
	'.single-post .sidebar input[type="submit"]:hover', 
	'single-post-sidebar-button' 
);

// Sidebar
nxg_get_field_style( 
	get_field( 'nxg_single_post_sidebar_field', 'option' ), 
	'.single-post .sidebar input', 
	'.single-post .sidebar input:hover, .single-post .sidebar input:focus',
	'.single-post .sidebar input::placeholder', 
	'single-post-sidebar-field' 
);