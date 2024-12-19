function movie_critic_review_menu_open_nav() {
	window.movie_critic_review_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function movie_critic_review_menu_close_nav() {
	window.movie_critic_review_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});
 
jQuery(document).ready(function () {
	window.movie_critic_review_currentfocus=null;
  	movie_critic_review_checkfocusdElement();
	var movie_critic_review_body = document.querySelector('body');
	movie_critic_review_body.addEventListener('keyup', movie_critic_review_check_tab_press);
	var movie_critic_review_gotoHome = false;
	var movie_critic_review_gotoClose = false;
	window.movie_critic_review_responsiveMenu=false;
 	function movie_critic_review_checkfocusdElement(){
	 	if(window.movie_critic_review_currentfocus=document.activeElement.className){
		 	window.movie_critic_review_currentfocus=document.activeElement.className;
	 	}
 	}
 	function movie_critic_review_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.movie_critic_review_responsiveMenu){
			if (!e.shiftKey) {
				if(movie_critic_review_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				movie_critic_review_gotoHome = true;
			} else {
				movie_critic_review_gotoHome = false;
			}

		}else{

			if(window.movie_critic_review_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.movie_critic_review_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.movie_critic_review_responsiveMenu){
				if(movie_critic_review_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					movie_critic_review_gotoClose = true;
				} else {
					movie_critic_review_gotoClose = false;
				}
			
			}else{

			if(window.movie_critic_review_responsiveMenu){
			}}}}
		}
	 	movie_critic_review_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);

jQuery('.popup-btn').on('click', function(){
		var video_url = jQuery(this).closest('.video-box').find('input[name="video-url"]');
		jQuery('.video-popup embed').attr('src', video_url.val());
    jQuery('.video-popup').fadeIn('slow');
    return false;
  });
 
  jQuery('.popup-bg').on('click', function(){
    jQuery('.video-popup').slideUp('slow');
    return false;
  });

   jQuery('.close-btn').on('click', function(){
		 jQuery('.video-popup embed').attr('src', '');
     jQuery('.video-popup').fadeOut('slow');
      return false;
   }); 
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});

