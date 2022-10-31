<?php

/**
 * include widgets files .
 */



require 'sidebars.php';
require 'recent-posts.php';
require 'search.php';
require 'instgramme.php';
require 'categories.php';
require 'tags.php';



add_action('widgets_init', function () {
    register_widget('Echo_Posts_Popular');
    register_widget('Echo_Search');
    register_widget('Echo_Instagram');
    register_widget('Echo_Categories');
    register_widget('Echo_Tags');
});
