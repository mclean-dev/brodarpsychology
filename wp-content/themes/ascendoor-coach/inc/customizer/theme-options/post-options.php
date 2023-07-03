<?php
/**
 * Post Options
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'ascendoor-coach' ),
		'panel' => 'ascendoor_coach_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'ascendoor_coach_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'ascendoor-coach' ),
			'section' => 'ascendoor_coach_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'ascendoor_coach_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'ascendoor-coach' ),
			'section' => 'ascendoor_coach_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'ascendoor_coach_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'ascendoor-coach' ),
			'section' => 'ascendoor_coach_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'ascendoor_coach_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'ascendoor-coach' ),
			'section' => 'ascendoor_coach_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'ascendoor_coach_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'ascendoor-coach' ),
		'section'  => 'ascendoor_coach_post_options',
		'settings' => 'ascendoor_coach_post_related_post_label',
		'type'     => 'text',
	)
);
