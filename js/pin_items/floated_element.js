$(document).ready(function(){
	$('#go_to_top').click(function(){
		$('body, html').animate({
			scrollTop: 0
		}, 500);
	});
	
	$(window).scroll(function() {
		if($(window).scrollTop() >= $(window).height()/4)
			$('#go_to_top').show();
		else $('#go_to_top').animate({
			height: 'toggle'
		});
	});
});
