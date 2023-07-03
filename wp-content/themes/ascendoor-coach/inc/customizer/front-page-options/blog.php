<?php
/**
 * Blog Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_blog_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'Blog Section', 'ascendoor-coach' ),
		'priority' => 70,
	)
);

// Blog Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_blog_section',
			'settings' => 'ascendoor_coach_enable_blog_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_blog_section',
		array(
			'selector' => '#ascendoor_coach_blog_section .section-link',
			'settings' => 'ascendoor_coach_enable_blog_section',
		)
	);
}

// Blog Section - Section Title.
$wp_customize->add_setting(
	'ascendoor_coach_blog_title',
	array(
		'default'           => __( 'Latest Blog', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_title',
	array(
		'label'           => esc_html__( 'Section Title', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_title',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
	)
);

// Blog Section - Section Text.
$wp_customize->add_setting(
	'ascendoor_coach_blog_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_text',
	array(
		'label'           => esc_html__( 'Section Text', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_text',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
	)
);

// Blog Section - Posts Button.
$wp_customize->add_setting(
	'ascendoor_coach_blog_posts_button',
	array(
		'default'           => __( 'Read More', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_posts_button',
	array(
		'label'           => esc_html__( 'Posts Button', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_posts_button',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
	)
);

// Blog Section - Content Type.
$wp_customize->add_setting(
	'ascendoor_coach_blog_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_content_type',
		'type'            => 'select',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'ascendoor-coach' ),
			'category' => esc_html__( 'Category', 'ascendoor-coach' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Blog Section - Select Post.
	$wp_customize->add_setting(
		'ascendoor_coach_blog_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_blog_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_blog_section',
			'settings'        => 'ascendoor_coach_blog_content_post_' . $i,
			'active_callback' => 'ascendoor_coach_is_blog_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => ascendoor_coach_get_post_choices(),
		)
	);

}

// Blog Section - Select Category.
$wp_customize->add_setting(
	'ascendoor_coach_blog_content_category',
	array(
		'sanitize_callback' => 'ascendoor_coach_sanitize_select',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_content_category',
		'active_callback' => 'ascendoor_coach_is_blog_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => ascendoor_coach_get_post_cat_choices(),
	)
);

// Blog Section - Button Label.
$wp_customize->add_setting(
	'ascendoor_coach_blog_button_label',
	array(
		'default'           => __( 'View All', 'ascendoor-coach' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_button_label',
		'type'            => 'text',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
	)
);

// Team Section - Button Link.
$wp_customize->add_setting(
	'ascendoor_coach_blog_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'ascendoor_coach_blog_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'ascendoor-coach' ),
		'section'         => 'ascendoor_coach_blog_section',
		'settings'        => 'ascendoor_coach_blog_button_link',
		'type'            => 'url',
		'active_callback' => 'ascendoor_coach_is_blog_section_enabled',
	)
);
