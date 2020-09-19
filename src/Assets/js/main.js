(function ($) {
	"use strict";
	/*----------------------------
	Animation js active
	------------------------------ */
	AOS.init();

	/*----------------------------
	jQuery Mean Menu
	------------------------------ */
	$("#mobile-menu").meanmenu({
		meanMenuContainer: ".mobile-menu",
		meanScreenWidth: "767"
	});
	$(".info-bar").on("click", function () {
		$(".extra-info").addClass("info-open");
	});
	$(".close-icon").on("click", function () {
		$(".extra-info").removeClass("info-open");
	});
	/*----------------------------
    Sticky menu active
    ------------------------------ */
	function fixed_top_menu() {
		var windows = $(window);
		windows.on("scroll", function () {
			var header_height = $(".main-navigation").height();
			var scrollTop = windows.scrollTop();
			if (scrollTop > header_height) {
				$(".main-navigation").addClass("sticky");
			} else {
				$(".main-navigation").removeClass("sticky");
			}
		});
	}
	fixed_top_menu();

	/*-----------------
	Scroll-Up
	-----------------*/
	$.scrollUp({
		scrollText: '<i class="far fa-arrow-alt-circle-up"></i>',
		easingType: 'linear',
		scrollSpeed: 1000,
		animation: 'fade'
	});

	/*----------------------------
	       Menu active JS
	     ----------------------------*/
	$('.portfolio-filter ul li a').on('click', function () {
		$('.portfolio-filter ul li a').removeClass("current");
		$(this).addClass("current");
	});

	  $('.main-menu ul li a').on ('click', function () {
        $('.main-menu ul li a').removeClass("current");
        $(this).addClass("current");
    });
	/*----------------------------
	Preloader
	------------------------------ */
	$(window).on('load', function () {
		$("#status").on('fadeOut', "slow");
		$("#preloader").on('delay', 500).on('fadeOut', "slow").remove();
	});

})(jQuery);

