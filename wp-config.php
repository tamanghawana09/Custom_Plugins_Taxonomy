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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '4oYpv8g@-R<f(D5N]bj>+F&g2}_xCm5N#nzC(iecvK9N%hV`;HC%8LmfpS7?_vzs' );
define( 'SECURE_AUTH_KEY',  '}QxF?d$iQ4^`FCIy].Oh`ax`bYtT%e9&ujRAag)DwB)K|o/Won%GFwN3I*nf6Bl~' );
define( 'LOGGED_IN_KEY',    'pzY:ZxiZ&l*4jMLt6)7jevWU>J:i=qqe@,[-m{6@F9Yeom(/7tl+H.cm=8-Kg?po' );
define( 'NONCE_KEY',        'EbManpayK%<3AnyIUYfxc)m@{q10Ni)VP3kMg{B/c,{>[tOQ6n.MTN@L[.~F{rzu' );
define( 'AUTH_SALT',        'F$qVIW.Q3LJ1ahlE/H``,wP/*hd)Du(]n25Zh_U3PYbwQPxG_I[_&)k_$i<l`DDB' );
define( 'SECURE_AUTH_SALT', 'b!^,$ZQB{9h@?J+UPB8Vs@d5R$-.8jFO;t0xeH9$x2D&4NC_roc+@74vEga#2dAO' );
define( 'LOGGED_IN_SALT',   '$# %GOF6+8G_TWCEpdJx/,yn3 ^9L7noGmqbkVr,WXB8 b&Q1w*k7e>tl|[nKeF<' );
define( 'NONCE_SALT',       'G~^_>==$ (~tm&mHWC1l`o~!n[|MAE~z!nQGO+K!r$m),I&9uMA=y:HHZMG{ze7j' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
