<?php

/**
 * About Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_about_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'About Section', 'ascendoor-coach' ),
		'priority' => 30,
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_about_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_about_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_about_section',
			'settings' => 'ascendoor_coach_enable_about_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_about_section',
		array(
			'selector' => '#ascendoor_coach_about_section .section-link',
			'settings' => 'ascendoor_coach_enable_about_section',
		)
	);
}

// About Section - Section Subtitle.
$wp_customize->add_setting(
	'ascendoor_coach_about_subtitle',
	array(
		'default'           => __( 'About us', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_about_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_about_section',
		'settings'        => 'ascendoor_coach_about_subtitle',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_about_section_enabled',
	)
);

// About Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_coach_about_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_about_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_about_section',
		'settings'        => 'ascendoor_coach_about_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_coach_is_about_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-coach' ),
			'post' => esc_html__( 'Post', 'ascendoor-coach' ),
		),
	)
);

// About Section - Content Type Post.
$wp_customize->add_setting(
	'ascendoor_coach_about_content_post',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_about_content_post',
	array(
		'section'         => 'ascendoor_coach_about_section',
		'settings'        => 'ascendoor_coach_about_content_post',
		'label'           => esc_html__( 'Select Post', 'ascendoor-coach' ),
		'active_callback' => 'ascendoor_coach_is_about_section_and_content_type_post_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_coach_get_post_choices(),
	)
);

// About Section - Content Type Page.
$wp_customize->add_setting(
	'ascendoor_coach_about_content_page',
	array(
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_about_content_page',
	array(
		'label'           => esc_html__( 'Select Page', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_about_section',
		'settings'        => 'ascendoor_coach_about_content_page',
		'active_callback' => 'ascendoor_coach_is_about_section_and_content_type_page_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_coach_get_page_choices(),
	)
);

// About Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_about_button_label',
	array(
		'default'           => __( 'Explore More', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_about_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_about_section',
		'settings'        => 'ascendoor_coach_about_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_about_section_enabled',
	)
);
