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
        //add ajax 
        add_action('wp_ajax_add_to_cart', array($this, 'add_to_cart'));
        add_action('wp_ajax_nopriv_add_to_cart', array($this, 'add_to_cart'));
        //add action woocommerce_before_cart
        add_action('woocommerce_before_cart', array($this, 'before_cart'));
        //add action woocommerce_after_cart
        add_action('woocommerce_after_cart', array($this, 'after_cart'));
        //add action woocommerce_before_checkout_form
        add_action('woocommerce_before_checkout_form', array($this, 'before_checkout_form'));
        //add action woocommerce_after_checkout_form
        add_action('woocommerce_after_checkout_form', array($this, 'after_checkout_form'));
        //woocommerce_before_customer_login_form
        add_action('woocommerce_before_customer_login_form', array($this, 'before_customer_login_form'));
        //woocommerce_after_customer_login_form
        add_action('woocommerce_after_customer_login_form', array($this, 'after_customer_login_form'));
        //woocommerce_before_customer_register_form
        add_action('woocommerce_before_customer_register_form', array($this, 'before_customer_login_form'));
        //woocommerce_after_customer_register_form
        add_action('woocommerce_after_customer_register_form', array($this, 'after_customer_login_form'));
    }
    /**
     * before_customer_login_form
     * 
     */
    public function before_customer_login_form()
    {
        echo "<div class='karlha-jewels-store-front karlha-jewels-store-front-account'>";
    }

    /**
     * after_customer_login_form
     * 
     */
    public function after_customer_login_form()
    {
        echo "</div>";
    }

    /**
     * before_checkout_form
     * 
     */
    public function before_checkout_form()
    {
        echo "<div class='karlha-jewels-store-front'>";
    }

    /**
     * after_checkout_form
     * 
     */
    public function after_checkout_form()
    {
        echo "</div>";
    }

    /**
     * before_cart
     * 
     */
    public function before_cart()
    {
        echo "<div class='karlha-jewels-store-front'>";
    }

    /**
     * after_cart
     * 
     */
    public function after_cart()
    {
        echo "</div>";
    }

    /**
     * add_to_cart
     * 
     */
    public function add_to_cart()
    {
        try {
            if (!wp_verify_nonce($_POST['nonce'], 'karlha_jewels_nonce')) {
                throw new \Exception('Invalid nonce, please try again.');
            }
            //get product id
            $product_id = sanitize_text_field($_POST['product_id']);
            //get product
            $product = wc_get_product($product_id);
            //check if product is valid
            if (!$product) {
                throw new \Exception('Invalid product, please try again.');
            }

            //check if isset variation_id
            if (isset($_POST['variation_id']) && !empty($_POST['variation_id'])) {
                //get variation_id
                $variation_id = sanitize_text_field($_POST['variation_id']);
                //get variation
                $variation = wc_get_product($variation_id);
                //check if variation is valid
                if (!$variation || $variation->get_type() !== 'variation') {
                    throw new \Exception('Invalid variation, please try again.');
                }

                //check if variation is in stock
                if (!$variation->is_in_stock()) {
                    throw new \Exception('This variation is out of stock, please try again.');
                }

                //add to cart
                WC()->cart->add_to_cart($product_id, 1, $variation_id);
            } else {
                //check if product is in stock
                if (!$product->is_in_stock()) {
                    throw new \Exception('This product is out of stock, please try again.');
                }
                //add to cart
                WC()->cart->add_to_cart($product_id);
            }

            //return success
            wp_send_json_success('Product added to cart successfully.');
        } catch (\Exception $e) {
            //log error
            error_log("Error adding to cart: " . $e->getMessage());
            //return error
            wp_send_json_error([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
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
        //enqueue woocommerce shop styles
        wp_enqueue_style('karlha-jewels-woocommerce', KARLHA_ASSETS_URL . '/css/woocommerce.css', array(), KARLHA_THEME_VERSION);
        //enqueue woocommerce single product styles
        wp_enqueue_style('karlha-jewels-woocommerce-single', KARLHA_ASSETS_URL . '/css/style.css', array(), KARLHA_THEME_VERSION);
        //add localize script
        wp_localize_script('karlha-jewels-build', 'karlha_jewels', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('karlha_jewels_nonce')
        ));
    }
}
