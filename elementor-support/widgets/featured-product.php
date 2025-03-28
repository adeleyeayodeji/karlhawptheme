<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Featured Product Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class Featured_Product_Widget extends \Elementor\Widget_Base
{
    /**
     * Get widget name.
     *
     * Retrieve Home Banner Widget name.
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'featured-product';
    }

    /**
     * Get widget title.
     *
     * Retrieve Home Banner Widget title.
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Featured Product - Karlha', 'karlhawptheme');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Home Banner Widget icon.
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Home Banner Widget belongs to.
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['karlha-widgets'];
    }

    /**
     * get_products
     * 
     * @access public
     * 
     * @return array
     */
    public function get_products()
    {
        $products = wc_get_products([
            'limit' => -1,
        ]);

        $product_options = [];
        foreach ($products as $product) {
            $product_options[$product->get_id()] = $product->get_name();
        }

        //return the product options
        return $product_options;
    }

    /**
     * Register Home Banner Widget Controls
     * 
     * @access protected
     * 
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'karlhawptheme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //background color
        $this->add_control(
            'background_color',
            [
                'label' => __('Background Color', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .home-featured-product' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Featured Product', 'karlhawptheme'),
            ]
        );

        $products = $this->get_products();

        //select product
        $this->add_control(
            'product_id',
            [
                'label' => __('Select Product', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $products,
                'default' => 0,
            ]
        );

        //end
        $this->end_controls_section();
    }


    /**
     * Render Terminal Contact Widget output on the frontend
     * 
     * @access protected
     * 
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        //get product
        $product = wc_get_product($settings['product_id']);
        //get product image
        $product_image = get_the_post_thumbnail_url($settings['product_id']);
?>
        <script>
            window.productVariations = [];
        </script>
        <div class="home-featured-product" id="feature-title-block">
            <div class="main-box-first-box"></div>
            <h1 class="featured-product-header"><?php echo esc_html($settings['title']); ?></h1>
            <div class="featured-product-wrapper">
                <div class="featured-product-display-wrapper">
                    <div class="featured-product-display-image-block">
                        <img id="main-image-1" loading="lazy" alt="" class="featured-product-display-image product-body-image" src="<?php echo esc_url($product_image); ?>">
                    </div>
                </div>
                <div class="featured-product-text-wrapper">
                    <h1 class="featured-product-name"><?php echo esc_html($product->get_name()); ?></h1>
                    <div class="feature-product-price-block">
                        <div id="product-price" class="feature-product-price price"><?php echo wc_price($product->get_price()); ?></div>
                        <div id="product-sale-price" class="feature-product-price sale-price"></div>
                    </div>
                    <h1 class="details-header">Description &amp; Details</h1>
                    <div class="details-text">
                        <?php echo wp_kses_post(wp_trim_words($product->get_description(), 10, '...')); ?>
                    </div>
                    <!-- Variant area -->
                    <?php if ($product->is_type('variable')) :
                        $variations = $product->get_available_variations();
                        //loop through variations and convert prices to naira
                        foreach ($variations as $key => $variation) {
                            $variations[$key]['display_price'] = wc_price($variation['display_price']);
                            //convert regular price to naira
                            $variations[$key]['display_regular_price'] = wc_price($variation['display_regular_price']);
                        }
                        $attributes = $product->get_variation_attributes();
                    ?>
                        <div class="product-variant-block" id="product-variant-block">
                            <?php foreach ($attributes as $attribute_name => $options) : ?>
                                <div class="product-variant-selector-block">
                                    <div class="feature-product-variant-label"><?php echo wc_attribute_label($attribute_name); ?></div>
                                    <div class="w-embed">
                                        <select class="feature-product-variant-select" data-attribute="<?php echo esc_attr($attribute_name); ?>">
                                            <option value="">Select <?php echo wc_attribute_label($attribute_name); ?></option>
                                            <?php foreach ($options as $option) : ?>
                                                <option value="<?php echo esc_attr($option); ?>"><?php echo esc_html($option); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <script>
                            productVariations = <?php echo json_encode($variations); ?>;
                        </script>
                    <?php endif; ?>

                    <?php
                    //is stock
                    $is_stock = 'false';
                    //check if Stock management is enabled
                    if ($product->managing_stock()) {
                        //get stock quantity
                        $stock_quantity = $product->get_stock_quantity();
                        //check if stock quantity is greater than 0
                        if ($stock_quantity > 0) {
                            $is_stock = 'true';
                        }
                    } else {
                        $is_stock = 'true';
                    }
                    ?>

                    <a class="add-to-cart-button buy-now w-button" id="buy-button" data-product-id="<?php echo $product->get_id(); ?>" data-product-is-in-stock="<?php echo $is_stock; ?>" data-is-buy-now="true">Buy it Now</a>
                    <a class="add-to-cart-button w-button" id="add-item-cart" data-product-id="<?php echo $product->get_id(); ?>" data-product-is-in-stock="<?php echo $is_stock; ?>" data-is-buy-now="false">Add to Cart</a>
                    <div class="feature-product-details-block">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="feature-product-link">Full Details</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
