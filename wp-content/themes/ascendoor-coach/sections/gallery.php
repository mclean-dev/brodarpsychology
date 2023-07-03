<?php
if ( ! get_theme_mod( 'ascendoor_coach_enable_gallery_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'ascendoor_coach_gallery_content_type', 'post' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 6; $i++ ) {
		$content_ids[] = get_theme_mod( 'ascendoor_coach_gallery_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 6 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'ascendoor_coach_gallery_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 6 ),
	);
}

$args = apply_filters( 'ascendoor_coach_gallery_section_args', $args );

ascendoor_coach_render_gallery_section( $args );

/**
 * Render Gallery Section.
 */
function ascendoor_coach_render_gallery_section( $args ) {
	$section_title = get_theme_mod( 'ascendoor_coach_gallery_title', __( 'Our Gallery', 'ascendoor-coach' ) );
	$section_text  = get_theme_mod( 'ascendoor_coach_gallery_text' );
	$button_label  = get_theme_mod( 'ascendoor_coach_gallery_button_label', __( 'View All', 'ascendoor-coach' ) );
	$button_link   = get_theme_mod( 'ascendoor_coach_gallery_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="ascendoor_coach_gallery_section" class="ascendoor-coach-frontpage-section  ascendoor-coach-gallery-section has-primary-background gallery-style-2">
			<?php
			if ( is_customize_preview() ) :
				ascendoor_coach_section_link( 'ascendoor_coach_gallery_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_text ) ) : ?>
					<div class="section-header-subtitle">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
					</div>
				<?php endif; ?>
				<div class="ascendoor-coach-section-body">
					<div class="ascendoor-coach-gallery-slider ascendoor-coach-navigation">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="ascendoor-coach-gallery-single-wrap wow fadeInUp" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
								<div class="ascendoor-coach-gallery-single">
									<div class="ascendoor-coach-gallery-img">
										<a href="<?php the_post_thumbnail_url(); ?>" class="image-popup"><img src="<?php the_post_thumbnail_url(); ?>"></a>
									</div>	
									<div class="ascendoor-coach-gallery-detail">
										<h3 class="ascendoor-coach-gallery-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<p class="ascendoor-coach-content"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 15 ) ); ?></p>
									</div>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
						?>
					</div>
					<?php if ( ! empty( $button_label ) ) { ?>
						<div class="ascendoor-coach-gallery-view-all ascendoor-coach-button">
							<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	endif;
}
