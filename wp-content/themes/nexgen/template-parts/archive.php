<?php
/**
 * @package Nexgen
 */

// Portfolio
if ( get_post_type() === 'nexgen-portfolio' || is_page_template( 'templates/portfolio.php' ) ) {
	$hero_section    = get_field( 'nxg_portfolio_hero_section', 'option' );
	$content_section = get_field( 'nxg_portfolio_content_section', 'option' );
	$sidebar         = get_field( 'nxg_portfolio_sidebar_section', 'option' );
} 

// Blog
elseif ( is_archive() || is_home() || is_page_template( 'templates/blog.php' ) ) {
	$hero_section    = get_field( 'nxg_blog_hero_section', 'option' );
	$content_section = get_field( 'nxg_blog_content_section', 'option' );
	$sidebar         = get_field( 'nxg_blog_sidebar_section', 'option' );
}

// Hero Section
$disable_hero_section = get_field( 'nxg_page_settings_disable_hero_section' );

if ( ! $disable_hero_section ) {
	$disable_hero_section = $hero_section['disable'] ?? null;
}

// Content Section
switch ( $content_section['columns'] ?? '' ) {
	case '1': $content_cols = 'columns-1'; break;
	case '2': $content_cols = 'columns-2'; break;
	case '3': $content_cols = 'columns-3'; break;
	case '4': $content_cols = 'columns-4'; break;
	case '5': $content_cols = 'columns-5'; break;
	case '6': $content_cols = 'columns-6'; break;
	default : $content_cols = 'columns-2';
}

// Sidebar
$disable_sidebar = get_field( 'nxg_page_settings_disable_sidebar' );

if ( ! $disable_sidebar ) {
	$disable_sidebar = $sidebar['disable'] ?? null;
}

// Container
$disable_container = get_field( 'nxg_page_settings_disable_container' );

if ( $disable_container ) {
	$container_class = 'no-container m-0 p-0';
} else {
	$container_class = 'with-container';
}

if ( $disable_hero_section || nxg_is_woocommerce_page() ) {
	echo '<div class="navbar-holder"></div>';
} else {
	get_template_part( 'template-parts/hero' );
}
?>
<section id="post-<?php the_ID(); ?>" <?php post_class( 'content-area content-section archive showcase ' . $container_class ); ?>>
	<div class="container">
		<div class="row content">

			<?php
			if ( is_page_template( 'templates/portfolio.php' ) ) {
				$args = array( 'post_type' => array( 'posts', 'nexgen-portfolio' ) );
				query_posts( $args );
				
			} elseif ( is_page_template( 'templates/blog.php' ) ) {
				$args = array( 'post_type' => array( 'posts', 'post' ) );
				query_posts( $args );
			}

			if ( have_posts() ) : ?>

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

				<div class="main-area blog-grid col-12 p-0 <?php echo ! $disable_sidebar ? 'col-lg-8 ' . $container_class : 'col-lg-12 ' . $container_class ?>">
					<div class="row items bricklayer <?php echo esc_attr( $content_cols . ' ' . $container_class ); ?>">

						<?php
						while ( have_posts() ) : the_post();                      
							get_template_part( 'template-parts/post' );
						endwhile;
						wp_reset_postdata();
						?>
						
					</div>
					
					<?php 
					if ( paginate_links( array() ) ) : ?>

						<div class="row">
							<div class="col-12">
								<nav>
									<?php 
										echo paginate_links( array(
											'end_size'  => 1,
											'mid_size'  => 2,
											'prev_text' => '<i class="fas fa-arrow-left"></i>',
											'next_text' => '<i class="fas fa-arrow-right"></i>',
											'type'      => 'list'
										) );  
									?>
								</nav>
							</div>
						</div>

					<?php endif; ?>
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

			<?php else : get_template_part( 'template-parts/search-intro' ); endif; ?>	

		</div>
	</div>
</section>