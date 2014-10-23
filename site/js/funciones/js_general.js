$(document).ready(function(){

	var s = skrollr.init({
		render: function(data) {
        	//Log the current scroll position.
        	$('#tracking').html(data.curTop);
    	}
	});

	$(window).resize(function(){
		updateElementsHeights();
	});

	function updateElementsHeights(){
		$('#wrapper').height($(window).innerHeight());		
	}
	
	updateElementsHeights();
});