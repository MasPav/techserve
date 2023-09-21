/*----------------------------------------------
*
* [Main Scripts]
*
* Theme    : Nexgen
* Version  : 1.0
* Author   : Codings
* Support  : codings.dev
* 
----------------------------------------------*/

/*----------------------------------------------

[ALL CONTENTS]

1. Preloader
2. Responsive Menu
3. Navigation 
4. Slides 
5. Particles
6. Progress Bar
7. Shuffle
8. Pulse Icon
9. Divider
10. Search Widget
11. CF7 Form

----------------------------------------------*/

/*----------------------------------------------
1. Preloader
----------------------------------------------*/

jQuery(function ($) {

	'use strict';

	let preloader = $('.preloader');

	setTimeout(function() {
		preloader.addClass('ready');
			
	}, preloader.data('timeout'))
})

/*----------------------------------------------
2. Responsive Menu
----------------------------------------------*/

jQuery(function ($) {

	'use strict';

	function navResponsive() {

		let navbar = $('.navbar .items');
		let menu = $('#menu .items');

		menu.html('');
		navbar.clone().appendTo(menu);

		$('.menu .icon-arrow-right').removeClass('icon-arrow-right').addClass('icon-arrow-down');

		$('.menu .nav-item.dropdown').each(function() {
			let children = $(this).children('.nav-link');
			children.addClass('prevent');
		})
	}

	navResponsive();

	$(window).on('resize', function () {
		navResponsive();
	})

	$('.menu .dropdown-menu').each(function() {
		var children = $(this).children('.dropdown').length;
		$(this).addClass('children-'+children);
	})

    
	$('.menu .nav-item.dropdown').each(function() {
		var children = $(this).children('.nav-link');
		children.addClass('prevent');
	})

	$(document).on('click', '#menu .nav-item .nav-link', function (e) {

		if($(this).hasClass('prevent')) {
			e.preventDefault();
		}

		var nav_link = $(this);

		nav_link.next().toggleClass('show');

		if(nav_link.hasClass('smooth-anchor')) {
			$('#menu').modal('hide');
		}
	})
})

/*----------------------------------------------
3. Navigation
----------------------------------------------*/

jQuery(function ($) {

	'use strict';

	var position = $(window).scrollTop();
	var navbar   = $('.navbar.sub');
	var toTop    = $('#scroll-to-top');

	$(document).ready(function() {
		if (position > 0) {
			navbar.addClass('navbar-sticky');
		}
		toTop.hide();
	})

	$(window).scroll(function () {

		navbar.removeAttr('data-aos');
		navbar.removeAttr('data-aos-delay');

		var scroll = $(window).scrollTop();

		if (!navbar.hasClass('relative')) {

			// Down
			if (scroll > position && position > 0) {

				navbar.addClass('navbar-sticky');

				if(navbar.hasClass('navbar-fixed') || window.innerWidth <= 767) {
					navbar.removeClass('hidden').addClass('visible');

				} else {

					if ($(window).scrollTop() >= window.innerHeight) {
						navbar.removeClass('visible').addClass('hidden');
					}
				}           

				toTop.fadeOut('fast');

			// Up
			} else {

				navbar.removeClass('hidden').addClass('visible');

				// Top
				if ($(window).scrollTop() <= 100) {
					navbar.removeClass('navbar-sticky');

				} else {                   

					if(!navbar.hasClass('navbar-no-fixed')) {
						navbar.addClass('visible');
					}
				}

				if (position >= window.innerHeight && window.innerWidth >= 767) {
					toTop.fadeIn('fast');

				} else {
					toTop.fadeOut('fast');
				}
			}
			position = scroll;
		}
	})

	$('.nav-link').each(function() {

		if(this.hasAttribute('href')) {
			let href = $(this).attr('href');
			if (href.indexOf('/') == -1) {
				if (href.length > 1 && href.indexOf('#') != -1) {
					$(this).addClass('smooth-anchor');
				}
			}
		}

		let body = $('body');

		if(this.hasAttribute('href') && ! body.hasClass('home')) {
			let href = $(this).attr('href');
			if (href.indexOf('/') == -1) {
				if (href.length > 1 && href.indexOf('#') != -1) {
					$(this).removeClass('smooth-anchor');
					$(this).attr('href', '/'+href);
				}
			}
		}
	})

  $(document).on('click', '.smooth-anchor', function (e) {
    e.preventDefault();

    let href   = $(this).attr('href');
    let target = $.attr(this, 'href');

    if($(target).length > 0) {
        
      if (href.length > 1 && href.indexOf('#') != -1) {
        $('html, body').animate({
        	scrollTop: $(target).offset().top
      	}, 500);
    	}
   	}
   })

	$('.dropdown-menu').each(function () {

		let dropdown = $(this);

		dropdown.hover(function () {
			dropdown.parent().find('.nav-link').first().addClass('active');

		}, function () {
			dropdown.parent().find('.nav-link').first().removeClass('active');			
		})
	})

	let navbar_holder    = $('.navbar-holder');

	if(navbar_holder.length > 0) {
			
		let navbar_height = $('.navbar-expand.sub').outerHeight();
		navbar_holder.css('min-height', navbar_height);
	}
})

/*----------------------------------------------
4. Slides
----------------------------------------------*/

jQuery(function ($) {

	var animation = function(slider) {

		let image       = slider.find('.swiper-slide-active img');
		let pre_title   = slider.find('.pre-title');
		let title       = slider.find('.title');
		let description = slider.find('.description');
		let btn         = slider.find('.buttons');
		let nav         = slider.find('nav');

		// image.toggleClass('aos-animate');
		pre_title.toggleClass('aos-animate');
		title.toggleClass('aos-animate');
		description.toggleClass('aos-animate');
		btn.toggleClass('aos-animate');
		nav.toggleClass('aos-animate');

		setTimeout(function() {
			// image.toggleClass('aos-animate');
			pre_title.toggleClass('aos-animate');
			title.toggleClass('aos-animate');
			description.toggleClass('aos-animate');
			btn.toggleClass('aos-animate');
			nav.toggleClass('aos-animate');

			AOS.refresh();

		}, 100)
	}

	$('.full-slider').each(function() {

		var full_slider = $(this);
		var data_speed  = $(this).data('speed');
		
		if(data_speed) {
			var slider_speed = data_speed;
		} else {
			var slider_speed = 10000;
		}

		var fullSlider = new Swiper(this, {

			autoplay: {
				delay: slider_speed,
			},
			parallax: true,
			slidesPerView: 1,
			spaceBetween: 0,
			navigation: false,
			pagination: {
				el: full_slider.find('.swiper-pagination'),
				clickable: true
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false
			},
			on: {
				init: function() {
					animation(full_slider);
					let pagination = full_slider.find('.swiper-pagination');
					pagination.hide();

					setTimeout(function() {
						pagination.fadeIn('slow');
					}, 2000)
				},
				slideChange: function() {
					animation(full_slider);
				}
			}
		})
	})

	$('.no-slider').each(function() {

		var no_slider = $(this);

		var noSlider = new Swiper(this, {

			autoplay: false,
			loop: false,
			keyboard: false,
			grabCursor: false,
			allowTouchMove: false,
			on: {
				init: function() {
					animation(no_slider)
				}
			}
		})
	})

	$('.mid-slider').each(function() {

		var mid_slider = $(this);

		if($(this).data('perview')) {
			var midPerView = $(this).data('perview');
		} else {
			midPerView = 3;
		}

		var midSlider = new Swiper(this, {

			autoplay: false,
			slidesPerView: 1,
			spaceBetween: 30,
			breakpoints: {
				767: {
					slidesPerView: 2,
					spaceBetween: 30
				},
				1023: {
					slidesPerView: midPerView,
					spaceBetween: 30
				}
			},
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
			pagination: {
				el: mid_slider.find('.swiper-pagination'),
				clickable: true
			},
		})
	})

	$('.min-slider').each(function() {

		if($(this).data('perview')) {
				var minPerView = $(this).data('perview');
		} else {
				minPerView = 6;
		}

		var minSlider = new Swiper(this, {

			autoplay: {
				delay: 5000,
			},
			loop: false,
			centerInsufficientSlides: true,
			slidesPerView: 2,
			spaceBetween: 15,
			breakpoints: {
				424: {
					slidesPerView: 2,
					spaceBetween: 15
				},
				767: {
					slidesPerView: 3,
					spaceBetween: 15
				},
				1023: {
					slidesPerView: 4,
					spaceBetween: 15
				},
				1199: {
					slidesPerView: minPerView,
					spaceBetween: 15
				}
			},
			pagination: false
		})
	})
})

/*----------------------------------------------
5. Particles
----------------------------------------------*/

jQuery(function($) {

  'use strict';

  function particles( particles_ID, particles_type, particles_color, particles_opacity ) {

    if ( particles_type === 'squares' ) {
      particlesJS(particles_ID,{particles:{number:{value:20,density:{enable:!0,value_area:800}},color:{value:particles_color},shape:{type:"edge",stroke:{width:0,color:"#000"},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:particles_opacity,random:!0,anim:{enable:!1,speed:1,opacity_min:.05,sync:!1}},size:{value:80,random:!1,anim:{enable:!0,speed:5,size_min:5,sync:!1}},line_linked:{enable:!1,distance:200,color:"#ffffff",opacity:1,width:2},move:{enable:!0,speed:5,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"grab"},onclick:{enable:!1,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0})
    }

    if ( particles_type === 'hexagons' ) {
      particlesJS(particles_ID,{particles:{number:{value:6,density:{enable:!0,value_area:800}},color:{value:particles_color},shape:{type:"polygon",stroke:{width:0,color:"#000"},polygon:{nb_sides:6},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:particles_opacity,random:!0,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:160,random:!1,anim:{enable:!0,speed:10,size_min:40,sync:!1}},line_linked:{enable:!1,distance:200,color:"#ffffff",opacity:1,width:2},move:{enable:!0,speed:8,direction:"none",random:!1,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!1,mode:"grab"},onclick:{enable:!1,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0});
    }

    if ( particles_type === 'space' ) {
      particlesJS(particles_ID,{particles:{number:{value:160,density:{enable:!0,value_area:800}},color:{value:particles_color},shape:{type:"circle",stroke:{width:0,color:"#000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:particles_opacity,random:!0,anim:{enable:!0,speed:1,opacity_min:0,sync:!1}},size:{value:3,random:!0,anim:{enable:!1,speed:4,size_min:.3,sync:!1}},line_linked:{enable:!1,distance:150,color:"#ffffff",opacity:.4,width:1},move:{enable:!0,speed:1,direction:"none",random:!0,straight:!1,out_mode:"out",bounce:!1,attract:{enable:!1,rotateX:600,rotateY:600}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:!0,mode:"bubble"},onclick:{enable:!0,mode:"repulse"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:250,size:0,duration:2,opacity:0,speed:3},repulse:{distance:400,duration:.4},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0});
    }

    if ( particles_type === 'neural' ) {
      particlesJS(particles_ID,{particles:{number:{value:80,density:{enable:!0,value_area:800}},color:{value:particles_color},shape:{type:"circle",stroke:{width:0,color:"#000"},polygon:{nb_sides:5},image:{src:"img/github.svg",width:100,height:100}},opacity:{value:particles_opacity,random:!1,anim:{enable:!1,speed:1,opacity_min:.1,sync:!1}},size:{value:5,random:!0,anim:{enable:!1,speed:40,size_min:.1,sync:!1}},line_linked:{enable:!0,distance:150,color:"#ffffff",opacity:.25,width:1},move:{enable:!0,speed:6,direction:"none",random:!1,straight:!1,out_mode:"out",attract:{enable:!1,rotateX:600,rotateY:1200}}},interactivity:{detect_on:"canvas",events:{onhover:{enable:0,mode:"repulse"},onclick:{enable:!0,mode:"push"},resize:!0},modes:{grab:{distance:400,line_linked:{opacity:1}},bubble:{distance:400,size:40,duration:2,opacity:8,speed:3},repulse:{distance:200},push:{particles_nb:4},remove:{particles_nb:2}}},retina_detect:!0,config_demo:{hide_card:!1,background_color:"#b61924",background_image:"",background_position:"50% 50%",background_repeat:"no-repeat",background_size:"cover"}});
    }
 	}

	var particles_elem = $( '.nxg-particles' );

  if ( particles_elem.length ) {

    particles_elem.each(function() {

			var particles_ID      = $( this ).attr( 'id' );
    	var particles_type    = $( this ).data( 'type' );
    	var particles_color   = $( this ).data( 'color' );
    	var particles_opacity = $( this ).data( 'opacity' );

      particles( particles_ID, particles_type, particles_color, particles_opacity );
    })
  }
})

/*----------------------------------------------
6. Progress Bar
----------------------------------------------*/

jQuery(function($) {

	'use strict';

	function initCounter(section, item, duration) {

		$(document).one('inview', item, function(event, inview) {

			if (inview) {            

				$(item).each(function() {

					var percent = $(this).data('percent');
					var pcolor  = $(this).data('color');
					var scolor  = $(this).data('color');
					var ecolor  = $(this).data('empty-color');
					
					if ( $(section).hasClass('preloader') || $(section).hasClass('skills')) {
						var symbol = '<i>%</i>';
					} else {
						var symbol = '';
					}

					if(section == '.counter.preloader' || section == '.counter.funfacts') {
						var height = 70;
					} else {
						var height = 110;
					}

					$(this).radialProgress({
						value: (percent / 100),
						size: height,
						thickness: 10,
						lineCap: 'butt',
						emptyFill: ecolor,
						animation: { 
							duration: duration, 
							easing: "radialProgressEasing" 
						},
						fill: {
							gradient: [[pcolor, 0.1], [scolor, 1]], 
							gradientAngle: Math.PI / 4
						}
					}).on('radial-animation-progress', function(event, progress) {
						$(this).find('span').html(Math.round(percent * progress) + symbol);
					})
				})
			}
		})
	}
	
	let preloader = $('.preloader');
	let preloader_timeout = ( preloader.data('timeout') - 800);

	initCounter('.counter.preloader', '.counter.preloader .radial', preloader_timeout);
	initCounter('.counter.funfacts', '.counter.funfacts .radial', 5000);
	initCounter('.counter.skills', '.counter.skills .radial', 5000);
})

/*----------------------------------------------
7. Shuffle
----------------------------------------------*/

jQuery(function ($) {

  'use strict';

  $('.filter-section').each(function(index) {

		var count = index + 1;

    $(this).find('.filter-items').removeClass('filter-items').addClass('filter-items-'+count);
    $(this).find('.filter-item').removeClass('filter-item').addClass('filter-item-'+count);
    $(this).find('.filter-sizer').removeClass('filter-sizer').addClass('filter-sizer-'+count);
    $(this).find('.btn-filter-item').removeClass('btn-filter-item').addClass('btn-filter-item-'+count);
        
		var Shuffle = window.Shuffle;
		var Filter  = new Shuffle(document.querySelector('.filter-items-'+count), {
      itemSelector: '.filter-item-'+count,
      sizer: '.filter-sizer-'+count,
      buffer: 1,
    })
    
    $('.btn-filter-item-'+count).on('change', function (e) {
    
			var input = e.currentTarget;
					
			if (input.checked) {
				Filter.filter(input.value);
			}
    })
  })
})

/*----------------------------------------------
8. Pulse Icon
----------------------------------------------*/

jQuery(function ($) {

	$('.card-pulse-icon').each(function() {

		let card = $(this);

		card.hover(function() {

			let color = card.find('.pulse-icon').data('color');

			$(':root').css('--pulse-color', color);
		})
	})
})

/*----------------------------------------------
9. Divider
----------------------------------------------*/

jQuery(function($) {
  
  'use strict';

  let divider = '<div class="divider"><svg width="150" height="100"><defs><pattern width="150" height="100" id="dotted-texture" patternContentUnits="userSpaceOnUse" patternUnits="userSpaceOnUse"><g id="row-1"><ellipse cx="5" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="20" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="35" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="50" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="65" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="80" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="95" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="110" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="125" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="140" cy="5" rx="3" ry="3" style="stroke:none;stroke-width:0"/></g><g id="row-2"><ellipse cx="5" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="20" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="35" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="50" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="65" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="80" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="95" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="110" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="125" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="140" cy="20" rx="3" ry="3" style="stroke:none;stroke-width:0"/></g><g id="row-3"><ellipse cx="5" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="20" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="35" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="50" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="65" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="80" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="95" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="110" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="125" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="140" cy="35" rx="3" ry="3" style="stroke:none;stroke-width:0"/></g><g id="row-4"><ellipse cx="5" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="20" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="35" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="50" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="65" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="80" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="95" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="110" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="125" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/><ellipse cx="140" cy="50" rx="3" ry="3" style="stroke:none;stroke-width:0"/></g></pattern></defs><rect width="150" height="100" x="0" y="0" fill="url(#dotted-texture)"/></svg></div>';
  let dotted_divider = $('.dotted-divider');
  let image_divider = $('.image-divider .image');

  dotted_divider.each(function() {
    $(this).append(divider);
  })

  image_divider.each(function() {
    $(this).append(divider);
  })
})

/*----------------------------------------------
10. Search Widget
----------------------------------------------*/

jQuery(function($) {
  
  'use strict';

	$(document).on( 'click', '.search-form i', function() {
		$('.search-form').submit();
	})
})

/*----------------------------------------------
11. CF7 Form
----------------------------------------------*/

jQuery(function ($) {

	'use strict';

	$('#commentform p:not(.form-submit)').each(function() {
		$(this).css('margin', '0');
	})

	$('#commentform label').each(function() {
		$(this).css('font-size', '0');
		$(this).next().attr('placeholder', $(this).text());
	})

	$('.nxg-contact-form-7 label').each(function() {            
		$(this).css('font-size', '0');
		$(this).find('input').attr('placeholder', $(this).text());
		$(this).find('textarea').attr('placeholder', $(this).text());
	})

	$('.nxg-contact-form-7').each(function() {

		$(this).find('.wpcf7-submit').addClass('btn');

		if ( $(this).hasClass('add-primary-button') ) {
			$(this).find('.wpcf7-submit').addClass('primary-button');

		} else {
			$('.wpcf7-submit').removeClass('primary-button');
		}

		if ( $(this).hasClass('add-dark-button') ) {
			$(this).find('.wpcf7-submit').addClass('dark-button');

		} else {
			$(this).find('.wpcf7-submit').removeClass('dark-button');
		}
	})
})