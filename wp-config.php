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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'shareehouse_wp_hjjng' );

/** Database username */
define( 'DB_USER', 'shareehouse_wp_lc6yj' );

/** Database password */
define( 'DB_PASSWORD', '){QFXRcmm[' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', 'v40Ib6;Li865_@mF9G8K!SfHR@F9Kb+9#1#L]@Zh0k@L0(HrT05/)5A(*F-Dg1K2');
define('SECURE_AUTH_KEY', 'B597ON401Jj)k01L6R6j]CTROEH6|R3;S0Hu;16K/+Q;9yHhuPJ84[6*MGAlY77s');
define('LOGGED_IN_KEY', 'wD5EB|@Ve)l/01|YN7~C1!Zn1CPMDCM_D~7]3PFI/|;67kK]1c5[6tl-j3E%dzWA');
define('NONCE_KEY', 'vgc2@DAOPQ2vB#7LPRisg5R*j@TZ0#IwOFMHuY|(LH1nn[u)RYz35I+W)G(h!Y~d');
define('AUTH_SALT', 'U/AGbCo7_EaZ|V-40P!CS2%(C&PBUpl3m6OEE8a523n!6-p!g8NJ[S5ApjJR#(&T');
define('SECURE_AUTH_SALT', '0+~S9aIy:@Qkq*68PV~r8B&4&AbU]i]R:iIE7I4]Y9431662p324!(@E|@dwr0X3');
define('LOGGED_IN_SALT', 'Q3v#CEt5Efif&1B8EN7)30&zY;TA8gf3AEC_0q3o(4NX9(r]I7A4a@581Vv7[Bm1');
define('NONCE_SALT', 'l1DpOqZj5Fo-2-JSgvu60!c267_Fn!|9C9nowdiE@*tq9j9o1h9U8Q0F99H7/+A1');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ZL8bqB_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
