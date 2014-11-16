<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Mission Atletica
 */

if ( ! function_exists( 'mission_atletica_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function mission_atletica_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'mission-atletica' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'mission-atletica' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'mission-atletica' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'mission_atletica_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function mission_atletica_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'mission-atletica' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'mission-atletica' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'mission-atletica' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'mission_atletica_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function mission_atletica_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'mission-atletica' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'mission-atletica' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'mission_atletica_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function mission_atletica_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'mission-atletica' ) );
		if ( $categories_list && mission_atletica_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'mission-atletica' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'mission-atletica' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'mission-atletica' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'mission-atletica' ), __( '1 Comment', 'mission-atletica' ), __( '% Comments', 'mission-atletica' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'mission-atletica' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function mission_atletica_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'mission_atletica_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'mission_atletica_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so mission_atletica_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so mission_atletica_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in mission_atletica_categorized_blog.
 */
function mission_atletica_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'mission_atletica_categories' );
}
add_action( 'edit_category', 'mission_atletica_category_transient_flusher' );
add_action( 'save_post',     'mission_atletica_category_transient_flusher' );


/**
 * Fetch the list of sponsors
 *
 * @return mixed
 */
function mission_atletica_get_sponsors() {
	if ( false === ( $sponsors = get_transient( 'mawp_sponsors' ) ) ) {
		$args     = array(
			'post_type'      => 'sponsors',
			'posts_per_page' => 20,
			'orderby' => 'name',
			'order' => 'ASC',
		);
		$sponsors_query = new WP_Query( $args );
		$sponsors       = $sponsors_query->posts;

		set_transient( 'mawp_sponsors', $sponsors, HOUR_IN_SECONDS );
	}

	return $sponsors;
}

/**
 * Generates the HTML list for the sponsors listing on the homepage
 *
 * @return void
 */
function mission_atletica_list_sponsors() {
	$sponsors = mission_atletica_get_sponsors();

	if ( ! empty( $sponsors ) && is_array( $sponsors ) ) : ?>
	<div class="row">
		<?php foreach ( $sponsors as $sponsor ) : ?>
			<div class="col-md-2 col-sm-4 col-xs-6">
				<a href="<?php echo esc_url( get_the_permalink( $sponsor->ID ) ); ?>">
					<?php echo get_the_post_thumbnail( $sponsor->ID, 'mawp-sponsor-hp' ); ?>
				</a>
			</div>
		<?php endforeach;
	endif;
}

/**
 * Fetches the options data set for the donation calculators.
 * Accepts one argument with a value of 'invest' or 'donate'.
 *
 * @param string $type The type of data we want to return
 *
 * @return bool|mixed|void
 */
function mission_atletica_get_calculator_data( $type = null ) {
	if ( ! isset( $type ) ) {
		return false;
	}

	// Define our list of options we can request
	$options = array(
		'invest',
		'donate',
	);

	// Make sure we requested a proper value
	if ( ! in_array( $type, $options ) ) {
		return false;
	}

	return get_option( 'mawp_' . $type );
}

/**
 * Calculates the percentage between our donations goal and status
 *
 * @param mixed $amount The current progress. Will convert strings to ints, but integers are
 *                      recommended.
 * @param mixed $goal   The max goal we need to hit. Will convert strings to ints, but integers
 *                      are recommended.
 *
 * @return float|int
 */
function mission_atletica_get_percentage( $amount, $goal ) {
	// Return early if one of our values is empty
	if ( empty( $amount ) || empty( $goal ) ) {
		return 0;
	}

	// Convert our strings to integers and extract only the numbers
	if ( is_string( $amount ) ) {
		$amount = (int) filter_var( $amount, FILTER_SANITIZE_NUMBER_INT );
	}
	if ( is_string( $goal ) ) {
		$goal   = (int) filter_var( $goal, FILTER_SANITIZE_NUMBER_INT );
	}

	// Return with a zero percentage if any number is zero
	if ( 0 === $amount || 0 === $goal ) {
		return 0;
	} else {
		return round( ( $amount / $goal ) * 100 );
	}
}

/**
 * @return bool
 */
function mission_atletica_has_sidebar_data() {
	$invest = mission_atletica_get_calculator_data( 'invest' );
	$donate = mission_atletica_get_calculator_data( 'donate' );


	if ( ! array_filter( $invest ) && ! array_filter( $donate ) ) {
		return false;
	} else {
		return true;
	}
}

/**
 * Figures out if we need to load the layout in a two column or one column. This is determined
 * if there is sidebar content or not.
 *
 * @return string
 */
function mission_atletica_get_col_widths() {
	if ( mission_atletica_has_sidebar_data() ) {
		return 'col-md-9';
	} else {
		return 'col-md-12';
	}
}