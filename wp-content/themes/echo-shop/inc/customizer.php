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

	/**
	 * 
	 * 
	 * Add theme settings in customize dashboard
	 * 
	 */
	$wp_customize->add_panel('theme_settings', [
		'title' => esc_html__('Themes Settings', 'echo-shop'),
		'description' => esc_html__('This Section about Theme Settings', 'echo-shop'),
		'priority' => 65,

	]);

	/**
	 * Add header settings
	 */
	$wp_customize->add_section('header_settings', [
		'title' => esc_html__('Header Settings', 'echo-shop'),
		'description' => esc_html__('This Section about Header Setings', 'echo-shop'),
		'priority' => 15,
		"panel"    => 'theme_settings'
	]);

	/**
	 * Add footer settings
	 */
	$wp_customize->add_section('footer_settings', [
		'title' => esc_html__('Footer Settings', 'echo-shop'),
		'description' => esc_html__('This Section about Footer Setings', 'echo-shop'),
		'priority' => 115,
		"panel"    => 'theme_settings'
	]);

	// Copyrights footer
	$wp_customize->add_setting('footer_copy_rights', [
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'transport' => 'postMessage',
	]);
	$wp_customize->selective_refresh->add_partial('footer_copy_rights', [
		'selector' => '.copy_rights_footer', //section contain footer pargraphe
		'container_inclusive' => false,
		'render_callback' => function () {
			echo get_theme_mod('footer_copy_rights', '');
		}
	]);
	$wp_customize->add_control('footer_copy_rights', [
		'type' => 'text',
		'section' => 'footer_settings',
		'label' => esc_html__('Copyrights Text', 'echo-shop'),
		'priority'       => 4,
	]);

	
}
add_action('customize_register', 'echo_shop_customize_register');

