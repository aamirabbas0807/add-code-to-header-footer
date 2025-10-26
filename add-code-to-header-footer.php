<?php
/**
 * Plugin Name: Add Code to Header and Footer
 * Description: Add custom code to your WordPress site's header and footer.
 * Version: 1.0.0
 * Author: Your Name
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define constants.
define( 'ACHF_VERSION', '1.0.0' );
define( 'ACHF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include dependencies.
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-activator.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-deactivator.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-loader.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-admin.php';
require_once ACHF_PLUGIN_DIR . 'includes/class-achf-public.php';

// Activation hooks.
function achf_activate_plugin() {
    ACHF_Activator::activate();
}
register_activation_hook( __FILE__, 'achf_activate_plugin' );

function achf_deactivate_plugin() {
    ACHF_Deactivator::deactivate();
}
register_deactivation_hook( __FILE__, 'achf_deactivate_plugin' );

// Run the plugin.
function achf_run_plugin() {
    $loader = new ACHF_Loader();

    $plugin_admin  = new ACHF_Admin( 'add-code-to-header-footer', ACHF_VERSION );
    $plugin_public = new ACHF_Public( 'add-code-to-header-footer', ACHF_VERSION );

    $loader->add_action( 'admin_menu', $plugin_admin, 'add_plugin_admin_menu' );
    $loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
    $loader->add_action( 'wp_head', $plugin_public, 'insert_code_in_header' );
    $loader->add_action( 'wp_footer', $plugin_public, 'insert_code_in_footer' );

    $loader->run();
}
achf_run_plugin();
