<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}

/**
 * Init Elementor and Elementor Widgets
 * 
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 */

class KarlhaElementor
{
    /**
     * Init
     * 
     */
    public function __construct()
    {
        //register widgets
        add_action('elementor/widgets/widgets_registered', array($this, 'register_widgets'));
        //elementor editor scripts
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'editor_scripts'));
    }

    /**
     * register_widgets
     * 
     */
    public function register_widgets()
    {
        //get all files in widgets directory and add them here
        $widgets = glob(KARLHA_THEME_DIR . '/elementor-support/widgets/*.php');
        //loop through the files and include them
        foreach ($widgets as $widget) {
            require_once $widget;
        }

        //register terminal hero widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Home_Banner_Widget());
        //register featured product widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Featured_Product_Widget());
        //register about us widget
        \Elementor\Plugin::instance()->widgets_manager->register(new About_Us_Widget());
        //register best sellers widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Best_Sellers_Widget());
        //register about us single widget
        \Elementor\Plugin::instance()->widgets_manager->register(new About_Us_Single_Widget());
        //register contact widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Contact_Widget());
        //register generic content page widget
        \Elementor\Plugin::instance()->widgets_manager->register(new Generic_Content_Page_Widget());
    }

    /**
     * editor_scripts
     * 
     */
    public function editor_scripts()
    {
        //add build css
        wp_enqueue_style('karlha-jewels-build', KARLHA_DIR_URL . '/build/karlhawptheme.css', array(), KARLHA_THEME_VERSION);
        //add script
        wp_enqueue_script('karlha-jewels-build', KARLHA_DIR_URL . '/build/karlhawptheme.js', array('jquery'), KARLHA_THEME_VERSION, true);
    }
}
