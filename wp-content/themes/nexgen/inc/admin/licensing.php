<?php
/**
 * @package Nexgen
 */

function nxg_handle_ajax_request() {

	if ( isset( $_POST['code'] ) && isset( $_POST['status'] ) ) {

		$data = array(
			'status' => $_POST['status'],
			'code'   => $_POST['code'],
			'domain' => $_POST['domain']
		);

		$context = array(
			'method'      => 'POST',
			'httpversion' => '1.0',
			'user-agent'  => '',
			'redirection' => 5, 
			'timeout'     => 60,
			'blocking'    => true,
			'body'        => $data
		);

		$request = wp_remote_post( 'https://codings.dev/apps/nexgen/licensing.php', $context );

		if ( is_wp_error( $request ) ) {
			echo json_encode( array( 'status' => 'error' ) );

		} else {
			$response   = wp_remote_retrieve_body( $request );
			$validation = explode( ', ', $response );

			if ( $validation[0] === 'active' ) {
				update_option( 'envato_purchase_code_31222361', $validation[1] );
				update_option( 'nxg_licence_key', $validation[2] );

				echo json_encode( $validation );

			} elseif ( $validation[0] === 'inactive' ) {
				delete_option( 'envato_purchase_code_31222361' );
				delete_option( 'nxg_licence_key' );

				echo json_encode( $validation );

			} elseif ( $validation[0] === 'exist' ) {
				echo json_encode( $validation );

			} elseif ( $validation[0] === '' ) {
				echo json_encode( array( 'status' => '' ) );

			} else {
				echo json_encode( array( 'status' => 'error' ) );
			}        
		}
	}

	exit;
} 

add_action( 'wp_ajax_nxg_licence', 'nxg_handle_ajax_request' );
add_action( 'wp_ajax_nopriv_nxg_licence', 'nxg_handle_ajax_request' );