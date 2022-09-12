(function ($) {

	class ThemeFront {

		constructor() {

			this.setupLayout();
			this.setupPreloader();
			this.setupHeaderNav();
			this.setupHeaderScroll();
			this.setupOnePageNav();
			this.setupCarousels();
			this.setupCursor();

		}

		/**
		 * Setup layout
		 */
		setupLayout() {

			$('form, input, textarea').attr('autocomplete', 'none').attr('spellcheck', 'false').attr('autocorrect', 'off');

			// responsive frames
			$('#content iframe').not('.gform_wrapper + iframe').each(function () {

				const $iframe = $(this);

				if (!$iframe.parent().hasClass('embed-container')) {
					$iframe.wrap('<div class="embed-container"></div>');
				}

			});

			// responsive tables
			$('table').wrap('<div class="responsive-table"></div>');

		}

		/**
		 * Setup Preloader
		 */
		setupPreloader() {

			$(window).on('load', preloader);

			function preloader() {
				setTimeout(() => {
					if (!$('#page-preloader').hasClass('done')) {
						$('#page-preloader').addClass('done');
					}
				}, (1000));
			}

		}


		/**
		 * One page navigation
		 */
		setupOnePageNav() {

			const offset = 50,
				hash = window.location.hash,
				self = this;

			$(document).on('click', 'a[href*="#!/"]', function (e) {
				e.preventDefault();

				let $link = $(this),
					url = $link.attr('href'),
					linkParts = url.split('#!/'),
					sectionID = linkParts[1];

				$('#sub-nav a').removeClass('current');
				$link.addClass('current');

				self.scrollToSection(sectionID, offset);

			});

			if (hash.indexOf('#!/') !== -1) {
				const hashParts = hash.split('#!/'),
					sectionID = hashParts[1];

				$('#sub-nav a[href="#!/' + sectionID + '"]').addClass('current');

				self.scrollToSection(sectionID, offset);
			}

		}

		/*
		 *	Header nav-menu
		 */
		setupHeaderNav() {
			// Mobile header menu
			$('.hamburger-mobile > #hamburger-mobile-toggler').on('click', function () {
				$(".mobile-menu").removeClass('d-none');
				$("body").css('overflow-y', 'hidden');
			});
			$('#header-mobile-nav-close').on('click', function () {
				$(".mobile-menu").addClass('d-none');
				$("body").css('overflow-y', '');
			});
			$('.mobile-menu > .mobile-menu__overlay').on('click', function () {
				$(".mobile-menu").addClass('d-none');
				$("body").css('overflow-y', '');
			});
		}

		/**
		 * Header scroll
		 */
		setupHeaderScroll() {

			// Body
			const $body = $('body');

			// Header
			const $header = $('#header'),
				$spacer = $('#spacer');

			// Calc head offset
			let headOffset = $header.offset().top;

			$(window).on('scroll', function () {

				let scroll = $(window).scrollTop();

				if (scroll > headOffset) {

					$header.addClass('fixed');

				} else {

					$header.removeClass('fixed');
					$spacer.css('padding-top', 0);

				}

			});

		}


		/**
		 * Carousels
		 */
		setupCarousels() {
			const swiper = new Swiper('.swiper', {
				loop: true,
				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				}
			});

		}


		/**
		 * The above code is setting the position of the cursor to the x and y coordinates of the mouse
		 */
		setupCursor() {
			let links = Array.from($(document).find('a')),
				bullets = Array.from($(document).find('span.swiper-pagination-bullet')),
				array = links.concat(bullets),
				innerCursor = $('.inner-cursor'),
				outerCursor = $('.outer-cursor');

			$(document).mousemove(moveCursor);

			function moveCursor(e) {
				let x = e.clientX;
				let y = e.clientY;

				/* The above code is setting the position of the cursor to the x and y coordinates of the mouse. */
				innerCursor.attr('style', `left: ${x}px; top: ${y}px`);
				outerCursor.attr('style', `left: ${x}px; top: ${y}px`);
			}

			array.forEach((index) => {
				index.addEventListener('mouseover', () => {
					innerCursor.addClass('grow');
				});
				index.addEventListener('mouseleave', () => {
					innerCursor.removeClass('grow');
				});
			});

		}

	}

	window.ThemeFront = new ThemeFront();

})(window.jQuery);
