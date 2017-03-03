( function($) {

	wp.customize('gn_header_bg_color', function(value){
		value.bind( function (newval){
		
			$('#header').css('background-color', newval);
			$('.header-style2.header-sticky #header-links').css('background-color', newval);
			$('.header-style1.header-sticky #header').css('background-color', newval);						
		});
	});

// wp.customize( 'SETTING_NAME', function( value ) {
// 	value.bind( function( newval ) {
// 		// Change handled here
// 	} );
// } );

})(jQuery);

