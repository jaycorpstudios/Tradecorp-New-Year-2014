$(document).ready(function(){

	app = {
		texts: [],
		readyToScroll: false,
		init: function(){
			var isRetina = window.devicePixelRatio > 1;
			app.preloadImages(isRetina);
			app.setLenguage(lenguaje);
			app.initScroll();
			app.updateElementsHeights();

			//Global Events
			$(window).resize(function(){ app.updateElementsHeights(); });
			$('#wrapper').on('mousewheel', function(){return app.controllScroll()});
			$('#wrapper').on('touchmove', function(){return app.controllScroll()});
		},
		setLenguage: function(lenguaje){
			app.lenguaje = (lenguaje === "")? "en" : lenguaje;
			var english = [
				'<span>2014</span><br>is about to end…',
				'And the experiences of the year made us a bit wiser…',
				'Because it was full of challenges…',
				'That we overcame together…',
				'Now it is time to reap what we sowed…',
				'And set new challenges for 2015.',
				'We wish you every success in <span>2015!</span>'
			];
			var spanish = [
				'<span>2014</span><br>está a punto de terminar…',
				'Y las experiencias vividas nos han hecho un poco más sabios…',
				'Debido a que estuvo lleno de retos…',
				'Que superamos juntos…',
				'Ahora es momento de cosechar lo que sembramos…',
				'Y establecer nuevos retos para 2015.',
				'¡Te deseamos todo el éxito en <span>2015!</span>',
			];
			var portuguese = [
				'<span>2014</span><br>está prestes a terminar…',
				'E as experiências nos fizeram um pouco mais sábios…',
				'Porque foi um ano cheio de desafios…',
				'Que superamos juntos…',
				'Agora é hora de colhermos o que plantamos…',
				'E estabelecer novos desafios para 2015.',
				'Desejamos a você todo sucesso em <span>2015!</span>',
			];
			//Set lenguaje based on the lenguaje variable
			app.texts = english;
			switch(lenguaje){
				case 'pt' :
					app.texts = portuguese;
					$('.scroll').find('p').text('Role a tela lentamente...');
					break;
				case 'es':
					app.texts = spanish;
					$('.scroll').find('p').text('Comienza a hacer scroll lentamente...');
					break;
				default:
					app.texts = english;
					$('.scroll').find('p').text('Start to scroll slowly...');
			}
			this.setTexts();
		},
		setTexts: function(){
			$.each($('.text'), function(index, val) {
				 $(val).html(app.texts[index]);
			});
		},
		preloadImages: function(retina){
			//Filtrar las imagenes para retina
			var imagenes = app.filterImagesToLoad(retina);

			var cargador = new PxLoader(); 
			$.each(imagenes, function(index, val){
          		cargador.addImage(urlBase+"imagenes/"+val);
			});
			
			cargador.addProgressListener(function(e){
				$('.preloader').find('p').text("Loading " + Math.round((e.completedCount / e.totalCount)*100) + "%");
			});
			
			cargador.addCompletionListener(function(){
				$('.scroll').find('p').addClass('zoom-in');
			 	$('.preloader').fadeOut(1000,function(){
			 		app.readyToScroll = true;
			 	});
			});
			cargador.start();
		},
		filterImagesToLoad: function(retina){
			//Filtrar las imagenes para retina
			var precargarImagenes = [];
			$.each(listadoDeImagenes, function(index, val) {
				if(retina && listadoDeImagenes[index].indexOf("@2x") > -1){
					precargarImagenes.push(listadoDeImagenes[index]);
				}else if(!retina && listadoDeImagenes[index].indexOf("@2x") === -1){
					precargarImagenes.push(listadoDeImagenes[index]);
				}
			});
			return precargarImagenes;
		},
		initScroll: function(){
			app.scroll = skrollr.init({
				render: function(data) {
		        	//$('#tracking').html(data.curTop);
		    	}
			});
		},
		controllScroll: function(){
			console.log('what?');
			if(app.readyToScroll){
				return true;
			}else{
				return false;
			}
		},
		updateElementsHeights: function(){
			$('#wrapper').height($(window).innerHeight());		
		}
	};

	app.init();

	

});