$(document).ready(function(){
	$('#go_to_top').click(function(){
		$('body, html').animate({
			scrollTop: 0
		}, 500);
	});
});
