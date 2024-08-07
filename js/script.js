/*jshint jquery:true */
/*global $:true */

$(document).ready(function () {
	"use strict";
	/* global google: false */

	/*-------------------------------------------------*/
	/* =  portfolio isotope
	/*-------------------------------------------------*/

	// Dark mode detection
	/*
	var isDarkMode = Cookies.get('Darkmode');
	if (isDarkMode != null) {
		switch (isDarkMode) {
			case 'true':
				document.getElementById('darkmode-button').checked = true;
				break;
			case 'false':
				document.getElementById('darkmode-button').checked = false;
				break;
		}
	}
	else {
		const runColorMode = (fn) => {
			if (!window.matchMedia) {
				return;
			}

			const query = window.matchMedia('(prefers-color-scheme: dark)');
			fn(query.matches);
			query.addEventListener('change', (event) => fn(event.matches));
		}

		runColorMode((isDarkMode) => {
			if (isDarkMode) {
				document.getElementById('darkmode-button').checked = true;
			}
		})
	}*/

	var winDow = $(window);
	// Needed variables
	var $container = $('.portfolio-container');
	var $filter = $('.filter');

	try {
		$container.imagesLoaded(function () {
			$container.trigger('resize');
			$container.isotope({
				filter: '*',
				layoutMode: 'masonry',
				animationOptions: {
					duration: 750,
					easing: 'linear'
				}
			});

			$('.triggerAnimation').waypoint(function () {
				var animation = $(this).attr('data-animate');
				$(this).css('opacity', '');
				$(this).addClass("animated " + animation);

			},
				{
					offset: '80%',
					triggerOnce: true
				}
			);
		});
	} catch (err) {
	}

	winDow.bind('resize', function () {
		var selector = $filter.find('a.active').attr('data-filter');

		try {
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
		} catch (err) {
		}
		return false;
	});

	// Isotope Filter 
	$filter.find('a').click(function () {
		var selector = $(this).attr('data-filter');

		try {
			$container.isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false,
				}
			});
		} catch (err) {

		}
		return false;
	});


	var filterItemA = $('.filter li a');

	filterItemA.on('click', function () {
		var $this = $(this);
		if (!$this.hasClass('active')) {
			filterItemA.removeClass('active');
			$this.addClass('active');
		}
	});

	/*-------------------------------------------------*/
	/* =  fullwidth carousell
	/*-------------------------------------------------*/
	try {
		var fullCarousell = $("#owl-demo");
		fullCarousell.owlCarousel({
			navigation: true,
			afterInit: function (elem) {
				var that = this;
				that.owlControls.prependTo(elem);
			}
		});
	} catch (err) {

	}

	/*-------------------------------------------------*/
	/* =  browser detect
	/*-------------------------------------------------*/
	try {
		$.browserSelector();
		// Adds window smooth scroll on chrome.
		if ($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch (err) {

	}

	/*-------------------------------------------------*/
	/* =  Animated content
	/*-------------------------------------------------*/

	try {
		/* ================ ANIMATED CONTENT ================ */
		if ($(".animated")[0]) {
			$('.animated').css('opacity', '0');
		}

		$('.triggerAnimation').waypoint(function () {
			var animation = $(this).attr('data-animate');
			$(this).css('opacity', '');
			$(this).addClass("animated " + animation);

		},
			{
				offset: '80%',
				triggerOnce: true
			}
		);
	} catch (err) {

	}

	/*-------------------------------------------------*/
	/* =  flexslider
	/*-------------------------------------------------*/
	try {

		var SliderPost = $('.flexslider');

		SliderPost.flexslider({
			slideshowSpeed: 6000,
			easing: "swing"
		});
	} catch (err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	Contact Map
	/* ---------------------------------------------------------------------- */
	var contact = { "lat": "51.51152", "lon": "-0.104198" }; //Change a map coordinate here!

	try {
		var mapContainer = $('.map');
		mapContainer.gmap3({
			infowindow: {
				address: "http://goo.gl/maps/Mt7xc",
				options: {
					content: "London, Farringdon st!"
				},
				events: {
					closeclick: function (infowindow) {
						alert("closing : " + infowindow.getContent());
					}
				}
			},
			action: 'addMarker',
			marker: {
				options: {
					icon: new google.maps.MarkerImage('images/marker.png')
				}
			},
			latLng: [contact.lat, contact.lon],
			map: {
				center: [contact.lat, contact.lon],
				zoom: 14
			},
		},
			{ action: 'setOptions', args: [{ scrollwheel: false }] }
		);
	} catch (err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	magnific-popup
	/* ---------------------------------------------------------------------- */

	try {
		// Example with multiple objects
		$('.zoom').magnificPopup({
			type: 'image'
		});
	} catch (err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	Accordion
	/* ---------------------------------------------------------------------- */
	var clickElem = $('a.accord-link');

	clickElem.on('click', function (e) {
		e.preventDefault();

		var $this = $(this),
			parentCheck = $this.parents('.accord-elem'),
			accordItems = $('.accord-elem'),
			accordContent = $('.accord-content');

		if (!parentCheck.hasClass('active')) {

			accordContent.slideUp(400, function () {
				accordItems.removeClass('active');
			});
			parentCheck.find('.accord-content').slideDown(400, function () {
				parentCheck.addClass('active');
			});

		} else {

			accordContent.slideUp(400, function () {
				accordItems.removeClass('active');
			});

		}
	});

	/* ---------------------------------------------------------------------- */
	/*	Tabs sidebar
	/* ---------------------------------------------------------------------- */
	var clickTab = $('.tab-links li a');

	clickTab.on('click', function (e) {
		e.preventDefault();

		var $this = $(this),
			hisIndex = $this.parent('li').index(),
			tabCont = $('.tab-content-sidebar'),
			tabContIndex = $(".tab-content-sidebar:eq(" + hisIndex + ")");

		if (!$this.hasClass('active')) {

			clickTab.removeClass('active');
			$this.addClass('active');

			tabCont.fadeOut(400);
			tabCont.removeClass('active');
			tabContIndex.delay(400).fadeIn(400);
			tabContIndex.addClass('active');
		}
	});

	/* ---------------------------------------------------------------------- */
	/*	Bootstrap tabs
	/* ---------------------------------------------------------------------- */

	var tabId = $('.nav-tabs a');
	try {
		tabId.click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		});
	} catch (err) {
	}

	/*-------------------------------------------------*/
	/* = slider Testimonial
	/*-------------------------------------------------*/

	var slidertestimonial = $('.bxslider');
	try {
		slidertestimonial.bxSlider({
			mode: 'horizontal'
		});
	} catch (err) {
	}

	/*-------------------------------------------------*/
	/* = video background
	/*-------------------------------------------------*/

	try {
		jQuery(".player").mb_YTPlayer();
	} catch (err) {
	}

	/*-------------------------------------------------*/
	/* = skills animate
	/*-------------------------------------------------*/

	try {

		var skillBar = $('.skills-bars');
		skillBar.appear(function () {

			var animateElement = $(".meter > span");
			animateElement.each(function () {
				$(this)
					.data("origWidth", $(this).width())
					.width(0)
					.animate({
						width: $(this).data("origWidth")
					}, 1200);
			});

		});
	} catch (err) {
	}

	/*-------------------------------------------------*/
	/* =  count increment
	/*-------------------------------------------------*/
	try {
		$('.counter').appear(function () {
			$('.counter').each(function () {
				var dataperc = $(this).attr('data-perc');
				$(this).find('.numb').delay(6000).countTo({
					from: 0,
					to: dataperc,
					speed: 2000,
					refreshInterval: 100
				});
			});
		});
	} catch (err) {

	}

	/*-------------------------------------------------*/
	/* =  Shop accordion
	/*-------------------------------------------------*/

	var AccordElement = $('a.accordion-link');

	AccordElement.on('click', function (e) {
		e.preventDefault();
		var elemSlide = $(this).parent('li').find('.accordion-list-content');

		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
			elemSlide.slideDown(200);
		} else {
			$(this).removeClass('active');
			elemSlide.slideUp(200);
		}
	});

	/*-------------------------------------------------*/
	/* =  price range code
	/*-------------------------------------------------*/

	try {

		for (var i = 100; i <= 10000; i++) {
			$('#start-val').append(
				'<option value="' + i + '">' + i + '</option>'
			);
		}
		// Initialise noUiSlider
		$('.noUiSlider').noUiSlider({
			range: [0, 1600],
			start: [0, 1000],
			handles: 2,
			connect: true,
			step: 1,
			serialization: {
				to: [$('#start-val'),
				$('#end-val')],
				resolution: 1
			}
		});
	} catch (err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	Header animate after scroll
	/* ---------------------------------------------------------------------- */

	(function () {

		var docElem = document.documentElement,
			didScroll = false,
			changeHeaderOn = 200;
		document.querySelector('header');
		function init() {
			window.addEventListener('scroll', function () {
				if (!didScroll) {
					didScroll = true;
					setTimeout(scrollPage, 250);
				}
			}, false);
		}

		function scrollPage() {
			var sy = scrollY();
			if (sy >= changeHeaderOn) {
				$('header').addClass('active');
			}
			else {
				$('header').removeClass('active');
			}
			didScroll = false;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		init();

	})();

});



/* ---------------------------------------------------------------------- */
/*	Count project function
/* ---------------------------------------------------------------------- */

$.fn.countTo = function (options) {
	// merge the default plugin settings with the custom options
	options = $.extend({}, $.fn.countTo.defaults, options || {});

	// how many times to update the value, and how much to increment the value on each update
	var loops = Math.ceil(options.speed / options.refreshInterval),
		increment = (options.to - options.from) / loops;

	return $(this).delay(1000).each(function () {
		var _this = this,
			loopCount = 0,
			value = options.from,
			interval = setInterval(updateTimer, options.refreshInterval);

		function updateTimer() {
			value += increment;
			loopCount++;
			$(_this).html(value.toFixed(options.decimals));

			if (typeof (options.onUpdate) == 'function') {
				options.onUpdate.call(_this, value);
			}

			if (loopCount >= loops) {
				clearInterval(interval);
				value = options.to;

				if (typeof (options.onComplete) == 'function') {
					options.onComplete.call(_this, value);
				}
			}
		}
	});
};

$.fn.countTo.defaults = {
	from: 0,	// the number the element should start at
	to: 100,	// the number the element should end at
	speed: 1000,	// how long it should take to count between the target numbers
	refreshInterval: 100,	//how often the element should be updated
	decimals: 0,	//the number of decimal places to show
	onUpdate: null,	//callback method for every time the element is updated,
	onComplete: null //callback method for when the element finishes updating
};

/* ---------------------------------------------------------------------- */
/*	Counter
/* ---------------------------------------------------------------------- */

let clickCount = 0;
    
        function handleClick() {
            clickCount++;
    
            if (clickCount === 10) {
                changeCursor();
                activateSpecial();
            }
        }
    
        function changeCursor() {
            document.body.style.cursor = 'url(../images/Cursor_alternativ.png), auto';
        }
    
        function activateSpecial() {
            const specialDiv = document.getElementById('wh');
            specialDiv.classList.add('special-active');
        }

		

