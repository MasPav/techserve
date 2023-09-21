<?php
/**
 * @package Nexgen
 */

if ( get_field( 'nxg_search_modal_h2', 'option' ) ) {
	
	$search_modal_heading = get_field( 'nxg_search_modal_h2', 'option' );
	$search_modal_heading = $search_modal_heading['text'];

} else {
	$search_modal_heading = __( 'What are you looking for?', 'nexgen' );
}

if ( get_field( 'nxg_search_modal_field', 'option' ) ) {
	
	$search_modal_field = get_field( 'nxg_search_modal_field', 'option' );
	$search_modal_field = $search_modal_field['text'];

} else {
	$search_modal_field = __( 'Enter Keywords', 'nexgen' );
}

if ( get_field( 'nxg_search_modal_button', 'option' ) ) {
	
	$search_modal_button = get_field( 'nxg_search_modal_button', 'option' );
	$search_modal_button = $search_modal_button['text'];

} else {
	$search_modal_button = __( 'SEARCH', 'nexgen' );
}
?>
<div id="search" class="p-0 modal modal-search fade" role="dialog" aria-labelledby="search" aria-hidden="true">
	<div class="modal-dialog modal-dialog-slideout" role="document">
		<div class="modal-content full">
			<div class="modal-header" data-dismiss="modal">
				<i class="icon-close fas fa-arrow-left"></i>
			</div>
			<div class="modal-body">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="row">
					<div class="col-12 p-0 align-self-center">
						<div class="row">
							<div class="col-12 p-0">
								<h2><?php echo esc_html( nxg_translate( $search_modal_heading ) ); ?></h2>
							</div>
						</div>
						<div class="row">
							<div class="col-12 p-0 input-group">
								<input type="search" name="s" placeholder="<?php echo esc_html( nxg_translate( $search_modal_field ) ); ?>" value="<?php echo ( isset( $_GET['s'] ) ) ? esc_attr( $_GET['s'] ) : '' ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-12 p-0 input-group align-self-center">
								<button class="btn primary-button"><?php echo esc_html( nxg_translate( $search_modal_button ) ); ?></button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="menu" class="p-0 modal modal-menu fade" role="dialog" aria-labelledby="menu" aria-hidden="true">
	<div class="modal-dialog modal-dialog-slideout" role="document">
		<div class="modal-content full">
			<div class="modal-header" data-dismiss="modal">
				<i class="icon-close fas fa-arrow-left"></i>
			</div>
			<div class="menu modal-body">
				<div class="row w-100">
					<div class="items p-0 col-12 text-center"></div>
					<div class="contacts p-0 col-12 text-center"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
if ( class_exists( 'WooCommerce' ) ) : ?>

		<div id="cart" class="p-0 modal modal-cart fade" role="dialog" aria-labelledby="cart" aria-hidden="true">
			<div class="modal-dialog modal-dialog-slideout" role="document">
				<div class="modal-content full">
					<div class="modal-header" data-dismiss="modal">
						<i class="icon-close fas fa-arrow-left"></i>
					</div>
					<div class="modal-body">						
						<?php the_widget( 'WC_Widget_Cart', array( 'title' => '' ) ); ?>
					</div>
				</div>
			</div>
		</div>

<?php endif;