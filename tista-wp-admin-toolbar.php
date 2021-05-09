<?php
/**
 * Plugin Name: Tista WP Admin Toolbar
 * Plugin URI: 
 * Description: Tista WP Admin Toolbar
 * Version: 4.2.1
 * Author: TistaTeam
 * Author URI: 
 * Requires at least: 
 * Tested up to: 
 *
 * @package TistaTeam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/* Set plugin version constant. */
define( 'TWATB_VERSION', '4.2.1' );

/* Debug output control. */
define( 'TWATB_DEBUG_OUTPUT', 0 );

/* Set constant path to the plugin directory. */
define( 'TWATB_SLUG', basename( plugin_dir_path( __FILE__ ) ) );

/* Set constant path to the main file for activation call */
define( 'TWATB_CORE_FILE', __FILE__ );

/* Set constant path to the plugin directory. */
define( 'TWATB_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/* Set the constant path to the plugin directory URI. */
define( 'TWATB_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	
	if ( ! function_exists( 'is_plugin_active_for_network' ) ) {
		// Makes sure the plugin functions are defined before trying to use them.
		require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	}
	define( 'TWATB_NETWORK_ACTIVATED', is_plugin_active_for_network( TWATB_SLUG . '/tista-wp-admin-toolbar.php' ) );

	/* Tista_WP_Admin_Toolbar Class */
	require_once TWATB_PATH . 'inc/class-tista-wp-admin-toolbar.php';

	if ( ! function_exists( 'tista_wp_admin_toolbar' ) ) :
		/**
		 * The main function responsible for returning the one true
		 * Tista_WP_Admin_Toolbar Instance to functions everywhere.
		 *
		 * Use this function like you would a global variable, except
		 * without needing to declare the global.
		 *
		 * Example: <?php $tista_wp_admin_toolbar = tista_wp_admin_toolbar(); ?>
		 *
		 * @since 1.0.0
		 * @return Tista_WP_Admin_Toolbar The one true Tista_WP_Admin_Toolbar Instance
		 */
		function tista_wp_admin_toolbar() {
			return Tista_WP_Admin_Toolbar::instance();
		}
	endif;

	/**
	 * Loads the main instance of Tista_WP_Admin_Toolbar to prevent
	 * the need to use globals.
	 *
	 * This doesn't fire the activation hook correctly if done in 'after_setup_theme' hook.
	 *
	 * @since 1.0.0
	 * @return object Tista_WP_Admin_Toolbar
	 */
	tista_wp_admin_toolbar();