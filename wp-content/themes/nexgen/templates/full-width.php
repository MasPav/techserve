<?php
/**
 * Template Name: Nexgen Full Width
 * Template Post Type: post, page, nexgen-portfolio
 * @package Nexgen
 */

get_header(); 

while ( have_posts() ) {

	the_post();
	the_content();
						
	wp_link_pages( array(
		'before' => '<div class="clearfix"></div><div class="ml-0 page-links">',
		'after'  => '</div>',
	) );

	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();