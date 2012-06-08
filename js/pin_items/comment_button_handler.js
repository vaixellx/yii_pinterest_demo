$(document).ready(function(){
	
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
			button.button('option', 'disabled', true);
			commentTextarea.attr('disabled', true);

			$.post('comments/add', {'data[Comment][pin_item_id]': pinItem.attr('pinItemId'), 'data[Comment][message]': commentMessage}, function(comment) {
				// Clear new comment textarea to fresh
				button.button('option', 'disabled', false);
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