<?php
/**
 * Active Callbacks
 *
 * @package Ascendoor_Coach
 */

// Theme Options.
function ascendoor_coach_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_pagination' )->value() );
}
function ascendoor_coach_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_breadcrumb' )->value() );
}

// Banner section.
function ascendoor_coach_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_banner_section' )->value() );
}
function ascendoor_coach_is_banner_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_banner_content' )->value();
	return ( ascendoor_coach_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_banner_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_banner_content' )->value();
	return ( ascendoor_coach_is_banner_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Service section.
function ascendoor_coach_is_service_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_service_section' )->value() );
}
function ascendoor_coach_is_service_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_service_content_type' )->value();
	return ( ascendoor_coach_is_service_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_service_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_service_content_type' )->value();
	return ( ascendoor_coach_is_service_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// About section.
function ascendoor_coach_is_about_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_about_section' )->value() );
}
function ascendoor_coach_is_about_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_about_content_type' )->value();
	return ( ascendoor_coach_is_about_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_about_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_about_content_type' )->value();
	return ( ascendoor_coach_is_about_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// Associate section.
function ascendoor_coach_is_associate_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_associate_section' )->value() );
}

// Blog section.
function ascendoor_coach_is_blog_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_blog_section' )->value() );
}
function ascendoor_coach_is_blog_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_blog_content_type' )->value();
	return ( ascendoor_coach_is_blog_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_blog_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_blog_content_type' )->value();
	return ( ascendoor_coach_is_blog_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Gallery section.
function ascendoor_coach_is_gallery_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_gallery_section' )->value() );
}
function ascendoor_coach_is_gallery_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_gallery_content_type' )->value();
	return ( ascendoor_coach_is_gallery_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_gallery_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_gallery_content_type' )->value();
	return ( ascendoor_coach_is_gallery_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Testimonial section.
function ascendoor_coach_is_testimonial_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_testimonial_section' )->value() );
}
function ascendoor_coach_is_testimonial_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_testimonial_content_type' )->value();
	return ( ascendoor_coach_is_testimonial_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function ascendoor_coach_is_testimonial_section_and_content_type_page_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'ascendoor_coach_testimonial_content_type' )->value();
	return ( ascendoor_coach_is_testimonial_section_enabled( $control ) && ( 'page' === $content_type ) );
}

// CTA section.
function ascendoor_coach_is_cta_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'ascendoor_coach_enable_cta_section' )->value() );
}

// Check if static home page is enabled.
function ascendoor_coach_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
