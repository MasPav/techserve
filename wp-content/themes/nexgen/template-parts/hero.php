<?php
/**
 * @package Nexgen
 */

// Portfolio
if ( get_post_type() === 'nexgen-portfolio' || is_page_template( 'templates/portfolio.php' ) ) {
	$hero_section = get_field( 'nxg_portfolio_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_portfolio_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url( get_the_ID() );
	$breadcrumb   = get_field( 'nxg_portfolio_breadcrumb_block', 'option' );

	if ( is_archive() || is_category() || is_tag() || is_author() ) {
		$hero_image     = null;
		$hero_title     = get_the_archive_title();
		$hero_pre_title = explode( ':', $hero_title ) [0];
		$hero_title     = explode( '</span>', ( explode( '<span>', $hero_title ) [1] ) ) [0];
	} else {
		$hero_title = get_the_title();
	}
}

// Single Portfolio
elseif ( get_post_type() === 'nexgen-portfolio' && is_single() ) {
	$hero_section = get_field( 'nxg_single_portfolio_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_single_portfolio_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url();
	$hero_title   = get_the_title();	
	$breadcrumb   = get_field( 'nxg_single_portfolio_breadcrumb_block', 'option' );
}

// Blog [posts page]
elseif ( is_archive() || is_home() ) {
	$hero_section = get_field( 'nxg_blog_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_blog_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url( get_option( 'page_for_posts', true ) );
	$breadcrumb   = get_field( 'nxg_blog_breadcrumb_block', 'option' );

	if ( is_archive() || is_category() || is_tag() || is_author() ) {
		$hero_image     = null;
		$hero_title     = get_the_archive_title();
		$hero_pre_title = explode( ':', $hero_title ) [0];
		$hero_title     = explode( '</span>', ( explode( '<span>', $hero_title ) [1] ) ) [0];

	} else {

		if ( is_front_page() ) {
			$hero_title = get_bloginfo( 'name' );

		} else {
			$hero_title = get_the_title( get_option( 'page_for_posts', true ) );			
		}
	}
}

// Blog [template page]
elseif ( is_page_template( 'templates/blog.php' ) ) {
	$hero_section = get_field( 'nxg_blog_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_blog_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url();
	$hero_title   = get_the_title();	
	$breadcrumb   = get_field( 'nxg_blog_breadcrumb_block', 'option' );
}

// Single Post
elseif ( is_single() ) {
	$hero_section = get_field( 'nxg_single_post_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_single_post_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url();
	$hero_title   = get_the_title();	
	$breadcrumb   = get_field( 'nxg_single_post_breadcrumb_block', 'option' );
}

// Single Page
elseif ( is_page() ) {
	$hero_section = get_field( 'nxg_single_page_hero_section', 'option' );
	$hero_divider = get_field( 'nxg_single_page_hero_divider', 'option' );
	$hero_image   = get_the_post_thumbnail_url();
	$hero_title   = get_the_title();	
	$breadcrumb   = get_field( 'nxg_single_page_breadcrumb_block', 'option' );
}

// Featured Video
$featured_video = get_field( 'nxg_page_design_featured_video' );

// Breadcrumb
$disable_breadcrumb = get_field( 'nxg_page_settings_disable_breadcrumb' );

if ( ! $disable_breadcrumb ) {
	$disable_breadcrumb = $breadcrumb['disable'] ?? null;
}


?>
<section id="hero" class="hero default">
	<div class="swiper-container no-slider slider-h-auto">
		<div class="swiper-wrapper">
			<div class="swiper-slide slide-center">

				<?php if ( $featured_video ) : ?>

					<video class="full-image to-bottom" data-mask="<?php echo esc_attr( $hero_section['opacity_control'] ?? 70 ) ?>" playsinline autoplay muted loop>
						<source src="<?php echo esc_url( $featured_video['url'] ); ?>" type="<?php echo esc_attr( $featured_video['mime_type'] ); ?>">
					</video>
					
				<?php else : 
					echo nxg_render_image( $hero_image, $hero_title, 'full-image', 'data-mask', $hero_section['opacity_control'] ?? 70 );
				endif; ?>

				<div class="slide-content row text-center">
					<div class="col-12 mx-auto inner">

						<h1 class="mb-0 title entry-title"><?php echo ( esc_html( $hero_title ) ) ? esc_html( $hero_title ) : __( 'No Title', 'nexgen' ) ?></h1>
						
						<?php if ( ! $disable_breadcrumb && ! is_front_page() ) : ?>
						
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<?php get_breadcrumb(); ?>
								</ol>
							</nav>

						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php if ( isset( $hero_divider['disable'] ) && ! $hero_divider['disable'] ) {
		get_template_part( 'template-parts/divider' );
	} ?>

</section>