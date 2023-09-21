<?php
/**
 * @package Nexgen
 */

$search_content_section = get_field( 'nxg_search_content_section', 'option' );

switch ( $search_content_section['columns'] ?? '' ) {   
	case '1': $content_cols = 'columns-1'; break;
	case '2': $content_cols = 'columns-2'; break;
	case '3': $content_cols = 'columns-3'; break;
	case '4': $content_cols = 'columns-4'; break;
	case '5': $content_cols = 'columns-5'; break;
	case '6': $content_cols = 'columns-6'; break;
	default : $content_cols = 'columns-3';
}
?>
<div class="navbar-holder"></div>
<section id="search-results" class="content-area search-results single showcase">
	<div class="container">
		<div class="row content">

			<?php if ( have_posts() ) : ?>

				<div class="main-area blog-grid col-12 p-0">

					<?php get_template_part( 'template-parts/search-intro' ); ?>

					<div class="row items bricklayer <?php echo esc_attr( $content_cols ); ?>">

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

			<?php else : get_template_part( 'template-parts/search-intro' ); endif; ?>
			
		</div>
	</div>
</section>