var screenSize;
var sidebarButton;
var phoneSize = 767;
var tabletSize = 979;
var slider;
$(document).ready(function(){
	$.supersized({
		slides  :  	[ {image : '/img/plants2.jpg', title : ''} ]
	});
	$('.bxslider').bxSlider({adaptiveHeight:true});

	screenSize = $(window).width();
});
$(window).resize(function(){
	screenSize = $(window).width();
});


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

$("#mobileMenu  select").change(function() {
  window.location = $(this).find("option:selected").val();
});


