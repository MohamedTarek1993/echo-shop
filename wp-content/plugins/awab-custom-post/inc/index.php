<?php

if (!function_exists('wpc_load_wppost_translation')) {
    function wpc_load_wppost_translation()
    {
        load_plugin_textdomain('awab-custom-posts', false, basename(dirname(__FILE__)) . '/languages/');
    }
    add_action('plugins_loaded', 'wpc_load_wppost_translation');
}

if (!function_exists('wpc_enque_style')) {
    function wpc_enque_style()
    {
        wp_enqueue_style('post-popular-views-style', plugin_dir_url(__FILE__) . 'assets/css/custom-post.css');

        wp_enqueue_script('post-popular-views-script', plugin_dir_url(__FILE__) . 'assets/js/custom-post.js', [], null, true);
    }

    add_action('wp_enqueue_scripts', 'wpc_enque_style');
}