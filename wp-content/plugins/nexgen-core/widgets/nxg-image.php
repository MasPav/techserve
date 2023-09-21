<?php

namespace NXG\Widgets;

use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Core\Schemes;

class NXG_Image extends Widget_Base {

  public function get_name() {
    return 'nxg-image';
  }

  public function get_title() {
    return __( 'Image', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-image';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

		// Content
		add_image_content_control( $this );

		// Style
		add_image_style_control( $this, '.image-wrapper', '.fit-image' );
		add_image_overlay_style_control( $this, '.image-wrapper', '.fit-image' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();
		?>

		<div class="image-wrapper">
			<img src="<?php echo $settings['image']['url']; ?>" alt="Image" class="fit-image">
		</div>
	<?php }
}