<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Logo_Carousel extends Widget_Base {

  public function get_name() {
    return 'nxg-logo-carousel';
  }

  public function get_title() {
    return __( 'Logo Carousel', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-form-vertical';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

		// Content
		add_logo_carousel_content_control( $this );

		// Style
		add_image_overlay_style_control( $this, '.client-logo', '.partners .client-logo img' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

		<section class="partners">
			<div class="overflow-holder">
				<div class="swiper-container min-slider" data-perview="<?php echo $settings['columns']['size']; ?>">
					<div class="swiper-wrapper">

					<?php foreach ( $settings['carousel_items'] as $item ) { ?>

						<div class="swiper-slide slide-center item">

							<?php if ( $item['image']['url'] ) { ?>

								<?php 
								$target   = $item['link']['is_external'] == true ? ' target="_blank"' : '';
								$nofollow = $item['link']['nofollow'] == true ? ' rel="nofollow"' : '';
								?>

								<a href="<?php echo $item['link']['url']; ?>" <?php echo esc_attr( $target ); echo esc_attr( $nofollow ); ?> class="client-logo">
									<img src="<?php echo $item['image']['url']; ?>" alt="<?php echo $item['title']; ?>" class="fit-image">
								</a>

							<?php } ?>

						</div>

					<?php } ?>
							
					</div>
				</div>
			</div>
		</section>
		
		<?php if ( nxg_elementor_is_edit_mode() ) {
			add_min_slider_script();
		}
	}
}