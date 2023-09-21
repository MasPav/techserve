<?php
/**
 * @package Nexgen
 */

// Hero [section]
nxg_get_section_style( 
	get_field( 'nxg_blog_hero_section', 'option' ),
	'.blog section.hero, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) section.hero, .page-template-blog section.hero', 
	'.blog section.hero .slide-center, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) section.hero .slide-center, .page-template-blog section.hero .slide-center' 
);

// Hero [divider]
nxg_get_divider_style( 
	get_field( 'nxg_blog_hero_divider', 'option' ),
	'.blog .divider svg ellipse, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .divider svg ellipse, .page-template-blog .divider svg ellipse'
);

// Hero [heading]
nxg_get_text_style( 
	get_field( 'nxg_blog_hero_h1', 'option' ), 
	'.blog section.hero h1, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) section.hero h1, .page-template-blog section.hero h1', 
	'blog-hero-h1' 
);

// Breadcrumb [link]
nxg_get_link_style( 
	get_field( 'nxg_blog_breadcrumb_link', 'option' ), 
	'.blog .breadcrumb-item a:not(.btn), .blog .breadcrumb-item.active, .blog .breadcrumb-item+.breadcrumb-item::before, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .breadcrumb-item a:not(.btn), .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .breadcrumb-item.active, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .breadcrumb-item+.breadcrumb-item::before, .page-template-blog .breadcrumb-item a:not(.btn), .page-template-blog .breadcrumb-item.active, .page-template-blog .breadcrumb-item+.breadcrumb-item::before', 
	'.blog .breadcrumb-item.active, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .breadcrumb-item.active, .page-template-blog .breadcrumb-item.active, .blog .breadcrumb-item a:not(.btn):hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .breadcrumb-item a:not(.btn):hover, .page-template-blog .breadcrumb-item a:not(.btn):hover', 
	'blog-hero-link' 
);

// Content Area [section]
nxg_get_section_style( 
	get_field( 'nxg_blog_content_section', 'option' ),
	'.blog section.showcase, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) section.showcase, .page-template-blog section.showcase', 
	'.blog section.showcase .container, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) section.showcase .container, .page-template-blog section.showcase .container' 
);

// Content Area [pagination]
nxg_get_pagination_style( 
	get_field( 'nxg_blog_content_pagination', 'option' ), 
	'.blog .page-numbers, .blog a.page-numbers:link:not(.btn), .archive .page-numbers, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) a.page-numbers:link:not(.btn), .page-template-blog .page-numbers, .page-template-blog a.page-numbers:link:not(.btn)',
	'.blog .page-numbers.current, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .page-numbers.current, .page-template-blog .page-numbers.current',
	'.blog a.page-numbers:link:not(.btn):hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) a.page-numbers:link:not(.btn):hover, .page-template-blog a.page-numbers:link:not(.btn):hover'
);

// Post Item [block]
nxg_get_block_style( 
	get_field( 'nxg_blog_post_item_block', 'option' ),
	'.blog .showcase .card .image-over:before, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card .image-over:before, .page-template-blog .showcase .card .image-over:before', 
	'.blog .showcase .card .image-over img, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card .image-over img, .page-template-blog .showcase .card .image-over img' 
);

// Post Item [heading]
nxg_get_text_style( 
	get_field( 'nxg_blog_post_item_h4', 'option' ), 
	'.blog .showcase .card .card-body h4, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card .card-body h4, .page-template-blog .showcase .card .card-body h4', 
	'blog-post-item-h4' 
);

// Post Item [excerpt]
nxg_get_text_style( 
	get_field( 'nxg_blog_post_item_p', 'option' ), 
	'.blog .showcase .card .card-body p, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card .card-body p, .page-template-blog .showcase .card .card-body p', 
	'blog-post-item-p' 
);

// Post Item [link]
nxg_get_link_style( 
	get_field( 'nxg_blog_post_item_link', 'option' ), 
	'.blog .showcase .card-footer a:not(.btn), .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card-footer a:not(.btn), .page-template-blog .showcase .card-footer a:not(.btn)', 
	'.blog .showcase .card-footer a:not(.btn):hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .showcase .card-footer a:not(.btn):hover, .page-template-blog .showcase .card-footer a:not(.btn):hover', 
	'blog-post-item-link' 
);

// Sidebar [heading]
nxg_get_text_style( 
	get_field( 'nxg_blog_sidebar_h4', 'option' ), 
	'.blog .sidebar h4, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar h4, .page-template-blog .sidebar h4', 
	'blog-sidebar-h4' 
);

// Sidebar [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_blog_sidebar_p', 'option' ), 
	'.blog .sidebar, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar, .page-template-blog .sidebar', 
	'blog-sidebar-p' 
);

// Sidebar [link]
nxg_get_link_style( 
	get_field( 'nxg_blog_sidebar_link', 'option' ), 
	'.blog .sidebar a:not(.btn), .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar a:not(.btn), .page-template-blog .sidebar a:not(.btn)', 
	'.blog .sidebar a:not(.btn):hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar a:not(.btn):hover, .page-template-blog .sidebar a:not(.btn):hover', 
	'blog-sidebar-link' 
);

// Sidebar
nxg_get_button_style( 
	get_field( 'nxg_blog_sidebar_button', 'option' ), 
	'.blog .sidebar input[type="submit"], .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input[type="submit"], .page-template-blog .sidebar input[type="submit"]', 
	'.blog .sidebar input[type="submit"]:hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input[type="submit"]:hover, .page-template-blog .sidebar input[type="submit"]:hover', 
	'blog-sidebar-button' 
);

// Sidebar
nxg_get_field_style( 
	get_field( 'nxg_blog_sidebar_field', 'option' ), 
	'.blog .sidebar input, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input, .page-template-blog .sidebar input', 
	'.blog .sidebar input:hover, .blog .sidebar input:focus, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input:hover, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input:focus, .page-template-blog .sidebar input:hover, .page-template-blog .sidebar input:focus',
	'.blog .sidebar input::placeholder, .archive:not(.tax-nexgen-portfolio-category, .tax-nexgen-portfolio-tag) .sidebar input::placeholder, .page-template-blog .sidebar input::placeholder', 
	'blog-sidebar-field' 
);