<?php
/**
 * The main template file
 *
 * @package Mission Atletica
 * @since 0.1.0
 */

get_header(); ?>

	<div class="<?php echo esc_attr( mission_atletica_get_col_widths() ); ?>">

		<div class="row  content">
			<div class="col-md-12">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php mission_atletica_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</div>
		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>