<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ascendoor_Coach
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="ascendoor-coach-blog-single">
		<div class="ascendoor-coach-blog-img">
			<?php ascendoor_coach_post_thumbnail(); ?>
			<div class="ascendoor-coach-date">
				<span class="date"><?php echo esc_html( get_the_date( 'j' ) ); ?></span>
				<span class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
			</div>
			<?php the_category( '', '', get_the_ID() ); ?>
		</div>
		<div class="ascendoor-coach-detail">
			
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title ascendoor-coach-blog-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title ascendoor-coach-blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta ascendoor-coach-meta">
					<?php
					ascendoor_coach_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<div class="ascendoor-coach-description">
				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), get_theme_mod( 'ascendoor_coach_excerpt_length', 20 ) ) ); ?></p>
				<div class="ascendoor-coach-button ascendoor-coach-readmore ascendoor-coach-button-noborder-noalternate">
					<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod( 'ascendoor_coach_excerpt_more_text', __( 'Read More', 'ascendoor-coach' ) ) ); ?></a>
				</div>
			</div>
		</div>
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
