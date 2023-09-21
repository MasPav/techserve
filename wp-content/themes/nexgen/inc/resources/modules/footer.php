<?php
/**
 * @package Nexgen
 */

// Bottom Bar [section]
nxg_get_section_style( 
	get_field( 'nxg_bottom_bar_section', 'option' ), 
	'.footer .bottom-bar', 
	'.footer .bottom-bar .container' 
);

// Bottom Bar [link]
nxg_get_link_style( 
	get_field( 'nxg_bottom_bar_link', 'option' ), 
	'.footer .bottom-bar .navbar-nav .nav-item a:not(.btn)', 
	'.footer .bottom-bar .navbar-nav .nav-item a:not(.btn):hover', 
	'bottom-bar-link' 
);

// Footer [section]
nxg_get_section_style( 
	get_field( 'nxg_footer_section', 'option' ), 
	'footer .footer.main', 
	'footer .footer.main .container' 
);

// Footer [block] nxg_get_block_style( $field, $elem, $image = null, $item = null )
nxg_get_block_style( 
	get_field( 'nxg_footer_block', 'option' ),
	'footer .footer.main .card',
	'',
	'footer .offers .items .item'
);

// Footer [logo]
nxg_get_image_style( 
	get_field( 'nxg_footer_image', 'option' ), 
	'footer .navbar-brand img'
);

// Footer [heading]
nxg_get_text_style( 
	get_field( 'nxg_footer_h4', 'option' ), 
	'footer .footer.main h4', 
	'footer-main-h4'
);

// Footer [paragraph]
nxg_get_text_style( 
	get_field( 'nxg_footer_p', 'option' ), 
	'footer .footer.main p', 
	'footer-main-p' 
);

// Footer [link]
nxg_get_link_style(
	get_field( 'nxg_footer_link', 'option' ), 
	'footer .footer.main a, .footer.main a:not(.btn)', 
	'footer .footer.main a:hover, .footer.main a:not(.btn):hover', 
	'footer-main-link' 
);

// Footer [button]
nxg_get_button_style( 
	get_field( 'nxg_footer_button', 'option' ), 
	'footer .footer.main .primary-button, .footer.main .primary-button:visited, .footer.main .primary-button:active, .footer.main .secondary-button, .footer.main .secondary-button:visited, .footer.main .secondary-button:active, .footer.main input[type="submit"]', 
	'footer .footer.main .primary-button:hover, .footer.main .secondary-button:hover, .footer.main input[type="submit"]:hover', 
	'footer-main-button' 
);