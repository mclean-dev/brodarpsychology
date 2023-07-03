<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_banner_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'ascendoor_coach_banner_content', 'post' );

for ( $i = 1; $i <= 3; $i++ ) {
	$content_ids[] = get_theme_mod( 'ascendoor_coach_banner_content_' . $content_type . '_' . $i );
}

$args = array(
	'post_type'           => $content_type,
	'post__in'            => array_filter( $content_ids ),
	'orderby'             => 'post__in',
	'posts_per_page'      => absint( 3 ),
	'ignore_sticky_posts' => true,
);

$args = apply_filters( 'ascendoor_coach_banner_section_args', $args );

ascendoor_coach_render_banner_section( $args );

/**
 * Render Banner Section.
 */
function ascendoor_coach_render_banner_section( $args ) {

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>

		<section id="ascendoor_coach_banner_section" class="ascendoor-coach-main-banner-section banner-style-1">
			<?php
			if ( is_customize_preview() ) :
				ascendoor_coach_section_link( 'ascendoor_coach_banner_section' );
			endif;
			?>
			<div class="main-slider">
				<?php
				$i = 1;
				while ( $query->have_posts() ) :
					$query->the_post();

					$btn_label         = get_theme_mod( 'ascendoor_coach_banner_button_label', __( 'Read More', 'ascendoor-coach' ) );
					$content_alignment = get_theme_mod( 'ascendoor_coach_content_alignment' . $i, 'center-align' );
					$section_overlay   = get_theme_mod( 'ascendoor_coach_enable_banner_overlay' . $i, false ) === true ? 'section-overlay' : 'section-no-overlay';
					$text_dark         = get_theme_mod( 'ascendoor_coach_enable_banner_text_dark' . $i, false ) === true ? 'text-dark' : 'text-light';
					$classes           = implode( ' ', array( $content_alignment, $section_overlay, $text_dark ) );

					?>
					<div class="ascendoor-coach-banner-slider-single <?php echo esc_attr( $classes ); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="ascendoor-coach-banner-slider-img">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
						<?php } ?>
						<div class="ascendoor-coach-banner-slider-detail">
							<div class="ascendoor-wrapper">
								<div class="ascendoor-coach-banner-slider-detail-inside">
									<h3 class="ascendoor-coach-banner-head-title" data-splitting><?php the_title(); ?></h3>
									<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
									<div class="ascendoor-coach-button banner-slider-btn ascendoor-coach-button-secondary-alternate">
										<?php if ( ! empty( $btn_label ) ) { ?>
											<a href="<?php the_permalink(); ?>"><?php echo esc_html( $btn_label ); ?></a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
					$i++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</section>

		<?php

	endif;
}
