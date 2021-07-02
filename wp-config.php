<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'qourse_DB' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'HB[CB1n:-i}73_?c zX_7oN-Cm<kck|y1Xwm0v3P6fA2`4N#|^T-YDS}/Uwm,W3F' );
define( 'SECURE_AUTH_KEY',  'CFd?f;TuAd6K=9w8DkG3E0:P55DcduB}`.aKGGd.]|V| N N!jLWR>0y<5l8Xf4g' );
define( 'LOGGED_IN_KEY',    'Yrl[yWi<)I#}&b`~Gp.$R)t<Gi),R>&&2M(`j<]~&InuLVbGddG>)oleJCXt<M6q' );
define( 'NONCE_KEY',        '~Bef1{>`T-}7%H}psc+Ej< 23!/o>~C.]duWI|a^e[`(Fwd-HbdO)*9-9,5q{Z_B' );
define( 'AUTH_SALT',        'I0|c!BC*SC} U]9}k@MzGR0t nMVe_Asp.a5KL#Se,I~Y6FM)WT<[p|[$Zb,$-cR' );
define( 'SECURE_AUTH_SALT', 'XtM^GISFM3SU?-APSnG7)@}-fQ~/Gq)|,q])a56IC~Dy+I<j|tAb9Xh^2NKp`sHI' );
define( 'LOGGED_IN_SALT',   'DM4c892d2#Yz9bwdy~VtC_yt0>KQJ1#Z.e}0Kv{Q~C1p <}+jX/Ke?D7Mm+z)$e6' );
define( 'NONCE_SALT',       'vDop=L>GW|ARA Na@>T)ya]QMQft}mn<cu2(fNuoDN+mA_)7?ZLTgrIRwxT3I-@@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'qou_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
