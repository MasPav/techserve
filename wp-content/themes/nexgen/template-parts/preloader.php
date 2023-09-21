<?php
/**
 * @package Nexgen
 */

$preloader = get_field( 'nxg_preloader_section', 'option' );

if ( isset( $preloader['disable'] ) && ! $preloader['disable'] ) : 

	$preloader_timeout = ( $preloader['timeout'] * 1000 ); ?>

	<div id="preloader" data-timeout="<?php echo esc_html( $preloader_timeout ); ?>" class="preloader counter">
		<div data-aos="fade-up" data-aos-delay="500" class="row justify-content-center text-center items">
			<div data-percent="100" data-color="#000" class="radial">
				<span class="number">100</span>
			</div>
		</div>
	</div>

<?php endif; ?>