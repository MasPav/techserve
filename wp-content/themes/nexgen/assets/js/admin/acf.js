/*----------------------------------------------
*
* [ACF Scripts]
*
* Theme    : Nexgen
* Version  : 1.0
* Author   : Codings
* Support  : codings.dev
* 
----------------------------------------------*/

/*----------------------------------------------

[ALL CONTENTS]

1. General

----------------------------------------------*/

/*----------------------------------------------
1. General
----------------------------------------------*/

// Class
jQuery( function ($) {

	'use strict';

	var pages = [
		'toplevel_page_nexgen-theme-settings-global-style', 
		'nexgen-theme-settings_page_nexgen-theme-settings-header', 
		'nexgen-theme-settings_page_nexgen-theme-settings-footer', 
		'nexgen-theme-settings_page_nexgen-theme-settings-blog', 
		'nexgen-theme-settings_page_nexgen-theme-settings-single-post', 
		'nexgen-theme-settings_page_nexgen-theme-settings-portfolio', 
		'nexgen-theme-settings_page_nexgen-theme-settings-single-portfolio', 
		'nexgen-theme-settings_page_nexgen-theme-settings-single-page', 
		'nexgen-theme-settings_page_nexgen-theme-settings-search', 
		'nexgen-theme-settings_page_nexgen-theme-settings-404-page', 
		'nexgen-theme-settings_page_nexgen-theme-settings-pre-loader', 
		'nexgen-theme-settings_page_nexgen-theme-settings-scroll-top-top', 
		'nexgen-theme-settings_page_nexgen-theme-settings-cookie', 
		'nexgen-theme-settings_page_nexgen-theme-settings-advanced'
	];

	$.each( pages, function ( key, value ) {

		let body = $( 'body' );

		if ( body.hasClass( value ) ) {
			body.addClass( 'nxg-nexgen-theme-settings' );
		}
	})
})

// Icon
jQuery(function ($) {

  'use strict';

  function updateIcon(timeout) {
		setTimeout(function() {
			let item = $('.select2-results__option');
			item.each(function() {          
				let value = $(this).text();
				$(this).addClass('nexgen-icon-item').html('<i class="icon-'+value+'" title="'+value+'"></i>'+value);
			})
		}, timeout)
  }

  $( document ).on( 'select2:opening', '.nexgen-icon select', function() {
		updateIcon(100);
		updateIcon(800);
		updateIcon(1600);
  })

  $(document).on('keyup', '.select2-dropdown:not(.fa-select2-drop) .select2-search__field', function () {
		updateIcon(100);
		updateIcon(800);
		updateIcon(1600);
  })
})

// Load
jQuery(function($) {

	setTimeout( function () {
		$('.acf-settings-wrap').addClass('ready');
	}, 1000)
})