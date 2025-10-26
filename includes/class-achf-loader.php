<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Security check
}

/**
 * Loader class
 *
 * Collects and registers all actions & filters for the plugin.
 * Makes the plugin modular and keeps hooks centralized.
 */
class ACHF_Loader {

    /**
     * @var array $actions Stores all WordPress actions to add
     */
    protected $actions = array();

    /**
     * @var array $filters Stores all WordPress filters to add
     */
    protected $filters = array();

    /**
     * Add a new action to the collection.
     *
     * @param string   $hook           WordPress action name (e.g., 'init')
     * @param object   $component      Object instance the callback belongs to
     * @param string   $callback       Method name of the callback
     * @param int      $priority       Hook priority (default 10)
     * @param int      $accepted_args  Number of arguments the callback accepts
     */
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->actions[] = compact( 'hook', 'component', 'callback', 'priority', 'accepted_args' );
    }

    /**
     * Add a new filter to the collection.
     *
     * @param string   $hook           WordPress filter name (e.g., 'the_content')
     * @param object   $component      Object instance the callback belongs to
     * @param string   $callback       Method name of the callback
     * @param int      $priority       Hook priority (default 10)
     * @param int      $accepted_args  Number of arguments the callback accepts
     */
    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
        $this->filters[] = compact( 'hook', 'component', 'callback', 'priority', 'accepted_args' );
    }

    /**
     * Register all actions and filters with WordPress.
     */
    public function run() {
        // Register actions
        foreach ( $this->actions as $hook ) {
            add_action(
                $hook['hook'],
                array( $hook['component'], $hook['callback'] ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        // Register filters
        foreach ( $this->filters as $hook ) {
            add_filter(
                $hook['hook'],
                array( $hook['component'], $hook['callback'] ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }
}
