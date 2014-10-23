$(document).ready(function(){

	var lenguaje = 'en';
	var texts = [];
	var english = [
		'<span>2014</span><br>is about to end…',
		'And the experiences of the year made us a bit wiser…',
		'Because it was full of challenges…',
		'That we overcame together…',
		'Now it is time to reap what we sowed…',
		'And set new challenges for 2015.',
		'Tradecorp wishes you a happy 2015!',
	];
	var spanish = [];
	var portuguese = [];

	//Set lenguaje based on the lenguaje var
	switch(lenguaje){
		case 'pt' :
			texts = portuguese;
			break;
		case 'es':
			texts = spanish;
			break;
		default:
			texts = english;
	}
	var texts = english;

	//Fill texts
	$.each($('.text'), function(index, val) {
		 $(val).html(texts[index]);
	});

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