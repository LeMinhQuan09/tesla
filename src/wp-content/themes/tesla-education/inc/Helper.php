<?php

\defined( 'ABSPATH' ) || exit;

/**
 * Addon Helper Class
 *
 * @package tesla-education
 */
final class Helper {

	// -------------------------------------------------------------

	/**
	 * @param string $plugin_slug
	 *
	 * @return bool
	 */
	public static function checkPluginActive( string $plugin_slug ): bool {
		return self::checkPluginInstalled( $plugin_slug ) && is_plugin_active( $plugin_slug );
	}

	// -------------------------------------------------------------

	/**
	 * @param string $plugin_slug
	 *
	 * @return bool
	 */
	public static function checkPluginInstalled( string $plugin_slug ): bool {

		// Ensure required functions are available
		if ( ! function_exists( 'get_plugins' ) || ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		// Get the list of installed plugins
		$installed_plugins = get_plugins();

		// Check if the plugin slug exists in the installed plugins array
		return array_key_exists( $plugin_slug, $installed_plugins );
	}

	// -------------------------------------------------------------

	public static function isAcfActive(): bool {
		return self::checkPluginActive( 'secure-custom-fields/secure-custom-fields.php' ) ||
		       self::checkPluginActive( 'advanced-custom-fields/acf.php' ) ||
		       self::checkPluginActive( 'advanced-custom-fields-pro/acf.php' );
	}

	// -------------------------------------------------------------

	public static function isAcfProActive(): bool {
		return self::checkPluginActive( 'advanced-custom-fields-pro/acf.php' );
	}

	// -------------------------------------------------------------
}
