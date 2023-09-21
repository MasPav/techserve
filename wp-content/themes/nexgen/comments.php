<?php
/**
 * @package Nexgen
 */

if ( post_password_required() ) {
	return;
} 

get_template_part( 'template-parts/comments' );