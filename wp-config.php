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
define( 'DB_NAME', 'echo-shop' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'jk^kL+a;G0!iEin(#11)1qXhdUC>7=.qI^RyDZIqI%[g4J$C_aBWh-N%eWB;+`p1' );
define( 'SECURE_AUTH_KEY',  'f-rH3vJ,t*}p|Eth1!$ hwX9d?gy6<ozsk.BFjw)8+/>3LgWB+y:.V!0!!6t57p|' );
define( 'LOGGED_IN_KEY',    'Y6S4-[[7Ta7/K)_e^7?t}>`4UTW)!dA7M9|k6Nzuy7Btm_<.R:d cmUc=ffzqC>[' );
define( 'NONCE_KEY',        ' f3jv1sj4X.y4o0_;HEw$pwAL56EF1NQ*&a;(>gMTcbj)c4<h1=jyUGiLPFgOkc>' );
define( 'AUTH_SALT',        '3VI&XxET!XF]`0vH;T`,%;R3:)Y@KAjStynFy]WPtRg6sn#.&C_Z-xn:Qvc}2E`/' );
define( 'SECURE_AUTH_SALT', '+{^psij;/WD%[+OJUNK>RlG^|=;(*>Mh@KV?le!m):KEurOYoy2Jgt)u:L+{;[`D' );
define( 'LOGGED_IN_SALT',   'hq1SHzi6U9+wWnj%.8Q$:=m(]+gsMM?ZTg=5^.0387MVgk`0)/*^bts!i1x_.Y~a' );
define( 'NONCE_SALT',       '@sC.(XAUrr2{>6f-$3)o3,%b<aQ5b*4I4HN4D1H.9eTx1(y5QHy=S/3j)5Us626.' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ec_';

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
