<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Security check
}

/**
 * Fired during plugin deactivation
 */
class ACHF_Deactivator {

    /**
     * Runs when the plugin is deactivated.
     */
    public static function deactivate() {
        // Example: clear scheduled tasks (if you ever add any)
        // wp_clear_scheduled_hook( 'achf_cron_hook' );

        // We do NOT delete user settings here — only on uninstall.
    }
}
