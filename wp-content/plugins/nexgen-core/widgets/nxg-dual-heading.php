<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Dual_Heading extends Widget_Base {

  public function get_name() {
    return 'nxg-dual-heading';
  }

  public function get_title() {
    return __( 'Dual Heading', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-heading';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_heading_content_control( $this );

    // Style
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_heading_highlight_style_control( $this, '.heading' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_inline_editing_attributes( 'heading', 'basic' );
    ?>

    <div class="text-<?php echo $settings['heading_alingment']; ?>">
      <h2 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
        <?php echo $settings['heading']; ?>
      </h2>
    </div>

  <?php }

  protected function content_template() { ?>
  
    <#
      view.addRenderAttribute( { heading: { class: 'heading' } } );
      view.addInlineEditingAttributes( 'heading', 'basic' );
    #>

    <div class="text-{{{ settings.heading_alingment }}}">
      <h2 {{{ view.getRenderAttributeString( 'heading' ) }}}>
        {{{ settings.heading }}}
      </h2>
    </div>

  <?php
  }
}