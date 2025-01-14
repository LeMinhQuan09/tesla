<?php
//Begin Really Simple Security key
define('RSSSL_KEY', 'oiBrmkhyTFRJVUQlMAfDGDYrwfTK69hSOqDgnebfAYeuFwZpBoYnK6Xcb9AbVy90');
//END Really Simple Security key
define( 'WP_CACHE', true /* Modified by NitroPack */ );
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL cookie settings
/** Enable W3 Total Cache */
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
define('FS_METHOD', 'direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'klqfuapshosting_tesla' );
/** MySQL database username */
define( 'DB_USER', 'klqfuapshosting_tesla' );
/** MySQL database password */
define( 'DB_PASSWORD', 't@admin1504.com!@#' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );
/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
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
define( 'AUTH_KEY',         'DIO9}}i-To1@-,&$dH3Uo<I1CGo,CoFgE`LB<hyg9iYG49<G2I[[+<G6[ia!m,K ' );
define( 'SECURE_AUTH_KEY',  'MJbO]9-@JTF`?kKN)Ie2kINC~Z9B(^{I,DKw 30m%B(n$UiW}>x44`z$#ni:z{KQ' );
define( 'LOGGED_IN_KEY',    '}F9I=a+-8?Ynqbg-p!zD/Mr Q.VyC){|Ffg+1]@OC3M7Gz,|s>g1BFb4|yl>sZ^t' );
define( 'NONCE_KEY',        'IjC~O`34Df3d]{TXg%Jdzy]>& /H`qv`0/lCu8II71Jvcl<aE+G+j<0{3*wXPB^>' );
define( 'AUTH_SALT',        '$>DvbK>1QDR!L4@zqV}G9n[;)=<k,<b[jKgZpUKUco?l9qA]?mhq?]y|Uv0%%|FY' );
define( 'SECURE_AUTH_SALT', ',e<H/=_(9KM1?!KfQiy$9JxK*U]wo6sIw%WO8^A=@`vo9 uN)!WM>B]|l!e}xq8i' );
define( 'LOGGED_IN_SALT',   's~MZttUpm[/o<F3bDwo> w:YwP@+tJE@P&Z*%}+3@B:O#2J /O &$_%DRe?1oYR2' );
define( 'NONCE_SALT',       'r]:6yb7>zE*ANu!W=5IXa1T9<-#D^$[sp/i[+JZA`H+._~:mF?s*I)`H%sac7`Lb' );
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
define( 'WP_DEBUG', false );
/* Add any custom values between this line and the "stop editing" line. */
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
/* save queries */
define( 'SAVEQUERIES', false );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';