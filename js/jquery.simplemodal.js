(function( $ ) {
	$.fn.simplemodal = function(enable) {
		if(enable) {
			$(this).append('<div simplemodal=true></div>');
			$('div[simplemodal=true]').css({
				'z-index': 500,
				'width': $(this).outerWidth(),
				'height': $(this).outerHeight(),
				'position': 'absolute',
				'top': 0,
				'left': 0,
				'background-color': '#eeeeee',
				'opacity': 0.7
			});
			$('div[simplemodal=true]').hide().fadeIn(200);
		}
		else {
			$('div[simplemodal=true]').fadeOut();
			$('div[simplemodal=true]').remove();
		}
	}
})( jQuery );