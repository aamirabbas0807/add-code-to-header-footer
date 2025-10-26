<?php
/**
 * Plugin Name: Add Code to Header and Footer
 * Plugin URI:  
 * Description: Add custom HTML, CSS, or JavaScript to your site’s header and footer — safely and easily.
 * Version:     1.0.0
 * Author:      Aamir Abbas
 * Author URI:  
 * License:     GPLv2 or later
 * Text Domain: add-code-to-header-footer
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Stop execution if accessed directly (security)
}

/**
 * Define plugin constants
 */
define( 'ACHF_VERSION', '1.0.0' ); // Version control for caching and updates
define( 'ACHF_PLUGIN_FILE', __FILE__ ); // Full path to this file
define( 'ACHF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) ); // Directory path
define( 'ACHF_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // URL to plugin folder


/**
 * Include required files
 */
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-activator.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-deactivator.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-loader.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-admin.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-public.php';

/**
 * Register activation and deactivation hooks
 */
register_activation_hook( __FILE__, array( 'ACHF_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ACHF_Deactivator', 'deactivate' ) );

/**
 * Begin execution of the plugin
 */
function achf_run_plugin() {
    $loader = new ACHF_Loader();

    // Admin functionality
    $plugin_admin = new ACHF_Admin( 'add-code-to-header-footer', ACHF_VERSION );
    $loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
    $loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );

    // Public functionality
    $plugin_public = new ACHF_Public( 'add-code-to-header-footer', ACHF_VERSION );
    $loader->add_action( 'wp_head', $plugin_public, 'insert_code_in_header' );
    $loader->add_action( 'wp_footer', $plugin_public, 'insert_code_in_footer' );

    // Run loader to register everything
    $loader->run();
}
achf_run_plugin();


