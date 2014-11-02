<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Mission Atletica
 */
?>

<div class="col-md-3 sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<div class="row donate invest sidebar-widget">
		<a href="#">
			<div class="left-col">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/moneySimbol.png" alt="Invest">
			</div>
			<div class="right-col">
				<h2>Invest</h2>
				<p>Fundraising Goal <span class="text-highlight-light">$3000</span>
				Donations to date <span class="text-highlight-light">$2500</span></p>
				<div class="progress">
				    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
					90%
				    </div>
				</div>
			</div>
		</a>
	</div>
	<div class="row donate sidebar-widget">
		<a href="#">
			<div class="left-col">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shoeSimbol.png" alt="Donate Shoes">
			</div>
			<div class="right-col">
				<h2>Donate Shoes</h2>
				<p>Shoes needed <span class="text-highlight-light">10,000</span><br />
				Shoes donated <span class="text-highlight-light">9,5000</span></p>
				<div class="progress">
				    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
					90%
				    </div>
				</div>
			</div>
		</a>
	</div>
	<div class="row video sidebar-widget">
	</div>
</div>
