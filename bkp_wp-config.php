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
define('DB_NAME', 'itsterling');

/** MySQL database username */
define('DB_USER', 'itsterling');

/** MySQL database password */
define('DB_PASSWORD', 'itsterling');

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
define('AUTH_KEY',         ' lK9wF$zVP9AyTy9tD_&d!>2O!=Jcap45tjECzTyLc@jM-0K,YTj3G/N]^[Oc+WT');
define('SECURE_AUTH_KEY',  ':^Iw7ML~zuO1>+-j%*g05D=#g]=QL&tWci(^=x:xYZ>d?UKwPO+Z5([HIIi{d@^C');
define('LOGGED_IN_KEY',    'b+-OJ_[_ks.wPW6QvmlkT!JFqG+72Jeq(d%W4i>`K[,KGp,-BF#5T`]ZXL1bxVbU');
define('NONCE_KEY',        'qY@[b%aejo7Jj|i_SlT<00n7#d.pf:0M*+aTt#8Z=.&F-yvd-/=6[cYMj-W8eg|>');
define('AUTH_SALT',        '<L{bKs^(-zW`t>UOOWF[+A54,yd=#t;t q}3-h|-aB+)9Bx%M>jLiSH>w_yU.B,e');
define('SECURE_AUTH_SALT', '>-cw`t.WNEp@RNkTJ5+EuWCYRKE-5C;IMneA|%<1,zs.&#l+3O)0q 9pq.qVQ}PZ');
define('LOGGED_IN_SALT',   'WvxtKWm)AQ+,cAlrbr(e$pe/urh~go%$REylBm*LbM|~a!zRAu^/=1T-7}V`>y26');
define('NONCE_SALT',       'D2Kf|l-xJ!)^=[1 =||uY=XVGl,};CMm%C1l[uRb|Nbgye-Y|o<Q-IqAih+wK+oZ');

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
