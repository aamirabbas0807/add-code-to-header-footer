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

/**
 * Register activation and deactivation hooks
 */
register_activation_hook( __FILE__, array( 'ACHF_Activator', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'ACHF_Deactivator', 'deactivate' ) );

/**
 * Begin execution of the plugin
 */
function achf_run_plugin() {
    // This is where we’ll initialize everything later (admin page, frontend hooks, etc.)
}
achf_run_plugin();


