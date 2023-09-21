<?php
/**
 * @package Nexgen
 */

// Section
nxg_get_section_style( 
	get_field( 'nxg_cookie_notice_section', 'option' ), 
	'body .gdpr-cookie-notice' 
);

// Description
nxg_get_text_style( 
	get_field( 'nxg_cookie_notice_p', 'option' ), 
	'body .gdpr-cookie-notice p', 
	'cookie-notice-p' 
);

// Button
nxg_get_button_style( 
	get_field( 'nxg_cookie_notice_button', 'option' ), 
	'.gdpr-cookie-notice a.gdpr-cookie-notice-nav-item-btn.btn.primary-button', 
	'.gdpr-cookie-notice a.gdpr-cookie-notice-nav-item-btn.btn.primary-button:hover', 
	'cookie-notice-button' 
);