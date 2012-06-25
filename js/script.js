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
	
	if($('#login_button').is(':visible')) {
		$('#login_form').dropelm({
			buttonId: 'login_button',
			expandSide: 'right',
			buttonActiveCls: 'active-state',
			hideMethod: 'hover'
		});
	}
	
	if($('#profile_button').is(':visible')) {
		$('#profile_panel').dropelm({
			buttonId: 'profile_button',
			expandSide: 'right',
			buttonActiveCls: 'active-state',
			hideMethod: 'hover'
		});
	}
	
	// Styled all combo box
	$('select').each(function(index, elm) {
		selectTemplate = '<div class="custom-combobox"><div class="custom-combobox-button"></div></div>';
		customCombo = $(selectTemplate);
		realCombo = $(elm);
		
		customCombo.addClass(realCombo.attr('class'));
		
		
		customCombo.insertAfter(elm);
	});
	
	$('#main_menu_toolbar li').hover(function(){
		$(this).addClass('active-state');
		$('ul', this).slideDown(100);	
	},function(){
		$(this).removeClass('active-state');
		$('ul', this).slideUp(100);
	});
	
	
});