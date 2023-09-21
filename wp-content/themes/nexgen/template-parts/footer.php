<?php
/**
 * @package Nexgen
 */

$content_section = get_field( 'nxg_footer_section', 'option' );

switch ( $content_section['columns'] ?? '' ) {    
    case '1': $col = 'col-12'; break;
    case '2': $col = 'col-12 col-md-6'; break;
    case '3': $col = 'col-12 col-md-6 col-lg-4'; break;
    case '4': $col = 'col-12 col-md-6 col-lg-3'; break;
    case '5': $col = 'col-12 col-md-6 col-lg-0'; break;
    case '6': $col = 'col-12 col-md-6 col-lg-2'; break;
    default : $col = 'col-12 col-md-6 col-lg-4';
}

if ( have_rows( 'nxg_footer_columns', 'option' ) ) {
	$has_footer = true;

} else {
	$has_footer = false;
}

if ( have_rows( 'nxg_bottom_bar_left', 'option' ) || have_rows( 'nxg_bottom_bar_right', 'option' ) ) {
	$has_footer_bar = true;

} else {
	$has_footer_bar = false;
}

?>
<!-- Footer -->
<footer id="footer" class="footer">

	<?php if ( $has_footer ) : ?>

	<!-- Main -->
	<section class="footer main offers">
		<div class="container">
			<div class="row items">

				<?php
				// Main
				if ( have_rows( 'nxg_footer_columns', 'option' ) ) :
					while ( have_rows( 'nxg_footer_columns', 'option' ) ) :
						the_row();
						
						// Contact Info
						if ( get_row_layout() == 'contact_info' ) : ?>

							<div class="<?php echo esc_attr( $col ); ?> item">

								<?php
								if ( have_rows( 'item', 'option' ) ) :
									while ( have_rows( 'item', 'option' ) ) :
										the_row();
										
										// Brand
										if ( get_row_layout() == 'brand' ) : ?>
										
											<div class="content-block brand">
												<a href="<?php esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
													<?php if ( ! get_sub_field( 'logo' ) ) : ?>
													<span class="brand<?php if ( get_sub_field( 'responsive_logo' ) ) { echo esc_attr( ' d-none d-sm-block' ); } ?>">
														<span><?php the_sub_field( 'site_title' ); ?></span>
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
											</div>

										<?php
										// Text
										elseif ( get_row_layout() == 'text' ) : ?>
				
											<div class="content-block paragraph">
												<?php echo nxg_translate( get_sub_field( 'text' ) ); ?>
											</div>

										<?php
										// Link
										elseif ( get_row_layout() == 'link' ) : ?>

											<ul class="navbar-nav links content-block">
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

											<ul class="navbar-nav icons content-block">
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
										// Button
										elseif ( get_row_layout() == 'button' ) : ?>

											<ul class="navbar-nav action content-block">
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
								?>
							</div>

						<?php
						// Link List
						elseif ( get_row_layout() == 'link_list' ) : ?>

							<div class="<?php echo esc_attr( $col ); ?> item">
								<div class="card">
									<h4><?php echo nxg_translate( get_sub_field( 'heading' ) ); ?></h4>
									<?php 
									if ( has_nav_menu( get_sub_field( 'menu' ) ) ) {
										wp_nav_menu( array(
											'theme_location' => get_sub_field( 'menu' ),
											'container'      => false,
											'menu_class'     => 'footer-link-list'
										) );
									} ?>
								</div>
							</div>

						<?php
						// Shortcode
						elseif ( get_row_layout() == 'shortcode' ) : ?>

							<div class="<?php echo esc_attr( $col ); ?> item">
								<div class="card">
									<h4><?php echo nxg_translate( get_sub_field( 'heading' ) ); ?></h4>
									<?php echo do_shortcode( get_sub_field( 'shortcode' ) ); ?>
								</div>
							</div>

							<?php 
						endif;
					endwhile; 
				endif;
				?>

			</div>
		</div>
	</section>

	<?php endif; ?>

	<?php if ( $has_footer_bar ) : ?>

	<!-- Bottom Bar -->
	<section class="bottom-bar">
		<div class="container">
			<div class="row">

				<?php 
				// Bottom Bar
				function nxg_bottom_bar_side( $side ) { ?>

					<ul class="navbar-nav text-left text-lg-<?php echo esc_attr( $side ); ?>">

						<?php
						if ( have_rows( 'nxg_bottom_bar_' . $side, 'option' ) ) :
							while ( have_rows( 'nxg_bottom_bar_' . $side, 'option' ) ) :
								the_row();

								if ( get_row_layout() == 'link' ) :  ?>

								<li class="nav-item d-block d-md-inline-flex">

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

										echo nxg_render_link( $link_url, $link_target, $link_icon . $link_title, 'nav-link' );
										?>

									</li>

								<?php 
								endif;
							endwhile; 
						endif;
						?>

					</ul>

				<?php } ?>	
			
				<div class="col-12 col-md-6 p-0 text-left">
					
					<!-- Bottom Bar [left] -->
					<?php nxg_bottom_bar_side( 'left' ); ?>

				</div>
				<div class="col-12 col-md-6 p-0 text-left text-lg-right">

					<!-- Bottom Bar [right] -->
					<?php nxg_bottom_bar_side( 'right' ); ?>

				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>

</footer>