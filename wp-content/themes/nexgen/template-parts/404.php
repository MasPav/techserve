<?php
/**
 * @package Nexgen
 */

$page404_intro_term        = filter_input( INPUT_SERVER, 'REQUEST_URI' );
$page404_intro_heading     = get_field( 'nxg_404_page_intro_h6', 'option' );
$page404_intro_description = get_field( 'nxg_404_page_intro_p', 'option' );

if ( $page404_intro_heading ) {
	$page404_heading     = nxg_translate( $page404_intro_heading['text_no_results'] ) ?? '';
	$page404_description = nxg_translate( $page404_intro_description['text_no_results'] ) ?? '';
	
} else {
	$page404_heading     = __( 'Nothing found in:', 'nexgen' );
	$page404_description = __( 'The page you tried to access does not exist or has changed address. Try using other search terms.', 'nexgen' );
}

?>
<div class="navbar-holder"></div>
<section id="page404" class="content-area page404">
	<div class="container">
		<div class="row content">
			<div class="intro-item intro-search">
				<div class="row">
					<div class="col-12 col-lg-6">
						<h6 class="pre-title m-0"><?php echo esc_html( $page404_heading ); ?></h6>
						<h3><?php echo esc_html( $page404_intro_term ); ?></h3>
						<p><?php echo esc_html( $page404_description ); ?></p>
					</div>
					<div class="col-12 col-lg-6 input-group">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>