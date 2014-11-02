<?php

get_header(); ?>

	<div class="row">
		<div class="col-md-9">
			<div class="row slideshow">
				<div class="col-md-12">
					<?php echo do_shortcode( '[image-carousel]' ); ?>
				</div>
			</div>

			<div class="row  quicklinks">
				<div class="col-md-12">

					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/images/edgarWshoes200.png" alt="Read our story" />

						<p class="btn-caption">Read Our Story</p>

						<p class="btn-text">
							Meet the man behind the mission.<br /><a href="">Learn more...</a></p>
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/images/OurMission.png" alt="Support our mission" />

						<p class="btn-caption">Support Our Mission</p>

						<p class="btn-text">
							Donate shoes, money or your time.<br /><a href="">Learn more...</a></p>
					</div>
					<div class="col-md-4">
						<img src="<?php echo get_template_directory_uri(); ?>/images/SponsorsPict.png" alt="Become a sponsor" />

						<p class="btn-caption">Become a Sponsor</p>

						<p class="btn-text">
							Help kids experience the joy of running.<br /><a href="">Learn more...</a>
						</p>
					</div>
				</div>
			</div>

			<div class="row  content">
				<div class="col-md-12"><?php the_content(); ?></div>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>

	<div class="sponsor-wrapper">
		<div class="sponsor-intro col-md-12"><h3>Our Sponsors</h3></div>
		<?php mission_atletica_list_sponsors(); ?>
	</div>

<?php get_footer(); ?>