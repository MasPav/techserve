<?php
/**
 * @package Nexgen
 */

// Section
nxg_get_section_style( 
	get_field( 'nxg_preloader_section', 'option' ), 
	'.preloader' 
);

// Counter
nxg_get_text_style( 
	get_field( 'nxg_preloader_span', 'option' ), 
	'.counter.preloader .radial span, .counter.preloader .radial span i', 
	'preloader-span' 
);