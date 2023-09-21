<?php
/**
 * @package Nexgen
 */
?>
<div class="navbar-holder"></div>
<section id="search-results" class="content-area search-results single showcase">
	<div class="container">
		<div class="row content">

			<?php if ( have_posts() ) : ?>

				<div class="main-area blog-grid col-12 p-0">

					<?php get_template_part( 'template-parts/search-intro-basic' ); ?>

					<div class="row items bricklayer columns-3">

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

				<?php else : get_template_part( 'template-parts/search-intro-basic' ); endif; ?>

		</div>
	</div>
</section>