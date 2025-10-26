<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handles public-facing functionality.
 * Adds the saved code to the site's header and footer.
 */
class ACHF_Public {

    /**
     * Plugin name
     * @var string
     */
    private $plugin_name;

    /**
     * Plugin version
     * @var string
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Add custom code to the <head> section.
     */
    public function insert_code_in_header() {
        $header_code = get_option( 'achf_header_code', '' );

        if ( ! empty( $header_code ) ) {
            // Output sanitized code with a comment wrapper for clarity
            echo "\n<!-- Header code added by {$this->plugin_name} -->\n";
            echo wp_kses_post( $header_code ) . "\n";
            echo "<!-- End header code -->\n";
        }
    }

    /**
     * Add custom code before the closing </body> tag.
     */
    public function insert_code_in_footer() {
        $footer_code = get_option( 'achf_footer_code', '' );

        if ( ! empty( $footer_code ) ) {
            echo "\n<!-- Footer code added by {$this->plugin_name} -->\n";
            echo wp_kses_post( $footer_code ) . "\n";
            echo "<!-- End footer code -->\n";
        }
    }
}
