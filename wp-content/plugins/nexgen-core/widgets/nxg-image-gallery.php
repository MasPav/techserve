<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Image_Gallery extends Widget_Base {

  public function get_name() {
    return 'nxg-image-gallery';
  }

  public function get_title() {
    return __( 'Image Gallery', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-photo-library';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

		// Content
		add_image_gallery_content_control( $this );

		// Style
		add_image_style_control( $this, '.item', '.image' );
  }

  protected function render() {

		$settings = $this->get_settings_for_display();
		?>

		<div class="nxg-gallery gallery row justify-content-center items">

			<?php foreach ( $settings['gallery'] as $image ) { 
				
				switch ( $settings['columns']['size'] ) {

					case '1': $columns = 'col-12'; break;
					case '2': $columns = 'col-12 col-sm-6'; break;
					case '3': $columns = 'col-12 col-sm-6 col-md-6 col-lg-4'; break;
					case '4': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
					case '5': $columns = 'col-12 col-sm-6 col-md-4 col-lg-3'; break;
					case '6': $columns = 'col-12 col-sm-6 col-md-3 col-lg-2'; break;

					default: $columns = 'col-12 col-sm-6 col-md-6 col-lg-4';
				}
				
				?>

				<a href="<?php echo $image['url']; ?>" class="item <?php echo esc_attr( $columns ); ?>">
					<img src="<?php echo $image['url']; ?>" alt="" class="image">
				</a>

			<?php } ?>

		</div> 

	<?php }
}