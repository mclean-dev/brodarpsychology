<?php
/**
 * Pagination
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_pagination',
	array(
		'panel' => 'ascendoor_coach_theme_options',
		'title' => esc_html__( 'Pagination', 'ascendoor-coach' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'ascendoor_coach_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_pagination',
			'settings' => 'ascendoor_coach_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'ascendoor_coach_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_pagination',
		'settings'        => 'ascendoor_coach_pagination_type',
		'active_callback' => 'ascendoor_coach_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'ascendoor-coach' ),
			'numeric' => __( 'Numeric', 'ascendoor-coach' ),
		),
	)
);
