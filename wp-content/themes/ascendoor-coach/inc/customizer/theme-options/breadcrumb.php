<?php
/**
 * Breadcrumb
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'ascendoor-coach' ),
		'panel' => 'ascendoor_coach_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'ascendoor_coach_enable_breadcrumb',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'ascendoor-coach' ),
			'section' => 'ascendoor_coach_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'ascendoor_coach_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'ascendoor-coach' ),
		'active_callback' => 'ascendoor_coach_is_breadcrumb_enabled',
		'section'         => 'ascendoor_coach_breadcrumb',
	)
);
