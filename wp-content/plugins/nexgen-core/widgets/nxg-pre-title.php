<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Pre_Title extends Widget_Base {

  public function get_name() {
    return 'nxg-pre-title';
  }

  public function get_title() {
    return __( 'Pre Title', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-site-title';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_pre_title_content_control( $this );

    // Style
    add_pre_title_style_control( $this, '.pre-title' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    $this->add_render_attribute( 'pre_title', 'class', 'pre-title' );
    $this->add_inline_editing_attributes( 'pre_title', 'basic' );
    ?>

    <div class="text-<?php echo $settings['pre_title_alingment']; ?>">
      <h6 <?php echo $this->get_render_attribute_string( 'pre_title' ); ?>>
        <?php echo $settings['pre_title']; ?>
      </h6>
    </div>

  <?php }

  protected function content_template() { ?>

    <#
      view.addRenderAttribute( { pre_title: { class: 'pre-title' } } );
      view.addInlineEditingAttributes( 'pre_title', 'basic' );
    #>

    <div class="text-{{ settings.pre_title_alingment }}">
      <h6 {{{ view.getRenderAttributeString( 'pre_title' ) }}}>
        {{{ settings.pre_title }}}
      </h6>
    </div>

  <?php
  }
}