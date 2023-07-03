<?php
/**
 * Testimonial Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_testimonial_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'Testimonial Section', 'ascendoor-coach' ),
		'priority' => 60,
	)
);

// Testimonial Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_testimonial_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_testimonial_section',
		array(
			'label'    => esc_html__( 'Enable Testimonial Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_testimonial_section',
			'settings' => 'ascendoor_coach_enable_testimonial_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_testimonial_section',
		array(
			'selector' => '#ascendoor_coach_testimonial_section .section-link',
			'settings' => 'ascendoor_coach_enable_testimonial_section',
		)
	);
}

// Testimonial Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_coach_testimonial_section_title',
	array(
		'default'           => __( 'Clients Testimonials', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_testimonial_section_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_testimonial_section',
		'settings'        => 'ascendoor_coach_testimonial_section_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_testimonial_section_enabled',
	)
);

// Testimonial Section - Section Text.
$wp_customize->add_setting(
	'ascendoor_coach_testimonial_section_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_testimonial_section_text',
	array(
		'label'           => esc_html__( 'Section Text', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_testimonial_section',
		'settings'        => 'ascendoor_coach_testimonial_section_text',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_testimonial_section_enabled',
	)
);

// Testimonial Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_coach_testimonial_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_testimonial_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_testimonial_section',
		'settings'        => 'ascendoor_coach_testimonial_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_coach_is_testimonial_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-coach' ),
			'post' => esc_html__( 'Post', 'ascendoor-coach' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Testimonial Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_coach_testimonial_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_testimonial_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_testimonial_section',
			'settings'        => 'ascendoor_coach_testimonial_content_post_' . $i,
			'active_callback' => 'ascendoor_coach_is_testimonial_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_post_choices(),
		)
	);

	// Testimonial Section - Select Page.
	$wp_customize->add_setting(
		'ascendoor_coach_testimonial_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_testimonial_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_testimonial_section',
			'settings'        => 'ascendoor_coach_testimonial_content_page_' . $i,
			'active_callback' => 'ascendoor_coach_is_testimonial_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_page_choices(),
		)
	);

	// Testimonial Section - Designation.
	$wp_customize->add_setting(
		'ascendoor_coach_testimonial_designation_' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_testimonial_designation_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Designation %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_testimonial_section',
			'settings'        => 'ascendoor_coach_testimonial_designation_' . $i,
			'active_callback' => 'ascendoor_coach_is_testimonial_section_enabled',
		)
	);

	// Testimonial Section - Horizontal Line.
	$wp_customize->add_setting(
		'ascendoor_coach_testimonial_horizontal_line' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Ascendoor_Coach_Customize_Horizontal_Line(
			$wp_customize,
			'ascendoor_coach_testimonial_horizontal_line' . $i,
			array(
				'section'         => 'ascendoor_coach_testimonial_section',
				'settings'        => 'ascendoor_coach_testimonial_horizontal_line' . $i,
				'active_callback' => 'ascendoor_coach_is_testimonial_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
