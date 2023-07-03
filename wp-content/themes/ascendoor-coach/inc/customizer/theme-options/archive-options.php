<?php
/**
 * Archive Options
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_archive_options',
	array(
		'title' => esc_html__( 'Archive Options', 'ascendoor-coach' ),
		'panel' => 'ascendoor_coach_theme_options',
	)
);

// Archive Options - Excerpt Length.
$wp_customize->add_setting(
	'ascendoor_coach_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'ascendoor_coach_sanitize_number_range',
		'validate_callback' => 'ascendoor_coach_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'ascendoor-coach' ),
		'description' => esc_html__( 'Min 1 & Max 200. Please input the valid number and save. Then refresh the page to see the change.', 'ascendoor-coach' ),
		'section'     => 'ascendoor_coach_archive_options',
		'settings'    => 'ascendoor_coach_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);

// Archive Options - Column layout.
$wp_customize->add_setting(
	'ascendoor_coach_column_layout',
	array(
		'default'           => 'column-2',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_column_layout',
	array(
		'label'    => esc_html__( 'Column Layout', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_archive_options',
		'settings' => 'ascendoor_coach_column_layout',
		'type'     => 'select',
		'choices'  => array(
			'column-2' => __( 'Column 2', 'ascendoor-coach' ),
			'column-3' => __( 'Column 3', 'ascendoor-coach' ),
		),
	)
);

// Archive Options - Read More Text.
$wp_customize->add_setting(
	'ascendoor_coach_excerpt_more_text',
	array(
		'default'           => esc_html__( 'Read More', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_excerpt_more_text',
	array(
		'label'    => esc_html__( 'Read More Button Label', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_archive_options',
		'settings' => 'ascendoor_coach_excerpt_more_text',
		'type'     => 'text',
	)
);
