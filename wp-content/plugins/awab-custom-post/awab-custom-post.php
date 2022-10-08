<?php

/**
 * Plugin Name: Awab Custom Posts
 * Plugin URI: http://mohammed-tarek.top/
 * Description: This Plugin For Make Custom Posts.
 * Version: 1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * License:           GPL
 * Author: Mohammed Tarek
 * Author URI: http://mohammed-tarek.top/
 * Text domain : awab-custom-posts
 * Domain Path:       /languages
 
 **/


if (!defined('ABSPATH')) :
    die('You Cant Access This File');

endif;


require plugin_dir_path(__FILE__)  . 'inc/index.php';
require plugin_dir_path(__FILE__)  . 'inc/awab-events.php';
