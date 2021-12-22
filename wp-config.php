<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'itcapp_itcareer' );

/** MySQL database username */
define( 'DB_USER', 'itcapp_itcareer' );

/** MySQL database password */
define( 'DB_PASSWORD', 'W^fhU.SaQRYM' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '$QpTDSHbUl|38n[f7_9.wlad9k5LG3*(zcGN:pz{2& n5}h`qGK<=)]DmX?PVa_*' );
define( 'SECURE_AUTH_KEY',  'in&U<xZ_OxW_.nk[B{9F[Q*`V9)B10?{_O(4E<IHuAMJy9M32^IE1A?&w TE;9*1' );
define( 'LOGGED_IN_KEY',    '9}w/=Y}D aOat`K$+c``*EyOoabi&5/kC9!z7F^$3C#WDu)1)mWhSx?/q8-`il|s' );
define( 'NONCE_KEY',        'PEBgZV(q^pn*!1}y%xM? Z?ld88c45r,Az:FlXLqer/|HK-6X- eq;hz#B:IH}!6' );
define( 'AUTH_SALT',        't Psp!H@`AQE~9nXs=&5ka<*5|cRpne{d4PRDh1nj-&R#f@Pl2*e~/vOJ^mp*)qD' );
define( 'SECURE_AUTH_SALT', 'xU5khH9fnknRX;BksEQ37BW/@AJgT|LTKnv]c54<Qhos}~2z?bbPA<Ll2}TfhQ5A' );
define( 'LOGGED_IN_SALT',   '73=Az59^/Y..vUFb)I5xvpUbFG5:F`GX-eQbZ$ejs5sUdBsCtk^T|}3*d=c<Vdk!' );
define( 'NONCE_SALT',       '@`p_f=}xX?r#RH*P$BD?}7dR@Un3s-1KWQPV;;)2y.|%?05FC<*6mXS#?zg5:r$2' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
