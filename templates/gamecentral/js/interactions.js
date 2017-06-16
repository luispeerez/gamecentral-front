var screenSize;
var sidebarButton;
var phoneSize = 767;
var tabletSize = 979;
var slider;

/*
*
*
* Funcion sobre el objeto $(document) que asigna procesos cuando el
* selector document, que es la pagina HTML, este cargada
*
*/

$(document).ready(function(){
	/*
	*
	* Metodo supersized que inicializa el plugin con el mismo nombre
	* crea un fondo del tamaño de la pantalla especificando la imagen a utilizar.
	*
	*/
	$.supersized({
		slides  :  	[ {image : site_bg, title : ''} ]
	});

	/*
	*
	*
	* Se asigna el metodo bxSlider sobre el selector $('.bxslider')
	* dentro del metodo bxSlider se especifica la opcion de altura adaptativa
	*
	*/
	$('.bxslider').each(function(){
		var autoslide = false;
		var ad_height = true;
		if($(this).find('li').length > 1){
			autoslide = true;
		}
		if($(this).hasClass('product-slider'))
			ad_height = false;
		$(this).bxSlider({adaptiveHeight:ad_height, auto:autoslide});
	});

	screenSize = $(window).width();

	/*
	*
	*
	* Metodo change sobre el selector $('select.navigator'), se activa cuando
	* el objeto select en la pagina HTML cambia de estado, al metodo change se 
	* le envia una funcion anonima como parametro, la cual redirecciona hacia
	* la seccion que se especifique en el
	*
	*/
	$("select.navigator").change(function() {
		console.log($(this).find("option:selected").val());
		window.location = $(this).find("option:selected").val();
	});	

	drawMaps();
	responsiveVideos();

});

/*
*
*
* Metodo resize sobre el selector $(window), se activa cuando la ventana cambia
* de tamaño, se pasa como parametro una funcion o callback, en el cual se 
* asigna la variable screenSize que contiene el ancho de la ventana.
*
*/
$(window).resize(function(){
	screenSize = $(window).width();
});


/*
*
*
* Metodo scroll sobre el selector $(window), este metodo se activa cuando se 
* realiza un movimiento de pantalla hacia arriba o abajo, se manda como 
* parametro una funcion anonima.
*
*
*/
$(window).scroll(function(){
	windowOffset 	= $(window).scrollTop();
	containeroffset = $('#content .container').offset().top;
	header = $('header').offset().top;

	if(windowOffset > containeroffset){
		$('nav').addClass('scrolled');
		$('nav').addClass('fadeInDown');
		$('header .social').hide();
		$('header').addClass('down');
	}
	else{
		$('nav').removeClass('scrolled');
		$('nav').removeClass('fadeInDown');	
		$('header').removeClass('down');
		$('header .social').show();

	}
});

/**
* Metodo drwaMaps, imprime mapas de google maps en la seccion de sucursales,
* itera por todos los divs de clase sucursales, obtiene su latitud y longitud
* para dibujar el mapa.
*
*/
function drawMaps(){
	$('.sucursal.card').each(function(index){
		var latitud = $(this).find('input[name="latitud"]').val();
		var longitud = $(this).find('input[name="longitud"]').val();
		var  divMap = '#sucursal-map' + (index+1);
		console.log(divMap);
		mapa = new GMaps({
			div: divMap,
			lat: latitud,
			lng: longitud
		});

		mapa.addMarker({
			lat: latitud,
			lng: longitud
		});
	});

}

/**
* Metodo responsiveVideos(), encierra en un div de clase videobox a cada
* iframe con source de youtube o vimeo, para poder mantener su aspecto en
* pantallas pequenas.
*
*/
function responsiveVideos(){
	$(".review iframe[src^='http://player.vimeo.com'], .review iframe[src^='http://www.youtube.com']").each(function(){
		$(this).wrap('<div class="videobox"></div>');
	});
	$('.review .videobox').each(function(){
		$(this).wrap('<div class="video_container"></div>');
	});
}