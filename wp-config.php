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
define('DB_NAME', 'lutsk_database');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'q*SF^HoQ=:_WTtz~n0:zH ZU!VxEp~&DOc0G~{r,Q}j&bpq.O}wBS(:S6T*/{gZz');
define('SECURE_AUTH_KEY',  '6,Y*dW.FD|usfhf`,tosuc@B~F,cD8tTqd1@~)[A3hr_cjF>^?w^o!B`XN[s@ex3');
define('LOGGED_IN_KEY',    'c%zF7gd.~Ecu~-B2J+cAFJ?vB;t4(44(qi[ Yp|vMFU8E0t;S-Db46qA0~;O0 Fx');
define('NONCE_KEY',        '&N^|KOb*;Y)0H,:~V%nKB`7u(tgA@dI6`J z.J>w2p72XR}[gy/zVO]cu7;*w/vX');
define('AUTH_SALT',        'T@}&@`H5|0T]s$qlt;2z(6#5E$Cto447q<,J9W;,G1l~l.n(a5^feIECwmb]LJWp');
define('SECURE_AUTH_SALT', '&9?EuS9-6onb3OahZeN3l/6USaq+:.{Y*9IpH{Y5G!LGwm^X$Jn&HTh@q[uh~:2+');
define('LOGGED_IN_SALT',   '60Nou$tWfmJ@FVU<{Fumo`0M,mWC4066j)se0d_L@m{I*=j@GN`TxR@IVM(z`_gX');
define('NONCE_SALT',       'UWM0r>D9tj`6HkW|MCEei)Eh~|_?jm~uscB[x?rcMcn|,_U[]q~/s.Vp;/@%x~_R');

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
define( 'WP_HOME', 'http://192.168.0.98'); //101
define( 'WP_SITEURL', 'http://192.168.0.98');
