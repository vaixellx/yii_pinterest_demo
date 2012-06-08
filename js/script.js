$(document).ready(function(){
	// Default button
	$('input[type=submit], button').button();
	
	// Button
	$('.button').each(function(index, element){
		disableText = $(element).attr('disableText') === true;

		$(element).button({
			icons: {
				primary: $(element).attr('iconPrimary'),
				secondary: $(element).attr('iconSecondary'),
			},
			disabled: $(element).attr('disabled') == 'disabled'
		});
	});
	
	$('.link-ct').each(function(index, element) {
		$(element).click(function(){
			window.location = $(element).find('a').attr('href');
		});
	});
	
	$('#enjoy_btn').click(function() {
		$('#enjoy_dialog').dialog({
			modal: true,
			width: 350
		});
	});
	
});