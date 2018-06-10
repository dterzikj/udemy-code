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
define('DB_NAME', 'udemy');

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

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5:2ioqze^$sgDR!J7}g2GB,l7(hXGo)7W/l$QHP-X8hNa]44LDM(-CeL vFU6)(i');
define('SECURE_AUTH_KEY',  'fBFx`)I1_ELQ.B!*U;l.tf;C*<&V6;m)nT&Nv+va]4d}&1]}u!MBGPm]<mQ480oH');
define('LOGGED_IN_KEY',    '<tC,oI@TN)kDZMeRdGH5W= ^_~X?aF]T%eC&t`f-D{vuBrK9G;xr]2DdcC3-{p;w');
define('NONCE_KEY',        'ydodg%tQTm&hX28q[sdEq9DX5/kp8zH]2*FLB1l_E1-uTXK0w:`NLN#7GH*C -:w');
define('AUTH_SALT',        '9n;KvnA`W{JJKf8ch_>@Q;qf<tV#g52c|ECOPs#%wMdg3g+%u5boQx6wDoFFX1vL');
define('SECURE_AUTH_SALT', 'w&Y|W*|@Mspn-5 7;GmD*D}#l^2K-^IweYN*K/f:YTNrN/Tn~!^(nx}fim,tq<RV');
define('LOGGED_IN_SALT',   'iN+SJVl@Ox]J(iPBEUKA/y^@Tmbz}C^qy9}xGn*WpPWO@vi>@}L7!$,aataGNR`$');
define('NONCE_SALT',       '3nM[E!D2zUI==tjfxIYw4MvCPKY~hN-vK`/eDib<PIh&u(jLwK|>CN=V0hzT`*qg');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
