<?php
function echo_shop_post_type_init()
{
    //Slider offer type
    register_post_type('slider-offer', array(
        'show_in_rest' => true,

        'supports' => array('title',),
        'public'   => true,
        'labels'   => array(
            'name'                 => esc_html__('Slider Offer', 'awab-custom-posts'),
            'singular_name '     => esc_html__(' All Slider Offer', 'awab-custom-posts'),
            'add_new'              => esc_html__('Add New Sliders', 'awab-custom-posts'),
            'add_new_item'          => esc_html__('Add New Slider', 'awab-custom-posts'),
            'edit_item '          => esc_html__('Edit Slider', 'awab-custom-posts'),
            'new_item  '          => esc_html__('New Slider', 'awab-custom-posts'),
            'view_item  '          => esc_html__('View Slider', 'awab-custom-posts'),
            'view_items '          => esc_html__('View Sliders', 'awab-custom-posts'),
            'search_items'          => esc_html__('Search Sliders', 'awab-custom-posts'),
            'edit_item '           => esc_html__('Edit Slider', 'awab-custom-posts'),
            'not_found '          => esc_html__('Not Found Slider', 'awab-custom-posts'),
            'item_updated '         => esc_html__('Update Slider', 'awab-custom-posts'),
        ),
        'description' => esc_html__('This for add image for Sliders in offer section', 'awab-custom-posts'),
        'label' => esc_html__('Slider offer Section', 'awab-custom-posts'),
        'menu_icon' => 'dashicons-slides',
        'menu_position'  => 20,
    ));

    //Slider post type
    register_post_type('slider-hero', array(
        'show_in_rest' => true,

        'supports' => array('title', 'thumbnail'),
        'public'   => true,
        'labels'   => array(
            'name'                 => esc_html__('Slider Hero', 'awab-custom-posts'),
            'singular_name '     => esc_html__('All Slider Hero', 'awab-custom-posts'),
            'add_new'              => esc_html__('Add New Sliders', 'awab-custom-posts'),
            'add_new_item'          => esc_html__('Add New Slider', 'awab-custom-posts'),
            'edit_item '          => esc_html__('Edit Slider', 'awab-custom-posts'),
            'new_item  '          => esc_html__('New Slider', 'awab-custom-posts'),
            'view_item  '          => esc_html__('View Slider', 'awab-custom-posts'),
            'view_items '          => esc_html__('View Sliders', 'awab-custom-posts'),
            'search_items'          => esc_html__('Search Sliders', 'awab-custom-posts'),
            'edit_item '           => esc_html__('Edit Slider', 'awab-custom-posts'),
            'not_found '          => esc_html__('Not Found Slider', 'awab-custom-posts'),
            'item_updated '         => esc_html__('Update Slider', 'awab-custom-posts'),
        ),
        'description' => esc_html__('This for add image for Sliders', 'awab-custom-posts'),
        'label' => esc_html__('Slider Hero Section', 'awab-custom-posts'),
        'menu_icon' => 'dashicons-slides',
        'menu_position'  => 20,
    ));
}

add_action('init', 'echo_shop_post_type_init');
