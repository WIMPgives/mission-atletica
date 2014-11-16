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
			selectors.spinner = null;
			selectors.message = null;
			selectors.nonce   = null;

			// Initialize the click event
			selectors.saveBtn.click( function( event ) {
				event.preventDefault();

				var SELF = $( this ),
					type = SELF.attr( 'data-type' );

				selectors.nonce   = $( document.getElementById( 'mawp_dashboard_' + type ) ).val();
				selectors.spinner = SELF.next();
				selectors.message = SELF.parent().next();

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
			var hook = 'mawp_' + type + '_dashboard';

			// Display the saving spinner
			selectors.spinner.css( 'display', 'inline-block' );

			wp.ajax.send( hook, {
				success: mawp.ajaxResponse,
				error:   mawp.ajaxResponse,
				data: {
					nonce:     selectors.nonce,
					fundGoal:  $( document.getElementById( 'fundraising-goal-' + type ) ).val(),
					donations: $( document.getElementById( 'donations-date-' + type ) ).val()
				}
			} );
		},

		ajaxResponse : function( response ) {
			selectors.spinner.css( 'display', 'none' );
			selectors.message.html( '<p>' + response + '</p>' ).slideDown().delay( 5000 ).slideUp();
		}
	};

	$( document ).ready( mawp.init );
} )( this, jQuery );