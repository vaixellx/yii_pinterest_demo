$(document).ready(function(){
	$('.like-button').click(function(){
		var pinItem = $(this).parent().parent();
		var pinItemId = pinItem.attr('pinItemId');
		var clickedButton = $(this);
		
		$.post('pinItem/like', {'liked_pin_item_id': pinItemId}, function(data){
			$('.pin-like', pinItem).html(data + ' Likes');
			clickedButton.removeClass('like-button');
			clickedButton.addClass('disabled-button');
		});
			
	});
});
