<?php
//check for security
if (!defined('ABSPATH')) {
    exit('Direct script access denied.');
}
?>

<div class="notice notice-error">
    <p style="font-weight: bold;"><?php _e('Karlhawp requires Elementor to be installed and activated.', 'karlhawp'); ?></p>
    <p>
        <?php
        //get available plugins
        $plugins = get_plugins();
        //check if plugin is installed and not activated
        if (isset($plugins['elementor/elementor.php']) && !is_plugin_active('elementor/elementor.php')) {
            //activate plugin
        ?>
            <a href="<?php echo esc_url(wp_nonce_url(self_admin_url('plugins.php?action=activate&plugin=elementor/elementor.php'), 'activate-plugin_elementor/elementor.php')); ?>" class="karlhawp-importer-activate"><?php _e('Activate Elementor', 'karlhawp'); ?></a>
        <?php
        } else if (!isset($plugins['elementor/elementor.php'])) {
            //install plugin
        ?>
            <a href="<?php echo esc_url(wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor')); ?>" class="karlhawp-importer-install"><?php _e('Install Elementor', 'karlhawp'); ?></a>
        <?php
        }
        ?>
    </p>
</div>