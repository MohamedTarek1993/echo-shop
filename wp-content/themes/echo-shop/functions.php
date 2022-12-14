<?php

/**
 * Echo-shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Echo-shop
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function echo_shop_setup()
{
	/*++
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Echo-shop, use a find and replace
		* to change 'echo-shop' to the name of your theme in all the template files.
		*/
	$textdomain = 'echo-shop';
	load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages'); //child theme
	load_theme_textdomain($textdomain, get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'echo-shop'),
		)
	);

	function get_menu($location, $class)
	{
		wp_nav_menu(array(
			'theme_location'  => $location,
			'menu_class'   =>  $class,
			'depth'           => 3, // 1 = no dropdowns, 2 = with dropdowns.
			'container'       => '',
			'menu_class'      => 'navbar-nav',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),


		));
	}

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'echo_shop_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Set up the WordPress image custom size.
	add_image_size('hero_slider', 1920, 800, array('center', 'center'));
	add_image_size('blog-img', 458, 260, array('center', 'center'));
	add_image_size('archieve-img', 1920, 500, array('center', 'center'));



	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);


	/**
	 * Register Custom Navigation Walker
	 */

	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'echo_shop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function echo_shop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('echo_shop_content_width', 640);
}
add_action('after_setup_theme', 'echo_shop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function echo_shop_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'echo-shop'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'echo-shop'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'echo_shop_widgets_init');






/**
 * Enqueue scripts and styles.
 */
$base = get_template_directory_uri() . '/';

function echo_shop_scripts()
{

	global $base;

	wp_enqueue_style('echo-shop-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('echo-shop-style', 'rtl', 'replace');

	wp_enqueue_style('boostrap-style', $base . 'assets/css/bootstrap.min.css', [], null);
	wp_enqueue_style('slider-style', $base . 'assets/css/swiper-demos.css', [], null);

	wp_enqueue_style('scsc-style', $base . 'assets/scss/main.min.css', [], null);




	wp_enqueue_script('echo-shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	//scripts
	wp_enqueue_script('jquery-script', $base . 'assets/js/jquery-3.5.1.min.js', [], null, true);
	wp_enqueue_script('boostrap-script', $base . 'assets/js/bootstrap.min.js', [], null, true);
	wp_enqueue_script('slider-script', $base . 'assets/js/swiper-demos.js', [], null, true);
	wp_enqueue_script('main-script', $base . 'assets/js/main.js', [], null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'echo_shop_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Widgets Folder.
 */
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/**
 * callback function comment.
 */
if (!function_exists('wpc_comment_callback')) {
	function wpc_comment_callback($comment, $args, $depth)
	{
		$tag = $args['style'] == 'div' ? 'div' : 'li';
?>
		<<?php echo $tag; ?> <?php comment_class('media'); ?> id="comment-<?php echo $comment->comment_ID; ?>">
			<?php if (get_option('show_avatars') == '1') { ?>
				<a href="#">
					<?php echo get_avatar($comment, $args['avatar_size'], false, false, ['class' => 'rounded-circle']) ?>
				</a>
			<?php } ?>
			<div class="media-body" id="comment-body-<?php echo $comment->comment_ID; ?>">
				<h4>
					<?php echo get_comment_author_link($comment); ?>
					<small><?php printf(
								/* translators: %s is a time difference */
								__('%s ago', 'echo-shop'),
								human_time_diff(get_comment_time('U'), current_time('U'))
							); ?></small>
				</h4>
				<p><?php comment_text(); ?></p>
				<?php
				comment_reply_link([
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
					'reply_text' => __('Reply', 'echo-shop'),
					'add_below' => 'comment-body',
				]);
				?>
			</div>
	<?php
	}
}


add_filter('comment_reply_link', function ($link) {
	return str_replace("class='", "class='btn", $link);
});
if (!function_exists('wpc_comments_pagination_attributes')) {
	add_filter('next_comments_link_attributes', 'wpc_comments_pagination_attributes');
	add_filter('previous_comments_link_attributes', 'wpc_comments_pagination_attributes');
	function wpc_comments_pagination_attributes()
	{
		return 'class="btn"';
	}
}
