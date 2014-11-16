<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Mission Atletica
 */

// Only load the sidebar as long as we have data to display
if ( mission_atletica_has_sidebar_data() ) : ?>
	<div class="col-md-3 sidebar">
		<?php
		// Load any widgets
		dynamic_sidebar( 'sidebar-1' );

		// Load the Invest calculator widget
		$invest = mission_atletica_get_calculator_data( 'invest' );
		if ( ! empty( $invest ) ) :
			?>
			<div class="row donate invest sidebar-widget">

				<a href="<?php echo esc_url( home_url( '/donate/' ) ); ?>">
					<div class="left-col">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/moneySimbol.png' ); ?>" alt="Invest">
					</div>
					<div class="right-col">
						<h2>Invest</h2>
						<p>Fundraising Goal <span class="text-highlight-light"><?php echo esc_html( $invest['fund-goal'] ); ?></span><br />
						Donations to date <span class="text-highlight-light"><?php echo esc_html( $invest['donations'] ); ?></span></p>
					</div>
					<div class="progress">
						<?php $percentage = mission_atletica_get_percentage( $invest['donations'], $invest['fund-goal'] ); ?>
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $percentage ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $percentage ); ?>%;">
							<?php echo esc_html( $percentage ); ?>%
						</div>
					</div>
				</a>
			</div>
			<?php
		endif;

		$donate = mission_atletica_get_calculator_data( 'donate' );
		if ( ! empty( $donate ) ) :
			?>
			<div class="row donate sidebar-widget">
				<a href="<?php echo esc_url( home_url( '/drop-locations/' ) ); ?>">
					<div class="left-col">
						<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/shoeSimbol.png' ); ?>" alt="Donate Shoes">
					</div>
					<div class="right-col">
						<h2>Donate Shoes</h2>
						<p>Shoes needed <span class="text-highlight-light"><?php echo esc_html( $donate['fund-goal'] ); ?></span><br />
						Shoes donated <span class="text-highlight-light"><?php echo esc_html( $donate['donations'] ); ?></span></p>
					</div>
					<div class="progress">
						<?php $percentage = mission_atletica_get_percentage( $donate['donations'], $donate['fund-goal'] ); ?>
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr( $percentage ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr( $percentage ); ?>%;">
							<?php echo esc_html( $percentage ); ?>%
						</div>
					</div>
				</a>
			</div>
			<?php
		endif;
		?>
		<div class="row video sidebar-widget">
		</div>
	</div>
	<?php
endif; ?>