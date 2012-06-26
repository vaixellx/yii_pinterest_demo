/*
 * -----------------------------------
 * Configuration:
 * -----------------------------------
 * buttonId: ID of element to use for toggle this element (REQUIRED!)
 * expandSide: menu item expand side (default: left)
 * buttonActiveCls: class to add to button when clicked after popup displayed (default: '')
 * 
 */

(function( $ ) {
	// Default configuration declaration
	var defaultConfig = {
		buttonActiveCls: '',
		expandSide: 'left',
	}

	$.fn.dropelm = function(params) {
  		// Merge param with default value
  		params = $.extend(defaultConfig, params);
  		
  		// Initial element
  		this.addClass('dropelmelement');
  		$('#' + params['buttonId']).addClass('dropelmbutton');
		$('#' + params['buttonId']).attr('dropelmelementid', this.attr('id'));
		
		setMenuItemPosition(params['buttonId'], this, params['expandSide']);
  		this.hide();
  		
		// Click handler
		$('#' + params['buttonId']).click(function() {
			elm = $('#' + $(this).attr('dropelmelementid'));
			if(elm.is(':visible')) {
				$(this).removeClass(params['buttonActiveCls']);
				elm.animate({
					height: 'toggle'
				}, 100);
			}
			else {
				$('.dropelmbutton').removeClass('active-state');
				$('.dropelmelement').hide();
				$(this).addClass(params['buttonActiveCls']);
				elm.animate({
					height: 'toggle'
				}, 100);
			}
			
			return false;
		});
		
		// Hide on click another place
		mouseInsideMenuItem = false;
		
		this.hover(
			function() {
				mouseInsideMenuItem = true;
			},
			function() {
				mouseInsideMenuItem = false;
			}
		);
		
		$(document).click(function(){
			if(mouseInsideMenuItem == false) {
				$('.dropelmbutton').removeClass('active-state');
				$('.dropelmelement').hide();
			}
		});
	}
	
	
})( jQuery );

function setMenuItemPosition(buttonId, menuItem, expandSide) {
	button = $('#' + buttonId);
	menuItem.css(expandSide, 0);
	menuItem.css( {
		'margin-top': button.position().top + button.outerHeight() + 1,
		'min-width': button.outerWidth() + 20	
	});
	
	if(expandSide === 'left') {
		menuItem.css('margin-left', button.position().left);
	}
	else {
		menuItem.css('margin-right', $(window).width() - button.position().left - button.outerWidth());
	}
}