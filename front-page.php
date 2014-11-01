<?php

get_header(); ?>

	<div class="col-md-9">
		<div class="row slideshow">
			<div class="col-md-9">slideshow</div>
		</div>

		<div class="row  quicklinks">
			<div class="col-md-3">support</div>
			<div class="col-md-3">become a sponser</div>
			<div class="col-md-3">read our story</div>
		</div>

		<div class="row  content">
			<div class="col-md-9">article</div>
		</div>
	</div>

<?php get_sidebar(); ?>

<div class="sponsor-wrapper row">
	<div class="row">
		<?php mission_atletica_list_sponsors(); ?>
	</div>
</div>
		

<?php get_footer(); ?>