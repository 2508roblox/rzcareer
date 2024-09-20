jQuery( document ).ready( function( $ ) {
	
	function mkAjax( action, form, objData, callback ) {
		
		var formdata = new FormData( form[0] ),
			array = [],
			arrayLength,
			i;
		
		formdata.append( '_ajax_nonce', objDaeDownload.nonce );
		formdata.append( 'action', action );
		
		for ( x in objData ) {
			
			if ( $.isArray( objData[ x ] ) ) {
				
				array = objData[ x ];
				arrayLength = array.length;
				
				for ( i = 0; i < arrayLength; i++ ) {
					formdata.append( x + '[]', array[ i ] );
				}
				
			} else {
				
				formdata.append( x, objData[ x ] );
				
			}
			
		}
		
		$.ajax( {
			url: objDaeDownload.ajaxUrl,
			type: 'POST',
			data: formdata,
			contentType: false,
			cache: false,
			processData: false,
			success: callback
		} );
		
	}
	
	$( 'body' ).on( 'click', '.dae-shortcode-download-button', function() {
		$( this ).parent().find( '.dae-shortcode-register-wrapper' ).slideToggle();
	} );
	
	$( 'body' ).on( 'focusin', '.dae-shortcode-register-temp', function() {
		
		var nextField = $( this ).parent().next();
		
		if ( nextField[0] ) {
			$( this ).parent().remove();
			$( this ).remove();
			nextField.attr( 'style', 'display: block;' );
		} else {
			$( this ).attr( 'type', 'date' );
		}
		
	} );
	
	$( 'body' ).on( 'submit', '.dae-shortcode-register-form', function( e ) {
		
		e.preventDefault();
		
		var form = $( this ),
			objData = {
				form_content: form.parent().parent().html()
			};
			
		form.parent().find( '.dae-shortcode-register-message' ).empty();
		form.find( '.dae-shortcode-register-loading' ).show();
		
		mkAjax( 'dae_send_downloadlink', $( this ), objData, function( data ) {

			dataObj = JSON.parse( data );

			if ( 'success' === dataObj.type ) {
				form[0].reset();
			}

			form.parent().find( '.dae-shortcode-register-message' ).html( dataObj.message );
			form.find( '.dae-shortcode-register-loading' ).hide();
			
		} );
		
	} );
	
} );