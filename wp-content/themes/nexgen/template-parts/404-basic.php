<?php
/**
 * @package Nexgen
 */

$page404_intro_term = filter_input( INPUT_SERVER, 'REQUEST_URI' );
?>
<div class="navbar-holder"></div>
<section id="page404" class="content-area page404">
	<div class="container">
		<div class="row content">
			<div class="intro-item intro-search">
				<div class="row">
					<div class="col-12 col-lg-6">
						<h6 class="pre-title m-0"><?php echo esc_html__( 'Nothing found in:', 'nexgen' ); ?></h6>
						<h3><?php echo esc_html( $page404_intro_term ); ?></h3>
						<p><?php echo esc_html__( 'The page you tried to access does not exist or has changed address. Try using other search terms.', 'nexgen' ); ?></p>
					</div>
					<div class="col-12 col-lg-6 input-group">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>