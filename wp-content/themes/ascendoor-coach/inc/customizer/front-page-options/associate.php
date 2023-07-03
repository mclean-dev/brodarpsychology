<?php
/**
 * Associate Section
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_section(
	'ascendoor_coach_associate_section',
	array(
		'panel'    => 'ascendoor_coach_front_page_options',
		'title'    => esc_html__( 'Associate Section', 'ascendoor-coach' ),
		'priority' => 50,
	)
);

// Associate Section - Enable Section.
$wp_customize->add_setting(
	'ascendoor_coach_enable_associate_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'ascendoor_coach_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Ascendoor_Coach_Toggle_Switch_Custom_Control(
		$wp_customize,
		'ascendoor_coach_enable_associate_section',
		array(
			'label'    => esc_html__( 'Enable Associate Section', 'ascendoor-coach' ),
			'section'  => 'ascendoor_coach_associate_section',
			'settings' => 'ascendoor_coach_enable_associate_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'ascendoor_coach_enable_associate_section',
		array(
			'selector' => '#ascendoor_coach_associate_section .section-link',
			'settings' => 'ascendoor_coach_enable_associate_section',
		)
	);
}

for ( $i = 1; $i <= 6; $i++ ) {

	// AssociateSection - Logo.
	$wp_customize->add_setting(
		'ascendoor_coach_associate_logo_' . $i,
		array(
			'sanitize_callback' => 'ascendoor_coach_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ascendoor_coach_associate_logo_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Logo %d', 'ascendoor-coach' ), $i ),
				'section'         => 'ascendoor_coach_associate_section',
				'settings'        => 'ascendoor_coach_associate_logo_' . $i,
				'active_callback' => 'ascendoor_coach_is_associate_section_enabled',
			)
		)
	);

	// AssociateSection - Logo URL.
	$wp_customize->add_setting(
		'ascendoor_coach_associate_logo_url_' . $i,
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_associate_logo_url_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Logo URL %d', 'ascendoor-coach' ), $i ),
			'section'         => 'ascendoor_coach_associate_section',
			'settings'        => 'ascendoor_coach_associate_logo_url_' . $i,
			'type'            => 'url',
			'active_callback' => 'ascendoor_coach_is_associate_section_enabled',
		)
	);

}
