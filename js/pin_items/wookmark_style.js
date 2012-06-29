$(document).ready(function(){
	$('.pin-items').wookmark({
		container: $('#pinned-items-container'),
		autoResize: true,
		offset: 10	
	});
	
	$('.pin-items').hover(
		function(){
			$('.pin-action', this).fadeIn('fast');
		},
		function(){
			$('.pin-action', this).hide();
		}
	);
	
	$('.pin-images-container a').click(function() {
		$('#page').simplemodal(true);
		$('body').css('overflow', 'hidden');
		
		popup = $('.pin-item-popup', $(this).parent());
		width = popup.width();
		positionLeft = ($(window).width() - 700)/2 - $(this).parent().offset().left;
		positionTop = $(window).scrollTop() + 200 - $(this).parent().offset().top;
		popup.width('100%');
		popup.show();
		popup.animate({
			width: width,
			left: positionLeft,
			top: positionTop
		}, 400);
		
		$('#go_to_top').hide();
		
		$('[simplemodal=true]').click(function() {
			popup = $('.pin-item-popup');
			popup.hide();
			popup.css({
				top: 0,
				left: 0
			});
			
			$('#page').simplemodal(false);
			$('body').css('overflow', 'auto');
			$('#go_to_top').show();
		});

		return false;
	});
		
});
