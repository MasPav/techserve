<?php

namespace NXG\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;
use Elementor\Repeater;
use Elementor\Utils;

class NXG_Testimonial_Carousel extends Widget_Base {

  public function get_name() {
    return 'nxg-testimonial-carousel';
  }

  public function get_title() {
    return __( 'Testimonial Carousel', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-testimonial-carousel';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_testimonial_carousel_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.quote-icon' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

		<section class="carousel testimonials">
			<div class="overflow-holder">
				<div class="swiper-container mid-slider items" data-perview="<?php echo $settings['columns']['size']; ?>"> 
          <div class="swiper-wrapper">

            <?php foreach ( $settings['carousel_items'] as $item ) { ?>

              <div class="swiper-slide slide-center item text-<?php echo $item['text_alingment']; ?>">
                <div class="row card">
                  <div class="col-12">

                    <?php if ( $item['heading'] ) { ?>
                      <h4 class="heading"><?php echo $item['heading']; ?></h4>
                    <?php } ?>

                    <?php if ( $item['paragraph'] ) { ?>
                      <p class="paragraph"><?php echo $item['paragraph']; ?></p>
                    <?php } ?>

                    <i class="quote-icon quote-right fas fa-quote-right"></i>
                  </div>
                </div>
              </div>

            <?php } ?>

          </div>
				</div>
			</div>
		</section>

    <?php 
    if ( nxg_elementor_is_edit_mode() ) {
      add_mid_slider_script();
    }
  }

  protected function content_template() { ?>

    <section class="carousel testimonials">
      <div class="overflow-holder">
        <div class="swiper-container mid-slider items" data-perview="{{{ settings.columns.size }}}"> 
          <div class="swiper-wrapper">

            <# _.each( settings.carousel_items, function( item ) { #>

              <div class="swiper-slide slide-center item text-{{{ item.text_alingment }}}">
                <div class="row card">
                  <div class="col-12">

                    <# if ( item.heading ) { #>
                      <h4 class="heading">{{{ item.heading }}}</h4>
                    <# } #>

                    <# if ( item.paragraph ) { #>
                      <p class="paragraph">{{{ item.paragraph }}}</p>
                    <# } #>

                    <i class="quote-icon quote-right fas fa-quote-right"></i>
                  </div>
                </div>
              </div>

            <# }); #>

          </div>
        </div>
      </div>
    </section>

  <?php
  add_mid_slider_script();
  
  }
}