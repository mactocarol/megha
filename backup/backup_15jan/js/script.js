$(document).ready(function(e) {
    $('.nav-open').click(function(e) {
		//alert();
        $('.nav').toggle(0);
    });
});




$(window).load(function() {
$('.flexslider').flexslider({
   	animation: "fade",
   	controlNav: "paging"
   	});
});



$(document).ready(function() {
 $(window).scroll(function() {
    if ($(this).scrollTop() > 100){  
        $('.header').addClass("fix_header");
        $('.name').addClass("fix_name");
        $('.free_trail').addClass("fix_free_trail");
        $('.nav').addClass("fix_nav");
		$('.logo').addClass("logo_img1");
		$('.nav li').addClass("fix_nav li");
    }
    else{
        $('.header').removeClass("fix_header");
        $('.name').removeClass("fix_name");
        $('.free_trail').removeClass("fix_free_trail");
        $('.nav').removeClass("fix_nav");
		$('.logo').removeClass("logo_img1");
    }
    
});
});

$(document).ready(function(){
	$('.product_cont').hide();
	$('.product_cont:first').show();
	$('.product_nav li').click(function(){
		$('.product_cont').hide();
		var activeTab = $(this).find('a').attr('href');
		$(activeTab).fadeIn('slow');
		return false;
	});
	$(function(){
		$(".product_nav li:first").addClass('product_nav_active');
		$(".product_nav ul li").click(function(){
			$(".product_nav ul li").removeClass('product_nav_active');
			$(this).addClass('product_nav_active');
		});
	});
});





$(document).ready(function() {	
	$('.fadeInRightBig').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInRightBig', 
	    offset: 100    
	});
	$('.fadeInLeftBig').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInLeftBig', 
	    offset: 100    
	});
	$('.fadeInUp').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInUp', 
	    offset: 100    
	});
	$('.fadeInDown').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInDown', 
	    offset: 100    
	});
	$('.fadeInLeft').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInLeft', 
	    offset: 100    
	});
	$('.fadeInRight').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInRight', 
	    offset: 100    
	});
	$('.flipInX').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock flipInX', 
	    offset: 100    
	});
	$('.zoomIn').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock zoomIn', 
	    offset: 100    
	});
	$('.fadeInDownBig').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInDownBig', 
	    offset: 100    
	});
	$('.fadeInUpBig').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock fadeInUpBig', 
	    offset: 100    
	});
	$('.bounceIn').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock bounceIn', 
	    offset: 100    
	});
	$('.swing').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock swing', 
	    offset: 100    
	});
	$('.rotateIn').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock rotateIn', 
	    offset: 100    
	});
	$('.swing').addClass("hidden").viewportChecker({
	    classToAdd: 'visible animateblock swing', 
	    offset: 100    
	});
});

$(function () {
  $('.live').scrollbox({
    linear: true,
    step: 1,
    delay:2,
    speed: 50
  });
});

jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 5000
        });
    });
	
var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://web.archive.org/web/20160315031016/https://ssl/' : 'https://web.archive.org/web/20160315031016/http://www/') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

$(document).ready(function(e) {
	var owl = $(".post");
    owl.owlCarousel({
    	items :4,
		autoPlay : true,
		pagination : false,
		slideSpeed : 1000
    });
     
    $(".next").click(function(){
    	owl.trigger('owl.next');
    });
    $(".prev").click(function(){
    	owl.trigger('owl.prev');
    });

	var vide = $(".video");
    vide.owlCarousel({
    	items :2,
		autoPlay :true,
		pagination :true,
		slideSpeed : 1000 
    });
     
    $(".vnext").click(function(){
    	vide.trigger('owl.next');
    });
    $(".vprev").click(function(){
    	vide.trigger('owl.prev');
    });
	
});

$(function(){
	$(window).scroll(function(){
		if($(this).scrollTop()>200){
			$('#backtotop').fadeIn();
		}else{
			$('#backtotop').fadeOut();
		}
	});
	$('#backtotop').click(function(){
		$('body,html').animate({scrollTop:0},800);
	});
	//$('.fade').fadeIn(1500);
});


( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	$('#cssmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} )( jQuery );


/*
     FILE ARCHIVED ON 03:10:16 Mar 15, 2016 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 09:28:38 Jan 01, 2018.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/