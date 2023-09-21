<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Person extends Widget_Base {

  public function get_name() {
    return 'nxg-person';
  }

  public function get_title() {
    return __( 'Person', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-person';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_person_content_control( $this );
    add_social_icons_content_control( $this );

    // Style
    add_image_style_control( $this, '.image', '.person-image' );
    add_heading_style_control( $this, 'person_name', 'Name', null, null, '.person-name' );
    add_paragraph_style_control( $this, 'person_title', 'Title', null, null, '.person-title' );
    add_paragraph_style_control( $this, 'person_biography', 'Biography', null, null, '.person-biography' );
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.social-icon' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    
    $this->add_render_attribute( 'person_name', 'class', 'person-name' );
    $this->add_render_attribute( 'person_title', 'class', 'person-title' );
    $this->add_render_attribute( 'person_biography', 'class', 'person-biography' );

		$this->add_inline_editing_attributes( 'person_name', 'basic' );
		$this->add_inline_editing_attributes( 'person_title', 'basic' );
		$this->add_inline_editing_attributes( 'person_biography', 'basic' );
		?>
    
    <div class="team">
      <div class="justify-content-center text-<?php echo $settings['person_text_alingment']; ?> items">
        <div class="item">

          <?php
          // Top
          if ( $settings['person_photo_position'] === 'top' ) { ?>

            <div class="position-top">
              <div class="image">
                <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
              </div>
            </div>
            <div class="position-bottom text-<?php echo $settings['person_text_alingment']; ?>">

              <h4 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                <?php echo $settings['person_name']; ?>
              </h4>

              <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                <?php echo $settings['person_title']; ?>
              </p>

              <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                <?php echo $settings['person_biography']; ?>
              </p>

              <ul class="person-social-icons">
                <?php foreach ( $settings['social_icon_items'] as $item ) { ?>
                  <li>
                    <a href="<?php echo $item['social_icon_link']['url']; ?>">
                      <div class="icon-wrapper">
                        <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                      </div>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>

          <?php } ?>
            
          <?php
          // Right
          if ( $settings['person_photo_position'] === 'right' ) { ?>

            <div class="d-flex align-items-center justify-content-center">
              <div class="position-left text-<?php echo $settings['person_text_alingment']; ?>">

                <h4 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                  <?php echo $settings['person_name']; ?>
                </h4>

                <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                  <?php echo $settings['person_title']; ?>
                </p>

                <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                  <?php echo $settings['person_biography']; ?>
                </p>

                <ul class="person-social-icons">
                  <?php foreach ( $settings['social_icon_items'] as $item ) { ?>
                    <li>
                      <a href="<?php echo $item['social_icon_link']['url']; ?>">
                        <div class="icon-wrapper">
                          <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <div class="position-right">
                <div class="image">
                  <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                </div>
              </div>
            </div>

          <?php } ?>

          <?php
          // Bottom
          if ( $settings['person_photo_position'] === 'bottom' ) { ?>

            <div class="position-top text-<?php echo $settings['person_text_alingment']; ?>">

              <h4 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                <?php echo $settings['person_name']; ?>
              </h4>

              <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                <?php echo $settings['person_title']; ?>
              </p>

              <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                <?php echo $settings['person_biography']; ?>
              </p>

              <ul class="person-social-icons">
                <?php foreach ( $settings['social_icon_items'] as $item ) { ?>
                  <li>
                    <a href="<?php echo $item['social_icon_link']['url']; ?>">
                      <div class="icon-wrapper">
                        <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                      </div>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>
            <div class="position-bottom">
              <div class="image">
                <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
              </div>
            </div>

          <?php } ?>

          <?php
          // Left
          if ( $settings['person_photo_position'] === 'left' ) { ?>

            <div class="d-flex align-items-center justify-content-center">
              <div class="position-left">
                <div class="image">
                  <img src="<?php echo $settings['person_photo']['url']; ?>" class="person-image" alt="Image">
                </div>
              </div>
              <div class="position-right text-<?php echo $settings['person_text_alingment']; ?>">

                <h4 <?php echo $this->get_render_attribute_string( 'person_name' ); ?>>
                  <?php echo $settings['person_name']; ?>
                </h4>

                <p <?php echo $this->get_render_attribute_string( 'person_title' ); ?>>
                  <?php echo $settings['person_title']; ?>
                </p>

                <p <?php echo $this->get_render_attribute_string( 'person_biography' ); ?>>
                  <?php echo $settings['person_biography']; ?>
                </p>

                <ul class="person-social-icons">
                  <?php foreach ( $settings['social_icon_items'] as $item ) { ?>
                    <li>
                      <a href="<?php echo $item['social_icon_link']['url']; ?>">
                        <div class="icon-wrapper">
                          <?php \Elementor\Icons_Manager::render_icon( $item['social_icon'], [ 'class' => 'social-icon' ] ); ?>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>

	<?php }

  protected function content_template() { ?>

    <#
      view.addRenderAttribute( { person_name: { class: 'person-name' } } );
      view.addRenderAttribute( { person_title: { class: 'person-title' } } );
      view.addRenderAttribute( { person_biography: { class: 'person-biography' } } );

      view.addInlineEditingAttributes( 'person_name', 'basic' );
      view.addInlineEditingAttributes( 'person_title', 'basic' );
      view.addInlineEditingAttributes( 'person_biography', 'basic' );
		#>

		<div class="team">              
			<div class="justify-content-justify-content-center text-{{ settings.person_text_alingment }} items">
				<div class="item">

          <# if ( settings.person_photo_position === 'top' ) { #>

              <div class="position-top">
                <div class="image">
                  <img src="{{{ settings.person_photo.url }}}" class="person-image" alt="Image">
                </div>
              </div>
              <div class="position-bottom text-{{{ settings.person_text_alingment }}}">

                <h4 {{{ view.getRenderAttributeString( 'person_name' ) }}}>
                  {{{ settings.person_name }}}
                </h4>

                <p {{{ view.getRenderAttributeString( 'person_title' ) }}}>
                  {{{ settings.person_title }}}
                </p>

                <p {{{ view.getRenderAttributeString( 'person_biography' ) }}}>
                  {{{ settings.person_biography }}}
                </p>

                <ul class="person-social-icons">

                  <# _.each( settings.social_icon_items, function( item ) { #>

                    <# var iconHTML = elementor.helpers.renderIcon( view, item.social_icon, { 'class': 'social-icon' }, 'i' , 'object' ); #>

                    <li>
                      <a href="{{{ item.social_icon_link.url }}}">
                        <div class="icon-wrapper">
                          {{{ iconHTML.value }}}
                        </div>
                      </a>
                    </li>

                  <# }); #>
                  
                </ul>
              </div>
          
          <# } #>

          <# if ( settings.person_photo_position === 'right' ) { #>

            <div class="d-flex align-items-center justify-content-center">
              <div class="position-left text-{{{ settings.person_text_alingment }}}">

                <h4 {{{ view.getRenderAttributeString( 'person_name' ) }}}>
                  {{{ settings.person_name }}}
                </h4>

                <p {{{ view.getRenderAttributeString( 'person_title' ) }}}>
                  {{{ settings.person_title }}}
                </p>

                <p {{{ view.getRenderAttributeString( 'person_biography' ) }}}>
                  {{{ settings.person_biography }}}
                </p>

                <ul class="person-social-icons">

                  <# _.each( settings.social_icon_items, function( item ) { #>

                    <# var iconHTML = elementor.helpers.renderIcon( view, item.social_icon, { 'class': 'social-icon' }, 'i' , 'object' ); #>

                    <li>
                      <a href="{{{ item.social_icon_link.url }}}">
                        <div class="icon-wrapper">
                          {{{ iconHTML.value }}}
                        </div>
                      </a>
                    </li>

                  <# }); #>
                  
                </ul>
              </div>
              <div class="position-right">
                <div class="image">
                  <img src="{{{ settings.person_photo.url }}}" class="person-image" alt="Image">
                </div>
              </div>   
            </div>

          <# } #>          
          
          <# if ( settings.person_photo_position === 'bottom' ) { #>

            <div class="position-top text-{{{ settings.person_text_alingment }}}">

              <h4 {{{ view.getRenderAttributeString( 'person_name' ) }}}>
                {{{ settings.person_name }}}
              </h4>

                <p {{{ view.getRenderAttributeString( 'person_title' ) }}}>
                  {{{ settings.person_title }}}
                </p>

                <p {{{ view.getRenderAttributeString( 'person_biography' ) }}}>
                  {{{ settings.person_biography }}}
                </p>

                <ul class="person-social-icons">

                  <# _.each( settings.social_icon_items, function( item ) { #>

                    <# var iconHTML = elementor.helpers.renderIcon( view, item.social_icon, { 'class': 'social-icon' }, 'i' , 'object' ); #>

                    <li>
                      <a href="{{{ item.social_icon_link.url }}}">
                        <div class="icon-wrapper">
                          {{{ iconHTML.value }}}
                        </div>
                      </a>
                    </li>

                  <# }); #>
                  
                </ul>
            </div>
            <div class="position-bottom">
              <div class="image">
                <img src="{{{ settings.person_photo.url }}}" class="person-image" alt="Image">
              </div>
            </div>

          <# } #>          
          
          <# if ( settings.person_photo_position === 'left' ) { #>

            <div class="d-flex align-items-center justify-content-center">
              <div class="position-left">
                <div class="image">
                  <img src="{{{ settings.person_photo.url }}}" class="person-image" alt="Image">
                </div>
              </div>
              <div class="position-right text-{{{ settings.person_text_alingment }}}">

                <h4 {{{ view.getRenderAttributeString( 'person_name' ) }}}>
                  {{{ settings.person_name }}}
                </h4>

                <p {{{ view.getRenderAttributeString( 'person_title' ) }}}>
                  {{{ settings.person_title }}}
                </p>

                <p {{{ view.getRenderAttributeString( 'person_biography' ) }}}>
                  {{{ settings.person_biography }}}
                </p>

                <ul class="person-social-icons">

                  <# _.each( settings.social_icon_items, function( item ) { #>

                    <# var iconHTML = elementor.helpers.renderIcon( view, item.social_icon, { 'class': 'social-icon' }, 'i' , 'object' ); #>

                    <li>
                      <a href="{{{ item.social_icon_link.url }}}">
                        <div class="icon-wrapper">
                          {{{ iconHTML.value }}}
                        </div>
                      </a>
                    </li>

                  <# }); #>
                  
                </ul>
              </div>   
            </div>

          <# } #>

				</div>
			</div>
		</div>

  <?php
  }
}