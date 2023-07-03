<?php
/**
 * Theme Options
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_panel(
	'ascendoor_coach_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'ascendoor-coach' ),
		'priority' => 130,
	)
);

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Archive Options.
require get_template_directory() . '/inc/customizer/theme-options/archive-options.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Layout.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-layout.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
