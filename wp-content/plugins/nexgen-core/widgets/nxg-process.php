<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Process extends Widget_Base {

  public function get_name() {
    return 'nxg-process';
  }

  public function get_title() {
    return __( 'Process', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-sitemap';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_number_content_control( $this, true );
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );

    // Style
    add_number_style_control( $this, '.step span' );
    add_line_style_control( $this, '.items .item' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.heading' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.paragraph' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'number', 'class', 'number' );
		$this->add_render_attribute( 'heading', 'class', 'heading' );
    $this->add_render_attribute( 'paragraph', 'class', 'paragraph' );
    
		$this->add_inline_editing_attributes( 'number', 'basic' );
		$this->add_inline_editing_attributes( 'heading', 'basic' );
    $this->add_inline_editing_attributes( 'paragraph', 'basic' );
		?>

    <div class="process offers">              
      <div class="justify-content-center text-<?php echo $settings['number_alingment']; ?> items">
        <div class="item">

          <?php
          // Top
          if ( $settings['number_position'] === 'top' ) { ?>

            <?php if ( $settings['number'] ) { ?>
              <div class="step">
                <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                  <?php echo $settings['number']; ?>
                </span>
              </div>
            <?php } ?>

            <?php if ( $settings['heading'] ) { ?>
              <div class="text-<?php echo $settings['heading_alingment']; ?>">
                <h4 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                  <?php echo $settings['heading']; ?>
                </h4>
              </div> 
            <?php } ?>

            <?php if ( $settings['paragraph'] ) { ?>
              <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
                <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                  <?php echo $settings['paragraph']; ?>
                </p>
              </div>
            <?php } ?>

          <?php } ?>

          <?php
          // Bottom
          if ( $settings['number_position'] === 'bottom' ) { ?>

            <?php if ( $settings['heading'] ) { ?>
              <div class="text-<?php echo $settings['heading_alingment']; ?>">
                <h4 <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
                  <?php echo $settings['heading']; ?>
                </h4>
              </div> 
            <?php } ?>

            <?php if ( $settings['paragraph'] ) { ?>
              <div class="text-<?php echo $settings['paragraph_alingment']; ?>">
                <p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
                  <?php echo $settings['paragraph']; ?>
                </p>
              </div>
            <?php } ?>

            <?php if ( $settings['number'] ) { ?>
              <div class="step">
                <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                  <?php echo $settings['number']; ?>
                </span>
              </div>
            <?php } ?>

          <?php } ?>

        </div>
      </div>
    </div>

  <?php
  }

  protected function content_template() {
  ?>
    <#
      view.addRenderAttribute( { number: { class: 'number' } } );
      view.addRenderAttribute( { heading: { class: 'heading' } } );
      view.addRenderAttribute( { paragraph: { class: 'paragraph' } } );

      view.addInlineEditingAttributes( 'number', 'basic' );
      view.addInlineEditingAttributes( 'heading', 'basic' );
      view.addInlineEditingAttributes( 'paragraph', 'basic' );
		#>

		<div class="counter funfacts">
			<div class="justify-content-justify-content-center text-{{ settings.number_alingment }} items">
				<div class="item">

          <# if ( settings.number_position === 'top' ) { #>

            <div class="step">
              <span {{{ view.getRenderAttributeString( 'number' ) }}}>{{{ settings.number }}}</span>
            </div>

            <div class="text-{{{ settings.heading_alingment }}}">
              <h4 {{{ view.getRenderAttributeString( 'heading' ) }}}>
                {{{ settings.heading }}}
              </h4>
            </div>

            <div class="text-{{ settings.paragraph_alingment }}">
              <p {{{ view.getRenderAttributeString( 'paragraph' ) }}}>
                {{{ settings.paragraph }}}
              </p>
            </div>
          
          <# } #>          
          
          <# if ( settings.number_position === 'bottom' ) { #>

            <div class="text-{{{ settings.heading_alingment }}}">
              <h4 {{{ view.getRenderAttributeString( 'heading' ) }}}>
                {{{ settings.heading }}}
              </h4>
            </div>

            <div class="text-{{ settings.paragraph_alingment }}">
              <p {{{ view.getRenderAttributeString( 'paragraph' ) }}}>
                {{{ settings.paragraph }}}
              </p>
            </div>

            <div class="step">
              <span {{{ view.getRenderAttributeString( 'number' ) }}}>{{{ settings.number }}}</span>
            </div>

          <# } #>

				</div>
			</div>
		</div>

  <?php
  }
}