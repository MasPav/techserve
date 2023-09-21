<?php
/**
 * @package Nexgen Core
 */

namespace NXG\Widgets;

use Elementor\Widget_Base;

class NXG_Icon_List extends Widget_Base {

  public function get_name() {
    return 'nxg-icon-list';
  }

  public function get_title() {
    return __( 'Icon List', 'nexgen-core' );
  }

  public function get_icon() {
    return 'eicon-bullet-list';
  }

  public function get_categories() {
    return [ 'nxg_category' ];
  }

  protected function register_controls() {

    // Content
    add_icon_list_content_control( $this );	    

    // Style
    add_icon_style_control( $this, 'icon', 'Icon', '', '.icon-wrapper', '.list-icon' );
    add_paragraph_style_control( $this, 'text', 'Text', null, null, '.list-text' );
  }

  protected function render() {

    $settings = $this->get_settings_for_display();
		?>

    <ul class="navbar-nav">
      <?php foreach ( $settings['icon_list_items'] as $item ) { ?>
        <li class="nav-item">
          <?php
          $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
          $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
          ?>
          <a href="<?php echo $item['link']['url']; ?>"<?php echo esc_attr( $target ); echo esc_attr( $nofollow ); ?> class="nav-link text-<?php echo $item['text_alingment']; ?>">
            <div class="icon-wrapper">
              <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'class' => 'list-icon' ] ); ?>
            </div>
            <span class="list-text">
              <?php echo $item['text']; ?>
            </span>
          </a>
        </li>
      <?php } ?>
    </ul>

	<?php }

  protected function content_template() { ?>

    <ul class="navbar-nav">
      
      <# _.each( settings.icon_list_items, function( item ) { #>

        <# var iconHTML = elementor.helpers.renderIcon( view, item.icon, { 'class': 'list-icon' }, 'i' , 'object' ); #>
        
        <li class="nav-item">
          <a href="{{{ item.link.url }}}" class="nav-link text-{{{ item.text_alingment }}}">

            <div class="icon-wrapper">
              {{{ iconHTML.value }}}
            </div>

            <span class="list-text">
              {{{ item.text }}}
            </span>
          </a>
        </li>

      <# }); #>

    </ul>

  <?php
	}
}