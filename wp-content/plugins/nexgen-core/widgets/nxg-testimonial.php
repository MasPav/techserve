<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Testimonial extends Widget_Base {

  public function get_name() {
    return 'nxg-testimonial';
  }

  public function get_title() {
    return __( 'Testimonial', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-testimonial';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );
    add_icon_content_control( $this, false );

    // Style
    add_block_style_control( $this, '.quote' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.quote-icon' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );

    $this->add_inline_editing_attributes( 'heading', 'basic' );
		$this->add_inline_editing_attributes( 'paragraph', 'basic' );
    ?>

    <div class="quote">
      <div class="quote-content">

        <div class="text-<?php echo $settings['heading_alingment']; ?>">
          <h4 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
            <?php echo $settings['heading']; ?>
          </h4>
        </div> 

        <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
          <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
            <?php echo $settings['paragraph']; ?>
          </p>
        </div>

      </div>

      <div class="icon-wrapper">
        <?php
        if ( $settings['icon_type'] == 'fa' ) {
          \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'class' => 'quote-icon quote-right' ] );

        } else {
          echo '<i class="quote-icon quote-right icon-' . $settings['icon_line'] . '"></i>';
        }
        ?>
      </div>

    </div>

  <?php 
  }
}