<?php

if ( ! get_theme_mod( 'ascendoor_coach_enable_blog_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'ascendoor_coach_blog_content_type', 'post' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 3; $i++ ) {
		$content_ids[] = get_theme_mod( 'ascendoor_coach_blog_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'ascendoor_coach_blog_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}

$args = apply_filters( 'ascendoor_coach_blog_section_args', $args );

ascendoor_coach_render_blog_section( $args );

/**
 * Render Blog Section.
 */
function ascendoor_coach_render_blog_section( $args ) {
	$section_title     = get_theme_mod( 'ascendoor_coach_blog_title', __( 'Latest Blog', 'ascendoor-coach' ) );
	$section_text      = get_theme_mod( 'ascendoor_coach_blog_text', '' );
	$post_button_label = get_theme_mod( 'ascendoor_coach_blog_posts_button', __( 'Read More', 'ascendoor-coach' ) );
	$button_label      = get_theme_mod( 'ascendoor_coach_blog_button_label', __( 'View All', 'ascendoor-coach' ) );
	$button_link       = get_theme_mod( 'ascendoor_coach_blog_button_link' );
	$button_link       = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="ascendoor_coach_blog_section" class="ascendoor-coach-frontpage-section ascendoor-coach-blog-section blog-style-1">
			<?php
			if ( is_customize_preview() ) :
				ascendoor_coach_section_link( 'ascendoor_coach_blog_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $section_text ) ) { ?>
					<div class="section-header-subtitle">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<p class="section-subtitle"><?php echo esc_html( $section_text ); ?></p>
					</div>
				<?php } ?>
				<div class="ascendoor-coach-section-body">
					<div class="ascendoor-coach-blog-section-wrapper">
						<?php
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<?php
							if ( has_post_thumbnail() ) {
								$hasthumbnail = 'has-thumbnail';
							} else {
								$hasthumbnail = '';
							}
							?>
							<div class="ascendoor-coach-blog-single wow fadeInUp <?php echo esc_attr( $hasthumbnail ); ?>" data-wow-delay="<?php echo esc_attr( $i * 200 ); ?>ms">
								<div class="ascendoor-coach-blog-img">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
									<?php endif; ?>
									<div class="ascendoor-coach-date">
										<span class="date"><?php echo esc_html( get_the_date( 'j' ) ); ?></span>
										<span class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
									</div>
									<?php echo get_the_category_list(); ?>
								</div>
								<div class="ascendoor-coach-detail">
									<h3 class="ascendoor-coach-blog-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="ascendoor-coach-description">
										<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 30 ) ); ?>
									</div>
									<?php if ( ! empty( $post_button_label ) ) : ?>
										<div class="ascendoor-coach-button ascendoor-coach-readmore ascendoor-coach-button-noborder-noalternate">
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
					<?php if ( ! empty( $button_label ) ) { ?>
						<div class="ascendoor-coach-blog-view-all ascendoor-coach-button">
							<a href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_label ); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<?php
	endif;
}
