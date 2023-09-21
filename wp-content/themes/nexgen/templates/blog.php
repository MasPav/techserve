<?php
/**
 * Template Name: Nexgen Blog
 * @package Nexgen
 */

get_header();

while ( have_posts() ) {
	the_post();
}

get_template_part( 'template-parts/archive' );

get_footer();