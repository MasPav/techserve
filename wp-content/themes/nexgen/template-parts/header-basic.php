<?php
/**
 * @package Nexgen
 */
?>
<header id="header" class="basic">

	<!-- Navbar -->
	<nav class="navbar navbar-expand navbar-fixed sub single-navbar">
		<div class="container header">

      <!-- Brand -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">

        <?php
        if ( has_custom_logo() ) {

          $custom_logo_id = get_theme_mod( 'custom_logo' );
          $custom_logo    = wp_get_attachment_image_src( $custom_logo_id , 'full' );

          echo nxg_render_image( 
            $custom_logo[0], 
            get_bloginfo( 'name' ), 
            'desktop-logo wp-customize-logo'
          );
        
        } else {
          echo get_bloginfo( 'name' );
        }
        ?>

      </a>

      <!-- Nav holder -->
			<div class="ml-auto"></div>

      <!-- Menu -->
      <?php 
      if ( has_nav_menu( 'menu-1' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'container'      => false,
          'menu_class'     => 'navbar-nav items right',
          'fallback_cb'    => 'navwalker::fallback',
          'walker'         => new bs4Navwalker()
        ) );
      } ?>

      <!-- Search Icon -->
      <ul class="navbar-nav icons">
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#search">
            <i class="icon-magnifier m-0"></i>
          </a>
        </li>
      </ul>

      <!-- Cart Icon -->
      <?php if ( class_exists( 'WooCommerce' ) ) { 
        nxg_woocommerce_header_cart( 'basic' );
      } ?>

      <!-- Menu Responsive -->
      <ul class="navbar-nav toggle">
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
            <i class="icon-menu m-0"></i>
          </a>
        </li>
      </ul>

		</div>
	</nav>
</header>