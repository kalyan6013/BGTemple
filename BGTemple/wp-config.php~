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
define('DB_NAME', 'BGTemple');

/** MySQL database username */
define('DB_USER', 'BGTemple');

/** MySQL database password */
define('DB_PASSWORD', 'BGTemple@561208');

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
define('AUTH_KEY',         '<k=C*` S$ *jH/l <MrUU<@U7[Nh%8s)}u;>CV%{v^goh>+$n6yk9f&y7^;}ti&p');
define('SECURE_AUTH_KEY',  'k%;.=^VctK+1a4)nV^>2uQ[]edcS|f)$%ls,u!*6@Ef)BHfC`*[7XE:U#H,D-i32');
define('LOGGED_IN_KEY',    'qiJy JVJ*pA`v?-?jM;zKc>5zr829978tSJv9+#<d3? jmT3;H05(&%)sK48<|rK');
define('NONCE_KEY',        '$0Co%6u]QzgdO7U)/FKXzz?Y|sM Q1ET)lL&R|sU0$&=P]{I{My?Sr`/N6!zbiPF');
define('AUTH_SALT',        '<lH5--]D5b@cP&]n<vanVN)hOXqrJ5(k* {MVdv)*3yc_f-?tfKhMkVlcN%-V}*Z');
define('SECURE_AUTH_SALT', '=TfWk3mCjw*6R<iM2BFq%wBNY8N1<pv8Bh`$XZG,74in6/!.4?(1ozH5zGo5H;?$');
define('LOGGED_IN_SALT',   '$99`W)%]Mq71}-p//{&[aAW(sawPtsShaZayNSBc&ud]!pS@n{!gDjcb;,TqjI<n');
define('NONCE_SALT',       'pMaQpC0NM6{V1IY#[{IzI!qg?F},<{#d&Vj@[NmzOsr2!$V0sb!gThAe}te-nNaj');

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

/** FTP ByPassing. */
define('FS_METHOD', 'direct');

