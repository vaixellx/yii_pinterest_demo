$(document).ready(function(){
	$('.like-button').click(function(){
		var pinItem = $(this).parent().parent();
		var pinItemId = pinItem.attr('pinItemId');
		var clickedButton = $(this);
		
		$.post(baseUrl+'/pinItem/like', {'Liked': { pin_item_id: pinItemId} }, function(data){
			$('.pin-like', pinItem).html(data + ' Likes');
			clickedButton.removeClass('like-button');
			clickedButton.addClass('disabled-button');
		});
			
	});
	
	$('.comment-button').click(function() {
		var pinItem = $(this).parent().parent();
		
		// Show comment box
		$('.new-comment', pinItem).fadeIn('slow');
		$('.pin-new-comment-message', pinItem).focus();
		
		// Re-layout page
		$('.pin-items').wookmark({
			container: $('#pinned-items-container'),
			autoResize: true,
			offset: 10
		});
	});
	
	$('.submit-new-comment-button').click(function(){
		var pinItem = $(this).parent().parent().parent();
		var commentTextarea = $('.pin-new-comment-message', pinItem);
		var commentMessage = commentTextarea.val();
		var button = $(this);
		
		if(!(commentMessage == "" || commentMessage == null)) {
			button.addClass('disabled-button');
			commentTextarea.attr('disabled', true);

			$.post(baseUrl+'/comment/add', {'Comment': { pin_item_id: pinItem.attr('pinItemId'), message: commentMessage}}, function(comment) {
				// Clear new comment textarea to fresh
				button.removeClass('disabled-button');
				commentTextarea.attr('disabled', false);
				commentTextarea.val('');
				
				// Apply new coming comment
				$('.new-comment', pinItem).hide();
				$('.pin-comment-ct', pinItem).append(comment);
	
				// Re-layout page
				$('.pin-items').wookmark({
					container: $('#pinned-items-container'),
					autoResize: true,
					offset: 10
				});			
			});
		}	
	});
	
});
