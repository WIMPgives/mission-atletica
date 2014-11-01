<?php

get_header(); ?>

		<div class="row slideshow">
			<div class="col-md-9">slideshow</div>
			<div class="col-md-3">
				<div class="row">donate/counter</div>
				<div class="row">video</div>
			</div>
		</div>

		<div class="row  quicklinks">
			<div class="col-md-3">support</div>
			<div class="col-md-3">become a sponser</div>
			<div class="col-md-3">read our story</div>
			<div class="col-md-3">donate shoe/counter</div>
		</div>

		<div class="row  content">
			<div class="col-md-9">article</div>
			<div class="col-md-3">retailer</div>
		</div>

<div class="sponsor-wrapper row">
	<div class="row">
		<?php mission_atletica_list_sponsors(); ?>
	</div>
</div>

<?php get_footer(); ?>