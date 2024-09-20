jQuery( document ).ready( function( $ ) {
	
	var newWidth,
		oldWidth = $( '.dae-shortcode-download-wrapper' ).parent().width();
	
	function daeAddMediaQuery() {
		$( '.dae-shortcode-download-wrapper' ).addClass( 'dae-shortcode-download-wrapper-wide' );
	}
	
	function daeRemoveMediaQuery() {
		$( '.dae-shortcode-download-wrapper' ).removeClass( 'dae-shortcode-download-wrapper-wide' );
	}
	
	if ( oldWidth > 1000 ) {
		daeAddMediaQuery();
	}
	
	$( window ).resize( function() {
		newWidth = $( '.dae-shortcode-download-wrapper' ).parent().width();
		if ( newWidth > 1000 && oldWidth <= 1000 ) {
			daeAddMediaQuery();
		}
		if ( newWidth < 1000 && oldWidth >= 1000 ) {
			daeRemoveMediaQuery();
		}
		oldWidth = newWidth;
	} );
	
} );