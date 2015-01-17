<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'berrysgr_prod');

/** MySQL database username */
define('DB_USER', 'berrysgr_admin');

/** MySQL database password */
define('DB_PASSWORD', 'Ginger334$');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'LX+|>NgFXgK<W#IbZ`H`^pD=cfyfmY}5n*1$1D,d_!|IW;@tej.985rZ=$vnMh7H');
define('SECURE_AUTH_KEY',  'ti=,kwV;!Oa_~_O.LGPlyycq^})Cxf=K|F8%#1J|4zP()3z%<9kR:ZrBFWK9.t,O');
define('LOGGED_IN_KEY',    'QMe[:Ms~jj6=N;lJzJw#$Q]c|`YB(1v5lGLho~Q^@;2?u <`,KTc.bzi=W3][Eh#');
define('NONCE_KEY',        ';ErV*> f-{%Y- D2IY(cv6Q9..ld)R:tF;VjtsGL,cLO;R14p70vecTBmV8Qoky%');
define('AUTH_SALT',        '|qsa.XBHolTK[zG!:e7oHse<z`?s# ){)-3M&Z$h*a ^?+Dbr<l+egMZC~JYC{}g');
define('SECURE_AUTH_SALT', ')0htQ4]5v7;W:dLsw$b[_OB>X|R]div;y_K][=SGF|v2irt*E]MI@0%9^O{5>oUy');
define('LOGGED_IN_SALT',   'Ls46yV|pQE&|#-i*V$EQ0;8|mf|J5A6zLW(P)yh9$1R5>`fmar4G@>Q7S+S@m{i:');
define('NONCE_SALT',       '7^y>A kU*<Yo--%T~hh8>W5rmbSG?#U?@G7x1.:-B+C_j|Ov8XVfN!RR, #Y{SyQ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bg_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
