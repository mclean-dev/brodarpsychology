<?php
/**
 * Sidebar Option
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'ascendoor-coach' ),
		'panel' => 'ascendoor_coach_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_coach_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'ascendoor-coach' ),
		'section' => 'ascendoor_coach_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-coach' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-coach' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-coach' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_coach_post_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'ascendoor-coach' ),
		'section' => 'ascendoor_coach_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-coach' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-coach' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-coach' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'ascendoor_coach_page_sidebar_position',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'ascendoor-coach' ),
		'section' => 'ascendoor_coach_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'ascendoor-coach' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'ascendoor-coach' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'ascendoor-coach' ),
		),
	)
);
