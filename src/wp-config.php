<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */
const DB_NAME     = 'teslanew';
const DB_USER     = 'root';
const DB_PASSWORD = '';
const DB_HOST     = 'localhost';
const DB_CHARSET  = 'utf8mb4';
const DB_COLLATE  = '';

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', 'DIO9}}i-To1@-,&$dH3Uo<I1CGo,CoFgE`LB<hyg9iYG49<G2I[[+<G6[ia!m,K ' );
define( 'SECURE_AUTH_KEY', 'MJbO]9-@JTF`?kKN)Ie2kINC~Z9B(^{I,DKw 30m%B(n$UiW}>x44`z$#ni:z{KQ' );
define( 'LOGGED_IN_KEY', '}F9I=a+-8?Ynqbg-p!zD/Mr Q.VyC){|Ffg+1]@OC3M7Gz,|s>g1BFb4|yl>sZ^t' );
define( 'NONCE_KEY', 'IjC~O`34Df3d]{TXg%Jdzy]>& /H`qv`0/lCu8II71Jvcl<aE+G+j<0{3*wXPB^>' );
define( 'AUTH_SALT', '$>DvbK>1QDR!L4@zqV}G9n[;)=<k,<b[jKgZpUKUco?l9qA]?mhq?]y|Uv0%%|FY' );
define( 'SECURE_AUTH_SALT', ',e<H/=_(9KM1?!KfQiy$9JxK*U]wo6sIw%WO8^A=@`vo9 uN)!WM>B]|l!e}xq8i' );
define( 'LOGGED_IN_SALT', 's~MZttUpm[/o<F3bDwo> w:YwP@+tJE@P&Z*%}+3@B:O#2J /O &$_%DRe?1oYR2' );
define( 'NONCE_SALT', 'r]:6yb7>zE*ANu!W=5IXa1T9<-#D^$[sp/i[+JZA`H+._~:mF?s*I)`H%sac7`Lb' );

/**#@-*/
/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'tl_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
const WP_DEBUG         = true;
const WP_DEBUG_LOG     = true;
const WP_DEBUG_DISPLAY = false;

/* Add any custom values between this line and the "stop editing" line. */

/**
 * Allow WordPress to detect HTTPS when used behind a reverse proxy or a load balancer
 * See https://codex.wordpress.org/Function_Reference/is_ssl#Notes
 */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

if ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ) {
	@ini_set( 'session.cookie_secure', '1' );
}

if ( ! defined( 'FS_METHOD' ) ) {
	define( 'FS_METHOD', 'direct' );
}

/** PHP Memory */
const WP_MEMORY_LIMIT     = '512M';
const WP_MAX_MEMORY_LIMIT = '512M';

/** Disable file editor */
const DISALLOW_FILE_EDIT = true;
const DISALLOW_FILE_MODS = false;

/** SSL */
const FORCE_SSL_ADMIN = true;

/** Increase post-revisions */
const WP_POST_REVISIONS = 2;
const EMPTY_TRASH_DAYS  = 15;
const AUTOSAVE_INTERVAL = 120;

//const WP_SITEURL = '#';
//const WP_HOME    = '#';

/** WordPress core auto-update, */
const AUTOMATIC_UPDATER_DISABLED = true;
const WP_AUTO_UPDATE_CORE        = false;

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
