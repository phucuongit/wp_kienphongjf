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
define( 'DB_NAME', 'kienphong' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '[bbjTeQr!:Yeve*:RXc+DtIK?Lg_Z)9%^MDeKr,&}As_r>?V>Hz<-6|0+2T5~*fn' );
define( 'SECURE_AUTH_KEY',  '9V%.Qg]vd2cNM7.w^>b)3sN5s$_{1yqS/e[yW~W5HAk a>8>J{@+G[9=Q}Jjy74n' );
define( 'LOGGED_IN_KEY',    'G|^~R_!.qz_E&pe#bjpseLk:uf:/J!,|fQxreT&s[pxXt,I6dkJ.*Y6kXM8IeFw5' );
define( 'NONCE_KEY',        '1olA?pRBX7J?-0hS~K}Z2|RnB&#<pqEWS)iM$QYe1{@jAQNRRFwtz&{{hmo|3@K<' );
define( 'AUTH_SALT',        'RJ!R>0EmzCO%P8J*Hgc1qc3-f_`jm2qapMMt ZLQewmL(dn*mRU&?j5]WfLrL4R(' );
define( 'SECURE_AUTH_SALT', 'Hx@yT?a6R, RP(;(b$3HU^bxF?hOEkjz:AZM&VXOt u?jGe=7wvO?7L%WqEVXSQ ' );
define( 'LOGGED_IN_SALT',   'c&|DByLf:K]|jIaK5_yGpbA5|m6ets-Z5QG:- E5dG}pj0C<By87s/S<[N2=nU6[' );
define( 'NONCE_SALT',       'R+>p4s]Zgmf0o8r{_FG!X@0j:Yp.{z!^%3D{s&Ixkn?,h]}y6}P/=v<Pj11kbgU,' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
