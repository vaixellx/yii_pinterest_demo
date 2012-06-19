$(document).ready(function(){
	$('#go_to_top').click(function(){
		$('body, html').animate({
			scrollTop: 0
		}, 400);
	});
	
	$(window).scroll(function() {
		if($(window).scrollTop() >= 100 && $('#go_to_top').is(':hidden'))
			$('#go_to_top').animate({ height: 'toggle' }, 400);
		else if($(window).scrollTop() == 0 && $('#go_to_top').is(':visible'))
			$('#go_to_top').animate({ height: 'toggle' }, 200);
	});
});
