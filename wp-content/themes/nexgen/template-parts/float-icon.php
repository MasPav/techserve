<?php
/**
 * @package Nexgen
 */

$sroll_to_top = get_field( 'nxg_sroll_to_top_block', 'option' );

if ( isset( $sroll_to_top['disable'] ) && ! $sroll_to_top['disable'] ) : ?>

	<div id="scroll-to-top" class="scroll-to-top">
		<a href="#header" class="smooth-anchor">
			<i class="fas fa-arrow-up"></i>
		</a>
	</div>  

<?php endif; ?>