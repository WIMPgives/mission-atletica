<?php
/**
 * The template for displaying all sponsor posts.
 *
 * @package Mission Atletica
 */

get_header(); ?>

	<div class="<?php echo esc_attr( mission_atletica_get_col_widths() ); ?>">

		<div class="row  content">
			<div class="col-md-12">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>