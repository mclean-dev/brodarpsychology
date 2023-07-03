<?php
/**
 * Typography
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_typography',
	array(
		'panel' => 'ascendoor_coach_theme_options',
		'title' => esc_html__( 'Typography', 'ascendoor-coach' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'ascendoor_coach_site_title_font',
	array(
		'default'           => 'Poppins',
		'sanitize_callback' => 'ascendoor_coach_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_typography',
		'settings' => 'ascendoor_coach_site_title_font',
		'type'     => 'select',
		'choices'  => ascendoor_coach_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'ascendoor_coach_site_description_font',
	array(
		'default'           => 'Comfortaa',
		'sanitize_callback' => 'ascendoor_coach_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_typography',
		'settings' => 'ascendoor_coach_site_description_font',
		'type'     => 'select',
		'choices'  => ascendoor_coach_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'ascendoor_coach_header_font',
	array(
		'default'           => 'Averia Serif Libre',
		'sanitize_callback' => 'ascendoor_coach_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_typography',
		'settings' => 'ascendoor_coach_header_font',
		'type'     => 'select',
		'choices'  => ascendoor_coach_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'ascendoor_coach_body_font',
	array(
		'default'           => 'Lato',
		'sanitize_callback' => 'ascendoor_coach_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_typography',
		'settings' => 'ascendoor_coach_body_font',
		'type'     => 'select',
		'choices'  => ascendoor_coach_get_all_google_font_families(),
	)
);
