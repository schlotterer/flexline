/**
 *  Globals tinymce
 *
 * @package flexline
 * */

/**
 * File editor.js.
 *
 * Theme Customizer editor enhancements for a better user experience.
 */

window.flexlineAdditionalTinyMCE = window.flexlineAdditionalTinyMCE || {};
( function ( window, document, $, app ) {
	( 'use strict' );

	/**
	 * Config from WP localization.
	 */
	app.l10n = window.flexlineAdditionalTinyMCE || {};

	/**
	 * Caches elements.
	 */
	app.cache = function () {
		app.$ = {};

		app.api = wp.customize;
	};

	/**
	 * Initialization function.
	 */
	app.init = function () {
		// Build cached elements.
		app.cache();

		// Bail early if requirements aren't met.
		if ( ! app.MeetsRequirements() ) {
			return;
		}

		// Rebind editors when a control section is clicked.
		$( '.control-section' ).on( 'click', app.bindEditors );

	};

	/**
	 * Make sure the editor updates the customize option when changed in visual mode.
	 */
	app.bindEditors = function () {
		// Was needed a timeout since RTE is not initialized when this code run.
		const editorsLength = tinymce.editors.length;
		setTimeout(
			function () {
				for ( let i = 0; i < editorsLength; i++ ) {
						tinymce.editors[ i ].onChange.add(
							function ( ed ) {
								// Update HTML view textarea (that is the one used to send the data to server).
								ed.save();

								// Update the customize option.
								wp.customize(
									ed.id,
									function ( obj ) {
											obj.set( ed.getContent() );
									}
								);
							}
						);
				}
			},
			1000
		);
	};

	/**
	 * Fires when the editor is changed.
	 */
	app.editorUpdated = function () {
		const $me = $( this );

		// Update the customize option.
		wp.customize(
			this.id,
			function ( obj ) {
				obj.set( $me.val() );
			}
		);
	};

	/**
	 * Determine if requirements are met for JS bindings.
	 *
	 * @return {boolean} True if requirements are met, false otherwise.
	 */
	app.MeetsRequirements = function () {
		return $( '.flexline-customize-text-editor' ).length;
	};

	/**
	 * Safely log to the console.
	 *
	 * @param {string} str var to log
	 */
	app.log = function ( str ) {
		// Bail early if no console.
		if ( ! window.console ) {
			return;
		}

		window.console.log( str );
	};

	// Fire init on document.ready.
	$( document ).ready( app.init );

	return app;
} )( window, document, jQuery, window.flexlineAdditionalTinyMCE );
