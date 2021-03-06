<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Mission Atletica
 */

get_header(); ?>

<div class="<?php echo esc_attr( mission_atletica_get_col_widths() ); ?>">

	<div class="row  content">
		<div class="col-md-12">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>