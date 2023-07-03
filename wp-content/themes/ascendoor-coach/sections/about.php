<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_about_section', false ) ) {
	return;
}

$content_id   = $section_content = array();
$content_type = get_theme_mod( 'ascendoor_coach_about_content_type', 'page' );

if ( 'post' === $content_type ) {
	$content_id[] = get_theme_mod( 'ascendoor_coach_about_content_post' );
} else {
	$content_id[] = get_theme_mod( 'ascendoor_coach_about_content_page' );
}
$args = array(
	'post_type'           => $content_type,
	'post__in'            => array_filter( $content_id ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 1 ),
	'ignore_sticky_posts' => true,
);
$args = apply_filters( 'ascendoor_coach_about_section_content', $args );

ascendoor_coach_render_about_section( $args );

	/**
	 * Render About Section
	 */
function ascendoor_coach_render_about_section( $args ) {
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		$section_subtitle = get_theme_mod( 'ascendoor_coach_about_subtitle', __( 'About Us', 'ascendoor-coach' ) );
		$button_label     = get_theme_mod( 'ascendoor_coach_about_button_label', __( 'Explore More', 'ascendoor-coach' ) );

		while ( $query->have_posts() ) :
			$query->the_post();
			?>
				<section id="ascendoor_coach_about_section" class="ascendoor-coach-frontpage-section ascendoor-coach-text-image-section about-style-1 ascendoor-coach-image-left has-primary-background">
					<?php
					if ( is_customize_preview() ) :
						ascendoor_coach_section_link( 'ascendoor_coach_about_section' );
					endif;
					?>
					<div class="ascendoor-wrapper">
						<div class="ascendoor-coach-text-image-section-wrapper">
							<div class="ascendoor-coach-text-image-section-image wow fadeInRight" data-wow-duration=".7s" data-wow-delay=".3s">
							<?php the_post_thumbnail(); ?>
							</div>
							<div class="ascendoor-coach-text-image-section-text section-header-subtitle small-title wow fadeInLeft" data-wow-duration=".7s" data-wow-delay=".3s">
								<h3 class="section-title"><?php the_title(); ?></h3>
								<p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
								<p class="description">
								<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 50 ) ); ?>
								</p>
							<?php if ( ! empty( $button_label ) ) { ?>
									<div class="ascendoor-coach-button border-button">
										<a href="<?php the_permalink(); ?>"><?php echo esc_html( $button_label ); ?></a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</section>
				<?php
			endwhile;
		wp_reset_postdata();
		endif;
}
