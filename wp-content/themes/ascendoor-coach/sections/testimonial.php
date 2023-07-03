<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_testimonial_section', false ) ) {
	return;
}

$content_id   = $designation = array();
$content_type = get_theme_mod( 'ascendoor_coach_testimonial_content_type', 'page' );

for ( $i = 1; $i <= 4; $i++ ) {
	$item_id                 = get_theme_mod( 'ascendoor_coach_testimonial_content_' . $content_type . '_' . $i );
	$content_id[]            = $item_id;
	$designation[ $item_id ] = get_theme_mod( 'ascendoor_coach_testimonial_designation_' . $i );
}

$args = array(
	'post_type'          => $content_type,
	'post__in'           => array_filter( $content_id ),
	'orderby'            => 'post__in',
	'posts_per_page'     => absint( 4 ),
	'ignore_sticky_post' => true,
);

$args = apply_filters( 'ascendoor_coach_testimonial_section_args', $args );

ascendoor_coach_render_testimonial_section( $args, $designation );

/**
 * Render Testimonial Section
 */
function ascendoor_coach_render_testimonial_section( $args, $designation ) {
	$section_title = get_theme_mod( 'ascendoor_coach_testimonial_section_title', __( 'Clients Testimonials', 'ascendoor-coach' ) );
	$section_text  = get_theme_mod( 'ascendoor_coach_testimonial_section_text' );

	?>
	<section id="ascendoor_coach_testimonial_section" class="ascendoor-coach-frontpage-section ascendoor-coach-testimonial-slider-section ascendoor-coach-grey-background always-pad section-has-background ascendoor-coach-carousel testimonial-style-1">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_coach_section_link( 'ascendoor_coach_testimonial_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="section-header-subtitle">
				<div class="section-header-subtitle-wrapper">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
				</div>
			</div>
			<?php
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
				?>
				<div class="ascendoor-coach-section-body testimonial-body-wrapper">
					<div class="testimonial-body-wrap">
						<div class="ascendoor-coach-testimonial-slider ascendoor-coach-navigation" data-slick='{"autoplay": true }'>
							<?php
							$i = 1;
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="ascendoor-coach-testimonial-single wow fadeInUp" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
									<div class="ascendoor-coach-testimonial-single-inner">
										<div class="ascendoor-coach-testimonial-user">
											<div class="ascendoor-coach-testimonial-slider-img">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="testimonial-user-detail">
												<h4 class="user-name"><?php the_title(); ?></h4>
												<?php if ( ! empty( $designation[ get_the_ID() ] ) ) { ?>
													<div class="designation"><?php echo esc_html( $designation[ get_the_ID() ] ); ?></div>
												<?php } ?>
											</div>
										</div>
										<div class="ascendoor-coach-testimonial-comment">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
								<?php
								$i++;
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
				<?php
			endif;
			?>
		</div>
	</section>
	<?php
}
