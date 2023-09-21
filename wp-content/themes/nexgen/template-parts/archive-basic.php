<?php
/**
 * @package Nexgen
 */
?>
<div class="navbar-holder"></div>
<section id="post-<?php the_ID(); ?>" <?php post_class( 'content-area content-section archive basic showcase' ); ?>>
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

				<div class="main-area blog-grid col-12 p-0 <?php echo is_active_sidebar( 'sidebar-1' ) ? 'col-lg-8 ' : 'col-lg-12' ?>">
          
					<?php if ( ! is_front_page() ) : ?>

						<nav class="intro-item intro-breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb">
								<?php get_breadcrumb(); ?>
							</ol>
						</nav>

					<?php endif; ?>

					<div class="row items bricklayer columns-2">

						<?php
						while ( have_posts() ) : the_post();                      
							get_template_part( 'template-parts/post' );
						endwhile;
						wp_reset_postdata();
						?>
						
					</div>
					
					<?php if ( paginate_links( array() ) ) : ?>

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

        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        
          <aside class="col-12 col-lg-4 pl-lg-5 float-right right sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
          </aside>
        
        <?php endif; ?>

			<?php else : get_template_part( 'template-parts/search-intro-basic' ); endif; ?>	

		</div>
	</div>
</section>