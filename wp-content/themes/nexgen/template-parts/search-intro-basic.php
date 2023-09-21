<?php
/**
 * @package Nexgen
 */

if ( is_search() ) {

	if ( ! empty( get_search_query() ) ) { 
		$search_term = get_search_query();

	} else { 
		$search_term = __( 'All results', 'nexgen' );
	}

} elseif ( is_archive() ) {
  $search_term = str_replace( ['<span>', '</span>'], '', get_the_archive_title() );

} else {
  $search_term = filter_input( INPUT_SERVER, 'REQUEST_URI' );
}

if ( have_posts() ) {
	$search_heading     = __( 'Search results for:', 'nexgen' );
	$search_description = __( 'This are the results found for the term you entered. Wasn\'t that what you were looking for? Try using other search terms.', 'nexgen' );
	
} else {
	$search_heading     = __( 'No results for:', 'nexgen' );
	$search_description = __( 'Sorry, no results were found for your search. Try using other search terms.', 'nexgen' );
}
?>
<div class="intro-item intro-search">
  <div class="row">
    <div class="col-12 col-lg-6">
      <h6 class="pre-title m-0"><?php echo esc_html( $search_heading ); ?></h6>
      <h3><?php echo esc_html( $search_term ); ?></h3>
      <p><?php echo esc_html( $search_description ); ?></p>
    </div>
    <div class="col-12 col-lg-6 input-group">
      <?php get_search_form(); ?>
    </div>
  </div>
</div>