<?php
/**
 * Plugin Name: Movies
 * Plugin URI:  https://google.com
 * Description: Movies
 * Version:     1.0
 * Author:      Albin
 * Author URI:  https://google.com
 * Text Domain: ag-movies
 */

defined( 'ABSPATH' ) OR die( 'No script kiddies, please!' );
require_once 'configs/init.php';
global $wp_version;

$textDomain = 'ag-movies';

/** Compare PHP version */
if ( version_compare( phpversion(), '5.4', '<' ) ) {
	add_action( 'admin_notices', '_ag_wp_php_version_error' );
	return false;
}
/** Compare PHP version END */

/** Compare WP version */
if ( version_compare( $wp_version, '5.0.0', '<' ) ) {
	add_action( 'admin_notices', '_ag_wp_wordpress_version_error' );
	return false;
}
/** Compare WP version */

/** PHP version error functions */
function _ag_wp_php_version_error() {
	global $textDomain;
	printf( '<div class="error"><p>%s</p></div>', esc_html( __( 'Info: Your version of PHP is too old to run this plugin. You must be running PHP 5.4 or higher.', $textDomain ) ) );
}

/** PHP version error functions END */

/** WP version error functions */
function _ag_wp_wordpress_version_error() {
	global $textDomain;
	printf( '<div class="error"><p>%s</p></div>', esc_html(  __( 'Info: Your version of Wordpress is too old to run this plugin. You must be runing 3.4 or higher.', $textDomain ) ) );
}

/** WP version error functions END */

function ag_debug($data, $type='default') {
    echo "<pre>";
    if ( $type === 'default' ) {
        print_r($data);
    } else {
        var_dump($data);
    }
    echo "</pre>";
}

/** Add plugin links */
function ag_plugin_links( $links ) {
	global $textDomain;
	$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=ag-settings') ) .'">'.__('Settings', $textDomain).'</a>';
	return $links;
}
// add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'ag_plugin_links' );

/** Create instance */
$agMovies = new AG_Movies();
$agMovies->main();