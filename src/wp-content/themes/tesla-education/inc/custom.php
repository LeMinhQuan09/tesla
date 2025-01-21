<?php

\defined( 'ABSPATH' ) || exit;

// -------------------------------------------------------------

define( 'THEME_PATH', untrailingslashit( get_template_directory() ) . DIRECTORY_SEPARATOR );
define( 'THEME_URL', untrailingslashit( esc_url( get_template_directory_uri() ) ) . '/' );

const ASSETS_URL = THEME_URL . 'assets/';

// -------------------------------------------------------------

add_action( 'wp_enqueue_scripts', '_wp_enqueue_scripts', 999 );
function _wp_enqueue_scripts() {
	// CSS, JS
	if (
		Helper::isPageTemplate( 'templates/page-trial.php' ) ||
		Helper::isPageTemplate( 'templates/page-services.php' )
	) {
		wp_enqueue_style( "trial-style", ASSETS_URL . "css/trial.css", [] );
		wp_enqueue_script( "trial", ASSETS_URL . "js/trial.js", [ "jquery-core" ], false, true );
	}
}

// -------------------------------------------------------------

if ( Helper::isAcfProActive() ) {
	add_filter( 'pre_http_request', static function ( $preempt, $parsed_args, $url ) {
		// Intercept ACF activation request
		if ( str_contains( $url, 'https://connect.advancedcustomfields.com/v2/plugins/activate?p=pro' ) ) {
			return [
				'headers'  => [],
				'body'     => json_encode(
					[
						'message'        => 'Licence key activated. Updates are now enabled',
						'license'        => 'GPL001122334455AA6677BB8899CC000',
						'license_status' => [
							'status'            => 'active',
							'lifetime'          => true,
							'name'              => 'Agency',
							'view_licenses_url' => 'https://www.advancedcustomfields.com/my-account/view-licenses/',
						],
						'status'         => 1,
					],
					JSON_INVALID_UTF8_IGNORE | JSON_THROW_ON_ERROR
				),
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
			];
		}

		// Intercept ACF validation request
		if ( str_contains( $url, 'https://connect.advancedcustomfields.com/v2/plugins/validate?p=pro' ) ) {
			return [
				'headers'  => [],
				'body'     => json_encode(
					[
						'expiration'     => 864000,
						'license_status' => [
							'status'            => 'active',
							'lifetime'          => true,
							'name'              => 'Agency',
							'view_licenses_url' => 'https://www.advancedcustomfields.com/my-account/view-licenses/',
						],
						'status'         => 1,
					], JSON_INVALID_UTF8_IGNORE | JSON_THROW_ON_ERROR
				),
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
			];
		}

		// Intercept ACF get-info request
		if ( str_contains( $url, 'https://connect.advancedcustomfields.com/v2/plugins/get-info?p=pro' ) ) {
			return [
				'headers'  => [],
				'body'     => json_encode(
					[
						'name'    => 'Advanced Custom Fields PRO',
						'slug'    => 'advanced-custom-fields-pro',
						'version' => '6.x.x',
					], JSON_INVALID_UTF8_IGNORE | JSON_THROW_ON_ERROR
				),
				'response' => [
					'code'    => 200,
					'message' => 'OK',
				],
			];
		}

		return $preempt;

	}, 10, 3 );
}
