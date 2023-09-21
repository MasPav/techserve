<?php
/**
 * @package Nexgen
 */

if ( nxg_elementor_do_location( 'footer' ) ) {

	if ( nxg_required_plugins() ) {

    if ( nxg_has_footer() ) {
			get_template_part( 'template-parts/footer' );
		
		} else {
			get_template_part( 'template-parts/footer', 'basic' );
		}

		get_template_part( 'template-parts/modal' );
		get_template_part( 'template-parts/float-icon' );

	} else {

		get_template_part( 'template-parts/footer', 'basic' );
		get_template_part( 'template-parts/modal', 'basic' );
		get_template_part( 'template-parts/float-icon', 'basic' );
	}
}

wp_footer(); ?>

</body>
</html>