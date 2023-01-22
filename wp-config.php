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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_wpdevtestdevlocal_db' );

/** Database username */
define( 'DB_USER', 'wp_wpdevtestdevlocal_user' );

/** Database password */
define( 'DB_PASSWORD', 'wp_wpdevtestdevlocal_pw' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

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
define('AUTH_KEY',		 'gc`cX7J+x$? -ABjY4::;Ffv§83GoFs@vru3E]JV~$qE+2ngP+=9<fBVPt<[}zjo');
define('SECURE_AUTH_KEY',  'wY}4§b;]I:r.UQ7Qr_-TLpjw8nc.MEu!v(vtP(i<g5C-5@wI]Q~]qpe}z!T]:jP2');
define('LOGGED_IN_KEY',	'wpn&z}]bn^GSR0Z|Y§$HR9?x5eGo/_lL+wo>{eek]Neq+7=(w:d8PhXO Er QY[T');
define('NONCE_KEY',		'@Q%@K%zM=dm1n0?T]2(Hf41R{Ym{J~S8b{8``oVSDB]k&~9@yF%7k[@E(96o)}4Q');
define('AUTH_SALT',		'qw?t~+8$FIDhN3(/[WEW`@xD)Kl$|B{Epmm <sN`^mNKWXA4hIMAHqdQfe1O]$Vq');
define('SECURE_AUTH_SALT', 'hGCHEGh@AclKarjVR?wggYI]HZ`yK§IJ18,|[?2Su6fR]5YKHs}/o;oI&/f{={§8');
define('LOGGED_IN_SALT',   ' BQ,Jj9N{^j(!;{Oh[~PdIex8uCoRVkg§knoX~/udEx;Z~uDUV@:R{JaN5Krx,N8');
define('NONCE_SALT',	   'EqF+NJVCa@~aoEPtgp-waW|M(hhE9wH$:beLvIHjUBGoQN oDG8x|~Z;c<2YO_}5');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
