/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Mobile Menu Js
03. Sidebar Js
04. Cart Toggle Js
05. Search Js
06. Sticky Header Js
07. Data Background Js
08. Testimonial Slider Js
09. Slider Js (Home 3)
10. Brand Js
11. Tesimonial Js
12. Course Slider Js
13. Masonary Js
14. Wow Js
15. Data width Js
16. Cart Quantity Js
17. Show Login Toggle Js
18. Show Coupon Toggle Js
19. Create An Account Toggle Js
20. Shipping Box Toggle Js
21. Counter Js
22. Parallax Js
23. InHover Active Js

****************************************************/

(function ($) {
	"use strict";
	
		var windowOn = $(window);
		////////////////////////////////////////////////////
		// 01. PreLoader Js
		windowOn.on('load',function() {
			// $("#loading").fadeOut(500);
		});
	
		////////////////////////////////////////////////////
		// 02. Mobile Menu Js
		$('#mobile-menu').meanmenu({
			meanMenuContainer: '.mobile-menu',
			meanScreenWidth: "1199",
			meanExpand: ['<i class="fal fa-plus"></i>'],
		});
	
	
		////////////////////////////////////////////////////
		// 03. Sidebar Js
		$("#sidebar-toggle").on("click", function () {
			$(".sidebar__area").addClass("sidebar-opened");
			$(".body-overlay").addClass("opened");
		});
		$(".sidebar__close-btn").on("click", function () {
			$(".sidebar__area").removeClass("sidebar-opened");
			$(".body-overlay").removeClass("opened");
		});
	
	
		////////////////////////////////////////////////////
		// 04. Cart Toggle Js
		$(".cart-toggle-btn").on("click", function () {
			$(".cartmini__wrapper").addClass("opened");
			$(".body-overlay").addClass("opened");
		});
		$(".cartmini__close-btn").on("click", function () {
			$(".cartmini__wrapper").removeClass("opened");
			$(".body-overlay").removeClass("opened");
		});
		$(".body-overlay").on("click", function () {
			$(".cartmini__wrapper").removeClass("opened");
			$(".sidebar__area").removeClass("sidebar-opened");
			$(".header__search-3").removeClass("search-opened");
			$(".body-overlay").removeClass("opened");
		});
	
	
		////////////////////////////////////////////////////
		// 05. Search Js
		$(".search-toggle").on("click", function () {
			$(".header__search-3").addClass("search-opened");
			$(".body-overlay").addClass("opened");
		});
		$(".header__search-3-btn-close").on("click", function () {
			$(".header__search-3").removeClass("search-opened");
			$(".body-overlay").removeClass("opened");
		});
	
	
		////////////////////////////////////////////////////
		// 06. Sticky Header Js
		windowOn.on('scroll', function () {
			var scroll = $(window).scrollTop();
			if (scroll < 100) {
				$("#header-sticky").removeClass("sticky");
			} else {
				$("#header-sticky").addClass("sticky");
			}
		});
	
		////////////////////////////////////////////////////
		// 07. Data Background Js
		$("[data-background").each(function () {
			$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
		});
	
	  
		////////////////////////////////////////////////////
		// 08. Testimonial Slider Js
		var swiper = new Swiper('.testimonial__slider', {
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
		
	
	
		////////////////////////////////////////////////////
		// 09. Slider Js (Home 3)
		var galleryThumbs = new Swiper('.slider__nav', {
			spaceBetween: 0,
			slidesPerView: 0,
			freeMode: false,
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			
		});
		var galleryTop = new Swiper('.slider__wrapper', {
			spaceBetween: 0,
			effect: 'fade',
			loop: true,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			thumbs: {
				swiper: galleryThumbs
			}
		});
	
	
	
	
		////////////////////////////////////////////////////
		// 10. Brand Js
		var swiper = new Swiper('.brand__slider', {
			slidesPerView: 6,
			spaceBetween: 30,
			centeredSlides: true,
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	
		////////////////////////////////////////////////////
		// 11. Tesimonial Js
		var tesimonialThumb = new Swiper('.testimonial-nav', {
			spaceBetween: 20,
			slidesPerView: 3,
			loop: true,
			freeMode: true,
			loopedSlides: 3, //looped slides should be the same
			watchSlidesVisibility: true,
			watchSlidesProgress: true,
			centeredSlides: true,
			pagination: {
			  el: ".swiper-pagination",
			  clickable: true,
			},
		  });
		var testimonialText = new Swiper('.testimonial-text', {
		spaceBetween: 0,
		loop: true,
		loopedSlides: 5, //looped slides should be the same
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		thumbs: {
			swiper: tesimonialThumb,
		},
		});
	
		////////////////////////////////////////////////////
		   // 12. Course Slider Js
		var swiper = new Swiper('.course__slider', {
		spaceBetween: 30,
		slidesPerView: 2,
		breakpoints: {  
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
		},
		});
		
		////////////////////////////////////////////////////
		// 13. Masonary Js
		$('.grid').imagesLoaded( function() {
			// init Isotope
			var $grid = $('.grid').isotope({
			  itemSelector: '.grid-item',
			  percentPosition: true,
			  masonry: {
				// use outer width of grid-sizer for columnWidth
				columnWidth: '.grid-item',
			  }
			});
	
	
		// filter items on button click
		$('.masonary-menu').on( 'click', 'button', function() {
		  var filterValue = $(this).attr('data-filter');
		  $grid.isotope({ filter: filterValue });
		});
	
		//for menu active class
		$('.masonary-menu button').on('click', function(event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});
	
		});
	
	
		////////////////////////////////////////////////////
		// 14. Wow Js
		new WOW().init();
	
		////////////////////////////////////////////////////
		// 15. Data width Js
		$("[data-width]").each(function () {
			$(this).css("width", $(this).attr("data-width"));
		});
		
		$("[data-max-width]").each(function () {
			$(this).css("max-width", $(this).attr("data-max-width"));
		});
		
	
		////////////////////////////////////////////////////
		// 16. Cart Quantity Js
		$('.cart-minus').click(function () {
			var $input = $(this).parent().find('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		});
		$('.cart-plus').click(function () {
			var $input = $(this).parent().find('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		});
	
	
	
	
		////////////////////////////////////////////////////
		// 17. Show Login Toggle Js
		$('#showlogin').on('click', function () {
			$('#checkout-login').slideToggle(900);
		});
	
		////////////////////////////////////////////////////
		// 18. Show Coupon Toggle Js
		$('#showcoupon').on('click', function () {
			$('#checkout_coupon').slideToggle(900);
		});
	
		////////////////////////////////////////////////////
		// 19. Create An Account Toggle Js
		$('#cbox').on('click', function () {
			$('#cbox_info').slideToggle(900);
		});
	
		////////////////////////////////////////////////////
		// 20. Shipping Box Toggle Js
		$('#ship-box').on('click', function () {
			$('#ship-box-info').slideToggle(1000);
		});
		
		////////////////////////////////////////////////////
		// 22. Parallax Js
		if ($('.scene').length > 0 ) {
			$('.scene').parallax({
				scalarX: 10.0,
				scalarY: 15.0,
			}); 
		};
	
		////////////////////////////////////////////////////
		// 23. InHover Active Js
		$('.hover__active').on('mouseenter', function () {
			$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
		});
		
		$(document).ready(function() {
			if (window.location.hash) {
				var hash = window.location.hash;
				$('html, body').animate({
					scrollTop :  $(hash).offset().top - 120
				}, 500);
			};
		});
		
		var swiper = new Swiper('.news__slider', {
			spaceBetween: 25,
			centeredSlides: false,
			loop: true,
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			freeMode: false,
			slidesPerView: 3,
			breakpoints: {  
				'992': {
					slidesPerView: 3,
				},
				'991': {
					slidesPerView: 2,
					centeredSlides: false,
				},
				'768': {
					slidesPerView: 2,
					centeredSlides: false,
				},
				'767': {
					slidesPerView: 1,
				},
				'576': {
					slidesPerView: 1,
				},
				'0': {
					slidesPerView: 1,
				},
			}
		});
		
		$('.list-arts').slick({
			dots: false,
			arrows: true,
			infinite: false,
			rows: 3,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 415,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
		
		////////////////////////////////////////////////////
		// 24. croll to sub menu
		jQuery(".page__title-height .view_txt_cursor").click(function(e) {
			var height2 = jQuery('#header-sticky').outerHeight(); 
			var href = $(this).attr("href"),
				offsetTop = href === "#" ? 0 : $(href).offset().top - height2 - 30;
			$('html, body').stop().animate({ 
				scrollTop: offsetTop
			}, 500);
			e.preventDefault();
		});
		
		////////////////////////////////////////////////////
		// 25. shrink after 10s
		$('#view-shrink').click(function() {
		  $('#shrink-class').toggleClass('non-active');
		  $('#view-shrink').toggleClass('active-view');
		});
		
		////////////////////////////////////////////////////
		// 26. menu ipad mobile
		$(window).scroll(function(){
			if ($(window).width() > 1199)
			{
				$("#mega-menu-primary-menu li").removeClass('mega-toggle-on');
				$("li:hover .item-black-bg").css('position','relative');
			}
		});
		////////////////////////////////////////////////////
		// 27.campus-site
		jQuery('#our-campuses-tab').on('click', function() {
		  if(jQuery('#tan-binh-campus-tab').hasClass('active'))
		  {
			jQuery('.bg-campus-1').addClass('d-block');
			jQuery('.bg-campus-2').addClass('d-none');
			jQuery('.bg-campus-1').removeClass('d-none');
		  }
		  if(jQuery('#phu-nhuan-campus-tab').hasClass('active'))
		  {
			jQuery('.bg-campus-2').addClass('d-block');
			jQuery('.bg-campus-1').addClass('d-none');
			jQuery('.bg-campus-2').removeClass('d-none');
		  }
		});
		AOS.init();
		///////////////////////////////////////////////////
		//== HD JS
		// 28.gallery
		jQuery('.list-gallery').slick({
			dots: false,
			arrows: true,
			infinite: false,
			rows: 2,
			speed: 300,
			slidesToShow: 3,
			slidesToScroll: 3,
			responsive: [
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
					}
				},
				{
					breakpoint: 414,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				}
			]
		});
		///////////////////////////////////////////////////
		// 29.Form Campus
		jQuery('.form-campus input, .form-campus textarea').focus(function () {
			jQuery(this).closest('.wpforms-field').find('.wpforms-field-label').addClass('focus');
		});
		jQuery('.form-campus input, .form-campus textarea').blur(function () {
			jQuery(this).closest('.wpforms-field').find('.wpforms-field-label').removeClass('focus');
		});
		///////////////////////////////////////////////////
		// 30. Campus gallery
		jQuery('.campus-tour-gallery .gallery-row .item').hover(
			function () {
				jQuery(this).addClass('is-hover');
				jQuery(this).closest('.gallery-row').find('.item').addClass('is-blur');
			},
			function () {
				jQuery('.campus-tour-gallery .gallery-row .item').removeClass('is-hover is-blur');
			}
		);
		///////////////////////////////////////////////////
		// 31. Move TOC page LIKE A POST
		var tocContainer = jQuery(".page-template-template-like-post #toc_container");
		var tocLink = jQuery(".page-template-template-like-post #toc_container a");
		var tocColumn = jQuery(".page-template-template-like-post .col-toc");
		if (tocContainer.length && tocColumn.length) {
			tocColumn.append(tocContainer);
		}
		jQuery(tocLink).click(function () {
			jQuery(this).closest('#toc_container').find('a').removeClass('active');
			jQuery(this).addClass('active');
		});
		///////////////////////////////////////////////////
		// 32. Slider Section About Us - Home Page New
		let countSliderHome = jQuery('.home__slides-wrapper .banner__wrapper .item').length;
		if (countSliderHome > 1) {
			jQuery('.home__slides-wrapper .banner__wrapper').slick({
				dots: false,
				arrows: true,
				infinite: true,
				autoplay: false,
				autoplaySpeed: 4000,
				speed: 400,
				slidesToShow: 1,
				slidesToScroll: 1,
			});
		}
		///////////////////////////////////////////////////
		// 33. Slider Section About Us - Home Page New
		jQuery('.home__about-gallery .wrapper').slick({
			dots: false,
			arrows: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 400,
			slidesToShow: 1,
			slidesToScroll: 1,
		});
		///////////////////////////////////////////////////
		// 34. Slider Section Parent Testimonials - Home Page New
		jQuery('.home__testimonials-wrapper').slick({
			dots: true,
			arrows: true,
			infinite: true,
			autoplay: false,
			autoplaySpeed: 4000,
			speed: 400,
			// pauseOnHover: true,
			slidesToShow: 2,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
					}
				},
				{
					breakpoint: 641,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false,
					}
				}
			]
		});
		///////////////////////////////////////////////////
		// 35. Slider Section Campus - Home Page New
		jQuery('.custom-slider').slick({
			dots: true,
			arrows: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 4000,
			speed: 400,
			// pauseOnHover: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 769,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				},
				{
					breakpoint: 641,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						arrows: false,
					}
				}
			]
		});
		///////////////////////////////////////////////////
		// 36. Video popup
		// jQuery('.play-vid').click(function () {
		// 	var link  = jQuery(this).data('src');
		// 	document.getElementById("myFrame").src = link;
		// 	document.getElementById("frameHome").src = link;
		// });	
		jQuery('.play-vid').click(function () {
			var link = jQuery(this).data('src');
			function getYouTubeID(url) {
				try {
					var urlParams = new URL(url).searchParams;
					return urlParams.get('v');
				} catch (e) {
					return url;
				}
			}
			var videoID = /^[a-zA-Z0-9_-]{11}$/.test(link) ? link : getYouTubeID(link);
			document.getElementById("myFrame").src = "https://www.youtube.com/embed/" + videoID;
			document.getElementById("frameHome").src = "https://www.youtube.com/embed/" + videoID;
		});
		///////////////////////////////////////////////////
		// 37. Menu Mobile
		jQuery(document).ready(function () {
			jQuery('.menu-arrow').on('click', function (e) {
				e.preventDefault();
				e.stopPropagation();
				const subMenu = jQuery(this).closest('.menu-item-has-children').find('.sub-menu').first();
				if (subMenu.length) {
					jQuery(this).closest('.menu-item-has-children').toggleClass('active');
					jQuery(subMenu).toggleClass('show');
				}
			});
		});
		///////////////////////////////////////////////////
		// 38. Menu about-us
		jQuery(document).ready(function () {
			const $menuItems = jQuery(".custom-menu-about .menu-item a");
			function updateActiveMenu() { 
				const currentPath = window.location.pathname;
				const currentHash = window.location.hash;
				$menuItems.closest('.menu-item').removeClass("active-menu");
				$menuItems.each(function () {
				  const menuHref = jQuery(this).attr("href");
				//   jQuery(this).find('.active-menu').removeClass("active-menu");
				  if (menuHref === currentPath + currentHash) {
					jQuery(this).closest('.menu-item').addClass("active-menu");
				  }
				});
			}
			updateActiveMenu();
			$menuItems.on("click", function () {
				// jQuery(this).find('.active-menu').removeClass("active-menu");
				// setTimeout(updateActiveMenu, 50);
				$menuItems.closest('.menu-item').removeClass("active-menu");
    			jQuery(this).closest('.menu-item').addClass("active-menu")
			  });
		});
		  
		
	})(jQuery);