<?php
/**
 * @package Nexgen
 */

// Block
nxg_get_block_style( 
	get_field( 'nxg_sroll_to_top_block', 'option' ), 
	'.scroll-to-top i' 
);

// Icon
nxg_get_icon_style( 
	get_field( 'nxg_sroll_to_top_icon', 'option' ), 
	'.scroll-to-top i', 
	'.scroll-to-top i:hover'
);