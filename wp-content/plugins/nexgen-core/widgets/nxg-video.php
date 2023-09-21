<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Video extends Widget_Base {

  public function get_name() {
    return 'nxg-video';
  }

  public function get_title() {
    return __( 'Video', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-youtube';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_video_content_control( $this );
    add_image_overlay_content_control( $this );

    // Style
    add_image_overlay_style_control( $this, '.square-image', '.fit-image' );
    add_play_icon_style_control( $this, '.square-image', '.icon.auto' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
    ?>

    <div class="nxg-gallery">
      <a href="<?php echo $settings['video_url']; ?>" class="square-image d-flex justify-content-center align-items-center">
        <i class="icon auto fas fa-play"></i>
        <img src="<?php echo $settings['image_overlay']['url']; ?>" class="fit-image" alt="<?php echo $settings['video_title']; ?>">
      </a>
    </div>

  <?php }

  protected function content_template() { ?>

		<div class="nxg-gallery">
			<a href="{{{ settings.video_url }}}" class="square-image d-flex justify-content-center align-items-center">
				<i class="icon auto fas fa-play"></i>
				<img src="{{{ settings.image_overlay.url }}}" class="fit-image" alt="{{{ settings.video_title }}}">
			</a>
		</div>

  <?php
  }
}