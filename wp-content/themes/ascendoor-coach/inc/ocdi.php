<?php

function ascendoor_coach_intro_text( $default_text ) {
	$default_text .= sprintf(
		'<div class="notice notice-info ascendoor-coach-demo-data"><p class="demo-file-content">%1$s <a href="%2$s" target="_blank">%3$s</a></p></div>',
		esc_html__( 'Demo content files for Ascendoor Coach Theme.', 'ascendoor-coach' ),
		esc_url( 'https://docs.ascendoor.com/docs/ascendoor-coach/getting-started/introduction/#demo-content' ),
		esc_html__( 'Click here to download demo files.', 'ascendoor-coach' )
	);
	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'ascendoor_coach_intro_text' );

/**
 * OCDI after import.
 */
function ascendoor_coach_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'ocdi/after_import', 'ascendoor_coach_after_import_setup' );
