<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Best Sellers Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class Best_Sellers_Widget extends \Elementor\Widget_Base
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
        return 'best-sellers';
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
        return __('Best Sellers - Karlha', 'karlhawptheme');
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

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Our Best Sellers', 'karlhawptheme'),
            ]
        );

        //link
        $this->add_control(
            'link',
            [
                'label' => __('Link', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
            ]
        );

        //link text
        $this->add_control(
            'link_text',
            [
                'label' => __('Link Text', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Learn More', 'karlhawptheme'),
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
        //get best sellers
        $products = wc_get_products(array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'orderby' => 'meta_value_num',
            'meta_key' => 'total_sales',
            'order' => 'DESC'
        ));
?>
        <div class="best-sellers-section">
            <h1 class="best-sellers-header"><?php echo esc_html($settings['title']); ?></h1>
            <div id="products-container">
                <div class="products-wrapper-block">
                    <?php foreach ($products as $product) :
                        $product_image = get_the_post_thumbnail_url($product->get_id());
                    ?>
                        <div class="product-listing-block">
                            <a href="<?php echo esc_url($product->get_permalink()); ?>" class="product-image-overlay w-inline-block">
                                <div class="product-display-box"><img loading="lazy" alt="" class="product-image" src="<?php echo esc_url($product_image); ?>"></div>
                            </a>
                            <h1 class="product-name"><?php echo esc_html($product->get_name()); ?></h1>
                            <div class="product-listing-price-block">
                                <div class="product-listing-price price"><?php echo wc_price($product->get_price()); ?></div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="view-more-btn-block"><a class="view-more-btn w-button" href="<?php echo esc_url($settings['link']['url']); ?>"><?php echo esc_html($settings['link_text']); ?></a></div>
        </div>
<?php
    }
}
