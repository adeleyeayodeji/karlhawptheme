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
        <div class="home-featured-product" id="feature-title-block">
            <div class="main-box-first-box"></div>
            <h1 class="featured-product-header"><?php echo esc_html($settings['title']); ?></h1>
            <div class="featured-product-wrapper">
                <div class="featured-product-display-wrapper">
                    <div class="featured-product-display-image-block">
                        <img id="main-image-1" loading="lazy" alt="" class="featured-product-display-image" src="<?php echo esc_url($product_image); ?>">
                    </div>
                </div>
                <div class="featured-product-text-wrapper">
                    <h1 class="featured-product-name"><?php echo esc_html($product->get_name()); ?></h1>
                    <div class="feature-product-price-block">
                        <div id="product-price" class="feature-product-price price"><?php echo esc_html($product->get_price()); ?></div>
                        <div id="product-sale-price" class="feature-product-price sale-price"></div>
                    </div>
                    <h1 class="details-header">Description &amp; Details</h1>
                    <p class="details-text">
                        <?php echo esc_html($product->get_description()); ?>
                    </p>
                    <div class="feature-product-variants-block">
                        <div class="w-embed">

                        </div>
                    </div>
                    <a href="<?php echo esc_url($product->get_permalink()); ?>" class="learn-more-btn buy-now w-button" data-name="<?php echo esc_html($product->get_name()); ?>" data-id="<?php echo esc_html($product->get_id()); ?>" data-imageurl="<?php echo esc_url($product->get_image()); ?>" data-cartbutton="buy">BUY IT NOW</a>
                    <a href="#" data-name="<?php echo esc_html($product->get_name()); ?>" data-id="<?php echo esc_html($product->get_id()); ?>" data-imageurl="<?php echo esc_url($product->get_image()); ?>" data-variants-required="0" data-variant-1="" data-variant-1id="" data-variant-0="" data-variant-0id="" data-inventory="1000000" data-track-inventory="false" data-price="<?php echo esc_html($product->get_price()); ?>" data-weight="3.55555555555" data-cartbutton="cart" data-quantity="1" class="learn-more-btn w-button">ADD TO CART</a>
                    <div class="feature-product-details-block">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="feature-product-link">Full Details</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
