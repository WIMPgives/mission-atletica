<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Mission Atletica
 */
?>

<div class="col-md-3 sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
	<div class="row donate">
		<div class="left-col">
			<img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-3-1/512/coin-circle-dollar-128.png" width="100px" height="100px">
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
	</div>
	<div class="row video">
		<img src="http://bestcamera.biz/wp-content/uploads/2014/08/video-player-button.png" width="80%" height="80%;">
	</div>
	<div class="row donate">
		<div class="left-col">
			<img src="http://cdn.flaticon.com/png/256/38703.png" width="100px" height="100px">
		</div>
		<div class="right-col">
			<h2>Donate Your Shoes</h2>
			<p>Shoes needed 10,000<br />
			Shoes donated 9,5000</p>
			<div class="progress">
			    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
				90%
			    </div>
			</div>
		</div>
	</div>
	<div class="row"><span class="btn btn-primary">Retailers go here</span></div>
</div>
