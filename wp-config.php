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
define( 'DB_NAME', 'stg63085_database' );

/** Database username */
define( 'DB_USER', 'stg63085_admin' );

/** Database password */
define( 'DB_PASSWORD', 'orifizz.0905037918' );

/** Database hostname */
define( 'DB_HOST', 'ntechsolar.vn' );

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
define( 'AUTH_KEY',         'a3orL[F#:B.Xm%fMwrnI@_(6^=_s!b{dyYZ(|7u^1e.vi{Up4KoS.e!)t}x5doJx' );
define( 'SECURE_AUTH_KEY',  '+Q(!O*UIF*Q0TUrCU@0s`%0]!>kX#/3Zg%?3uYu[V^>=&AAZR6$Qakd+er0):sSD' );
define( 'LOGGED_IN_KEY',    '$Yg-Mz9Bcc`-_v_@]f_}F*JE~d1]5GI.E)7fYi~Eb;+-,*TqvIn!SxR_)c6c0MIc' );
define( 'NONCE_KEY',        '7PP:@ul|V{$+aV&?r}[{I);^vxv,/e`E[#tSde w0E3A?iwhsFm2bh?_B,?1hFUS' );
define( 'AUTH_SALT',        'vJz:vZ2I{6 PzI_@I(qUNA7wz8$$I)0{JKIEPG]pp8=Sys=.h$o$y!Q3anha)f~<' );
define( 'SECURE_AUTH_SALT', '5XE|xm/yrV$tV+nLN!Uo!WxTn}cxyWsI<3&&$-!,>=owE<S*bunzW KLn7enzQoM' );
define( 'LOGGED_IN_SALT',   '~J^.8[z^5=A8LC*fdLAy{sE>O[(V/_S[>NXjK;9uQWm6*^Oj4IxQD%Rr+m5-P;1 ' );
define( 'NONCE_SALT',       '4ccdaH]U{;5qo)7&=8Z_]u~05,VzIW6pXY^cgN~Ggd~m]MAs<A>BVQMrzRp~R F(' );

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
