<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://yourwebsite.com
 * @since      1.0.0
 *
 * @package    Add_Code_To_Header_Footer
 * @subpackage Add_Code_To_Header_Footer/admin
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The admin-specific functionality of the plugin.
 */
class ACHF_Admin {

    private $plugin_name;
    private $version;

    /**
     * Initialize the class and set its properties.
     */
    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Add options page under Settings menu.
     */
    public function add_plugin_admin_menu() {
        add_options_page(
            'Add Code to Header and Footer',
            'Header & Footer Code',
            'manage_options',
            $this->plugin_name,
            array( $this, 'display_plugin_admin_page' )
        );
    }

    /**
     * Register plugin settings.
     */
    public function register_settings() {
        register_setting( 'achf_settings_group', 'achf_header_code' );
        register_setting( 'achf_settings_group', 'achf_footer_code' );
    }

    /**
     * Display settings page.
     */
    public function display_plugin_admin_page() {
        include_once plugin_dir_path( __FILE__ ) . '../admin/partials/settings-page.php';
    }
}
