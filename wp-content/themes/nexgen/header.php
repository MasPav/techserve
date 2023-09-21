<?php
/**
 * @package Nexgen
 */
?>
<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
wp_body_open();

if ( nxg_required_plugins() ) {

  get_template_part( 'template-parts/preloader' );

  if ( nxg_elementor_do_location( 'header' ) ) {

    if ( nxg_has_header() ) {
      get_template_part( 'template-parts/header' );
      
    } else {
      get_template_part( 'template-parts/header', 'basic' );
    }    
  }

} else {

  if ( nxg_elementor_do_location( 'header' ) ) {
    get_template_part( 'template-parts/header', 'basic' );
  }
}