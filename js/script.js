$(document).ready(function(){
	
	$('.link-ct').each(function(index, element) {
		$(element).click(function(){
			window.location = $(element).find('a').attr('href');
		});
	});
	
	$('.disabled-button').click(function(){
		return false;
	});
	
	$('#enjoy_btn').click(function() {
		 $('#enjoy_dialog').css('left', $(window).width()/2-150);
		 $('#enjoy_dialog').css('top', $(window).height()/2-120);
		 $('#enjoy_dialog').slideDown(1000);
		 
		 $('#modal_layer').css('width', $(window).width());
		 $('#modal_layer').css('height', $(window).height());
		 
		 $('#modal_layer').fadeIn();
		 
		 $('.dialog-close-btn').click(function() {
		 	$('#enjoy_dialog').slideUp(500);
		 	$('#modal_layer').fadeOut();
		 });
		 
	});
// 	
});