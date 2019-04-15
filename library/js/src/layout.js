

jQuery(function($){


	// SET DIVS TO FULL HEIGHT OF VIEWPORT
	var full_height_divs = function(){

		// set a variable for the window height
		var window_height = $(window).height(),

			// also the header 
			header = $(".home .header");

		// set the div height
		header.height( window_height );

	};



	// SET IMAGE MARGINS ON NARROW CONTENT PAGES
	var image_margins = function(){

		if ( $(window).width()>1100 ) {

			$(".wrap.narrow img.alignright").each(function(){
				$(this).css( "margin-right", -( $(this).width()/3 ) );
			});

			$(".wrap.narrow img.alignleft").each(function(){
				$(this).css( "margin-left", -( $(this).width()/3 ) );
			});

		} else {

			$(".wrap.narrow img.alignright").each(function(){
				$(this).css( "margin-right", 0 );
			});

			$(".wrap.narrow img.alignleft").each(function(){
				$(this).css( "margin-left", 0 );
			});

		}

	};


	// set full height divs
	full_height_divs();

	// set margins on images
	image_margins();


	// set the heights when the window resizes, in case padding changes
	// at breakpoints.
	$(window).resize( function(){

		full_height_divs();

		image_margins();

	});
	
});


