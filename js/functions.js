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

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.twentyfourteen', function() {
			nav.toggleClass( 'toggled-on' );
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

	

	// Initialize Featured Content slider.
	_window.load( function() {
		if ( body.is( '.slider' ) ) {
			$( '.featured-content' ).featuredslider( {
				selector: '.featured-content-inner > article',
				controlsContainer: '.featured-content'
			} );
		}
	} );

	//Initialize Client Scroller
    if(document.getElementById("logo-scroller") !== null){
    	$("#logo-scroller").simplyScroll({
    		pauseOnHover: true,
    		pauseOnTouch: true,
    		speed: 1.5
       	});
    }
    
    $('#logo-scroller li a.no-link').click(function(e) {
    	e.preventDefault();
    });
	
	if($('.cs-summary').length > 0){
		if($('.cs-summary').height() > $('.cs-notables').height()){ 
			$('.cs-notables').height($('.cs-summary').height()); 
		} else {
			$('.cs-summary').height($('.cs-notables').height()); 
		}
		jQuery('.related_stories').css({'position':'absolute','border-bottom':0,'width':'94%'});
	}
	
} )( jQuery );

