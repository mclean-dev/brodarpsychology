<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_service_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'ascendoor_coach_service_content_type', 'post' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 6; $i++ ) {
		$content_ids[] = get_theme_mod( 'ascendoor_coach_service_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'ascendoor_coach_service_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}

$args = apply_filters( 'ascendoor_coach_service_section_args', $args );

ascendoor_coach_render_service_section( $args );

/**
 * Render Service Section.
 */
function ascendoor_coach_render_service_section( $args ) {
	$section_title        = get_theme_mod( 'ascendoor_coach_service_title', __( 'Our Services', 'ascendoor-coach' ) );
	$section_text         = get_theme_mod( 'ascendoor_coach_service_text' );
	$post_button_label    = get_theme_mod( 'ascendoor_coach_service_posts_button_label', __( 'View Detail', 'ascendoor-coach' ) );
	$service_button_label = get_theme_mod( 'ascendoor_coach_service_button_label', __( 'View All Services', 'ascendoor-coach' ) );
	$service_button_link  = get_theme_mod( 'ascendoor_coach_service_button_link' );
	$service_button_link  = ! empty( $service_button_link ) ? $service_button_link : '#';

	$query = new WP_Query( $args );
	?>
	<section id="ascendoor_coach_service_section" class="ascendoor-coach-frontpage-section ascendoor-coach-our-services-section service-style-2">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_coach_section_link( 'ascendoor_coach_service_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="section-header-subtitle">
				<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
				<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
			</div>
			<?php if ( $query->have_posts() ) : ?>
				<div class="ascendoor-coach-section-body">
					<div class="ascendoor-coach-our-services-section-wrapper ascendoor-coach-navigation">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							$service_icon = get_theme_mod( 'ascendoor_coach_service_icon_' . $i );
							?>
							<div class="ascendoor-coach-service-single wow fadeInUp" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
								<?php if ( ! empty( $service_icon ) ) : ?>
									<div class="ascendoor-coach-service-img">
										<img src="<?php echo esc_url( $service_icon ); ?>">
									</div>
								<?php endif; ?>
								<div class="ascendoor-coach-service-detail">
									<h3 class="service-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
									<?php if ( ! empty( $post_button_label ) ) : ?>
										<div class="ascendoor-coach-button ascendoor-coach-button-noborder-noalternate">
											<a href="<?php the_permalink(); ?>"><?php echo esc_html( $post_button_label ); ?></a>
										</div>
									<?php endif; ?>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $service_button_label ) ) { ?>
				<div class="bottom-viewall-button ascendoor-coach-button">
					<a href="<?php echo esc_url( $service_button_link ); ?>"><?php echo esc_html( $service_button_label ); ?></a>
				</div>
			<?php } ?>
		</div>
	</section>
	<?php
}
