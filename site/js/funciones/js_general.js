$(document).ready(function(){

	lenguaje = (lenguaje === "")? "en" : lenguaje;
	var texts = [];
	var english = [
		'<span>2014</span><br>is about to end…',
		'And the experiences of the year made us a bit wiser…',
		'Because it was full of challenges…',
		'That we overcame together…',
		'Now it is time to reap what we sowed…',
		'And set new challenges for 2015.',
		'wishes you a happy <span>2015!</span>'
	];
	var spanish = [
		'<span>2014</span><br>esta a punto de terminar…',
		'Y las experiencias vividas nos han hecho un poco mas sabios…',
		'Debido a que estuvo lleno de retos…',
		'Que superamos juntos…',
		'Ahora es momento de cosechar lo que sembramos…',
		'Y establecer nuevos retos para 2015.',
		'¡te desea un feliz <span>2015!</span>',
	];
	var portuguese = [];

	//Set lenguaje based on the lenguaje var
	var texts = english;
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

	//Fill texts
	$.each($('.text'), function(index, val) {
		 $(val).html(texts[index]);
	});

	var s = skrollr.init({
		render: function(data) {
        	//$('#tracking').html(data.curTop);
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