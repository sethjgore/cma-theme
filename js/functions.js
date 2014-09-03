/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );

	// Enable menu toggle for small screens.
	( function() {
		var nav = $( '#primary-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		$( '.menu-toggle' ).on('click touchstart', function(e) {
		  e.preventDefault(); e.stopPropagation();
			nav.stop().toggleClass( 'toggled-on' );
		} );
	} )();

	/*
	 * Makes "skip to content" link work correctly in IE9 and Chrome for better
	 * accessibility.
	 *
	 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
	 */
	_window.on( 'hashchange.twentyfourteen', function() {
		var element = document.getElementById( location.hash.substring( 1 ) );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();

			// Repositions the window on jump-to-anchor to account for header height.
			window.scrollBy( 0, -80 );
		}
	} );

	

  //Initialize Homepage Slider
  if($(".hp_slider .cycle-slideshow").length>0){
    $('.hp_slider .cycle-slideshow').cycle({
  		fx: 'fade',  
  		speed: 900,
  		timeout: 6000,
  		next: "#slide_next",
  		prev: "#slide_prev",
  		pause: 1,
  		fit: 1,
  		width: "100%"  
  	});
	}
    				
  //Initialize Award Slider
  if($(".award_slider.cycle-slideshow").length>0){
    $('.award_slider.cycle-slideshow').cycle({
  		fx: 'fade', 
  		speed: 500,
  		timeout: 4500,
  		next: "#slide_next",
  		prev: "#slide_prev",
  		pause: 1
  	});
	}
    				
	//Initialize Client Scroller
    if($("#logo-scroller").length>0){
    	jQuery("#logo-scroller").simplyScroll({
    		pauseOnHover: true,
    		pauseOnTouch: true,
    		speed: 1
       	});
    }
    
    $('#logo-scroller li a.no-link').click(function(e) {
    	e.preventDefault();
    });
	
	if($('.cs-summary').length > 0 && _window.width() > 767){
		if($('.cs-summary').height() > $('.cs-notables').height()){ 
			$('.cs-notables').height($('.cs-summary').height()); 
		} else {
			$('.cs-summary').height($('.cs-notables').height()); 
		}
		jQuery('.related_stories').css({'position':'absolute','border-bottom':0,'width':'94%'});
	}
  //Filter Customer Stories
  $filter_handles = jQuery('#filter_handles');
  $filter_handles.find('li').click(function() {
        var solution = jQuery(this).attr('rel');
        $sorted = jQuery('#filter_stories_all').find('li.' + solution);
        $new = $sorted.clone(true, true);
        console.log($new);
        jQuery('#filter_stories_result').quicksand($new, {
            duration: 900,
            attribute: 'data-id',
            easing: 'easeInOutQuad',
            adjustHeight: 'dynamic',
            useScaling: true
        }, function() {
            //Reset On Click Event
            
        });
        $filter_handles.find('li').removeClass('current');
        jQuery(this).addClass('current');
    });
	
} )( jQuery );

