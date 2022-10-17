<?php

/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Echo-shop
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function echo_shop_woocommerce_setup()
{
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 255,
			'single_image_width'    => 255,
			'product_grid'          => array(
				'default_rows'    => 10,
				'min_rows'        => 5,
				'max_rows'        => 10,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');

	if (!isset($content_width)) {
		$content_width = 600;
	}
}
add_action('after_setup_theme', 'echo_shop_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function echo_shop_woocommerce_scripts()
{
	wp_enqueue_style('echo-shop-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style('echo-shop-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'echo_shop_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function echo_shop_woocommerce_active_body_class($classes)
{
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter('body_class', 'echo_shop_woocommerce_active_body_class');




/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function echo_shop_woocommerce_related_products_args($args)
{
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args($defaults, $args);

	return $args;
}
add_filter('woocommerce_output_related_products_args', 'echo_shop_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('echo_shop_woocommerce_wrapper_before')) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function echo_shop_woocommerce_wrapper_before()
	{
?>
		<div id="primary" class="site_main_eccommerce">
		<?php
	}
}
add_action('woocommerce_before_main_content', 'echo_shop_woocommerce_wrapper_before');

if (!function_exists('echo_shop_woocommerce_wrapper_after')) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function echo_shop_woocommerce_wrapper_after()
	{
		?>
		</div><!-- #main -->
	<?php
	}
}
add_action('woocommerce_after_main_content', 'echo_shop_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'echo_shop_woocommerce_header_cart' ) ) {
			echo_shop_woocommerce_header_cart();
		}
	?>
 */

if (!function_exists('echo_shop_woocommerce_cart_link_fragment')) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function echo_shop_woocommerce_cart_link_fragment($fragments)
	{
		ob_start();
		echo_shop_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter('woocommerce_add_to_cart_fragments', 'echo_shop_woocommerce_cart_link_fragment');

if (!function_exists('echo_shop_woocommerce_cart_link')) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function echo_shop_woocommerce_cart_link()
	{
	?>
		<a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'echo-shop'); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'echo-shop'),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
		</a>
	<?php
	}
}

if (!function_exists('echo_shop_woocommerce_header_cart')) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function echo_shop_woocommerce_header_cart()
	{
		if (is_cart()) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
	?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr($class); ?>">
				<?php echo_shop_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget('WC_Widget_Cart', $instance);
				?>
			</li>
		</ul>
<?php
	}
}

/**
 * 
 *
 * add class in archieve-producrt for shop page
 * add col class for sidebar and product area
 *
 * @return void
 */
function echo_woocmmerce_modfied()
{
	add_action('woocommerce_before_main_content', 'echo_woocommerce_open_section', 5);

	function echo_woocommerce_open_section()
	{
		echo '<section class="echo_shop_section_card"><div class="container"><div class="row">';
	}

	add_action('woocommerce_after_main_content', 'echo_woocommerce_close_section', 5);

	function echo_woocommerce_close_section()
	{
		echo '</div>  </div> </section> ';
	}

	//side bar

	//remove sidebar from orginal position
	remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

	if (is_shop()) {
		//add sidebar from inside col
		add_action('woocommerce_before_main_content', 'echo_sidbar_add_col', 6);
		function echo_sidbar_add_col()
		{
			echo '<div class="col-lg-3 col-md-4 col-12 order-2 order-md-1">';
		}

		add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);

		add_action('woocommerce_before_main_content', 'echo_sidbar_close_col', 7);
		function echo_sidbar_close_col()
		{
			echo ' </div>';
		}
	}

	//side bar

	//product area
	add_action('woocommerce_before_main_content', 'echo_product_add_col', 8);

	function echo_product_add_col()
	{
		if (is_shop()) {
			echo '<div class="col-lg-9 col-md-8 col-12 order-1 order-md-2">';
		} else {
			echo '<div class="col-12">';
		}
	}

	add_action('woocommerce_after_main_content', 'echo_product_close_col', 4);

	function echo_product_close_col()
	{
		echo ' </div>';
	}
	//product area	
}
add_action('wp', 'echo_woocmmerce_modfied');


/**
 * not found page .
 *
 * Displayed  a not found page style and not found mesaage.
 *
 * @return void
 */

add_action('woocommerce_no_products_found', 'featured_products_on_not_found', 9);
function featured_products_on_not_found()
{
	remove_action('woocommerce_no_products_found', 'wc_no_products_found', 10);

	// HERE change your message below
	$message = __('No products were found matching your selection. Although... You may be interested in these products', 'echo-shop');

	echo '<p class="woocommerce-info-not-found">' . $message . '</p>';
	echo '<div class="woocomerce_products_not_found">';
	echo do_shortcode('[featured_products  limit =8 column=4]'); // Here goes your shortcode
	echo '</div>';
}

/**
 * 
 *
 * Disable Woocommerce Analytics & other bloat
 *
 * @return void
 */
add_filter('woocommerce_admin_disabled', '__return_true');


// You can use all Woocommerce shortcodes here below. See available shortcodes here https://docs.woocommerce.com/document/woocommerce-shortcodes/
