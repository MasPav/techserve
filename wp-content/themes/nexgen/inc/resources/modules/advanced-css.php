<?php
/**
 * @package Nexgen
 */

$field = get_field( 'nxg_advanced_custom_style', 'option' );

if ( $field ) {
	$style = "\n/* Advanced CSS */\n";
	$style .= $field['css'];
	$GLOBALS['custom_style'] .= $style;
}