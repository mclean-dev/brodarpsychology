<?php
/**
 * Render homepage sections.
 */
function ascendoor_coach_homepage_sections() {

	$homepage_sections = array_keys( ascendoor_coach_get_homepage_sections() );

	foreach ( $homepage_sections as $section ) {
		if ( in_array( $section, $homepage_sections ) ) {
			require get_template_directory() . '/sections/' . $section . '.php';
		}
	}

}
