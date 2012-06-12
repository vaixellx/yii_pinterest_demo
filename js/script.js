$(document).ready(function(){
// 	
	// $('.link-ct').each(function(index, element) {
		// $(element).click(function(){
			// window.location = $(element).find('a').attr('href');
		// });
	// });
// 	
	$('#enjoy_btn').click(function() {
		 $('#enjoy_dialog').css('left', $(window).width()/2-150);
		 $('#enjoy_dialog').css('top', $(window).height()/2-120);
		 $('#enjoy_dialog').show();
	});
// 	
});