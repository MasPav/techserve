<?php
/**
 * @package Nexgen
 */

function nxg_woocommerce_setup() {

	add_theme_support( 
		'woocommerce', array(
			'single_image_width'            => 1024,
			'thumbnail_image_width'         => 1024,
			'gallery_thumbnail_image_width' => 1024,
			'product_grid'      => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 6,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'nxg_woocommerce_setup' );

function nxg_woocommerce_related_products( $args ) {

	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}

add_filter( 'woocommerce_output_related_products_args', 'nxg_woocommerce_related_products' );

function nxg_woocommerce_body_class( $classes ) {

	$classes[] = 'woocommerce-active';
	return $classes;
}

add_filter( 'body_class', 'nxg_woocommerce_body_class' );

function nxg_woocommerce_cart_count( $fragments ) {

	global $woocommerce;

	$fragments['span.cart-counter'] = '<span class="cart-counter">' . esc_attr( $woocommerce->cart->cart_contents_count ) . '</span>';
	
	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'nxg_woocommerce_cart_count' );

function nxg_woocommerce_header_cart( $class ) { ?>

	<ul class="navbar-nav icons <?php echo esc_attr( $class ); ?>">
		<li class="nav-item">
			<?php
			global $woocommerce;

			if ( is_cart() || is_checkout() ) {
				echo '<a href="' . wc_get_cart_url() . '" class="nav-link">';

			} else {
				echo '<a href="#" class="nav-link" data-toggle="modal" data-target="#cart">';
			}

			echo '<i class="icon-handbag"></i>';
			echo '<span class="cart-counter">' . $woocommerce->cart->cart_contents_count . '</span>';
			echo '</a>';
			?>
		</li>
	</ul>

<?php
}

function nxg_woocommerce_wrapper_before() { ?>

	<div class="navbar-holder"></div>

	<section id="post-<?php the_ID(); ?>" <?php post_class( 'content-area single showcase' ); ?>>
		<div class="container">
			<div class="row content">
				<div class="main-area blog-grid col-12 <?php echo is_active_sidebar( 'sidebar-5' ) && ! is_product()
 ? 'col-lg-8 ' : 'col-lg-12' ?>">
					<!--			
					<div class="nav-shop">
						<?php woocommerce_breadcrumb(); ?>
					</div>
					-->
					<?php if ( is_shop() ) : ?>
						<div class="nav-shop">
							<div class="result-count">
								<i class="fas fa-list-ul"></i>
								<?php woocommerce_result_count(); ?>
							</div>	
							<?php woocommerce_catalog_ordering(); ?>
						</div>
					<?php endif; ?>
<?php
}

add_action( 'woocommerce_before_main_content', 'nxg_woocommerce_wrapper_before' );

function nxg_woocommerce_wrapper_after() { ?>

				</div> <!-- blog-grid -->

				<?php if ( is_active_sidebar( 'sidebar-5' ) && ! is_product() ) : ?>

					<aside class="col-12 col-lg-4 pl-lg-5 float-right sidebar">
						<?php dynamic_sidebar( 'sidebar-5' ); ?>
					</aside>

				<?php endif; ?>

			</div> <!-- content -->
		</div> <!-- container -->
	</section>

<?php 
}

add_action( 'woocommerce_after_main_content', 'nxg_woocommerce_wrapper_after' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_show_page_title', '__return_false' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

function shop_view_product_button() {

	global $product;
	echo '<a href="?add-to-cart=' . $product->get_id() . '"><i class="icon-handbag btn-icon"></i></a>';
}

add_action( 'woocommerce_after_shop_loop_item', 'shop_view_product_button', 10);