<?php
//check for security
if (!defined('ABSPATH')) {
    die('ABSPATH must be defined to access this file');
}

/**
 * Contact Elementor Widget
 * 
 * @access public
 * @since 1.0.0
 * @package Karlha
 * @author Adeleye Ayodeji
 * 
 */
class Contact_Widget extends \Elementor\Widget_Base
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
        return 'contact';
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
        return __('Contact - Karlha', 'karlhawptheme');
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
     * Retrieve the list of categories the Contact Widget belongs to.
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

        //banner image
        $this->add_control(
            'banner_image',
            [
                'label' => __('Banner Image', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://ucarecdn.com/bbdeac99-fec8-4fb2-93d5-0573ddbbf886/-/format/auto/-/quality/smart_retina/-/resize/3000x/',
                ],
            ]
        );

        //title
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Karlha at Your Service', 'karlhawptheme'),
            ]
        );

        //description
        $this->add_control(
            'description',
            [
                'label' => __('Description', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('At Karlha Jewels we aim to create an exceptionally outstanding shopping experience whether online or in our store. Let us help you turn your dreams into reality - your ideal fashion statement, a ring unique to you, a unique piece of jewellery made to celebrate any of life\'s wonderful milestones or an exquisite timepiece that reflects your values. Our experienced teams will be delighted to assist you through your journey from the initial idea to, finally, the piece of a lifetimewhether online or in our store. Let us help you turn your dreams into reality - your ideal fashion statement, a ring unique to you, a unique piece of jewellery made to celebrate any of life\'s wonderful milestones or an exquisite timepiece that reflects your values. Our experienced teams will be delighted to assist you through your journey from the initial idea to, finally, the piece of a lifetime', 'karlhawptheme'),
            ]
        );

        //contact title
        $this->add_control(
            'contact_title',
            [
                'label' => __('Contact Title', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Contact Us', 'karlhawptheme'),
            ]
        );

        //contact info
        $this->add_control(
            'contact_info',
            [
                'label' => __('Contact Info', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('jewels@karlha.com', 'karlhawptheme'),
            ]
        );

        //contact info 2
        $this->add_control(
            'contact_info_2',
            [
                'label' => __('Contact Info 2', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('@karlhajewels', 'karlhawptheme'),
            ]
        );

        //contact info 3
        $this->add_control(
            'contact_info_3',
            [
                'label' => __('Contact Info 3', 'karlhawptheme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('+2348113684758', 'karlhawptheme'),
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
            <div style="background-size: cover; background-position: center center; background-repeat: no-repeat; background-image: url('<?php echo esc_url($settings['banner_image']['url']); ?>');">
                <div class="contact-banner-section" style="padding-top: 5%;background-color: rgb(0 0 0 / 64%);height: auto;
    padding-bottom: 6%;">
                    <div class="contact-banner-text-wrapper">
                        <h1 class="contact-banner-header"><?php echo $settings['title']; ?></h1>
                        <div class="OutlineElement Ltr  BCX4 SCXW132358167" style="margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; overflow: visible; cursor: text; clear: both; position: relative; direction: ltr; caret-color: rgba(0, 0, 0, 0.847); color: rgba(0, 0, 0, 0.847); font-family: 'Segoe UI', 'Segoe UI Web', Arial, Verdana, sans-serif; font-size: 12px;">
                            <div class="OutlineElement Ltr  BCX4 SCXW201590575" style="font-weight: normal; margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; overflow: visible; cursor: text; clear: both; position: relative; direction: ltr; font-size: 12px;">
                                <span data-contrast="auto" xml:lang="EN-US" lang="EN-US" class="TextRun SCXW201590575 BCX4" style="margin: 0px; padding: 0px; -webkit-user-select: text; -webkit-user-drag: none; color: rgba(252, 252, 252, 0.85); font-size: 12pt; line-height: 19.424999999999997px; font-family: 'Times New Roman', 'Times New Roman_EmbeddedFont', 'Times New Roman_MSFontService', serif; font-variant-ligatures: none !important; -webkit-nbsp-mode: normal !important;line-height: 45px;">
                                    <?php echo $settings['description']; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-details-section">
                <h1 class="contact-details-header"><?php echo $settings['contact_title']; ?></h1>
                <div class="contact-info-wrapper">
                    <div class="info-block"><a class="info-link-block email w-inline-block" href="mailto:<?php echo $settings['contact_info']; ?>"><img class="info-icon email" loading="lazy" alt="" src="https://ucarecdn.com/97c2a83c-90e1-49e3-9d66-241dfe4ee376/-/format/auto/-/quality/smart_retina/-/resize/100x/" style="">
                            <div class="info-details"><?php echo $settings['contact_info']; ?></div>
                        </a><a class="info-link-block w-inline-block" href="https://www.instagram.com/<?php echo $settings['contact_info_2']; ?>/"><img class="info-icon" src="https://ucarecdn.com/d7247ae1-c0e2-47cf-b946-f5ab0ddac340/Instagram.png" style="width: 50px;height: 50px;" loading="lazy" alt="">
                            <div class="info-details"><?php echo $settings['contact_info_2']; ?></div>
                        </a><a class="info-link-block w-inline-block" href="tel:<?php echo $settings['contact_info_3']; ?>"><img class="info-icon" loading="lazy" alt="" src="https://ucarecdn.com/0143fb4f-0b3a-4746-a726-9180e75def23/-/format/auto/-/quality/smart_retina/-/resize/x100/" style="width: 50px;height: 50px;">
                            <div class="info-details"><?php echo $settings['contact_info_3']; ?></div>
                        </a></div>
                </div>
            </div>
        </div>
<?php
    }
}
