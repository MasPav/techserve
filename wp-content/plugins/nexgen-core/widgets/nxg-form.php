<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Form extends Widget_Base {

  public function get_name() {
    return 'nxg-form';
  }

  public function get_title() {
    return __( 'Form', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-form-horizontal';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_form_content_control( $this );

    // Style
		// add_paragraph_style_control( $this, 'label', 'Label', null, null, 'label' );
		add_field_style_control( $this );
		add_button_style_control( $this, 'button', 'Button', '', 'input[type="submit"]' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <div class="nxg-contact-form-7">
      <?php echo do_shortcode( $settings['contact_form_7_shortcode'] ); ?>
    </div>

  <?php 
  }
}