<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use WP_Query;
use Elementor\Widget_Base;

class NXG_Portfolio_Grid extends Widget_Base {

  public function get_name() {
    return 'nxg-portfolio-grid';
  }

  public function get_title() {
    return __( 'Portfolio Grid', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-posts-grid';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

		// Content
		add_filter_content_control( $this, 'portfolio' );
		add_post_item_content_control( $this );
		add_pagination_content_control( $this );

		// Style
		add_block_image_style_control( $this, '.card' );
		add_filter_style_control( $this, 'filter_buttons', 'Filter Buttons', '.btn-group .btn', '.btn-group .btn.active' );
    add_heading_style_control( $this, 'post_item_title', 'Title', null, null, '.post-title' );
    add_paragraph_style_control( $this, 'post_item_excerpt', 'Excerpt', null, null, '.post-excerpt p' );
    add_paragraph_style_control( $this, 'post_item_metadata', 'Metadata', null, null, '.post-metadata' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.post-metadata-icon' );
		add_filter_style_control( $this, 'pagination', 'Pagination', '.page-numbers', '.page-numbers.current' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

		$post_categories = isset( $settings['post_categories'] ) ? $settings['post_categories'] : null;
		$posts_per_page  = isset( $settings['post_item_per_page'] ) ? $settings['post_item_per_page']['size'] : 12;
		?>

		<section class="showcase blog-grid<?php echo ( $settings['display_filter'] ) ? ' filter-section' : '' ?> projects">
			<div class="overflow-holder">

				<?php if ( $settings['display_filter'] ) { ?>

					<div class="row justify-content-center text-<?php echo $settings['filter_position']; ?>">
						<div class="col-12">
							<div class="btn-group btn-group-toggle" data-toggle="buttons">

								<?php if ( $settings['display_all_button'] ) { ?>

									<label class="btn active">
										<input type="radio" value="all" checked class="btn-filter-item">
										<span><?php echo $settings['all_button_text']; ?></span>
									</label>

								<?php } ?>

								<?php 
								if ( $post_categories ) {
									foreach ( $post_categories as $post_category ) { 
										
										$get_term = get_term( $post_category ); 
										
										if ( isset( $get_term->name ) ) {
											$post_category_name = $get_term->name;
										
										} else {
											$post_category_name = '';
										}
										?>

										<label class="btn">
											<input type="radio" value="<?php echo $post_category; ?>" class="btn-filter-item">
											<span><?php echo esc_html( $post_category_name ); ?></span>
										</label>

									<?php
									}
								} 
								?>

							</div>
						</div>
					</div>

				<?php } ?>

				<div class="row items filter-items">

					<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

					if ( $settings['display_filter'] ) {

						$tax_query = array(
							array( 
								'taxonomy' => 'nexgen-portfolio-category', 
								'field'    => 'id', 
								'terms'    => $post_categories 
							) 
						);

					} else {
						$tax_query = null;
					}

					$args = array(
						'post_type'      => 'nexgen-portfolio',
						'tax_query'      => $tax_query,
						'post_status'    => 'publish',
						'order'          => 'DESC',
						'posts_per_page' => $posts_per_page,
						'paged'          => $paged
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {

							$query->the_post();

							$item_post_categories = get_the_terms( get_the_ID(), 'nexgen-portfolio-category' );

							if ( isset( $item_post_categories ) ) {

								$filter_array = null;
								foreach ( $item_post_categories as $item_post_category ) {
									$filter_array[] = $item_post_category->term_id;
								}
							}
							
							if ( $filter_array ) {									
								$filter_list = implode( '","', $filter_array );									
								$filter_data = "[\"$filter_list\"]";
							} else {
								$filter_data = "[\"0\"]";
							} 
							
							switch ( $settings['post_item_columns']['size'] ) {

								case '1': $columns = 'col-12'; break;
								case '2': $columns = 'col-12 col-sm-6'; break;
								case '3': $columns = 'col-12 col-sm-6 col-md-6 col-lg-4'; break;
								case '4': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
								case '5': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
								case '6': $columns = 'col-12 col-sm-6 col-md-3 col-lg-2'; break;

								default: $columns = 'col-12 col-sm-6 col-md-6 col-lg-4';
							} ?>

							<div id="post-<?php the_ID(); ?>" class="<?php echo esc_attr( $columns ); ?> item filter-item" data-groups='<?php echo esc_attr( $filter_data ); ?>'>
								<div class="row card p-0 text-<?php echo $settings['post_item_text_alingment']; ?>">
									<a href="<?php the_permalink(); ?>" class="full-link"></a>										
									<div class="image-over">
										<?php if ( has_post_thumbnail() ) {
											echo get_the_post_thumbnail( get_the_ID() );
										} else {
											echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png" alt="' . __( 'No image', 'nexgen-core' ) . '" class="no-image" />';
										} 
										?>
									</div>
									<div class="card-footer d-lg-flex align-items-center justify-content-<?php echo $settings['post_item_metadata_alingment']; ?>">

										<?php if ( $settings['post_item_display_author'] ) { ?>

											<div class="post-metadata author-name d-lg-flex align-items-center mr-3">
												<div class="icon-wrapper">
													<i class="post-metadata-icon icon-user"></i>
												</div>
												<?php echo nxg_author_display_name(); ?>
											</div>

										<?php } ?>

										<?php if ( $settings['post_item_display_date'] ) { ?>

											<div class="post-metadata publish-date d-lg-flex align-items-center">
												<div class="icon-wrapper">
													<i class="post-metadata-icon icon-clock"></i>
												</div>
												<?php echo nxg_time_ago(); ?>
											</div>

										<?php } ?>
									
									</div>

									<div class="card-caption col-12 p-0">
										<div class="card-body <?php echo ( get_the_excerpt() ? 'with-excerpt' : 'no-excerpt' ) ?>">
											<div class="text">
												<h4 class="post-title"><?php the_title(); ?></h4>
												<div class="post-excerpt excerpt-holder">
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php if ( is_sticky() ) : ?>
										<i class="btn-icon sticky-icon icon-pin"></i>
									<?php endif; ?>
								</div>
							</div>

						<?php
						}
					} ?>

					<?php if ( $settings['display_filter'] ) { ?>
						<div class="col-1 filter-sizer"></div>
					<?php } ?>

				</div>

				<?php
				if ( $settings['display_pagination'] && $query->max_num_pages > 1 ) { ?>

					<div class="row">
						<div class="col-12">
							<nav class="pagination <?php echo $settings['pagination_position']; ?>">

								<?php
								echo paginate_links(
									array(
										'base' => get_pagenum_link( 1 ) . '%_%',
										'current' => max( 1, get_query_var( 'paged' ) ),
										'total' => $query->max_num_pages,
										'end_size'  => 1,
										'mid_size'  => 2,
										'prev_text' => '<i class="icon-arrow-left"></i>',
										'next_text' => '<i class="icon-arrow-right"></i>',
										'type'      => 'list'
									)
								);
								?>

							</nav>
						</div>
					</div>

				<?php		
				}

				wp_reset_postdata();
				?>

			</div>
		</section>

  <?php 
	}
}