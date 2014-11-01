<?php

/**
 * Register our sponsor post type
 *
 * @uses register_post_type()
 *
 * @return void
 */
function sponsors_init() {
	register_post_type( 'sponsors', array(
		'labels'            => array(
			'name'                => __( 'Sponsors', 'mawp' ),
			'singular_name'       => __( 'Sponsors', 'mawp' ),
			'all_items'           => __( 'Sponsors', 'mawp' ),
			'new_item'            => __( 'New Sponsors', 'mawp' ),
			'add_new'             => __( 'Add New', 'mawp' ),
			'add_new_item'        => __( 'Add New Sponsors', 'mawp' ),
			'edit_item'           => __( 'Edit Sponsors', 'mawp' ),
			'view_item'           => __( 'View Sponsors', 'mawp' ),
			'search_items'        => __( 'Search Sponsors', 'mawp' ),
			'not_found'           => __( 'No Sponsors found', 'mawp' ),
			'not_found_in_trash'  => __( 'No Sponsors found in trash', 'mawp' ),
			'parent_item_colon'   => __( 'Parent Sponsors', 'mawp' ),
			'menu_name'           => __( 'Sponsors', 'mawp' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
	) );

}
add_action( 'init', 'sponsors_init' );

function sponsors_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sponsors'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Sponsors updated. <a target="_blank" href="%s">View Sponsors</a>', 'mawp'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'mawp'),
		3 => __('Custom field deleted.', 'mawp'),
		4 => __('Sponsors updated.', 'mawp'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Sponsors restored to revision from %s', 'mawp'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Sponsors published. <a href="%s">View Sponsors</a>', 'mawp'), esc_url( $permalink ) ),
		7 => __('Sponsors saved.', 'mawp'),
		8 => sprintf( __('Sponsors submitted. <a target="_blank" href="%s">Preview Sponsors</a>', 'mawp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Sponsors scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Sponsors</a>', 'mawp'),
			// translators: Publish box date format, see http://php.net/date
			date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Sponsors draft updated. <a target="_blank" href="%s">Preview Sponsors</a>', 'mawp'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sponsors_updated_messages' );