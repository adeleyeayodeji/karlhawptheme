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
        //import products
        // add_action('wp', array($this, 'import_products'));
    }

    /**
     * Delete all media with same title
     * @param string $title
     * @return void
     */
    public function delete_media_with_same_title($title)
    {
        try {
            global $wpdb;
            //get attachment with same title %like% and uploaded between April, 2025 and April, 2025
            $attachmentid = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s AND post_type = 'attachment' AND post_date BETWEEN '2025-04-01' AND '2025-04-30'", '%' . $title . '%'));
            //loop through attachmentid
            foreach ($attachmentid as $id) {
                //delete attachment
                wp_delete_attachment($id, true);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
    /**
     * Import image
     * 
     * @param string $url
     * 
     * @return mixed
     */
    public function import_image($url)
    {
        global $wpdb;
        //upload image
        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($url);
        $filename = basename($url);
        //check if image exist with title like $filename
        $attachmentid = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s AND post_type = 'attachment'", '%' . $filename . '%'));
        //check if attachmentid is not empty
        if (!empty($attachmentid)) {
            return $attachmentid[0];
        }
        if (wp_mkdir_p($upload_dir['path'])) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }
        file_put_contents($file, $image_data);
        $wp_filetype = wp_check_filetype($filename, null);
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name($filename),
            'post_content' => '',
            'post_status' => 'inherit'
        );
        $attach_id = wp_insert_attachment($attachment, $file);
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        $attach_data = wp_generate_attachment_metadata($attach_id, $file);
        wp_update_attachment_metadata($attach_id, $attach_data);
        return $attach_id;
    }

    /**
     * import_product_single
     * 
     * 
     */
    public function import_product_single($product)
    {
        try {
            global $wpdb;
            //get the product name
            $product_name = $product['name'];
            //get inventory
            $inventory = $product['inventory'] ?: 10;
            //get the product description
            $product_description = $product['description'];
            //get the weight
            $weight = $product['weight'] ?: 0.5;

            //check if product exist with same title like %product_name%
            $product_exist = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title LIKE %s AND post_type = 'product'", '%' . $product_name . '%'));
            //check if product exist
            if (!empty($product_exist)) {
                //product exist
                return;
            }

            if (empty($product['variants'])) {
                //create woocommerce product
                $wc_product = new WC_Product_Simple();
            } else {
                //create woocommerce product
                $wc_product = new WC_Product_Variable();
            }

            //set product name
            $wc_product->set_name($product_name);
            //set product category
            $wc_product->set_category_ids([33]);
            //set product description
            $wc_product->set_description($product_description);
            //check if sale-price is not empty
            if (!empty($product['sale-price'])) {
                //set product sale price
                $wc_product->set_sale_price($product['sale-price']);
                //set product regular price
                $wc_product->set_regular_price($product['retail-price']);
            } else {
                //set product price
                $wc_product->set_regular_price($product['retail-price']);
            }

            //gallery
            $gallery = [];
            //check if product image-1 is not empty
            if (!empty($product['image-1'])) {
                //get the product image
                $product_image = $this->import_image($product['image-1']['original_file_url']);
                $gallery[] = $product_image;
            }
            //check if product image-2 is not empty
            if (!empty($product['image-2'])) {
                //get the product image
                $product_image_2 = $this->import_image($product['image-2']['original_file_url']);
                $gallery[] = $product_image_2;
            }

            //check if product image-3 is not empty
            if (!empty($product['image-3'])) {
                //get the product image
                $product_image_3 = $this->import_image($product['image-3']['original_file_url']);
                $gallery[] = $product_image_3;
            }

            //check if product image-4 is not empty
            if (!empty($product['image-4'])) {
                //get the product image
                $product_image_4 = $this->import_image($product['image-4']['original_file_url']);
                $gallery[] = $product_image_4;
            }

            //set product image
            $wc_product->set_image_id($gallery[0]);
            //set product image 2
            $wc_product->set_gallery_image_ids($gallery);
            //set_status
            $wc_product->set_status('publish');
            //set_stock_status
            $wc_product->set_stock_status('instock');
            //set_stock_quantity
            $wc_product->set_stock_quantity($inventory);
            //set_manage_stock
            $wc_product->set_manage_stock(true);
            //set_weight
            $wc_product->set_weight($weight);
            //save product
            $wc_product->save();

            //check if its a variable product
            if (!empty($product['variants'])) {
                //create product attribute from variant_options
                $variant_options = $product['variant_options'];
                //loop through variant options
                foreach ($variant_options as $variant_option) {
                    //return only name from $variant_option['variants']
                    $variant_options = array_map(function ($variant) {
                        return $variant['name'];
                    }, $variant_option['variants']);
                    //remove spaces from $variant_options
                    $str_name = preg_replace('/\s+/', '', $variant_option['name']);
                    //create product attribute
                    $attribute = new WC_Product_Attribute();
                    $attribute->set_name($str_name);
                    $attribute->set_options($variant_options);
                    $attribute->set_position(0);
                    $attribute->set_visible(true);
                    $attribute->set_variation(true);
                    //set product attribute
                    $wc_product->set_attributes(array($attribute));
                    //save product
                    $wc_product->save();
                }

                //loop through variants
                foreach ($product['variants'] as $variant) {
                    $variation = new WC_Product_Variation();
                    $variation->set_parent_id($wc_product->get_id());
                    $variation->set_attributes(array('color' => ucfirst($variant['slug'])));
                    //set_stock_status
                    $variation->set_stock_status('instock');
                    //set_manage_stock
                    $variation->set_manage_stock(true);
                    //image
                    $variation->set_image_id($this->import_image($variant['image'][0]['original_file_url']));
                    //set stock quantity
                    $variation->set_stock_quantity($variant['inventory']);
                    //check if salePrice is not empty
                    if (!empty($variant['salePrice'])) {
                        $variation->set_sale_price($variant['salePrice']);
                        //set regular price
                        $variation->set_regular_price($variant['price']);
                    } else {
                        $variation->set_price($variant['price']);
                    }
                    //save variation
                    $variation->save();
                }
            }

            //set import completed
            $_SESSION['import_started'] = false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Import Products from JSON
     * 
     */
    public function import_products()
    {
        try {
            //check if session started
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            //get products
            $products = file_get_contents(KARLHA_ASSETS_URL . '/json/products.json');
            //decode products
            $products = json_decode($products, true);
            //check if products exist
            if (!$products) {
                throw new \Exception('No products found.');
            }

            //loop through products
            foreach ($products as $product) {
                //import product
                $this->import_product_single($product);
            }
        } catch (\Exception $e) {
            //log error
            error_log("Error importing products: " . $e->getMessage());
        }
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
        add_action('wp_ajax_add_to_cart_karlha_jewels', array($this, 'add_to_cart'));
        add_action('wp_ajax_nopriv_add_to_cart_karlha_jewels', array($this, 'add_to_cart'));
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
        //init
        add_action('wp', array($this, 'init_terminal'));
    }


    /**
     * init_terminal
     * 
     */
    public function init_terminal()
    {
        //check if page is cart
        if (is_cart()) {
            //add class to body

        }
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
        // wp_enqueue_style('karlha-jewels-woocommerce-single', KARLHA_ASSETS_URL . '/css/style.css', array(), KARLHA_THEME_VERSION);
        //add localize script
        wp_localize_script('karlha-jewels-build', 'karlha_jewels', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('karlha_jewels_nonce')
        ));
    }
}
