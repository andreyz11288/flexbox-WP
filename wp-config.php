<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'andreyz11288_forworkf_wp973' );

/** Database username */
define( 'DB_USER', 'forworkf_wp973' );

/** Database password */
define( 'DB_PASSWORD', 'q2.Sp4Z3]j' );

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
define( 'AUTH_KEY',         'moeynlpqiowuzqy3a8dacnizzmesx1hdfsyvzbdxqcqgspu6j3tgqrjtnep8kk6r' );
define( 'SECURE_AUTH_KEY',  'f19rd2ov1ig55aj07dyuefrf6lbt6evqdi4fpat3zqj1pmi5wqvyt6iqdnk0ehlv' );
define( 'LOGGED_IN_KEY',    'xhwhcvrv4rfrplpb0zmr2pd8smgsd1y7ptqdn2fcenskius3ci6mavfzbbd02uy5' );
define( 'NONCE_KEY',        '4irf2ppjp6pyd9hcrzzblk36jtdt8mshiegd9ewtutuhom4yjndj31ilh2sactsu' );
define( 'AUTH_SALT',        '84ipxaomkprvledj61fl8hn9qfbz3zeuwyubtcnpbxpannykre3pabwgeeqtaftj' );
define( 'SECURE_AUTH_SALT', 'kpxnld7qfr9g7f8jeegjgf07xal96e2woaxqvrwv0j8gxmjnbughuuh20jfombpl' );
define( 'LOGGED_IN_SALT',   'q8wi5eomm4bkhutigucfom5ukussvlha9mftgncj0qypn6cyhvg2mgr8urcxm7c7' );
define( 'NONCE_SALT',       'khwumlqiigsha5am6mlm5uvfixingfsw6cdjgzlwkbafje9m6amrg9rv1xpcnt6k' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp5e_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
