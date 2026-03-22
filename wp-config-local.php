<?php
/**
 * This is a sample config for local development. wp-config.php will
 * load this file if you're not in a Pantheon environment. Simply edit/copy
 * as needed and rename to wp-config-local.php.
 *
 * Be sure to replace YOUR LOCAL DOMAIN below too.
 */
// Trust proxy headers for HTTPS detection
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
    $_SERVER['HTTPS'] = 'on';
}

define('WP_ENVIRONMENT_TYPE', getenv('WP_ENVIRONMENT_TYPE'));

define( 'DB_NAME', getenv('DB_NAME') );
define( 'DB_USER', getenv('DB_USER') );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') );
define( 'DB_HOST', 'localhost:' . getenv('MYSQL_UNIX_PORT') );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY', 'put your unique phrase here' );
define( 'SECURE_AUTH_KEY', 'put your unique phrase here' );
define( 'LOGGED_IN_KEY', 'put your unique phrase here' );
define( 'NONCE_KEY', 'put your unique phrase here' );
define( 'AUTH_SALT', 'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT', 'put your unique phrase here' );
define( 'NONCE_SALT', 'put your unique phrase here' );

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_HOME', getenv('SITE_URL'));
define( 'WP_SITEURL', getenv('SITE_URL'));

// define( 'WP_HOME', 'https://auto.dev.mclean.host');
// define( 'WP_SITEURL', 'https://auto.dev.mclean.host');
define( 'WP_AUTO_UPDATE_CORE', false );

$table_prefix = 'wp_';
