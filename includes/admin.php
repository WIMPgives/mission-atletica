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
		add_action(
			'wp_ajax_mawp_donate_dashboard',
			array( __CLASS__, 'save_donate' )
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

		wp_add_dashboard_widget(
			'wpma_donation_donate',
			'Donate Calculator',
			array( __CLASS__, 'donate_view' )
		);
	}


	/**
	 * The view of the dashboard widget for the investment calculator
	 */
	public static function invest_view() {
		wp_nonce_field( 'mawp_save_ajax', 'mawp_dashboard_invest' );
		$values = get_option( 'mawp_invest' );
		$fund   = ( isset( $values['fund-goal'] ) ) ? $values['fund-goal'] : '';
		$donate = ( isset( $values['donations'] ) ) ? $values['donations'] : ''; ?>
		<form action="#">
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row">
							<label for="fundraising-goal-invest">Fundraising Goal</label>
						</th>
						<td>
							<input type="text" name="invest_calc[fund]" id="fundraising-goal-invest" class="regular-text" value="<?php echo esc_attr( $fund ); ?>" />
						</td>
					</tr>

					<tr>
						<th scope="row">
							<label>Donations to Date</label>
						</th>
						<td>
							<input type="text" name="invest_calc[donations]" id="donations-date-invest" class="regular-text" value="<?php echo esc_attr( $donate ); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" id="mawp-save-dashboard" name="submit" value="Save" data-type="invest" class="button button-primary mawp-save-dashboard" />
			</p>
		</form>
		<?php
	}

	/**
	 * The view of the dashboard widget for the investment calculator
	 */
	public static function donate_view() {
		wp_nonce_field( 'mawp_save_ajax', 'mawp_dashboard_donate' );
		$values = get_option( 'mawp_donate' );
		$fund   = ( isset( $values['fund-goal'] ) ) ? $values['fund-goal'] : '';
		$donate = ( isset( $values['donations'] ) ) ? $values['donations'] : ''; ?>
		<form action="#">
			<table class="form-table">
				<tbody>
				<tr>
					<th scope="row">
						<label for="fundraising-goal-donate">Fundraising Goal</label>
					</th>
					<td>
						<input type="text" name="donate_calc[fund]" id="fundraising-goal-donate" class="regular-text" value="<?php echo esc_attr( $fund ); ?>" />
					</td>
				</tr>

				<tr>
					<th scope="row">
						<label>Donations to Date</label>
					</th>
					<td>
						<input type="text" name="donate_calc[donations]" id="donations-date-donate" class="regular-text" value="<?php echo esc_attr( $donate ); ?>" />
					</td>
				</tr>
				</tbody>
			</table>
			<p class="submit">
				<input type="submit" id="mawp-save-dashboard" name="submit" value="Save" data-type="donate" class="button button-primary mawp-save-dashboard" />
			</p>
		</form>
	<?php
	}

	/**
	 *
	 */
	public static function save_invest() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'mawp_save_ajax' ) ) {
			wp_send_json_error();
		}

		$data = array();

		if ( isset( $_POST['fundGoal'] ) ) {
			$data['fund-goal'] = sanitize_text_field( $_POST['fundGoal'] );
		}

		if ( isset( $_POST['donations'] ) ) {
			$data['donations'] = sanitize_text_field( $_POST['donations'] );
		}

		update_option( 'mawp_invest', $data );

		wp_send_json_success();
	}

	/**
	 *
	 */
	public static function save_donate() {
		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( $_POST['nonce'], 'mawp_save_ajax' ) ) {
			wp_send_json_error();
		}

		$data = array();

		if ( isset( $_POST['fundGoal'] ) ) {
			$data['fund-goal'] = sanitize_text_field( $_POST['fundGoal'] );
		}

		if ( isset( $_POST['donations'] ) ) {
			$data['donations'] = sanitize_text_field( $_POST['donations'] );
		}

		update_option( 'mawp_donate', $data );

		wp_send_json_success();
	}
}
new WPMA_Dashboard_Widgets();