<?php
/**
 * Front Page Options
 *
 * @package Ascendoor_Coach
 */

$wp_customize->add_panel(
	'ascendoor_coach_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'ascendoor-coach' ),
		'priority' => 130,
	)
);

// Banner Section.
require get_template_directory() . '/inc/customizer/front-page-options/banner.php';

// Service Section.
require get_template_directory() . '/inc/customizer/front-page-options/service.php';

// About Section.
require get_template_directory() . '/inc/customizer/front-page-options/about.php';

// Gallery Section.
require get_template_directory() . '/inc/customizer/front-page-options/gallery.php';

// Associate Section.
require get_template_directory() . '/inc/customizer/front-page-options/associate.php';

// Testimonial Section.
require get_template_directory() . '/inc/customizer/front-page-options/testimonial.php';

// Blog Section.
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';

// CTA Section.
require get_template_directory() . '/inc/customizer/front-page-options/cta.php';
