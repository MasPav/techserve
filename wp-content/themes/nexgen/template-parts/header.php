<?php
/**
 * @package Nexgen
 */

if ( have_rows( 'nxg_top_bar_left', 'option' ) || have_rows( 'nxg_top_bar_right', 'option' ) ) {
	$has_top_bar = true;

} else {
	$has_top_bar = false;
}

if ( have_rows( 'nxg_navbar_left', 'option' ) || have_rows( 'nxg_navbar_right', 'option' ) ) {
	$has_navbar = true;

} else {
	$has_navbar = false;
}
?>
<header id="header" class="<?php if ( $has_top_bar ) : ?>has-navbar-top <?php endif; ?><?php if ( $has_navbar ) : ?>has-navbar-bottom<?php endif; ?>">

	<?php if ( $has_top_bar ) : ?>

	<!-- Top Bar -->
	<nav class="navbar navbar-expand top">
		<div class="container header">

			<?php 
			// Top Bar
			function nxg_top_bar_side( $side ) { ?>

				<ul class="navbar-nav <?php echo esc_attr( $side ); ?>">

					<?php
					if ( have_rows( 'nxg_top_bar_' . $side, 'option' ) ) :
						while ( have_rows( 'nxg_top_bar_' . $side, 'option' ) ) :
							the_row();

							if ( get_row_layout() == 'link' ) :  ?>

								<li class="nav-item">

									<?php 
									$link = get_sub_field( 'link' );
									
									if ( $link ) {

										$link_url    = $link['url'];
										$link_title  = nxg_translate( $link['title'] );
										$link_target = $link['target'] ? $link['target'] : esc_attr( '_self' );
									}
									
									echo nxg_render_link( $link_url, $link_target, $link_title, 'nav-link' );
									?>

								</li>

							<?php 
							elseif ( get_row_layout() == 'link_with_icon' ) : ?>

								<li class="nav-item">
										
									<?php 									
									$link = get_sub_field( 'link' );
									
									if ( $link ) {										
										$link_url    = $link['url'];
										$link_title  = nxg_translate( $link['title'] );
										$link_target = $link['target'] ? $link['target'] : esc_attr( '_self' );
									}

									if ( $link_title ) {
										$icon_class = 'text-after';
										
									} else {
										$icon_class = 'm-0';
									}
									
									$link_icon = nxg_render_icon( 
										get_sub_field( 'icon_style' ), 
										get_sub_field( 'icon' ), 
										get_sub_field( 'icon_fa' ),
										$icon_class
									);

									echo nxg_render_link( $link_url, $link_target, $link_icon . $link_title, 'nav-link m-0' );
									?>

								</li>

							<?php 
							endif;
						endwhile; 
					endif;
					?>

				</ul>

			<?php } ?>
			
			<!-- Top Bar [left] -->
			<?php nxg_top_bar_side( 'left' ); ?>

			<!-- Nav holder -->
			<div class="ml-auto"></div>

			<!-- Top Bar [right] -->
			<?php nxg_top_bar_side( 'right' ); ?>

		</div>
	</nav>

	<?php endif; ?>

	<?php if ( $has_navbar ) : ?>

	<!-- Navbar -->
	<nav class="navbar navbar-expand navbar-fixed sub<?php echo esc_attr( ! $has_navbar ) ? ' single-navbar' : '' ?>">
		<div class="container header">

			<?php
			// Navbar
			function nxg_navbar_side( $side ) {

					if ( have_rows( 'nxg_navbar_' . $side, 'option' ) ) :
						while ( have_rows( 'nxg_navbar_' . $side, 'option' ) ) :
							the_row();

							// Brand
							if ( get_row_layout() == 'brand' ) : ?>

								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
									<?php if ( ! get_sub_field( 'logo' ) ) : ?>
									<span class="brand<?php if ( get_sub_field( 'responsive_logo' ) ) { echo esc_attr( ' d-none d-sm-block' ); } ?>">
										<span><?php bloginfo( 'name' ); ?></span>
									</span>
									<?php endif;
									
									if ( get_sub_field( 'responsive_logo' ) ) {
										$logo_display   = 'd-none d-sm-block desktop-logo';
										$m_logo_display = 'd-block d-sm-none responsive-logo';
									} else {
										$logo_display   = 'desktop-logo';
										$m_logo_display = 'responsive-logo';
									}

									echo nxg_render_image( 
										get_sub_field( 'logo' ), 
										get_bloginfo( 'name' ), 
										$logo_display
									);

									echo nxg_render_image( 
										get_sub_field( 'responsive_logo' ), 
										get_bloginfo( 'name' ), 
										$m_logo_display
									);
									?>
								</a>

							<?php
							// Menu
							elseif ( get_row_layout() == 'menu' ) : ?>

								<?php if ( $side === 'left' ) : ?>

									<ul class="navbar-nav toggle">
										<li class="nav-item">
											<a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
												<i class="icon-menu m-0"></i>
											</a>
										</li>
									</ul>

								<?php endif; ?>

								<?php 
								// Page Settings
								$menu_location = get_field( 'nxg_page_settings_menu_location' );

								if ( $menu_location && $menu_location !== 'default' ) {
									$menu = get_field( 'nxg_page_settings_menu_location' );

								} else {
									$menu = get_sub_field( 'location' );
								}

								if ( has_nav_menu( $menu ) ) {
									wp_nav_menu( array(
										'theme_location' => $menu,
										'container'      => false,
										'menu_class'     => 'navbar-nav items ' . $side,
										'fallback_cb'    => 'navwalker::fallback',
										'walker'         => new bs4Navwalker()
									) );
								} ?>

								<?php if ( $side === 'right' ) : ?>

									<ul class="navbar-nav toggle">
										<li class="nav-item">
											<a href="#" class="nav-link" data-toggle="modal" data-target="#menu">
												<i class="icon-menu m-0"></i>
											</a>
										</li>
									</ul>

								<?php endif; ?>

							<?php
							// Link
							elseif ( get_row_layout() == 'link' ) : ?>

								<ul class="navbar-nav links">
									<li class="nav-item">

										<?php
										$link = get_sub_field( 'link' );
										
										if ( $link ) {
											
											$link_url    = $link['url'];
											$link_title  = nxg_translate( $link['title'] );
											$link_target = $link['target'] ? $link['target'] : esc_attr( '_self' );
										}
										
										echo nxg_render_link( $link_url, $link_target, $link_title, 'nav-link' ); 
										?>

									</li>
								</ul>

							<?php
							// Link with icon
							elseif ( get_row_layout() == 'link_with_icon' ) : ?>

								<ul class="navbar-nav icons">
									<li class="nav-item">

										<?php
										$link = get_sub_field( 'link' );
										
										if ( $link ) {											
											$link_url    = $link['url'];
											$link_title  = nxg_translate( $link['title'] );
											$link_target = $link['target'] ? $link['target'] : esc_attr( '_self' );
										}

										if ( $link_title ) {
											$icon_class = 'text-after';
											
										} else {
											$icon_class = 'm-0';
										}

										$link_icon = nxg_render_icon( 
											get_sub_field( 'icon_style' ), 
											get_sub_field( 'icon' ), 
											get_sub_field( 'icon_fa' ),
											$icon_class
										);

										echo nxg_render_link( $link_url, $link_target, $link_icon . $link_title, 'nav-link' );
										?>

									</li>
								</ul>

							<?php
							// Search icon
							elseif ( get_row_layout() == 'search_icon' ) : ?>

								<?php
									$search_icon_display = '';
								
									if ( get_sub_field( 'show_in_desktop' ) ) { $search_icon_display .= ' d-md-block'; }
									if (!get_sub_field( 'show_in_desktop' ) ) { $search_icon_display .= ' d-md-none';  }
									if ( get_sub_field( 'show_in_tablet' ) ) { $search_icon_display .= ' d-sm-block'; }
									if (!get_sub_field( 'show_in_tablet' ) ) { $search_icon_display .= ' d-sm-none';  }
									if ( get_sub_field( 'show_in_mobile' ) ) { $search_icon_display .= ' d-block';    }
									if (!get_sub_field( 'show_in_mobile' ) ) { $search_icon_display .= ' d-none';     }								
								?>

								<ul class="navbar-nav icons<?php echo esc_attr( $search_icon_display ); ?>">
									<li class="nav-item">
										<a href="#" class="nav-link" data-toggle="modal" data-target="#search">
											<i class="icon-magnifier m-0"></i>
										</a>
									</li>
								</ul>

							<?php
							// Cart icon
							elseif ( get_row_layout() == 'cart_icon' ) : ?>

								<?php 
									$cart_icon_display = '';

									if ( get_sub_field( 'show_in_desktop' ) ) { $cart_icon_display .= ' d-md-block'; }
									if (!get_sub_field( 'show_in_desktop' ) ) { $cart_icon_display .= ' d-md-none';  }
									if ( get_sub_field( 'show_in_tablet' ) ) { $cart_icon_display .= ' d-sm-block'; }
									if (!get_sub_field( 'show_in_tablet' ) ) { $cart_icon_display .= ' d-sm-none';  }
									if ( get_sub_field( 'show_in_mobile' ) ) { $cart_icon_display .= ' d-block';    }
									if (!get_sub_field( 'show_in_mobile' ) ) { $cart_icon_display .= ' d-none';     }								
								?>

								<?php if ( class_exists( 'WooCommerce' ) ) { 
									nxg_woocommerce_header_cart( $cart_icon_display );
								} ?>

							<?php
							// Button
							elseif ( get_row_layout() == 'button' ) : ?>
							
								<?php
									$button_display = '';

									if ( get_sub_field( 'show_in_desktop' ) ) { $button_display .= ' d-md-block'; }
									if (!get_sub_field( 'show_in_desktop' ) ) { $button_display .= ' d-md-none';  }
									if ( get_sub_field( 'show_in_tablet' ) ) { $button_display .= ' d-sm-block'; }
									if (!get_sub_field( 'show_in_tablet' ) ) { $button_display .= ' d-sm-none';  }
									if ( get_sub_field( 'show_in_mobile' ) ) { $button_display .= ' d-block';    }
									if (!get_sub_field( 'show_in_mobile' ) ) { $button_display .= ' d-none';     }
								?>

								<ul class="navbar-nav action<?php echo esc_attr( $button_display ); ?>">
									<li class="nav-item">

										<?php
										$link = get_sub_field( 'link' );
										
										if ( $link ) {											
											$link_url    = $link['url'];
											$link_title  = nxg_translate( $link['title'] );
											$link_target = $link['target'] ? $link['target'] : esc_attr( '_self' );
										}

										$button_style = get_sub_field( 'button_style' );

										echo nxg_render_link( $link_url, $link_target, $link_title, 'btn ' . $button_style . '-button' ); 
										?>

									</li>
								</ul>

							<?php 
							endif;
						endwhile; 
					endif;
			} ?>
			
			<!-- Navbar [left] -->
			<?php nxg_navbar_side( 'left' ); ?>

			<!-- Nav holder -->
			<div class="ml-auto"></div>

			<!-- Navbar [right] -->
			<?php nxg_navbar_side( 'right' ); ?>

		</div>
	</nav>

	<?php endif; ?>
	
</header>