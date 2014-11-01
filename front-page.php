<?php

get_header(); ?>

	<div class="col-md-9">
		<div class="row slideshow">
			<div class="col-md-12">
				<?php echo do_shortcode( '[image-carousel]' ); ?>
			</div>
		</div>

		<div class="row  quicklinks">
			<div class="col-md-12">
				<div class="btn-group btn-group-justified">
				  <div class="btn-group">
				    <button type="button" class="btn btn-default">Support</button>
				  </div>
				  <div class="btn-group">
				    <button type="button" class="btn btn-default">Become a Sponsor</button>
				  </div>
				  <div class="btn-group">
				    <button type="button" class="btn btn-default">Read our Story</button>
				  </div>
				</div>
			</div>
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