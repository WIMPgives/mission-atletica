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
			selectors.saveBtn = $( '.mawp-save-dashboard' );
			selectors.nonce   = null;

			// Initialize the click event
			selectors.saveBtn.click( function( event ) {
				event.preventDefault();

				var type = $( this ).attr( 'data-type' );

				selectors.nonce = $( document.getElementById( 'mawp_dashboard_' + type ) ).val();

				mawp.processAjax( type );
			});
		},

		/**
		 * Allows to process
		 *
		 * @param object
		 * @param type
		 */
		processAjax : function( type ) {
			var hook      = 'mawp_' + type + '_dashboard';

			wp.ajax.send( hook, {
				success: mawp.ajaxSuccess(),
				error:   mawp.ajaxError(),
				data: {
					nonce:     selectors.nonce,
					fundGoal:  $( document.getElementById( 'fundraising-goal-' + type ) ).val(),
					donations: $( document.getElementById( 'donations-date-' + type ) ).val()
				}
			} );
		},

		ajaxSuccess : function( response ) {
			console.log('SUCCESS' );
			console.log( response );
		},

		ajaxError : function( response ) {
			console.log( 'ERROR' );
			console.log( response );
		}
	};

	$( document ).ready( mawp.init );
} )( this, jQuery );