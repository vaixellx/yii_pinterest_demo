$(document).ready(function(){
	$('.pin-items').wookmark({
		container: $('#pinned-items-container'),
		autoResize: true,
		offset: 10	
	});
	
	$('.pin-items').hover(
		function(){
			$('.pin-action', this).fadeIn('fast');
		},
		function(){
			$('.pin-action', this).hide();
		}
	);
	
	$('.pin-images-container').yoxview({
		autoHideMenu: false,
		controlsInitialFadeTime: 200,
		controlsInitialDisplayTime: 200
	});
	
});
