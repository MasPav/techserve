<?php

namespace NXG\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes;

class NXG_Counter_Circle extends Widget_Base {

  public function get_name() {
    return 'nxg-counter-circle';
  }

  public function get_title() {
    return __( 'Counter Circle', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-counter-circle';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_number_content_control( $this );
    add_heading_content_control( $this );
    add_paragraph_content_control( $this );

    // Style
    add_number_style_control( $this, '.number' );
    add_progress_bar_style_control( $this );
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

    <div class="counter skills">              
      <div class="justify-content-center text-<?php echo $settings['number_alingment']; ?> items">
        <div class="item">

          <?php
          // Top
          if ( $settings['number_position'] === 'top' ) { ?>

            <?php if ( $settings['number'] ) { ?>
              <div data-percent="<?php echo $settings['number']; ?>" data-color="<?php echo $settings['progress_bar_color']; ?>" data-empty-color="<?php echo $settings['progress_bar_empty_color']; ?>" class="radial">
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
          // Right
          if ( $settings['number_position'] === 'right' ) { ?>

            <div class="d-flex align-items-center justify-content-start">
              <div class="text">

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

              </div>
              <div class="number">

                <?php if ( $settings['number'] ) { ?>
                <div data-percent="<?php echo $settings['number']; ?>" data-color="<?php echo $settings['progress_bar_color']; ?>" data-empty-color="<?php echo $settings['progress_bar_empty_color']; ?>" class="radial">
                  <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                    <?php echo $settings['number']; ?>
                  </span>
                </div>
                <?php } ?>

              </div>
            </div>

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
              <div data-percent="<?php echo $settings['number']; ?>" data-color="<?php echo $settings['progress_bar_color']; ?>" data-empty-color="<?php echo $settings['progress_bar_empty_color']; ?>" class="radial">
                <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                  <?php echo $settings['number']; ?>
                </span>
              </div>
            <?php } ?>

          <?php } ?>

          <?php
          // Left
          if ( $settings['number_position'] === 'left' ) { ?>

            <div class="d-flex align-items-center justify-content-start">
              <div class="number">

                <?php if ( $settings['number'] ) { ?>
                  <div data-percent="<?php echo $settings['number']; ?>" data-color="<?php echo $settings['progress_bar_color']; ?>" data-empty-color="<?php echo $settings['progress_bar_empty_color']; ?>" class="radial">
                    <span <?php echo $this->get_render_attribute_string( 'number' ); ?>>
                      <?php echo $settings['number']; ?>
                    </span>
                  </div>
                <?php } ?>

              </div>
              <div class="text">

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

              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

  <?php
  add_counter_circle_script();
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

		<div class="counter skills">
			<div class="justify-content-justify-content-center text-{{{ settings.number_alingment }}} items">
				<div class="item">

          <# if ( settings.number_position === 'top' ) { #>

            <div data-percent="{{{ settings.number }}}" data-color="{{{ settings.progress_bar_color }}}" data-empty-color="{{{ settings.progress_bar_empty_color }}}" class="radial">
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

          <# if ( settings.number_position === 'right' ) { #>          

            <div class="d-flex align-items-center justify-content-start">      
              <div class="text">

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

              </div>
              <div class="number">

                <div data-percent="{{{ settings.number }}}" data-color="{{{ settings.progress_bar_color }}}" data-empty-color="{{{ settings.progress_bar_empty_color }}} class="radial">
                  <span {{{ view.getRenderAttributeString( 'number' ) }}}>{{{ settings.number }}}</span>
                </div>

              </div>   
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

            <div data-percent="{{{ settings.number }}}" data-color="{{{ settings.progress_bar_color }}}" data-empty-color="{{{ settings.progress_bar_empty_color }}} class="radial">
              <span {{{ view.getRenderAttributeString( 'number' ) }}}>{{{ settings.number }}}</span>
            </div>

          <# } #>          
          
          <# if ( settings.number_position === 'left' ) { #>

            <div class="d-flex align-items-center justify-content-start">
              <div class="number">

                <div data-percent="{{{ settings.number }}}" data-color="{{{ settings.progress_bar_color }}}" data-empty-color="{{{ settings.progress_bar_empty_color }}} class="radial">
                  <span {{{ view.getRenderAttributeString( 'number' ) }}}>{{{ settings.number }}}</span>
                </div>

              </div>
              <div class="text">

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

              </div>
            </div>

          <# } #>

				</div>
			</div>
		</div>

  <?php
  add_counter_circle_script();
  }
}