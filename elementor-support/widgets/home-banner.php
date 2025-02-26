<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Home Banner Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class Home_Banner_Widget extends \Elementor\Widget_Base
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
        return 'home-banner';
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
        return __('Home Banner', 'karlhawptheme');
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

        //background image
        $this->add_control(
            'background_image',
            [
                'label' => __('Background Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Embrace a world of endless expressions..', 'karlhawptheme'),
                'label_block' => true,
            ]
        );

        //description
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Enhance your glory with elegance & class while captivating an audience with the presence of our timeless pieces. From a wide range of earrings, necklaces, rings, and many more extravagant adornments you’ll discover a poetic fusion of innovative, revolutionary, and unique gems incorporated with brilliance individually crafted just for you..', 'karlhawptheme'),
                'label_block' => true, //allow line breaks
            ]
        );

        //button text
        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Shop Now', 'karlhawptheme'),
                'label_block' => true,
            ]
        );

        //button link
        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        //bg background color for button
        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Button Background Color', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .home-hero-cta' => 'background: {{VALUE}}',
                ],
            ]
        );

        //bg text color for button
        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-hero-cta' => 'color: {{VALUE}}',
                ],
            ]
        );

        //hover bg color for button
        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Button Hover Background Color', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .home-hero-cta:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        //hover text color for button
        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Button Hover Text Color', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home-hero-cta:hover' => 'color: {{VALUE}}',
                ],
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
?>
        <div class="home-banner-section" style="background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url(<?php echo esc_url($settings['background_image']['url']); ?>);">
            <div class="hero-text-wrapper">
                <h1 class="home-hero-header" data-w-id="36f626cd-e596-ff25-2ddb-fa311a28d675"><span style="caret-color: rgba(0, 0, 0, 0.847); color: rgba(0, 0, 0, 0.847); font-family: &quot;Times New Roman&quot;, &quot;Times New Roman_EmbeddedFont&quot;, &quot;Times New Roman_MSFontService&quot;, serif; font-size: 18.66666603088379px;"><i>
                            <h3><?php echo esc_html($settings['title']); ?></h3>
                        </i></span></h1>
                <div class="home-hero-text" data-w-id="93d9c505-0300-0c98-2c7a-6d7398a5d46c">
                    <div class="OutlineElement Ltr  BCX4 SCXW160449235" style="margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; overflow: visible; cursor: text; clear: both; position: relative; direction: ltr; caret-color: rgba(0, 0, 0, 0.847); color: rgba(0, 0, 0, 0.847); font-family: &quot;Segoe UI&quot;, &quot;Segoe UI Web&quot;, Arial, Verdana, sans-serif; font-size: 12px;">
                        <div><span data-contrast="auto" xml:lang="EN-US" lang="EN-US" class="TextRun SCXW160449235 BCX4" style="margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; font-size: 14pt; line-height: 23.741666666666667px; font-family: &quot;Times New Roman&quot;, &quot;Times New Roman_EmbeddedFont&quot;, &quot;Times New Roman_MSFontService&quot;, serif; font-variant-ligatures: none !important; -webkit-nbsp-mode: normal !important;"><span class="NormalTextRun SCXW160449235 BCX4" style="margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; -webkit-nbsp-mode: normal !important;"><?php echo wp_kses_post($settings['description']); ?></span></span></div>
                        <div><br></div>
                    </div>
                </div>
                <a class="home-hero-cta" data-w-id="19ddc289-1245-eb60-013b-c2d1715b644f" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo esc_html($settings['button_text']); ?></a>
            </div>
        </div>
<?php
    }
}
