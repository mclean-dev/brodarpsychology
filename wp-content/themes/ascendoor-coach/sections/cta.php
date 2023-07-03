<?php
if ( ! get_theme_mod( 'ascendoor_coach_enable_cta_section', false ) ) {
	return;
}

$section_content                   = array();
$section_content['title']          = get_theme_mod( 'ascendoor_coach_cta_title' );
$section_content['text']           = get_theme_mod( 'ascendoor_coach_cta_text' );
$section_content['background_url'] = get_theme_mod( 'ascendoor_coach_cta_background_image' );
$section_content['button_label']   = get_theme_mod( 'ascendoor_coach_cta_button_label' );
$section_content['button_link']    = get_theme_mod( 'ascendoor_coach_cta_button_link' );
$section_content['button_link']    = ! empty( $section_content['button_link'] ) ? $section_content['button_link'] : '#';

$section_content = apply_filters( 'ascendoor_coach_cta_section_content', $section_content );

ascendoor_coach_render_cta_section( $section_content );

/**
 * Render CTA Section
 */
function ascendoor_coach_render_cta_section( $section_content ) {

	$section_overlay = get_theme_mod( 'ascendoor_coach_enable_cta_overlay', false ) === true ? 'section-overlay' : 'section-no-overlay';
	$text_dark       = get_theme_mod( 'ascendoor_coach_enable_cta_text_dark', false ) === true ? 'text-dark' : 'text-light';
	$classes         = implode( ' ', array( $section_overlay, $text_dark ) );

	?>
	<section id="ascendoor_coach_cta_section" class="ascendoor-coach-frontpage-section ascendoor-coach-cta-section always-pad section-has-background cta-style-2 <?php echo esc_attr( $classes ); ?>">
		<?php
		if ( is_customize_preview() ) :
			ascendoor_coach_section_link( 'ascendoor_coach_cta_section' );
		endif;
		?>
		<?php
		if ( ! empty( $section_content['background_url'] ) ) {
			?>
			<div class="ascendoor-coach-cta-background-img">
				<img src="<?php echo esc_url( $section_content['background_url'] ); ?>">
			</div>
			<?php
		}
		?>
		<div class="ascendoor-wrapper">
			<div class="ascendoor-coach-cta-wrapper">
				<div class="ascendoor-coach-cta-text">
					<div class="section-header-subtitle">
						<h3 class="section-title ascendoor-coach-cta-head wow fadeInUp" data-splitting data-wow-delay="200ms"><?php echo esc_html( $section_content['title'] ); ?></h3>
						<p class="section-subtitle video-detail-subtitle"><?php echo esc_html( $section_content['text'] ); ?></p>
					</div>
					<?php if ( ! empty( $section_content['button_label'] ) ) : ?>
						<div class="ascendoor-coach-button border-button">
							<a href="<?php echo esc_url( $section_content['button_link'] ); ?>"><?php echo esc_html( $section_content['button_label'] ); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
