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
	
	$('#login_button').click(function(){
		if($('#login_form').is(':visible')) {
			$('#login_button').removeClass('active-state');
			$('#login_form').hide();
		}
		else {
			$('#login_button').addClass('active-state');
			$('#login_form').fadeIn(200);
		}
	});
	
	$('#login_form').mouseleave(function(){
		if($('#login_form').is(':visible')) {
			$('#login_button').removeClass('active-state');
			$('#login_form').hide();
		}
	});
	
	$('#main_menu_toolbar li').hover(function(){
		$(this).addClass('active-state');
		$('ul', this).slideDown(100);	
	},function(){
		$(this).removeClass('active-state');
		$('ul', this).slideUp(100);
	});
	
	
});