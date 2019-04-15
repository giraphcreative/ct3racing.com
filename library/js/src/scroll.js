
jQuery(function( $ ){

	// scroll handler
	var scroll_to_element = function( selector ) {

		// grab the element to scroll to based on the name
		var elem = $(selector),
			menu = $("nav ul");

		// if the destination element exists
		if ( typeof( elem.offset() ) !== "undefined" ) {

			// do the scroll
			$('html, body').animate({
				scrollTop: elem.offset().top - menu.height()
			}, 1000 );

		}

	};

	$( "body.home nav li a" ).click(function( event ){

		// cancel the default link propagation
		event.preventDefault();

		// set some variables
		var a = $(this),
			li = a.parent("li"),
			url = a.attr( "href" ),
			item_id = li.attr("id").replace("menu-item-","");

		// switch based on link clicked.
		switch ( item_id ) {

			case '12':
				scroll_to_element( ".home-coach" );
			break;

			case '13':
				scroll_to_element( ".home-about" );
			break;

			case '14':
				scroll_to_element( ".header" );
			break;

			case '17':
				scroll_to_element( ".home-posts" );
			break;

			case '31':
				scroll_to_element( ".home-rally" );
			break;

			case '119':
				scroll_to_element( ".home-photos" );
			break;

			case '120':
				scroll_to_element( ".home-shop" );
			break;

			default:
				window.location.href = url;

		}

	});

});
