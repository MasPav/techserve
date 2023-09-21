<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Pricing extends Widget_Base {

  public function get_name() {
    return 'nxg-pricing';
  }

  public function get_title() {
    return __( 'Pricing', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-price-table';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_sale_tag_content_control( $this );
    add_icon_content_control( $this );
    add_heading_content_control( $this );
    add_price_content_control( $this );
    add_paragraph_content_control( $this );
    add_check_list_content_control( $this );
    add_action_content_control( $this );

    // Style
    add_block_style_control( $this, '.card' );
		add_paragraph_style_control( $this, 'sale_tag', 'Sale Tag', null, null, '.badge' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.card-icon' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'price', 'Price', null, null, '.price' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
		add_paragraph_style_control( $this, 'list_text', 'List Text', null, null, '.list-text' );
    add_icon_style_control( $this, 'list_icon', 'List Icon', '', '.list-icon-wrapper', '.list-icon' );
		add_button_style_control( $this, 'button', 'Button', [ 'action_type' => 'button' ], '.btn.button' );
		add_pulse_icon_style_control( $this, [ 'action_type' => 'icon' ], '.card', '.btn-icon' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    
    if ( $settings['action_type'] === 'icon' ) { 
      $this->add_render_attribute( 'pulse_icon', [ 'class' => 'btn-icon pulse-icon fas fas fa-arrow-right', 'data-color' => $settings['pulse_icon_pulse_color'] ] );

    } elseif ( $settings['action_type'] === 'button' ) {
      $this->add_render_attribute( 'button_text', 'class', 'btn button' );
      $this->add_inline_editing_attributes( 'button_text', 'basic' );
    }
    
    $this->add_render_attribute( 'sale_tag_text', 'class', 'badge' );
    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'price', 'class', 'price' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );

    $this->add_inline_editing_attributes( 'sale_tag_text', 'basic' );
		$this->add_inline_editing_attributes( 'heading', 'basic' );
		$this->add_inline_editing_attributes( 'price', 'basic' );
		$this->add_inline_editing_attributes( 'paragraph', 'basic' );
		?>

    <div class="plans card-pulse-icon">
      <div class="items">
        <div class="item">
					<div class="card<?php echo ( $settings['display_sale_tag'] ) ? ' most-popular' : '' ?>">

            <?php if ( $settings['display_sale_tag'] ) { ?>
              <span <?php echo $this->get_render_attribute_string( 'sale_tag_text' ); ?>><?php echo $settings['sale_tag_text']; ?></span>
            <?php } ?>
          
            <div class="icon-wrapper <?php echo $settings['icon_position']; ?>">
              <?php
              if ( $settings['icon_type'] == 'fa' ) {
                \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'class' => 'card-icon' ] );

              } else {
                echo '<i class="card-icon icon-' . $settings['icon_line'] . '"></i>';
              }
              ?>
            </div>

            <div class="text-<?php echo $settings['heading_alingment']; ?>">
              <h4 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                <?php echo $settings['heading']; ?>
              </h4>
            </div> 

            <?php if ( $settings['paragraph'] ) { ?>
              <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
                <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                  <?php echo $settings['paragraph']; ?>
                </p>
              </div>
            <?php } ?>

            <div class="text-<?php echo $settings['price_alingment']; ?>">
              <span <?php echo $this->get_render_attribute_string( 'price' ); ?>>
                <?php echo $settings['price']; ?>
              </span>
            </div>

            <ul class="list-group list-group-flush">

              <?php foreach ( $settings['check_list_items'] as $item ) { ?>

                <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                  <span class="list-text"><?php echo $item['text']; ?></span>
                  <div class="list-icon-wrapper">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'class' => 'list-icon icon-min m-0 text-right' ] ) ?>
                  </div>
                </li>
              
              <?php } ?>

            </ul>

            <?php 
            $url      = null;
            $target   = null;
            $nofollow = null;

            if ( isset( $settings['action_link'] ) ) {
              $url      = $settings['action_link']['url'];
              $target   = $settings['action_link']['is_external'] ? ' target="_blank"' : '';
              $nofollow = $settings['action_link']['nofollow'] ? ' rel="nofollow"' : '';
            } ?>

            <a href="<?php echo esc_url( $url ); ?>" class="full-link" <?php echo esc_attr( $target ); echo esc_attr( $nofollow ); ?>></a>

            <?php if ( $settings['action_type'] === 'icon' ) { ?>

              <i <?php echo $this->get_render_attribute_string( 'pulse_icon' ); ?>></i>

            <?php } elseif ( $settings['action_type'] === 'button' ) { ?>

              <div class="buttons">
                <div class="text-<?php echo $settings['button_position']; ?>">
                    <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
                      <?php echo $settings['button_text']; ?>
                    </a>
                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </div>

    <?php 
    add_pulse_icon_script();
  }
}