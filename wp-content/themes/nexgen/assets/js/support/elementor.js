/*----------------------------------------------
*
* [Elementor Scripts]
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

// Editor
jQuery( function ($) {

  'use strict';

  var header  = $('.elementor-editor-active header');

  header.hover(function() {
		header.css('z-index', '1');

	}, function () {
		header.css('z-index', '5');
  })
})