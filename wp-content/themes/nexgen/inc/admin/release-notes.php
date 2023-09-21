<?php
/**
 * @package Nexgen
 */

require_once ( get_template_directory() . '/inc/admin/licensing.php' );

function nxg_release_notes_admin_menu() {

	global $menu;

	add_menu_page( 
		__( 'Nexgen', 'nexgen' ), 
		__( 'Nexgen', 'nexgen' ),
		'manage_options', 
		'nexgen-release-notes', 
		'nxg_release_notes_page',
    '',
		'99.0'
	);
}

add_action( 'admin_menu', 'nxg_release_notes_admin_menu' );

function nxg_release_notes_page() {
	
	$licence_text_active   = 'Your license for the Nexgen WordPress Theme has been successfully verified. Need help?';
	$licence_text_inactive = 'To unlock all the features of the Nexgen WordPress Theme, please enter your purchase code below. Need help?';

	if ( get_option( 'nxg_licence_key' ) ) {
		$GLOBALS['licensed_nexgen'] = true;
	
	} else {
		$GLOBALS['licensed_nexgen'] = false;
	}
	
	if ( $GLOBALS['licensed_nexgen'] ) {
		$licence_text = $licence_text_active;

	} else {
		$licence_text = $licence_text_inactive;
	}

  ?>
  <div id="nexgen-release-notes" class="wrap nxg-wrap">
    <h1><?php echo get_admin_page_title(); ?></h1>
    <div class="nxg-box">
      <div class="title">
        <h3><?php echo esc_html__( 'License Information', 'nexgen' ); ?></h3>
      </div>
      <div class="inner">
        <form id="nexgen-register" action="<?php echo admin_url( 'admin-ajax.php' ) ; ?>" class="nxg-form">
          <p>
            <span class="nxg-licence-info" 
              data-text-active="<?php echo esc_html( $licence_text_active, 'nexgen' ); ?>" 
              data-text-inactive="<?php echo esc_html( $licence_text_inactive, 'nexgen' ); ?>">
              <?php echo esc_html( $licence_text, 'nexgen' ); ?>
            </span>
            <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">
              <?php echo esc_html__( 'See how to find your purchase code', 'nexgen' ); ?>.
            </a>
          </p>
          <?php wp_nonce_field( 'nxg_licence', 'nxg_licence_wpnonce' ); ?>
          <input type="hidden" name="action" value="nxg_licence">
          <input type="hidden" name="status" value="<?php if ( $GLOBALS['licensed_nexgen'] ) { echo esc_attr( 'deactivate' ); } else { echo esc_attr( 'activate' ); } ?>" class="nxg-input status">
          <table class="form-table">
            <tbody>
              <tr>
                <th>
                  <label for="nexgen-licence"><?php echo esc_html__( 'Purchase Code', 'nexgen' ); ?></label>
                </th>
                <td>
                  <input type="text" name="code" value="<?php if ( $GLOBALS['licensed_nexgen'] ) { echo get_option( 'envato_purchase_code_31222361' ); } ?>" <?php if ( $GLOBALS['licensed_nexgen'] ) { echo esc_attr( 'readonly' ); } ?> class="nxg-input purchase-code regular-text">
                  <p class="nxg-alert purchase-code"
                    data-success="<?php echo esc_html__( 'Thanks. Your purchase code has been successfully verified.', 'nexgen' ); ?>"
                    data-invalid="<?php echo esc_html__( 'Purchase code not found. Make sure you copy and paste correctly.', 'nexgen' ); ?>"
                    data-exist="<?php echo esc_html__( 'Purchase code is already in use. Make sure you have not activated on another website.', 'nexgen' ); ?>"
                    data-error="<?php echo esc_html__( 'Sorry. We were unable to verify your purchase code. Contact support.', 'nexgen' ); ?>"
                    style="display:none">
                  </p>
                </td>
              </tr>
              <tr>
                <th>
                  <label for="nexgen-licence"><?php echo esc_html__( 'Site Domain', 'nexgen' ); ?></label>
                </th>
                <td>
                  <input type="text" name="domain" value="<?php echo str_replace( ['https://', 'http://', '//', 'www'], '', get_site_url() ); ?>" readonly class="nxg-input site-domain regular-text">
                  <p class="nxg-alert site-domain"
                    data-success="<?php echo esc_html__( 'This domain is now authorized. If this is not a production website, deactivate the license before migrating to the final domain.', 'nexgen' ); ?>"
                    style="display:none">
                  </p>
                </td>
              </tr>
              <tr>
                <th>
                  <label for="nexgen-licence"></label>
                </th>
                <td class="pt-0">
                  <a class="nxg-button button button-primary status"
                    data-text-activate="<?php echo esc_html__( 'Activate Licence', 'nexgen' ); ?>"
                    data-text-deactivate="<?php echo esc_html__( 'Deactivate Licence', 'nexgen' ); ?>">
                    <?php if ( $GLOBALS['licensed_nexgen'] ) { echo __( 'Deactivate Licence', 'nexgen' ); } else { echo esc_html__( 'Activate Licence', 'nexgen' ); } ?>
                  </a>
                  <a href="https://themeforest.net/item/nexgen-multi-purpose-all-in-one-wordpress-theme/31222361" target="_blank" class="nxg-button button button-secondary"><?php echo esc_html__( 'Get Licence', 'nexgen' ); ?></a>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
    <div class="nxg-box">
      <div class="title">
        <h3><?php echo esc_html__( 'Version ', 'nexgen' ) . wp_get_theme('nexgen')->get( 'Version' ); ?></h3>
      </div>
      <div class="inner">
        <p>
        <p>
          <b class="nxg-badge"><?php echo esc_html__( 'New', 'nexgen' ); ?></b>
          <?php echo esc_html__( 'Required plugins updated to latest versions.', 'nexgen' ); ?>
        </p>
      </div>
    </div>
    <div class="nxg-box">
      <div class="title">
        <h3><?php echo esc_html__( 'Support', 'nexgen' ); ?></h3>
      </div>
      <div class="inner">
        <p>
          <a href="https://nexgen.codings.dev/docs" target="_blank" class="nxg-button button button-primary">
            <?php echo esc_html__( 'Knowledge base', 'nexgen' ); ?>
          </a>
          <a href="https://themeforest.net/item/nexgen-multipurpose-allinone-wordpress-theme/31222361#item-description__changelog" target="_blank" class="nxg-button button button-secondary">
            <?php echo esc_html__( 'Changelog', 'nexgen' ); ?>
          </a>
          <a href="https://nexgen.codings.dev" target="_blank" class="nxg-button button button-secondary">
            <?php echo esc_html__( 'View Demos', 'nexgen' ); ?>
          </a>
          <a href="https://codings.dev?ref=nexgen-wordpress-theme" target="_blank" class="nxg-button button button-secondary">
            <?php echo esc_html__( 'More Themes', 'nexgen' ); ?>
          </a>
        </p>
      </div>
    </div>
  </div>
<?php 
}