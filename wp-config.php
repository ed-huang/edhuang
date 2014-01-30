<?php
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
define('DB_NAME', 'edhuang_local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         ']}Pc>rfxgTPn`qvngQ|pPIXFygQumSKnNB]V>o$;+z!yrQvx,q3z5f&@,xRPA8<O');
define('SECURE_AUTH_KEY',  '0oHc)ZS,=BW)-Ldd_{S%hca)G<C:cEP)# ^N2)/vBRa!].eK B%261jYQ7i}Wmcr');
define('LOGGED_IN_KEY',    'Owg]2eazh6zT~m?+Uboah& `+F[k^B  _O>GOKD!fZUqH|)+gAY;(Fm#b/{Ltn5/');
define('NONCE_KEY',        '6v.q2)/i Fcn>_sH[sKMHkYt$&#phhp1PpC7Q%5Q5|@n;6[HA8[rkxQJhT`YR9Il');
define('AUTH_SALT',        '5_/.V&)aL]tK<`ydL-([4rvz[6Sn|2)Y0o1ni{^-Qxy Xz:g@bqAK@i$2(Xoau@h');
define('SECURE_AUTH_SALT', '5cK--5FWYM*o2{8v<=_ojPkS49k9,i5y-<yf5Cv@FN~ |ra]2Gw3NyQ{hB}7UDXY');
define('LOGGED_IN_SALT',   ' {yr~`>GZ]U)zM[g=V+Vl=.L.&PFg+ty6cp6|vkL;?C}E33%EwLiim|Hv]3ABHs?');
define('NONCE_SALT',       'nX9a#]}`z5|D!6GVcd~AY5a?p.? ktO8<8!~zNko-YWccE)L#Y?O;~q9-[C.x+Yd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
