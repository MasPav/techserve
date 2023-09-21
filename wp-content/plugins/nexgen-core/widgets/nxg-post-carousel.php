<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use WP_Query;
use Elementor\Widget_Base;

class NXG_post_carousel extends Widget_Base {

  public function get_name() {
    return 'nxg-post-carousel';
  }

  public function get_title() {
    return __( 'Post Carousel', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-posts-carousel';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
		add_post_item_content_control( $this );

		// Style
		add_block_style_control( $this, '.card' );
    add_heading_style_control( $this, 'post_item_title', 'Title', null, null, '.post-title' );
    add_paragraph_style_control( $this, 'post_item_excerpt', 'Excerpt', null, null, '.post-excerpt p' );
    add_paragraph_style_control( $this, 'post_item_metadata', 'Metadata', null, null, '.post-metadata' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.post-metadata-icon' );
		add_pagination_style_control( $this, '.swiper-pagination-bullet', '.swiper-pagination-bullet-active' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();

		$posts_per_page  = isset( $settings['post_item_per_page'] ) ? $settings['post_item_per_page']['size'] : 12;
		?>
		
    <section class="carousel showcase">
			<div class="overflow-holder">
				<div class="swiper-container mid-slider items" data-perview="<?php echo $settings['post_item_columns']['size']; ?>">
					<div class="swiper-wrapper">

						<?php
						$args = array(
							'post_type'   => 'post',
							'post_status' => 'publish',
							'order'       => 'DESC',
							'posts_per_page' => $posts_per_page
						);

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {

								$query->the_post(); ?>

								<div id="post-<?php the_ID(); ?>" class="swiper-slide slide-center item">
									<div class="row card p-0 text-<?php echo $settings['post_item_text_alingment']; ?>">
										<a href="<?php the_permalink(); ?>" class="full-link"></a>										
										<div class="image-over">
											<?php if ( has_post_thumbnail() ) {
												echo get_the_post_thumbnail( get_the_ID() );
											} else {
												echo '<img src="' . get_template_directory_uri() . '/assets/images/no-image.png" alt="' . __( 'No image', 'nexgen-core' ) . '" class="no-image" />';
											} ?>
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
							
							wp_reset_postdata();

						} ?>

					</div>
					<div class="swiper-pagination carousel-pagination"></div>
					<div class="swiper-button-next carousel-nav-next"></div>
					<div class="swiper-button-prev carousel-nav-prev"></div>
				</div>
			</div>
    </section>

		<?php if ( nxg_elementor_is_edit_mode() ) {
			add_mid_slider_script();
		}
	}
}

