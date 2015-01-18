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
define('DB_NAME', 'jtdadmin_test01');

/** MySQL database username */
define('DB_USER', 'jtdadmin_admin');

/** MySQL database password */
define('DB_PASSWORD', 'jlivermmx');

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
define('AUTH_KEY',         ':vjP2KbW-hF+|Z1!j|@%n1><Z4+kCvJ+dIFmG)1Yu8653drNsH?cinJd;-k}M_@2');
define('SECURE_AUTH_KEY',  'h+wsUp-slrjJyZ(kQ>UVz?}RvNb+/^0`fR9SC6K=rB-qs;TzarRs7m%gy50-8~UL');
define('LOGGED_IN_KEY',    '%2;K,,m&y<t,NOqc%x}TW<}8SxzVg0h>M~1eo<fF31j<Q>`]F2B]`JE.^PRB*Dm+');
define('NONCE_KEY',        '$_m~|n.Y+wFtSOPn8G}*K3BztEb|ho!R+Bx9!K8z_&oiQHRan>!k8ma_i|:i^ck[');
define('AUTH_SALT',        'tHt#kb^e@+0:wom=zgE,6Qi&-GEe@8RW$jv+jrK+pLj5Nc<T#qxotJCcDT<4#<!_');
define('SECURE_AUTH_SALT', 'J$>?pQc5$)BHh`qCv^9-8OU#ua5ZhtnE.7g0E$5>^{v8B>+fvOyaGE;rPWvewQ_l');
define('LOGGED_IN_SALT',   '0;JDVp^8|EnIpuD>i9-xFp+y|MCcg8:q5HX[Jah>P~._R]UVnfDhhT__;j 23+{r');
define('NONCE_SALT',       '$,zRUGTThQt{pX$3sYe(77ag}IKVmW 3J.7}^OGv ,jw$]ht$ |(inl~n&P$&4V|');

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
