<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Button extends Widget_Base {

  public function get_name() {
    return 'nxg-button';
  }

  public function get_title() {
    return __( 'Button', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-button';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {
    
    // Content
    add_button_content_control( $this );

    // Style
		add_button_style_control( $this, 'button', 'Button', '', '.btn.button' );
    add_icon_style_control( $this, 'modal_icon', 'Modal Icon', [ 'button_link_type' => 'modal' ], '.icon-wrapper', '.icon-close' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();

    if ( $settings['button_link_type'] === 'modal' ) { 
      $this->add_render_attribute( 'button_text', [ 'class' => 'btn button', 'data-toggle' => 'modal', 'data-target' => '#' .$settings['button_modal_id'] ] );
    
    } else {
      $this->add_render_attribute( 'button_text', [ 'class' => 'btn button', 'href' => $settings['button_link']['url'], 'target' => $settings['button_link']['is_external'] ] );
    }

    $this->add_inline_editing_attributes( 'button_text', 'basic' );
		?>

    <div class="d-flex justify-content-<?php echo $settings['button_position']; ?>">
      <a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
        <?php echo $settings['button_text']; ?>
      </a>
    </div>

    <?php if ( $settings['button_link_type'] === 'modal' ) { ?>

      <!-- Modal [<?php echo $settings['button_modal_id']; ?>] -->
      <div id="<?php echo $settings['button_modal_id']; ?>" class="p-0 modal fade" role="dialog" aria-labelledby="<?php echo $settings['button_modal_id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
          <div class="modal-content full">
            <div class="modal-header absolute" data-dismiss="modal">
              <div class="icon-wrapper">
                <i class="icon-close fas fa-times"></i>
              </div>
            </div>
            <div class="modal-body p-0">
              <?php echo $settings['button_modal_iframe']; ?>
            </div>
          </div>
        </div>
      </div>

    <?php 
    }
  }

  protected function content_template() { ?>

    <#
      view.addRenderAttribute( { button_text: { class: 'btn button' } } );
      view.addInlineEditingAttributes( 'button_text', 'basic' );
		#>
    
		<div class="d-flex justify-content-{{ settings.button_position }}">
			<a {{{ view.getRenderAttributeString( 'button_text' ) }}}>
        {{{ settings.button_text }}}
      </a>
		</div>

  <?php
  }
}