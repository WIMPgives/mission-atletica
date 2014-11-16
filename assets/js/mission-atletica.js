/*! Mission Atletica - v0.1.0 - 2014-11-16
 * http://missionatletica.com
 * Copyright (c) 2014
 * Licensed GPLv2+
 */
function handleMonthlyDonation() {
	// Reset applicable form inputs
	var strAmount = document.getElementById( 'pp_amount' ).value;

	document.getElementById( 'pp_donations' ).disabled    = true;
	document.getElementById( 'pp_subscription' ).disabled = true;
	document.getElementById( 'pp_a3' ).disabled           = true;
	document.getElementById( 'pp_p3' ).disabled           = true;
	document.getElementById( 'pp_t3' ).disabled           = true;

	if ( strAmount.length && document.getElementById( 'pp_src' ).checked ) {

		// Recurring monthly payments
		document.getElementById( 'pp_subscription' ).disabled = false;
		document.getElementById( 'pp_a3' ).value              = strAmount;
		document.getElementById( 'pp_a3' ).disabled           = false;
		document.getElementById( 'pp_p3' ).disabled           = false;
		document.getElementById( 'pp_t3' ).disabled           = false;
	} else {
		// One-time payment
		document.getElementById( 'pp_donations' ).disabled = false;
	}
}

( function( $, selectpicker, undefined ) {
	$( '.selectpicker' ).selectpicker();
	handleMonthlyDonation();
	$( document.getElementById( 'pp_src' ) ).on( 'click', handleMonthlyDonation );
	$( document.getElementById( 'pp_amount' ) ).on( 'change', handleMonthlyDonation );
} )( jQuery, selectpicker );