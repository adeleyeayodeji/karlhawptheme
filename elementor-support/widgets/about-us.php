<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * About Us Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class About_Us_Widget extends \Elementor\Widget_Base
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
        return 'about-us';
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
        return __('About Us - Karlha', 'karlhawptheme');
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
     * Retrieve the list of categories the About Us Widget belongs to.
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
                'default' => __('The Karlha Experience', 'karlhawptheme'),
            ]
        );

        //repeater
        $repeater = new \Elementor\Repeater();

        //image
        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        //title
        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('About Us', 'karlhawptheme'),
            ]
        );

        //description
        $repeater->add_control(
            'description',
            [
                'label' => __('Description', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('About Us', 'karlhawptheme'),
            ]
        );

        //link
        $repeater->add_control(
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
        $repeater->add_control(
            'link_text',
            [
                'label' => __('Link Text', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Learn More', 'karlhawptheme'),
            ]
        );

        //add repeater
        $this->add_control(
            'items',
            [
                'label' => __('Items', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __('About Us', 'karlhawptheme'),
                        'image' => [
                            'url' => "https://ucarecdn.com/e9996beb-b62c-472b-84fa-21edbc112a94/-/format/auto/-/quality/smart_retina/-/preview/",
                        ],
                        'description' => __('Our aim is to provide affordable, chic yet sophisticated pieces to elevate and compliment the style of every unique costumer', 'karlhawptheme'),
                        'link' => [
                            'url' => '#'
                        ],
                        'link_text' => __('Learn More', 'karlhawptheme'),
                    ],
                    [
                        'title' => __('Karlha At Your Service', 'karlhawptheme'),
                        'image' => [
                            'url' => "https://ucarecdn.com/a2ddaefc-1f7d-4166-a403-eabe4d51ee0d/-/format/auto/-/quality/smart_retina/-/preview/",
                        ],
                        'description' => __('Lorem ipsum dolor sit amet, adipiscing elit, set tempor.', 'karlhawptheme'),
                        'link' => [
                            'url' => '#'
                        ],
                        'link_text' => __('Learn More', 'karlhawptheme'),
                    ],
                    [
                        'title' => __('Complimentary Shipping', 'karlhawptheme'),
                        'image' => [
                            'url' => "https://ucarecdn.com/af40e8c2-4182-4822-8b2b-9e9108bee5e0/-/format/auto/-/quality/smart_retina/-/preview/",
                        ],
                        'description' => __('Lorem ipsum dolor sit amet, adipiscing elit, set tempor.', 'karlhawptheme'),
                        'link' => [
                            'url' => '#'
                        ],
                        'link_text' => __('Learn More', 'karlhawptheme'),
                    ],
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
        <div class="the-karlha-experience-section">
            <h1 class="the-karlha-experience-header"><?php echo esc_html($settings['title']); ?></h1>
            <div class="details-wrapper">
                <?php foreach ($settings['items'] as $item) : ?>
                    <div class="services-wrapper">
                        <div class="services-display-block">
                            <img class="services-icon" loading="lazy" alt="" src="<?php echo esc_url($item['image']['url']); ?>">
                        </div>
                        <h1 class="sevices-type packaging">
                            <?php echo esc_html($item['title']); ?>
                        </h1>
                        <p class="services-description">
                            <?php echo esc_html($item['description']); ?>
                        </p>
                        <a class="services-link w-button" href="<?php echo esc_url($item['link']['url']); ?>">
                            <?php echo esc_html($item['link']['title']); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
<?php
    }
}
