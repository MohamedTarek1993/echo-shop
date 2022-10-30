<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pick_up_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar Blog', 'echo-shop'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here in blog page.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar__widget_title"> <h5>',
			'after_title'   => '</h5></div>',
		));
  
  register_sidebar(
		array(
			'name'          => esc_html__('Sidebar Single Blog', 'echo-shop'),
			'id'            => 'sidebar-4',
			'description'   => esc_html__('Add widgets here in single blog.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar__widget_title"> <h5>',
			'after_title'   => '</h5></div>',
		));
  
   register_sidebar(
		array(
			'name'          => esc_html__('Sidebar Archieve', 'echo-shop'),
			'id'            => 'sidebar-5',
			'description'   => esc_html__('Add widgets here in archieve page.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar__widget_title"> <h5>',
			'after_title'   => '</h5></div>',
		));
  
   register_sidebar(
		array(
			'name'          => esc_html__('Sidebar Search Page', 'echo-shop'),
			'id'            => 'sidebar-6',
			'description'   => esc_html__('Add widgets here in search page.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="sidebar__widget_title"> <h5>',
			'after_title'   => '</h5></div>',
		));
  
  
      	register_sidebar(
      array(
			'name'          => esc_html__('Sidebar Footer 1', 'echo-shop'),
			'id'            => 'sidebar-2',
			'description'   => esc_html__('Add Popular post here.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="header_footer">',
			'after_title'   => '</h2>',
		)
	);
    	register_sidebar(
      array(
			'name'          => esc_html__('Sidebar Footer 2', 'echo-shop'),
			'id'            => 'sidebar-3',
			'description'   => esc_html__('Add Category here.', 'echo-shop'),
			'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="header_footer">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			  'name'          => esc_html__('Sidebar Shop', 'echo-shop'),
			  'id'            => 'sidebar-shop',
			  'description'   => esc_html__('Add widgets for shop page.', 'echo-shop'),
			  'before_widget' => '<div id="%1$s" class="sidebar__widget %2$s">',
			  'after_widget'  => '</div>',
			  'before_title'  => '<div class="sidebar__widget_title"> <h5>',
			  'after_title'   => '</h5></div>',
		  )
	  );
 
}
add_action('widgets_init', 'pick_up_widgets_init');