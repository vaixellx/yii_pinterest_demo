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
		// Set modal, hide scroll bar and go to top
		$('#page').simplemodal(true);
		$('body').css('overflow', 'hidden');
		$('#go_to_top').hide();
				
		// Get popup element
		popupCt = popup = $('.pin-item-popup-ct', $(this).parent());
		popup = $('.pin-item-popup', $(this).parent());

		// Show popup CT
		popup.parent().css({
			width: $(window).width(),
			height: $(window).height(),
			left: 0 - $(this).parent().offset().left,
			top: $(window).scrollTop() - $(this).parent().offset().top
		});
		popup.parent().show();
		
		// Show popup
		originalWidth = popup.width();
		popup.css({
			width: 300,
			left: $(this).parent().offset().left,
			top: $(this).parent().offset().top
		});
		popup.show();
		popup.animate({
			width: originalWidth,
			left: ($(window).width() - 700)/2,
			top: 0 + 200
		}, 400);
		
		// Hide popup hadler
		$('.pin-item-popup-ct').click(function() {
			//Hide popup & popup CT
			popup = $('.pin-item-popup');
			popup.hide();
			popup.css({
				top: 0,
				left: 0
			});
			popup.parent().hide();
			
			// Hide modal, show scroll bar and go to top
			$('#page').simplemodal(false);
			$('body').css('overflow', 'auto');
			$('#go_to_top').show();
		});

		return false;
	});
		
});
