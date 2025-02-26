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
        return __('Featured Product', 'karlhawptheme');
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

        //select product


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
?>
        <div class="home-featured-product" id="feature-title-block">
            <div class="main-box-first-box"></div>
            <h1 class="featured-product-header">Featured Product</h1>
            <div class="featured-product-wrapper">
                <div class="featured-product-display-wrapper">
                    <div class="featured-product-display-image-block">
                        <img id="main-image-1" loading="lazy" alt="" class="featured-product-display-image" src="https://ucarecdn.com/8d074f56-eae4-44f7-932a-deb51869a408/IMG_6172.png">
                    </div>
                </div>
                <div class="featured-product-text-wrapper">
                    <h1 class="featured-product-name">Nasira Crystal Clutch</h1>
                    <div class="feature-product-price-block">
                        <div id="product-price" class="feature-product-price price">₦340,000.00</div>
                        <div id="product-sale-price" class="feature-product-price sale-price"></div>
                    </div>
                    <h1 class="details-header">Description &amp; Details</h1>
                    <p class="details-text"></p>
                    <div class="feature-product-variants-block">
                        <div class="w-embed">

                        </div>
                    </div>
                    <a class="learn-more-btn buy-now w-button" data-name="Nasira Crystal Clutch" data-id="clutch-2" data-imageurl="https://ucarecdn.com/8d074f56-eae4-44f7-932a-deb51869a408/IMG_6172.png" data-variants-required="0" data-variant-1="" data-variant-1id="" data-variant-0="" data-variant-0id="" data-inventory="1000000" data-track-inventory="false" data-price="340000" data-weight="3.55555555555" data-cartbutton="buy">BUY IT NOW</a>
                    <a href="#" data-name="Nasira Crystal Clutch" data-id="clutch-2" data-imageurl="https://ucarecdn.com/8d074f56-eae4-44f7-932a-deb51869a408/IMG_6172.png" data-variants-required="0" data-variant-1="" data-variant-1id="" data-variant-0="" data-variant-0id="" data-inventory="1000000" data-track-inventory="false" data-price="340000" data-weight="3.55555555555" data-cartbutton="cart" data-quantity="1" class="learn-more-btn w-button">ADD TO CART</a>
                    <div class="feature-product-details-block">
                        <a href="/product/clutch-2" class="feature-product-link">Full Details</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
