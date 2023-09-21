<?php
/**
 * @package Nexgen
 */

function nxg_search_form( $search_form ) { 
  
  ob_start() ?>

  <form role="search" method="get" class="search-form row" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="col-12 p-0 align-self-center">
      <div class="row">
        <div class="col-12 p-0 input-group">
          <input type="text" name="s" placeholder="<?php echo esc_html__( 'Enter Keywords', 'nexgen' ); ?>">
          <i class="icon-magnifier"></i>
        </div>
      </div>
    </div>
  </form>
  
  <?php
  $search_form = ob_get_clean();

  return $search_form;
}

add_filter( 'get_search_form', 'nxg_search_form', 100 );