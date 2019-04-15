jQuery(function($){

	// lets show/hide the menu when they click the menu toggle button.
	$( ".menu-toggle" ).click(function(){

		// set a default item height
		var item_height = 50;

			// grab the header nav and its ul
			header_nav = $(".header nav"),
			header_nav_ul = header_nav.find( "ul" ),

			// get the item count
			item_count = $(".header nav ul li").length,

			// set the end height for the menu div.
			end_height = item_count*item_height;

		// if we have the scrollheight property, calculate row
		// height with that value instead.
		if ( header_nav_ul[0].scrollHeight > 0 ) {
			end_height = header_nav_ul[0].scrollHeight;
		}

		// set the header nav ul height to the menu height
		if ( header_nav_ul.height() > 0 ) {

			// reset to 0 if it's not already
			header_nav_ul.height( 0 );

		} else {

			// set nav ul height
			header_nav_ul.height( end_height );

		}

	});

	$(window).resize(function(){
		var window_width = $(window).width(),
			header_nav_ul = $( ".header nav ul" );

		if ( window_width > 767 ) {
			header_nav_ul.height( "auto" );
		} else {
			header_nav_ul.height( 0 );
		}
	});

});