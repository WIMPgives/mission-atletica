<?php

get_header(); ?>

	<div class="col-md-9">
		<div class="row slideshow">
			<div class="col-md-12">
				<?php echo do_shortcode( '[image-carousel]' ); ?>
			</div>
		</div>

		<div class="row  quicklinks">
			<div class="col-md-3">support</div>
			<div class="col-md-3">become a sponser</div>
			<div class="col-md-3">read our story</div>
		</div>

		<div class="row  content">
			<div class="col-md-12"><?php the_content(); ?></div>
		</div>
	</div>

	<?php get_sidebar(); ?>

<div class="sponsor-wrapper row">
	<?php mission_atletica_list_sponsors(); ?>
</div>


<?php get_footer(); ?>