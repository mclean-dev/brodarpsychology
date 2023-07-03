<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_associate_section', false ) ) {
	return;
}

$section_content = array();
$section_content = apply_filters( 'ascendoor_coach_associate_section_content', $section_content );

ascendoor_coach_render_associate_section( $section_content );

/**
 * Render Associate Section
 */
function ascendoor_coach_render_associate_section( $section_content ) {
	?>
	<section id="ascendoor_coach_associate_section" class="ascendoor-coach-frontpage-section ascendoor-coach-brands-slider style-1">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_coach_section_link( 'ascendoor_coach_associate_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<div class="ascendoor-coach-section-body">
				<div class="ascendoor-coach-brands-slider-wrapper brand-slider" data-slick='{"autoplay": true}'>
					<?php
					for ( $i = 1; $i <= 6; $i++ ) {
						$logo     = get_theme_mod( 'ascendoor_coach_associate_logo_' . $i );
						$logo_url = get_theme_mod( 'ascendoor_coach_associate_logo_url_' . $i );
						$logo_url = ! empty( $logo_url ) ? $logo_url : '';
						if ( ! empty( $logo ) ) {
							?>
							<div class="ascendoor-coach-brand-single wow fadeInUp" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
								<a href="<?php echo esc_url( $logo_url ); ?>" target="_blank"><img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr__( 'Associate Logo', 'ascendoor-coach' ); ?>"></a>
							</div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
