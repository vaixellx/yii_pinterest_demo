$(document).ready(function(){
	$('.like-button').click(function(){
		var pinItem = $(this).parent().parent();
		var pinItemId = pinItem.attr('pinItemId');
		var clickedButton = this;
		
		$.post('pin_items/like', {'data[PinItem][id]': pinItemId}, function(data){
			$('.pin-like', pinItem).html(data + ' Likes');
			$(clickedButton).button('option', 'disabled', true);
		});
			
	});
});
