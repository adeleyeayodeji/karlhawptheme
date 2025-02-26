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
    }
}
