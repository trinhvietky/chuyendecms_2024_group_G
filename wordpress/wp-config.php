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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '[j6:3+h^):p=);=z=Wif8n]+HVPP>&D g|ox7x5PD30Q/o)9|f2yT+mi`dNuDNga' );
define( 'SECURE_AUTH_KEY',  '2eSBQ]-DdFJUYS^!|>3eV3V`o5kM4^PNG4^}uU!Tk`<Ro>[KYJc6FU,I!]Q&E<.O' );
define( 'LOGGED_IN_KEY',    '^?i+c,O7)6i>/9:4_O0SeQr/Ge?h; Z?FwQ`gAGxmU8~?I&-yA@f6~@p$;<NqK}o' );
define( 'NONCE_KEY',        '~M5e7H m10WHUTvK+7*<gdbWJ[@#[+b iL?s+Yu=U8|{XXBz}2D$lWllP9?Mdq|~' );
define( 'AUTH_SALT',        'Cq:w1N`ja<#_s^Pr120?9}gtwU2rCUs1>uh^#zg=*(w2qr_/Pe~>=?qg}>WU5lZK' );
define( 'SECURE_AUTH_SALT', 'scdnBRR.j;EqtQ2.k`X|Vx7Y8doaWY.D/_iSu[58MxxCTyazei/3*bZ/sL6F3:9j' );
define( 'LOGGED_IN_SALT',   '2^mykfg)1h_j4$[b{Uzj0Ti.A&Hy]zy 3nC?JGer:v>328~Z>aLR3Y+doJY%07)r' );
define( 'NONCE_SALT',       'JqfwK-IXruyD^]sU7bGFVd}qCZLNv*#^Q@q3iP$xUnk>4SDE/<QDG7j@7OoAk3`0' );

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
