/**
 * File livepreview.js.
 *
 * Deal with real time changes asynchronously.
 */

( function ( $ ) {
	// Hook into the API.
	const api = wp.customize;

	// Header text color.
	api(
		'header_textcolor',
		function ( value ) {
			value.bind(
				function ( to ) {
					if ( 'blank' === to ) {
							$( '.site-title a, .site-description' ).css(
								{
									clip: 'rect(1px, 1px, 1px, 1px)',
									position: 'absolute',
								}
							);
					} else {
						$( '.site-title a, .site-description' ).css(
							{
								clip: 'auto',
								position: 'relative',
							}
						);
						$( '.site-title a, .site-description' ).css(
							{
								color: to,
							}
						);
					}
				}
			);
		}
	);

	// Background image.
	api(
		'background_image',
		function ( value ) {
			value.bind(
				function ( to ) {
					$( 'body' ).toggleClass( 'custom-background-image', '' !== to );
				}
			);
		}
	);

	// Copyright text.
	// TODO: make sure this lines up.
	api(
		'flexline_copyright_text',
		function ( value ) {
			value.bind(
				function ( to ) {
					$( '.footer-copyright-text' ).text( to );
				}
			);
		}
	);

} )( jQuery );
