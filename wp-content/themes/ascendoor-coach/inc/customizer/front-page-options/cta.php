<?php
/**
 * CTA Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_cta_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'CTA Section', 'ascendoor-coach' ),
		'priority' => 80,
	)
);

// CTA Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_cta_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_cta_section',
		array(
			'label'    => esc_html__( 'Enable CTA Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_cta_section',
			'settings' => 'ascendoor_coach_enable_cta_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_cta_section',
		array(
			'selector' => '#ascendoor_coach_cta_section .section-link',
			'settings' => 'ascendoor_coach_enable_cta_section',
		)
	);
}

// CTA Section - Section Overlay.
$wp_customize->add_setting(
	'ascendoor_coach_enable_cta_overlay',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_cta_overlay',
		array(
			'label'           => esc_html__( 'Enable Section Overlay', 'ascendoor-coach' ),
			'section'         => 'ascendoor_coach_cta_section',
			'settings'        => 'ascendoor_coach_enable_cta_overlay',
			'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
		)
	)
);

// CTA Section - Text Dark.
$wp_customize->add_setting(
	'ascendoor_coach_enable_cta_text_dark',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_cta_text_dark',
		array(
			'label'           => esc_html__( 'Enable Dark Content', 'ascendoor-coach' ),
			'section'         => 'ascendoor_coach_cta_section',
			'settings'        => 'ascendoor_coach_enable_cta_text_dark',
			'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
		)
	)
);

// CTA Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_coach_cta_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_cta_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_cta_section',
		'settings'        => 'ascendoor_coach_cta_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
	)
);

// CTA Section - Section Text.
$wp_customize->add_setting(
	'ascendoor_coach_cta_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_cta_text',
	array(
		'label'           => esc_html__( 'Section Text', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_cta_section',
		'settings'        => 'ascendoor_coach_cta_text',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
	)
);

// CTA Section - Background Image.
$wp_customize->add_setting(
	'ascendoor_coach_cta_background_image',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_image',
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ascendoor_coach_cta_background_image',
		array(
			'label'           => esc_html__( 'Background Image', 'ascendoor-coach' ),
			'section'         => 'ascendoor_coach_cta_section',
			'settings'        => 'ascendoor_coach_cta_background_image',
			'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
		)
	)
);

// CTA Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_cta_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_cta_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_cta_section',
		'settings'        => 'ascendoor_coach_cta_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
	)
);

// CTA Section - Button Link.
$wp_customize->add_setting(
	'ascendoor_coach_cta_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_cta_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_cta_section',
		'settings'        => 'ascendoor_coach_cta_button_link',
		'type'            => 'url',
		'active_callback' => 'ascendoor_coach_is_cta_section_enabled',
	)
);
