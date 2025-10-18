<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Security check: stop direct access
}

/**
 * Fired during plugin activation
 */
class ACHF_Activator {

    /**
     * Runs when the plugin is activated.
     */
    public static function activate() {

        // Define default settings
        $defaults = array(
            'achf_header_code' => '',
            'achf_footer_code' => '',
        );

        // Add defaults if they don't already exist
        foreach ( $defaults as $key => $value ) {
            if ( get_option( $key ) === false ) {
                add_option( $key, $value );
            }
        }

        // Save plugin version in options (useful for upgrades later)
        update_option( 'achf_version', ACHF_VERSION );

        // If we ever create database tables or scheduled events, they’ll go here.
    }
}

