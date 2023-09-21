<?php
/**
 * @package Nexgen
 */

// Portfolio
if ( get_post_type() === 'nexgen-portfolio' ) {
	$hero_section = get_field( 'nxg_single_portfolio_hero_section', 'option' );
	$breadcrumb   = get_field( 'nxg_single_portfolio_breadcrumb_block', 'option' );
	$metadata     = get_field( 'nxg_single_portfolio_metadata_block', 'option' );
	$categories   = get_field( 'nxg_single_portfolio_categories_block', 'option' );
	$cat_args     = array( 'taxonomy' => 'nexgen-portfolio-category' );
	$cat_list     = get_categories( $cat_args );
	$tags         = get_field( 'nxg_single_portfolio_tags_block', 'option' );
	$tag_args     = array( 'taxonomy' => 'nexgen-portfolio-tag' );
	$tag_list     = get_tags( $tag_args );
	$sidebar      = get_field( 'nxg_single_portfolio_sidebar_section', 'option' );
} 

// Single Post
elseif ( is_single() ) {
	$hero_section = get_field( 'nxg_single_post_hero_section', 'option' );
	$breadcrumb   = get_field( 'nxg_single_post_breadcrumb_block', 'option' );
	$metadata     = get_field( 'nxg_single_post_metadata_block', 'option' );
	$categories   = get_field( 'nxg_single_post_categories_block', 'option' );
	$cat_list     = get_the_category();
	$tags         = get_field( 'nxg_single_post_tags_block', 'option' );
	$tag_list     = get_the_tags();
	$sidebar      = get_field( 'nxg_single_post_sidebar_section', 'option' );
} 

// Single Page
elseif ( is_page() ) {
	$hero_section = get_field( 'nxg_single_page_hero_section', 'option' );
	$breadcrumb   = get_field( 'nxg_single_page_breadcrumb_block', 'option' );
	$metadata     = get_field( 'nxg_single_page_metadata_block', 'option' );
	$sidebar      = get_field( 'nxg_single_page_sidebar_section', 'option' );
}

// Hero Section
$disable_hero_section = get_field( 'nxg_page_settings_disable_hero_section' );

if ( ! $disable_hero_section ) {
	$disable_hero_section = $hero_section['disable'] ?? null;
}

// Breadcrumb
$disable_breadcrumb = get_field( 'nxg_page_settings_disable_breadcrumb' );

if ( ! $disable_breadcrumb ) {
	$disable_breadcrumb = $breadcrumb['disable'] ?? null;
}

// Metadata
$disable_metadata = get_field( 'nxg_page_settings_disable_metadata' );

if ( ! $disable_metadata ) {
	$disable_metadata = $metadata['disable'] ?? null;
}

// Sidebar
$disable_sidebar = get_field( 'nxg_page_settings_disable_sidebar' );

if ( ! $disable_sidebar ) {
	$disable_sidebar = $sidebar['disable'] ?? null;
}

// Container
$disable_container = get_field( 'nxg_page_settings_disable_container' );

if ( $disable_container ) {
	$container_class = 'disabled p-0';
} else {
	$container_class = 'enabled';
}

if ( $disable_hero_section || nxg_is_woocommerce_page() ) {
	echo '<div class="navbar-holder"></div>';
} else {
	get_template_part( 'template-parts/hero' );
}

while ( have_posts() ) : the_post();
?>
<section id="post-<?php the_ID(); ?>" <?php post_class( 'content-area content-section single single-post ' . $container_class ); ?>>
	<div class="container main <?php echo esc_attr( $container_class ); ?>"> 
		<div class="row content">

			<?php
			if ( ! $disable_sidebar ) : 
				if ( isset( $sidebar['position'] ) && $sidebar['position'] == 'left' ) : ?>

				<aside class="col-12 col-lg-4 pr-lg-5 float-left left sidebar">
					<?php dynamic_sidebar( $sidebar['sidebar'] ?? 'sidebar-1' ); ?>
				</aside>

				<?php
				endif; 
			endif;
			?>
			
			<div class="main-area col-12 <?php echo ! $disable_sidebar && ! nxg_is_woocommerce_page() ? 'col-lg-8' : 'col-lg-12' ?>">

				<?php
				if ( ! $disable_container ) : ?>

						<?php if ( $disable_hero_section ) : ?>

							<?php if ( ! $disable_breadcrumb && ! is_front_page() ) : ?>

								<nav class="intro-item intro-breadcrumb" aria-label="breadcrumb">
									<ol class="breadcrumb">
										<?php get_breadcrumb(); ?>
									</ol>
								</nav>

							<?php endif; ?>

							<?php if ( ! nxg_is_woocommerce_page() ) : ?>
								<h1 class="intro-item intro-title entry-title"><?php the_title(); ?></h1>
							<?php endif; ?>

						<?php endif; ?>

						<?php if ( ! $disable_metadata && ! nxg_is_woocommerce_page() ) : ?>

							<div class="intro-item intro-meta post-meta row mx-auto ml-lg-0">
								<div class="col-12 p-0 align-self-center">
									<?php echo nxg_posted_by(); ?>
									<?php echo nxg_posted_on(); ?>

									<?php if ( comments_open() ) : ?>
										<span class="comment">
											<a href="#comments" class="smooth-anchor"><i class="fas fa-comment-dots"></i><?php echo nxg_comment_count(); ?></a>
										</span>
									<?php endif; ?>

								</div>
							</div>

						<?php endif; ?>

					<?php
				endif;
				?>

				<div class="row block-content">
					<div class="col-12 p-0">
						<?php the_content();
							wp_link_pages( array(
								'before' => '<div class="clearfix"></div><div class="ml-0 page-links">',
								'after'  => '</div>',
							) ); ?>
					</div>
				</div>	
			</div>

			<?php
			if ( ! $disable_sidebar ) : 
				if ( isset( $sidebar['position'] ) && $sidebar['position'] == 'right' ) : ?>

				<aside class="col-12 col-lg-4 pl-lg-5 float-right right sidebar">
					<?php dynamic_sidebar( $sidebar['sidebar'] ?? 'sidebar-1' ); ?>
				</aside>

				<?php 
				endif; 
			endif;
			?>

		</div>
	</div>
	<div class="container taxonomy"> 
		<?php if ( ! empty( $tag_list ) && isset( $tags['disable'] ) && ! $tags['disable'] ) : ?>

			<div class="row block-tags">
				<div class="col-12 p-0">
					<i class="fas fa-tags mr-2"></i>
					<div class="tags">
						<?php foreach ( $tag_list as $tag ) : ?>
						
							<a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="tag">
								<?php echo esc_html( $tag->name ); ?>
							</a>

						<?php endforeach; ?>
					</div>
				</div>
			</div>

		<?php endif; ?>

		<?php if ( ! empty( $cat_list ) && isset( $categories['disable'] ) && ! $categories['disable'] ) : ?>

			<div class="row block-categories">
				<div class="col-12 p-0">

					<?php foreach ( $cat_list as $category ) : ?>

						<div class="badges">
							<a href="<?php echo get_category_link( $category->term_id ); ?>" class="badge"><?php echo esc_html( $category->name ); ?></a>
						</div>

					<?php endforeach; ?>
					
				</div>
			</div>

		<?php endif; ?>

		<?php if ( comments_open() ) : ?>

			<hr>
			<div id="comments" class="row block-comments">
				<div class="col-12 p-0">
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				</div>
			</div>

		<?php endif; ?>
	</div>

</section>
<?php
endwhile;