<?php
/**
 * Ascendoor Coach Theme Customizer
 *
 * @package Ascendoor_Coach
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Active Callback.
require get_template_directory() . '/inc/customizer/active-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ascendoor_coach_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'ascendoor_coach_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'ascendoor_coach_customize_partial_blogdescription',
			)
		);
	}

	// Homepage Settings - Enable Homepage Content.
	$wp_customize->add_setting(
		'ascendoor_coach_enable_frontpage_content',
		array(
			'default'           => false,
			'sanitize_callback' => 'ascendoor_coach_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'ascendoor_coach_enable_frontpage_content',
		array(
			'label'           => esc_html__( 'Enable Homepage Content', 'ascendoor-coach' ),
			'description'     => esc_html__( 'Check to enable content on static homepage.', 'ascendoor-coach' ),
			'section'         => 'static_front_page',
			'type'            => 'checkbox',
			'active_callback' => 'ascendoor_coach_is_static_homepage_enabled',
		)
	);

	// Upsell Section.
	$wp_customize->add_section(
		new Ascendoor_Coach_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Ascendoor Coach Pro', 'ascendoor-coach' ),
				'button_text'      => __( 'Buy Pro', 'ascendoor-coach' ),
				'url'              => 'https://ascendoor.com/themes/ascendoor-coach-pro/',
				'background_color' => '#f78e74',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

	// Front Page Options.
	require get_template_directory() . '/inc/customizer/front-page-options.php';
}
add_action( 'customize_register', 'ascendoor_coach_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ascendoor_coach_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ascendoor_coach_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ascendoor_coach_customize_preview_js() {
	wp_enqueue_script( 'ascendoor-coach-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), ASCENDOOR_COACH_VERSION, true );
}
add_action( 'customize_preview_init', 'ascendoor_coach_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function ascendoor_coach_custom_control_scripts() {
	wp_enqueue_style( 'ascendoor-coach-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'ascendoor-coach-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'ascendoor_coach_custom_control_scripts' );
