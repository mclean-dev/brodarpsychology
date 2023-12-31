<?php

/**
 * Dynamic CSS
 */
function ascendoor_coach_dynamic_css() {

	$header_font           = get_theme_mod( 'ascendoor_coach_header_font', 'Averia Serif Libre' );
	$body_font             = get_theme_mod( 'ascendoor_coach_body_font', 'Lato' );
	$site_title_font       = get_theme_mod( 'ascendoor_coach_site_title_font', 'Poppins' );
	$site_description_font = get_theme_mod( 'ascendoor_coach_site_description_font', 'Comfortaa' );

	$custom_css  = '';
	$custom_css .= '
	/* Color */
	:root {
		--header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
	}
	';

	$custom_css .= '
	/* Typograhpy */
	:root {
		--font-heading: "' . esc_attr( $header_font ) . '", serif;
		--font-main: -apple-system, BlinkMacSystemFont,"' . esc_attr( $body_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
	}

	body,
	button, input, select, optgroup, textarea {
		font-family: "' . esc_attr( $body_font ) . '", serif;
	}

	.site-title a {
		font-family: "' . esc_attr( $site_title_font ) . '", serif;
	}
	
	.site-description {
		font-family: "' . esc_attr( $site_description_font ) . '", serif;
	}
	';

	wp_add_inline_style( 'ascendoor-coach-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'ascendoor_coach_dynamic_css', 99 );
