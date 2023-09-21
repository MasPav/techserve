<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Banner extends Widget_Base {

  public function get_name() {
    return 'nxg-banner';
  }

  public function get_title() {
    return __( 'Banner', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-banner';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
		add_banner_content_control( $this );
		add_particles_content_control( $this );

		// Style
		add_banner_image_style_control( $this, '.hero', '.full-image' );
		add_particles_style_control( $this );
		add_pre_title_style_control( $this, '.pre-title' );
    add_heading_style_control( $this, 'heading', 'Heading', null, null, '.title' );
		add_heading_highlight_style_control( $this, '.title' );
		add_paragraph_style_control( $this, 'paragraph', 'Paragraph', null, null, '.description' );
		add_button_style_control( $this, 'primary_button', 'Primary Button', '', '.primary-button' );
		add_button_style_control( $this, 'secondary_button', 'Secondary Button', '', '.secondary-button' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();
		
		if ( ! nxg_elementor_is_edit_mode() ) {
			$this->add_render_attribute( 'pre_title', [ 'class' => 'pre-title', 'data-aos' => 'fade-down', 'data-aos-delay' => '200' ] );
			$this->add_render_attribute( 'heading', [ 'class' => 'heading', 'data-aos' => 'zoom-in', 'data-aos-delay' => '400' ] );
			$this->add_render_attribute( 'paragraph', [ 'class' => 'paragraph', 'data-aos' => 'zoom-in', 'data-aos-delay' => '800' ] );
			$this->add_render_attribute( 'buttons', [ 'class' => 'buttons', 'data-aos' => 'fade-up', 'data-aos-delay' => '1200' ] );
		}

    $this->add_render_attribute( 'pre_title', 'class', 'pre-title' );
    $this->add_render_attribute( 'heading', 'class', 'title' );
    $this->add_render_attribute( 'paragraph', 'class', 'description' );
    $this->add_render_attribute( 'buttons', 'class', 'buttons' );
    ?>

		<section class="hero">
			<div class="swiper-container no-slider animation slider-h-100 slider-h-auto" data-speed="10000">

				<?php if ( $settings['particles_type'] !== 'none' ) { ?>

					<div id="nxg-particles" class="nxg-particles full-particles" data-type="<?php echo $settings['particles_type']; ?>" data-color="<?php echo $settings['particles_color']; ?>" data-opacity="<?php echo $settings['particles_opacity']['size']; ?>"></div>

				<?php } ?>

				<div class="swiper-wrapper">
					<div class="swiper-slide slide-center">

						<?php if ( $settings['image']['url'] ) { ?>
							<img src="<?php echo $settings['image']['url']; ?>" alt="Image" class="full-image">
						<?php } ?>

						<div class="slide-content row">
							<div class="col-12 d-flex justify-content-start justify-content-md-<?php echo $settings['layout_alingment']; ?> text-left text-md-<?php echo $settings['text_alingment']; ?> inner">
								<div class="slide-width" style="width: <?php echo $settings['layout_width']['size'] . $settings['layout_width']['unit']; ?>">

									<?php if ( $settings['pre_title'] ) { ?>
										<h6 <?php echo $this->get_render_attribute_string( 'pre_title' ); ?>>
											<?php echo $settings['pre_title']; ?>
										</h6>
									<?php } ?>

									<?php if ( $settings['heading'] ) { ?>
										<<?php echo $settings['heading_tag']; ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
											<?php echo $settings['heading']; ?>
										</<?php echo $settings['heading_tag']; ?>>
									<?php } ?>

									<?php if ( $settings['paragraph'] ) { ?>
										<p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
											<?php echo $settings['paragraph']; ?>
										</p>
									<?php } ?>

									<div <?php echo $this->get_render_attribute_string( 'buttons' ); ?>>
										<div class="d-sm-inline-flex">

											<?php
											// Primary
											$this->add_link_attributes( 'primary_button_link', $settings['primary_button_link'] );
											?>

											<?php if ( $settings['primary_button_text'] ) { ?>
          							<a <?php echo $this->get_render_attribute_string( 'primary_button_link' ); ?> class="mt-4 btn primary-button">
													<?php echo $settings['primary_button_text']; ?>
												</a>												
											<?php } ?>
											
											<?php
											// Secondary
											$this->add_link_attributes( 'secondary_button_link', $settings['secondary_button_link'] );
											?>

											<?php if ( $settings['secondary_button_text'] ) { ?>
          							<a <?php echo $this->get_render_attribute_string( 'secondary_button_link' ); ?> class="ml-sm-4 mt-4 btn secondary-button">
													<?php echo $settings['secondary_button_text']; ?>
												</a>				
											<?php } ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php if ( nxg_elementor_is_edit_mode() ) {

			add_particles_script();

		}
	}

  protected function content_template() { ?>

		<#
			view.addRenderAttribute( { pre_title: { class: 'pre-title' } } );
			view.addRenderAttribute( { heading: { class: 'title' } } );
			view.addRenderAttribute( { paragraph: { class: 'description' } } );
			view.addRenderAttribute( { buttons: { class: 'buttons' } } );
		#>

		<section class="hero">
			<div class="swiper-container full-slider animation slider-h-100 slider-h-auto" data-speed="10000">

				<# if ( settings.particles_type !== 'none' ) { #>
					<div id="nxg-particles" class="nxg-particles full-particles" data-type="{{{ settings.particles_type }}}" data-color="{{{ settings.particles_color }}}" data-opacity="{{{ settings.particles_opacity.size }}}"></div>
				<# } #>

				<div class="swiper-wrapper">
					<div class="swiper-slide slide-center">

						<# if ( settings.image.url ) { #>
							<img src="{{{ settings.image.url }}}" alt="Image" class="full-image">
						<# } #>

						<div class="slide-content row">
								<div class="col-12 d-flex justify-content-start justify-content-md-{{{ settings.layout_alingment }}} text-left text-md-{{{ settings.text_alingment }}} inner">
									<div class="slide-width" style="width: {{{ settings.layout_width.size }}}{{{ settings.layout_width.unit }}}">

										<# if ( settings.pre_title ) { #>
											<h6 {{{ view.getRenderAttributeString( 'pre_title' ) }}}>
												{{{ settings.pre_title }}}
											</h6>
										<# } #>

										<# if ( settings.heading ) { #>
											<h1 {{{ view.getRenderAttributeString( 'heading' ) }}}>
												{{{ settings.heading }}}
											</h1>
										<# } #>

										<# if ( settings.paragraph ) { #>
											<p {{{ view.getRenderAttributeString( 'paragraph' ) }}}>
												{{{ settings.paragraph }}}
											</p>
										<# } #>

										<div {{{ view.getRenderAttributeString( 'buttons' ) }}}>
											<div class="d-sm-inline-flex">

												<# if ( settings.primary_button_text ) { #>
													<a href="{{{ settings.primary_button_link.url }}}" class="mt-4 btn primary-button">
														{{{ settings.primary_button_text }}}
													</a>
												<# } #>

												<# if ( settings.secondary_button_text ) { #>
													<a href="{{{ settings.secondary_button_link.url }}}" class="ml-sm-4 mt-4 btn secondary-button">
														{{{ settings.secondary_button_text }}}
													</a>
												<# } #>

											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php
		add_particles_script();
  }
}