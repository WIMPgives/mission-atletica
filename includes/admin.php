<?php

/**
 * Class WPMA_Dashboard_Widgets
 *
 * Loads our dashboard widgets
 */
class WPMA_Dashboard_Widgets {

	function __construct() {
		add_action(
			'wp_dashboard_setup',
			array( __CLASS__, 'add_dashboard_widgets' )
		);
		add_action(
			'wp_ajax_mawp_invest_dashboard',
			array( __CLASS__, 'save_invest' )
		);
	}

	/**
	 * Add a widget to the dashboard.
	 *
	 * This function is hooked into the 'wp_dashboard_setup' action below.
	 */
	public static function add_dashboard_widgets() {
		wp_add_dashboard_widget(
			'wpma_donation_invest',
			'Investment Calculator',
			array( __CLASS__, 'invest_view' )
		);
	}


	/**
	 * The view of the dashboard widget for the investment calculator
	 */
	public static function invest_view() {
		wp_nonce_field( 'mawp_save_ajax', 'mawp_dashboard_invest' ); ?>
		<form action="#">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="fundraising-goal-invest">Fundraising Goal</label>
						</th>
						<td>
							<input type="text" name="invest_calc[fund]" id="fundraising-goal-invest" class="regular-text" />
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label>Donations to Date</label>
						</th>
						<td>
							<input type="text" name="invest_calc[donations]" id="donations-date-invest" class="regular-text" />
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" id="mawp-save-dashboard" name="submit" value="Save" data-type="invest" class="button button-primary" />
			</p>
		</form>
		<?php
	}

	public static function save_invest() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'mawp_save_ajax' ) ) {
			wp_send_json_error();
		}

		$data = array();

		if ( isset( $_POST['fundGoal'] ) ) {
			$data['fund-goal'] = sanitize_text_field( $_POST['fundGoal'] );
		}

		if ( isset( $_POST['donations'] ) ) {
			$data[''] = '';
		}
	}
}
new WPMA_Dashboard_Widgets();