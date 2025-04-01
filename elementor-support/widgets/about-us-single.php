<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * About Us Single Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class About_Us_Single_Widget extends \Elementor\Widget_Base
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
        return 'about-us-single';
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
        return __('About Us Single - Karlha', 'karlhawptheme');
    }

    /**
     * Get widget icon.
     *
     * Retrieve About Us Widget icon.
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
     * Retrieve the list of categories the About Us Single Widget belongs to.
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

        //image
        $this->add_control(
            'banner_image',
            [
                'label' => __('Banner Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        //title
        $this->add_control(
            'section_1_title',
            [
                'label' => __('Section 1 Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('About Us', 'karlhawptheme'),
            ]
        );

        //description
        $this->add_control(
            'section_1_description',
            [
                'label' => __('Section 1 Description', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Karlha strives to provide affordable, chic yet sophisticated pieces to elevate and compliment the style of every unique costumer .<br>',
            ]
        );

        //section 1 image
        $this->add_control(
            'section_1_image',
            [
                'label' => __('Section 1 Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        //section 2 title
        $this->add_control(
            'section_2_title',
            [
                'label' => __('Section 2 Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('The Karlha Experience', 'karlhawptheme'),
            ]
        );

        //section 2 description
        $this->add_control(
            'section_2_description',
            [
                'label' => __('Section 2 Description', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat. Aenean faucibus nibh et justo cursus id rutrum lorem imperdiet. Nunc ut sem vitae risus tristique posuere. Excepteur sint occaecat cupidatat non proident, sunt in culpar qui officia deserunt mollit anim id est laborum.',
            ]
        );

        //section 2 image
        $this->add_control(
            'section_2_image',
            [
                'label' => __('Section 2 Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
        <div>
            <div class="about-banner-section" style="background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url(<?php echo esc_url($settings['banner_image']['url']); ?>);"></div>
            <div class="about-details-section">
                <div class="details-wrapper-block">
                    <div class="description-block">
                        <div class="text-block">
                            <h1 class="text-block-header"><?php echo esc_html($settings['section_1_title']); ?></h1>
                            <div class="about-details-text">
                                <div><?php echo wp_kses_post($settings['section_1_description']); ?></div>
                            </div>
                        </div>
                        <div class="display-wrapper" style="background-image: url(<?php echo esc_url($settings['section_1_image']['url']); ?>);">
                            <div class="display-image-block"><img class="display-image" loading="lazy" alt="" src="<?php echo esc_url($settings['section_1_image']['url']); ?>" style="opacity: 1; transition: opacity 1s;"></div>
                        </div>
                    </div>
                    <div class="description-block">
                        <div class="text-block black-box">
                            <h1 class="text-block-header white-box"><?php echo esc_html($settings['section_2_title']); ?></h1>
                            <p class="about-details-text white-box"><?php echo wp_kses_post($settings['section_2_description']); ?></p>
                        </div>
                        <div class="display-wrapper second-box" style="background-image: url(<?php echo esc_url($settings['section_2_image']['url']); ?>);">
                            <div class="display-image-block second-box"><img class="display-image" loading="lazy" alt="" src="<?php echo esc_url($settings['section_2_image']['url']); ?>" style="opacity: 1; transition: opacity 1s;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
