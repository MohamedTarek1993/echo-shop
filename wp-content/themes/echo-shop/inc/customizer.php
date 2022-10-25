<?php

/**
 * Echo-shop Theme Customizer
 *
 * @package Echo-shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function echo_shop_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	/**
	 * 
	 * Add theme settings in customize dashboard
	 * 
	 */
	$wp_customize->add_panel('theme_settings', [
		'title' => __('Themes Settings', 'echo-shop'),
		'description' => __('This Section about Theme Settings', 'echo-shop'),
		'priority' => 35,

	]);

	/**
	 * Add header settings
	 */
	$wp_customize->add_section('header_settings', [
		'title' => __('Header Settings', 'echo-shop'),
		'description' => __('This Section about Header Setings', 'echo-shop'),
		'priority' => 15,
		"panel"    => 'theme_settings'
	]);

	/**
	 * Add footer settings
	 */
	$wp_customize->add_section('footer_settings', [
		'title' => __('Footer Settings', 'echo-shop'),
		'description' => __('This Section about Footer Setings', 'echo-shop'),
		'priority' => 115,
		"panel"    => 'theme_settings'
	]);

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'echo_shop_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'echo_shop_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'echo_shop_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function echo_shop_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function echo_shop_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function echo_shop_customize_preview_js()
{
	wp_enqueue_script('echo-shop-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'echo_shop_customize_preview_js');
