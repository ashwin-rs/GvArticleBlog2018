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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'techreview');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}2o%ZoVuf3rK[*?VrCTqZoj2,M1{RN-11!]wE<(JG>O!|0if_GW[-@)K+YmOj@H,');
define('SECURE_AUTH_KEY',  'WUN#Vw8I-,Hbyp(q%~;CeI]F_+pf#Udg-Sr0N1MbW$ifsu>a|v|0^5ETg5J<bXhb');
define('LOGGED_IN_KEY',    'lo~2Hhx c/+8&>2,TO JG4LnrTj30%I0hjH07pz[2KxY}Uj$ SN/mFv-l(9^Pe4w');
define('NONCE_KEY',        'xN !qThjy&=$+V2ex.x*:wp>VE7|9GOZ6m{&8-.q6;x `%=0VUThpKB]CmVz60zs');
define('AUTH_SALT',        'gas9<8/4{j0i.^r^<,^*a!snDppK|TWp!eFm8$.jtP(^:.W$rcoZ@GBvM[&CPf7.');
define('SECURE_AUTH_SALT', '?nGpHD(q`qf(e32mPsS]_U0r4|w$5J%I9ST7Nq!UCVa Mdvrgp1xB~APw2@Q*$UP');
define('LOGGED_IN_SALT',   'nzI0Mrew}%1s.%b`m6);MR71X[&@>&hp0r|C%UlrJc;-:@iPyC|O{iOWy)wk#G13');
define('NONCE_SALT',       'W5QT!$]tZamOC/V4?$*_({?Z9M|jn}}q T(BACx#{H~Wo-1*q/&cmD{x`-*Qy#V>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
