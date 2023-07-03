<?php
/**
 * Banner Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_banner_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'Banner Slider Section', 'ascendoor-coach' ),
		'priority' => 10,
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_banner_section',
			'settings' => 'ascendoor_coach_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_banner_section',
		array(
			'selector' => '#ascendoor_coach_banner_section .section-link',
			'settings' => 'ascendoor_coach_enable_banner_section',
		)
	);
}

// Banner Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_coach_banner_content',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_banner_content',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_banner_section',
		'settings'        => 'ascendoor_coach_banner_content',
		'type'            => 'select',
		'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'ascendoor-coach' ),
			'post' => esc_html__( 'Post', 'ascendoor-coach' ),
		),
	)
);

// Banner Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_banner_button_label',
	array(
		'default'           => __( 'Read More', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_banner_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_banner_section',
		'settings'        => 'ascendoor_coach_banner_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

	// Banner Section - Content Type Post.
	$wp_customize->add_setting(
		'ascendoor_coach_banner_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_banner_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_banner_section',
			'settings'        => 'ascendoor_coach_banner_content_post_' . $i,
			'active_callback' => 'ascendoor_coach_is_banner_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_post_choices(),
		)
	);

	// Banner Section - Content Type Page.
	$wp_customize->add_setting(
		'ascendoor_coach_banner_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_banner_content_page_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Page %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_banner_section',
			'settings'        => 'ascendoor_coach_banner_content_page_' . $i,
			'active_callback' => 'ascendoor_coach_is_banner_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_page_choices(),
		)
	);

	// Banner Section - Content Alignment.
	$wp_customize->add_setting(
		'ascendoor_coach_content_alignment' . $i,
		array(
			'default'           => 'center-align',
			'sanitize_callback' => 'ascendoor_coach_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_content_alignment' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Content Alignment %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_banner_section',
			'settings'        => 'ascendoor_coach_content_alignment' . $i,
			'type'            => 'select',
			'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
			'choices'         => array(
				'left-align'   => esc_html__( 'Left', 'ascendoor-coach' ),
				'center-align' => esc_html__( 'Center', 'ascendoor-coach' ),
				'right-align'  => esc_html__( 'Right', 'ascendoor-coach' ),
			),
		)
	);

	// Banner Section - Enable Overlay.
	$wp_customize->add_setting(
		'ascendoor_coach_enable_banner_overlay' . $i,
		array(
			'default'           => false,
			'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
		)
	);

	$wp_customize->add_control(
		new Ascendoor_Coach_Toggle_Switch_Custom_Control(
			$wp_customize,
			'ascendoor_coach_enable_banner_overlay' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Enable Overlay %d', 'ascendoor-coach' ), $i ),
				'section'         => 'ascendoor_coach_banner_section',
				'settings'        => 'ascendoor_coach_enable_banner_overlay' . $i,
				'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
			)
		)
	);

	// Banner Section - Text Dark.
	$wp_customize->add_setting(
		'ascendoor_coach_enable_banner_text_dark' . $i,
		array(
			'default'           => false,
			'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
		)
	);

	$wp_customize->add_control(
		new Ascendoor_Coach_Toggle_Switch_Custom_Control(
			$wp_customize,
			'ascendoor_coach_enable_banner_text_dark' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Enable Dark Content %d', 'ascendoor-coach' ), $i ),
				'section'         => 'ascendoor_coach_banner_section',
				'settings'        => 'ascendoor_coach_enable_banner_text_dark' . $i,
				'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
			)
		)
	);

	// Banner Section - Horizontal Line.
	$wp_customize->add_setting(
		'ascendoor_coach_banner_horizontal_line' . $i,
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Ascendoor_Coach_Customize_Horizontal_Line(
			$wp_customize,
			'ascendoor_coach_banner_horizontal_line' . $i,
			array(
				'section'         => 'ascendoor_coach_banner_section',
				'settings'        => 'ascendoor_coach_banner_horizontal_line' . $i,
				'active_callback' => 'ascendoor_coach_is_banner_section_enabled',
				'type'            => 'hr',
			)
		)
	);

}
