<?php
/**
 * @package Nexgen
 */

// Hero [section]
nxg_get_section_style( 
	get_field( 'nxg_single_portfolio_hero_section', 'option' ),
	'.single-nexgen-portfolio section.hero', 
	'.single-nexgen-portfolio section.hero .slide-center' 
);

// Hero [divider]
nxg_get_divider_style( 
	get_field( 'nxg_single_portfolio_hero_divider', 'option' ),
	'.single-nexgen-portfolio .divider svg ellipse'
);

// Hero [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_hero_h1', 'option' ), 
	'.single-nexgen-portfolio section.hero h1', 
	'single-portfolio-hero-h1' 
);

// Breadcrumb [link]
nxg_get_link_style( 
	get_field( 'nxg_single_portfolio_breadcrumb_link', 'option' ), 
	'.single-nexgen-portfolio .breadcrumb-item, .single-nexgen-portfolio .breadcrumb-item a:not(.btn), .single-nexgen-portfolio .breadcrumb-item+.breadcrumb-item::before', 
	'.single-nexgen-portfolio .breadcrumb-item.active, .single-nexgen-portfolio .breadcrumb-item a:not(.btn):hover', 
	'single-portfolio-hero-link' 
);

// Content Area [section]
nxg_get_section_style( 
	get_field( 'nxg_single_portfolio_content_section', 'option' ),
	'.single-nexgen-portfolio section.single', 
	'.single-nexgen-portfolio section.single .container' 
);

// Metadata [link]
nxg_get_link_style( 
	get_field( 'nxg_single_portfolio_metadata_link', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .post-meta a:not(.btn)', 
	'.single-nexgen-portfolio:not(.content-section) .post-meta a:not(.btn):hover', 
	'single-portfolio-metadata-link' 
);

// Metadata [icon]
nxg_get_icon_style( 
	get_field( 'nxg_single_portfolio_metadata_icon', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .post-meta i'
);

// Categories [button]
nxg_get_button_style( 
	get_field( 'nxg_single_portfolio_categories_button', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .badges .badge', 
	'.single-nexgen-portfolio:not(.content-section) .badges .badge:hover', 
	'single-portfolio-categories-button' 
);

// Tags [icon]
nxg_get_icon_style( 
	get_field( 'nxg_single_portfolio_tags_icon', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .block-tags i'
);

// Tags [link]
nxg_get_link_style( 
	get_field( 'nxg_single_portfolio_tags_link', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .block-tags a:not(.btn)', 
	'.single-nexgen-portfolio:not(.content-section) .block-tags a:not(.btn):hover', 
	'single-portfolio-tags-link' 
);

// Comments [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_comments_h3', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments h3, .single-nexgen-portfolio:not(.content-section) .comments h3 a:not(.btn)', 
	'single-portfolio-comments-h3' 
);

// Comments [author name]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_comments_h4', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments h4.comment-author, .single-nexgen-portfolio:not(.content-section) .comments h4.comment-author a:not(.btn)', 
	'single-portfolio-comments-h4' 
);

// Comments [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_comments_p', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments, .single-nexgen-portfolio:not(.content-section) .comments p, .single-nexgen-portfolio:not(.content-section) .comments span', 
	'single-portfolio-comments-p' 
);

// Comments [link]
nxg_get_link_style( 
	get_field( 'nxg_single_portfolio_comments_link', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments a:not(.btn), .single-nexgen-portfolio:not(.content-section) .comments h3.comment-reply-title a:not(.btn)', 
	'.single-nexgen-portfolio:not(.content-section) .comments a:not(.btn):hover, .single-nexgen-portfolio:not(.content-section) .comments h3.comment-reply-title a:not(.btn):hover', 
	'single-portfolio-comments-link' 
);

// Comments [button]
nxg_get_button_style( 
	get_field( 'nxg_single_portfolio_comments_button', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments input[type="submit"]', 
	'.single-nexgen-portfolio:not(.content-section) .comments input[type="submit"]:hover', 
	'single-portfolio-comments-button' 
);

// Comments [field]
nxg_get_field_style( 
	get_field( 'nxg_single_portfolio_comments_field', 'option' ), 
	'.single-nexgen-portfolio:not(.content-section) .comments input', 
	'.single-nexgen-portfolio:not(.content-section) .comments input:hover, .single-nexgen-portfolio:not(.content-section) .comments input:focus',
	'.single-nexgen-portfolio:not(.content-section) .comments input::placeholder', 
	'single-portfolio-comments-field' 
);

// Sidebar [heading]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_sidebar_h4', 'option' ), 
	'.single-nexgen-portfolio .sidebar h4', 
	'single-portfolio-sidebar-h4' 
);

// Sidebar [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_single_portfolio_sidebar_p', 'option' ), 
	'.single-nexgen-portfolio .sidebar', 
	'single-portfolio-sidebar-p' 
);

// Sidebar [link]
nxg_get_link_style( 
	get_field( 'nxg_single_portfolio_sidebar_link', 'option' ), 
	'.single-nexgen-portfolio .sidebar a:not(.btn)', 
	'.single-nexgen-portfolio .sidebar a:not(.btn):hover', 
	'single-portfolio-sidebar-link' 
);

// Sidebar
nxg_get_button_style( 
	get_field( 'nxg_single_portfolio_sidebar_button', 'option' ), 
	'.single-nexgen-portfolio .sidebar input[type="submit"]', 
	'.single-nexgen-portfolio .sidebar input[type="submit"]:hover', 
	'single-portfolio-sidebar-button' 
);

// Sidebar
nxg_get_field_style( 
	get_field( 'nxg_single_portfolio_sidebar_field', 'option' ), 
	'.single-nexgen-portfolio .sidebar input', 
	'.single-nexgen-portfolio .sidebar input:hover, .single-nexgen-portfolio .sidebar input:focus',
	'.single-nexgen-portfolio .sidebar input::placeholder', 
	'single-portfolio-sidebar-field' 
);