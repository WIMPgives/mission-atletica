/**
 * Mission Atletica
 * http://missionatletica.com
 *
 * Copyright (c) 2014 Cole Geissinger
 * Licensed under the GPLv2+ license.
 */

var mawp;

( function( window, $, undefined ) {
	'use strict';

	var wp = window.wp,
		selectors = {};

	mawp = {
		init : function() {
			selectors.saveBtn     = $( document.getElementById( 'mawp-save-dashboard' ) );
			selectors.nonce       = null;
			selectors.currentDash = null;

			// Initialize the click event
			selectors.saveBtn.click( function( event ) {
				event.preventDefault();

				var type = $( this ).attr( 'data-type' );

				selectors.currentDash = $( this ).parent().prev();
				selectors.nonce       = $( document.getElementById( 'mawp_dashboard_invest' ) ).val();

				mawp.processAjax( '', type );
			});
		},

		/**
		 * Allows to process
		 *
		 * @param object
		 * @param type
		 */
		processAjax : function( object, type ) {
			var formInput = selectors.currentDash.find( 'input[type="text"]' ),
				hook      = 'mawp_' + type + '_dashboard',
				data      = {},
				count     = 0;

			formInput.each( function( input ) {
				data[ data ][ count ] = $( this ).val();

				count++;
			} );

			data

			wp.ajax.send( hook, {
				success: ajaxSuccess(),
				error:   ajaxError(),
				data: {
					nonce: selectors.nonce,
					action:
				}
			} );
		}
	};

	$( document ).ready( mawp.init );
} )( this, jQuery );