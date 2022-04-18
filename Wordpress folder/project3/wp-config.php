<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

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
define( 'DB_NAME', 'project3' );

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
define( 'AUTH_KEY',         'F^C/Y8CK.s]/!cI;J3eAaRD7eMbcJr7-$Xn@~wePDoP_,5v(@1EP|hjv)`b6I!XR' );
define( 'SECURE_AUTH_KEY',  'dbTXI[8-#6%ZcGFX.j%rkWysB&2&0g0iy}Vr{RBs+-`/E,RLjJ&F<k0Bm[cz $]Y' );
define( 'LOGGED_IN_KEY',    '2:(0Ek!t?]9Y-l7?U_vi1M!JA3I&YNrTqr8`2o5=Cr8GUGqM8noB/o{BnLnaQ=%a' );
define( 'NONCE_KEY',        'N](EmQ8h>YNreNzP2N=Jp_MK#J=gkxXj<J-HM?TcKM.oK|m0PX%LC dSlk&?NAH]' );
define( 'AUTH_SALT',        '|+eY8oa/0 m4] QS<PZ38[pc1Jm4(V4F)Kqb%j_-U)72O.9rq<rtie7O){U,yb;2' );
define( 'SECURE_AUTH_SALT', '=[:Z|Ua#yIWaCPZVqPxO#6; D00] KDxf_Qk~C]SjxrBZ7c?Bk+9UDOTT.Q)4o}8' );
define( 'LOGGED_IN_SALT',   'SO!uYFdALe<?=0llreS1!$r3(2-&P/w~7g+Z{VRJ]+K2gFTv4/Q-gWbOqBJx-bn4' );
define( 'NONCE_SALT',       'fd6B|&-8?ZJ*df1O%roB:c{Z`+PA!r^;9speKYn#9CCec!Y3@!gA*W%e:FJc$lOm' );

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
