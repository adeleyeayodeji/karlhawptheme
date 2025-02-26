<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die('Direct access is not allowed');
}

/**
 * Karlhawp WordPress Theme
 *  Template designed for Karlhawp
 * 
 * @since 1.0.0
 * @author Adeleye Ayodeji
 */

class KarlhawpTheme
{
    /**
     * Init
     * 
     */
    public function __construct()
    {
        //init theme
        $this->init();
    }

    /**
     * Elementor Missing Checker
     * 
     */
    public function elementor_missing_checker()
    {
        //check if plugin is installed
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
        //get plugins
        $plugins = get_plugins();
        //check if elementor is installed
        if (isset($plugins['elementor/elementor.php'])) {
            //check if the plugin is activated
            if (!is_plugin_active('elementor/elementor.php')) {
                //add admin notice
                add_action('admin_notices', array($this, 'elementor_missing_notice'));
            }
        } else {
            //add admin notice
            add_action('admin_notices', array($this, 'elementor_missing_notice'));
        }
    }

    /**
     * Elementor Missing Notice
     * 
     */
    public function elementor_missing_notice()
    {
        //check WP_ALLOW_MULTISITE
        $multisite_checks = is_multisite();
        //check multi site
        if ($multisite_checks) {
            $view = "install-elementor-multisite";
        } else {
            $view = "install-elementor";
        }
        ob_start();
        require_once KARLHA_THEME_DIR . '/templates/notice/' . $view . '.php';
        echo ob_get_clean();
    }

    /**
     * Init Theme
     * 
     */
    public function init()
    {
        //check if elementor plugin is installed
        if (class_exists('Elementor\Plugin')) {
            //init elementor
            $this->init_elementor();
        } else {
            //add admin notice
            add_action('init', array($this, 'elementor_missing_checker'));
        }
    }

    /**
     * init_elementor
     * 
     */
    public function init_elementor()
    {
        //include the class file
        require_once KARLHA_THEME_DIR . '/elementor-support/elementor-core.php';
        //init elementor
        new KarlhaElementor();

        //wp
        add_action(
            'init',
            array($this, 'after_theme_initilized')
        );
    }


    /**
     * after_theme_initilized
     * 
     */
    public function after_theme_initilized()
    {
        //enqueue styles
        add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    }

    /**
     * enqueue_styles
     * 
     */
    public function enqueue_styles()
    {
        //add build css
        wp_enqueue_style('karlha-jewels-build', KARLHA_DIR_URL . '/build/karlhawptheme.css', array(), KARLHA_THEME_VERSION);
        //enqueue styles
        wp_enqueue_style('karlha-jewels-webflow', KARLHA_ASSETS_URL . '/css/karlha-jewels.webflow.css', array(), KARLHA_THEME_VERSION);
        //add script
        wp_enqueue_script('karlha-jewels-build', KARLHA_DIR_URL . '/build/karlhawptheme.js', array('jquery'), KARLHA_THEME_VERSION, true);
        //add localize script
        wp_localize_script('karlha-jewels-build', 'karlha_jewels', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('karlha_jewels_nonce')
        ));
    }
}
