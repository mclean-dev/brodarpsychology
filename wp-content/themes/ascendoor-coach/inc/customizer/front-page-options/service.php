<?php
/**
 * Service Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_service_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'Service Section', 'ascendoor-coach' ),
		'priority' => 20,
	)
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Service Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_service_section',
			'settings' => 'ascendoor_coach_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_service_section',
		array(
			'selector' => '#ascendoor_coach_service_section .section-link',
			'settings' => 'ascendoor_coach_enable_service_section',
		)
	);
}

// Service Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_coach_service_title',
	array(
		'default'           => __( 'Our Services', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
	)
);

// Service Section - Section Text.
$wp_customize->add_setting(
	'ascendoor_coach_service_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_text',
	array(
		'label'           => esc_html__( 'Section Text', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_text',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
	)
);

// Service Section - Posts Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_service_posts_button_label',
	array(
		'default'           => __( 'View Detail', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_posts_button_label',
	array(
		'label'           => esc_html__( 'Posts Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_posts_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
	)
);

// Service Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_coach_service_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-coach' ),
			'category' => esc_html__( 'Category', 'ascendoor-coach' ),
		),
	)
);

// Service Section - Select Category.
$wp_customize->add_setting(
	'ascendoor_coach_service_content_category',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_content_category',
		'active_callback' => 'ascendoor_coach_is_service_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_coach_get_post_cat_choices(),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {

	// Service Section - Custom Icon.
	$wp_customize->add_setting(
		'ascendoor_coach_service_icon_' . $i,
		array(
			'sanitize_callback' => 'ascendoor_coach_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ascendoor_coach_service_icon_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Custom Icon %d', 'ascendoor-coach' ), $i ),
				'section'         => 'ascendoor_coach_service_section',
				'settings'        => 'ascendoor_coach_service_icon_' . $i,
				'active_callback' => 'ascendoor_coach_is_service_section_enabled',
			)
		)
	);

	// Service Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_coach_service_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_service_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_service_section',
			'settings'        => 'ascendoor_coach_service_content_post_' . $i,
			'active_callback' => 'ascendoor_coach_is_service_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_post_choices(),
		)
	);

}

// Service Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_service_button_label',
	array(
		'default'           => __( 'View All Services', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
	)
);

// Service Section - Button Link.
$wp_customize->add_setting(
	'ascendoor_coach_service_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_service_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_service_section',
		'settings'        => 'ascendoor_coach_service_button_link',
		'type'            => 'url',
		'active_callback' => 'ascendoor_coach_is_service_section_enabled',
	)
);
