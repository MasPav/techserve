<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Slider extends Widget_Base {

  public function get_name() {
    return 'nxg-slider';
  }

  public function get_title() {
    return __( 'Slider', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-slides';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
		add_slider_content_control( $this );
		add_parallax_content_control( $this );
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
		add_pagination_style_control( $this, '.swiper-pagination-bullet', '.swiper-pagination-bullet-active' );
  }

  protected function render() {

		$id       = $this->get_id();
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
			<div class="swiper-container full-slider animation slider-h-100 slider-h-auto" data-speed="10000">

				<?php if ( $settings['particles_type'] !== 'none' ) { ?>

					<div id="nxg-particles-<?php echo $id; ?>" class="nxg-particles full-particles" data-type="<?php echo $settings['particles_type']; ?>" data-color="<?php echo $settings['particles_color']; ?>" data-opacity="<?php echo $settings['particles_opacity']['size']; ?>"></div>

				<?php } ?>

				<?php if ( $settings['parallax_image']['url'] ) { ?>

					<div class="parallax-x-bg" style="background-image:url(<?php echo $settings['parallax_image']['url']; ?>)" data-swiper-parallax="-<?php echo $settings['parallax_h_position']['size']; ?>%"></div>

				<?php } ?>

				<div class="swiper-wrapper">

					<?php foreach ( $settings['slider_items'] as $item ) { ?>

						<div class="swiper-slide slide-center">

							<?php if ( $item['image']['url'] ) { ?>
								<img src="<?php echo $item['image']['url']; ?>" alt="Image" class="full-image">
							<?php } ?>

							<div class="slide-content row">
								<div class="col-12 d-flex justify-content-start justify-content-lg-<?php echo $item['layout_alingment']; ?> text-left text-md-<?php echo $item['text_alingment']; ?> inner">
									<div class="slide-width" style="width: <?php echo $item['layout_width']['size'] . $item['layout_width']['unit']; ?>">

										<?php if ( $item['pre_title'] ) { ?>
											<h6 <?php echo $this->get_render_attribute_string( 'pre_title' ); ?>>
												<?php echo $item['pre_title']; ?>
											</h6>
										<?php } ?>

										<?php if ( $item['heading'] ) { ?>
											<<?php echo $item['heading_tag']; ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
												<?php echo $item['heading']; ?>
											</<?php echo $item['heading_tag']; ?>>
										<?php } ?>

										<?php if ( $item['paragraph'] ) { ?>
											<p <?php echo $this->get_render_attribute_string( 'paragraph' ); ?>>
												<?php echo $item['paragraph']; ?>
											</p>
										<?php } ?>

										<div <?php echo $this->get_render_attribute_string( 'buttons' ); ?>>
											<div class="d-sm-inline-flex">

												<?php 
												// Primary
												$this->add_link_attributes( 'primary_button_link', $item['primary_button_link'] );
												?>

												<?php if ( $item['primary_button_text'] ) { ?>
          								<a <?php echo $this->get_render_attribute_string( 'primary_button_link' ); ?> class="mt-4 btn primary-button">
														<?php echo $item['primary_button_text']; ?>
													</a>												
												<?php } ?>

												<?php
												// Secondary
												$this->add_link_attributes( 'secondary_button_link', $item['secondary_button_link'] );?>

												<?php if ( $item['secondary_button_text'] ) { ?>
          								<a <?php echo $this->get_render_attribute_string( 'secondary_button_link' ); ?> class="ml-sm-4 mt-4 btn secondary-button">
														<?php echo $item['secondary_button_text']; ?>
													</a>				
												<?php } ?>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php } ?>

				</div>
				<div class="swiper-pagination"></div>
			</div>
		</section>

		<?php if ( nxg_elementor_is_edit_mode() ) {

			add_slider_script();
			add_particles_script();

		}
  }

  protected function _layout_template() { ?>

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

				<# if ( settings.parallax_image.url ) { #>
					<div class="parallax-x-bg" style="background-image:url({{{ settings.parallax_image.url }}})" data-swiper-parallax="-{{{ settings.parallax_h_position.size }}}%"></div>
				<# } #>

				<div class="swiper-wrapper">

					<# _.each( settings.slider_items, function( item ) { #>

						<div class="swiper-slide slide-center">

							<# if ( item.image.url ) { #>
								<img src="{{{ item.image.url }}}" alt="Image" class="full-image">
							<# } #>

							<div class="slide-content row">
								<div class="col-12 d-flex justify-content-start justify-content-lg-{{{ item.layout_alingment }}} text-left text-md-{{{ item.text_alingment }}} inner">
									<div class="slide-width" style="width: {{{ item.layout_width.size }}}{{{ item.layout_width.unit }}}">

										<# if ( item.pre_title ) { #>
											<h6 {{{ view.getRenderAttributeString( 'pre_title' ) }}}>
												{{{ item.pre_title }}}
											</h6>
										<# } #>

										<# if ( item.heading ) { #>
											<h1 {{{ view.getRenderAttributeString( 'heading' ) }}}>
												{{{ item.heading }}}
											</h1>
										<# } #>

										<# if ( item.paragraph ) { #>
											<p {{{ view.getRenderAttributeString( 'paragraph' ) }}}>
												{{{ item.paragraph }}}
											</p>
										<# } #>

										<div {{{ view.getRenderAttributeString( 'buttons' ) }}}>
											<div class="d-sm-inline-flex">

												<# if ( item.primary_button_text ) { #>
													<a href="{{{ item.primary_button_link.url }}}" class="mt-4 btn primary-button">
														{{{ item.primary_button_text }}}
													</a>
												<# } #>

												<# if ( item.secondary_button_text ) { #>
													<a href="{{{ item.secondary_button_link.url }}}" class="ml-sm-4 mt-4 btn secondary-button">
														{{{ item.secondary_button_text }}}
													</a>
												<# } #>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					<# }); #>

				</div>
				<div class="swiper-pagination"></div>
			</div>
		</section>

		<?php
		add_slider_script();
		add_particles_script();

  }
}