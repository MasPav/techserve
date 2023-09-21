<?php
/**
 * @package Nexgen
 */

// Hero [section]
nxg_get_section_style( 
	get_field( 'nxg_portfolio_hero_section', 'option' ),
	'.page-template-portfolio section.hero, .tax-nexgen-portfolio-category section.hero, .tax-nexgen-portfolio-tag section.hero', 
	'.page-template-portfolio section.hero .slide-center, .tax-nexgen-portfolio-category section.hero .slide-center, .tax-nexgen-portfolio-tag section.hero .slide-center' 
);

// Hero [divider]
nxg_get_divider_style( 
	get_field( 'nxg_portfolio_hero_divider', 'option' ),
	'.page-template-portfolio .divider svg ellipse, .tax-nexgen-portfolio-category .divider svg ellipse, .tax-nexgen-portfolio-tag .divider svg ellipse'
);

// Hero [heading]
nxg_get_text_style( 
	get_field( 'nxg_portfolio_hero_h1', 'option' ), 
	'.page-template-portfolio section.hero h1, .tax-nexgen-portfolio-category section.hero h1, .tax-nexgen-portfolio-tag section.hero h1', 
	'portfolio-hero-h1' 
);

// Breadcrumb [link]
nxg_get_link_style( 
	get_field( 'nxg_portfolio_breadcrumb_link', 'option' ), 
	'.page-template-portfolio .breadcrumb-item, .page-template-portfolio .breadcrumb-item a:not(.btn), .page-template-portfolio .breadcrumb-item+.breadcrumb-item::before, .tax-nexgen-portfolio-category .breadcrumb-item, .tax-nexgen-portfolio-category .breadcrumb-item a:not(.btn), .tax-nexgen-portfolio-category .breadcrumb-item+.breadcrumb-item::before, .tax-nexgen-portfolio-tag .breadcrumb-item, .tax-nexgen-portfolio-tag .breadcrumb-item a:not(.btn), .tax-nexgen-portfolio-tag .breadcrumb-item+.breadcrumb-item::before', 
	'.page-template-portfolio .breadcrumb-item.active, .page-template-portfolio .breadcrumb-item a:not(.btn):hover, .tax-nexgen-portfolio-category .breadcrumb-item.active, .tax-nexgen-portfolio-category .breadcrumb-item a:not(.btn):hover, .tax-nexgen-portfolio-tag .breadcrumb-item.active, .tax-nexgen-portfolio-tag .breadcrumb-item a:not(.btn):hover', 
	'portfolio-hero-link' 
);

// Content Area [section]
nxg_get_section_style( 
	get_field( 'nxg_portfolio_content_section', 'option' ),
	'.page-template-portfolio section.showcase, .tax-nexgen-portfolio-category section.showcase, .tax-nexgen-portfolio-tag section.showcase', 
	'.page-template-portfolio section.showcase .container, .tax-nexgen-portfolio-category section.showcase .container, .tax-nexgen-portfolio-tag section.showcase .container' 
);

// Content Area [pagination]
nxg_get_pagination_style( 
	get_field( 'nxg_portfolio_content_pagination', 'option' ), 
	'.page-template-portfolio .page-numbers, .page-template-portfolio a.page-numbers:link:not(.btn), .tax-nexgen-portfolio-category .page-numbers, .tax-nexgen-portfolio-category a.page-numbers:link:not(.btn), .tax-nexgen-portfolio-tag .page-numbers, .tax-nexgen-portfolio-tag a.page-numbers:link:not(.btn)',
	'.page-template-portfolio .page-numbers.current, .tax-nexgen-portfolio-category .page-numbers.current, .tax-nexgen-portfolio-tag .page-numbers.current',
	'.page-template-portfolio a.page-numbers:link:not(.btn):hover, .tax-nexgen-portfolio-category a.page-numbers:link:not(.btn):hover, .tax-nexgen-portfolio-tag a.page-numbers:link:not(.btn):hover'
);

// Post Item [block]
nxg_get_block_style( 
	get_field( 'nxg_portfolio_post_item_block', 'option' ),
	'.page-template-portfolio .showcase .card .image-over:before, .tax-nexgen-portfolio-category .showcase .card .image-over:before, .tax-nexgen-portfolio-tag .showcase .card .image-over:before', 
	'.page-template-portfolio .showcase .card .image-over img, .tax-nexgen-portfolio-category .showcase .card .image-over img, .tax-nexgen-portfolio-tag .showcase .card .image-over img' 
);

// Post Item [heading]
nxg_get_text_style( 
	get_field( 'nxg_portfolio_post_item_h4', 'option' ), 
	'.page-template-portfolio .showcase .card .card-body h4, .tax-nexgen-portfolio-category .showcase .card .card-body h4, .tax-nexgen-portfolio-tag .showcase .card .card-body h4', 
	'portfolio-post-item-h4' 
);

// Post Item [excerpt]
nxg_get_text_style( 
	get_field( 'nxg_portfolio_post_item_p', 'option' ), 
	'.page-template-portfolio .showcase .card:hover .card-body p, .tax-nexgen-portfolio-category .showcase .card:hover .card-body p, .tax-nexgen-portfolio-tag .showcase .card:hover .card-body p', 
	'portfolio-post-item-p' 
);

// Post Item [link]
nxg_get_link_style( 
	get_field( 'nxg_portfolio_post_item_link', 'option' ), 
	'.page-template-portfolio .showcase .card-footer a:not(.btn), .tax-nexgen-portfolio-category .showcase .card-footer a:not(.btn), .tax-nexgen-portfolio-tag .showcase .card-footer a:not(.btn)', 
	'.page-template-portfolio .showcase .card-footer a:not(.btn):hover, .tax-nexgen-portfolio-category .showcase .card-footer a:not(.btn):hover, .tax-nexgen-portfolio-tag .showcase .card-footer a:not(.btn):hover', 
	'portfolio-post-item-link' 
);

// Sidebar [heading]
nxg_get_text_style( 
	get_field( 'nxg_portfolio_sidebar_h4', 'option' ), 
	'.page-template-portfolio .sidebar h4, .tax-nexgen-portfolio-category .sidebar h4, .tax-nexgen-portfolio-tag .sidebar h4', 
	'portfolio-sidebar-h4' 
);

// Sidebar [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_portfolio_sidebar_p', 'option' ), 
	'.page-template-portfolio .sidebar, .tax-nexgen-portfolio-category .sidebar, .tax-nexgen-portfolio-tag .sidebar', 
	'portfolio-sidebar-p' 
);

// Sidebar [link]
nxg_get_link_style( 
	get_field( 'nxg_portfolio_sidebar_link', 'option' ), 
	'.page-template-portfolio .sidebar a:not(.btn), .tax-nexgen-portfolio-category .sidebar a:not(.btn), .tax-nexgen-portfolio-tag .sidebar a:not(.btn)', 
	'.page-template-portfolio .sidebar a:not(.btn):hover, .tax-nexgen-portfolio-category .sidebar a:not(.btn):hover, .tax-nexgen-portfolio-tag .sidebar a:not(.btn):hover', 
	'portfolio-sidebar-link' 
);

// Sidebar
nxg_get_button_style( 
	get_field( 'nxg_portfolio_sidebar_button', 'option' ), 
	'.page-template-portfolio .sidebar input[type="submit"], .tax-nexgen-portfolio-category .sidebar input[type="submit"], .tax-nexgen-portfolio-tag .sidebar input[type="submit"]', 
	'.page-template-portfolio .sidebar input[type="submit"]:hover, .tax-nexgen-portfolio-category .sidebar input[type="submit"]:hover, .tax-nexgen-portfolio-tag .sidebar input[type="submit"]:hover', 
	'portfolio-sidebar-button' 
);

// Sidebar
nxg_get_field_style( 
	get_field( 'nxg_portfolio_sidebar_field', 'option' ), 
	'.page-template-portfolio .sidebar input, .tax-nexgen-portfolio-category .sidebar input, .tax-nexgen-portfolio-tag .sidebar input', 
	'.page-template-portfolio .sidebar input:hover, .page-template-portfolio .sidebar input:focus, .tax-nexgen-portfolio-category .sidebar input:hover, .tax-nexgen-portfolio-category .sidebar input:focus, .tax-nexgen-portfolio-tag .sidebar input:hover, .tax-nexgen-portfolio-tag .sidebar input:focus',
	'.page-template-portfolio .sidebar input::placeholder, .tax-nexgen-portfolio-category .sidebar input::placeholder, .tax-nexgen-portfolio-tag .sidebar input::placeholder', 
	'portfolio-sidebar-field' 
);