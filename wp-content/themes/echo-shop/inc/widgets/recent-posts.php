<?php

class Echo_Posts_Popular extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    function __construct()
    {
        parent::__construct(
            'echo_popular_posts', // Base ID
            esc_html__('Echo shop Post List', 'echo-shop'), // Name
            array(
                'description' => esc_html__('This for arrange post with time or view', 'echo-shop'),
                'customize_selective_refresh' => true,
            ) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    function widget($args, $instance)
    {
        // outputs the content of the widget

        echo $args['before_widget'];


        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        $option = [];
        if (isset($instance['orderby']) && $instance['orderby'] == 'post_views') {
            $option['orderby'] = 'meta_value_num';
            $option['meta_key'] = 'wpc_post_views';
        } elseif (isset($instance['orderby']) && $instance['orderby'] == 'post_date') {
            $option['orderby'] = 'date';
        }
        if (isset($instance['order'])) {
            $option['order'] = $instance['order'];
        }
        if (isset($instance['posts_count'])) {
            $option['numberposts'] = $instance['posts_count'];
        }
        $popular_posts = get_posts($option);


        if (count($popular_posts)) {

            // start foreach
            foreach ($popular_posts as $post) { ?>
                <!-- content  -->
                <div class="sidebar__widget_content">

                    <a href="<?php echo get_permalink($post); ?>">
                        <div class="img">
                            <?php echo get_the_post_thumbnail($post, 'thumbnail', ['class' => 'img-fluid']); ?>
                        </div>
                        <div class="text">
                            <h5>
                                <a class="text_head"><?php echo $post->post_title; ?> </a>
                            </h5>

                            <span class="text_date">
                                <?php
                                if (isset($instance['alt_content']) && $instance['alt_content'] == 'post_views') { ?>
                                    <i class="bi bi-eye"></i> <?php echo ((int)get_post_meta($post->ID, 'wpc_post_views', true)); ?>
                                <?php
                                } else {
                                    echo get_the_date('d M, Y', $post);
                                }
                                ?>
                            </span>
                        </div>
                    </a>
                </div>
                <!-- content  -->

        <?php
            } // finish foreach

        }

        echo $args['after_widget'];
    }

    /* Back-end widget form.
*
* @see WP_Widget::form()
*
* @param array $instance Previously saved values from database.
*/
    function form($instance)
    {
        //title widget
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Popular Posts', 'echo-shop');
        //title widget

        //post count
        $posts_count = !empty($instance['posts_count']) ? $instance['posts_count'] : 4;
        //post count

        // field type content in widget
        $alt_content = !empty($instance['alt_content']) ? $instance['alt_content'] : 'post_date';

        // field type content in widget

        // field order by content in widget
        $orderby = !empty($instance['orderby']) ? $instance['orderby'] : 'post_views';
        // field order by content in widget


        // field order  content in widget
        $order = !empty($instance['order']) ? $instance['order'] : 'desc';
        // field order content in widget





        ?>

        <!-- title widget label -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'echo-shop'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <!-- title widget label -->

        <!-- title post count -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('posts_count')); ?>"><?php esc_attr_e('Post Count:', 'echo-shop'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('posts_count')); ?>" name="<?php echo esc_attr($this->get_field_name('posts_count')); ?>" type="number" value="<?php echo esc_attr($posts_count); ?>">
        </p>
        <!-- title post count -->

        <!-- field type content in widget -->
        <p>
            <label for="<?php echo $this->get_field_id('alt_content'); ?>"> <?php esc_attr_e('Type Of Content:', 'echo-shop'); ?></label>
            <select id="<?php echo $this->get_field_id('alt_content'); ?>" name="<?php echo $this->get_field_name('alt_content'); ?>">
                <option value="post_date" <?php echo ($alt_content == 'post_date') ? 'selected' : ''; ?>> <?php esc_attr_e('Post Date', 'echo-shop'); ?></option>
                <option value="post_views" <?php echo ($alt_content == 'post_views') ? 'selected' : ''; ?>> <?php esc_attr_e('Post Views', 'echo-shop'); ?> </option>
            </select>
        </p>
        <!-- field type content in widget -->
        <!-- field  content in widget -->
        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order By', 'echo-shop'); ?></label>
            <select name="<?php echo $this->get_field_name('orderby') ?>" id="<?php echo $this->get_field_id('orderby'); ?>">
                <option value="post_date" <?php echo ($orderby == 'post_date') ? 'selected' : ''; ?>><?php _e('Post date', 'echo-shop'); ?></option>
                <option value="post_views" <?php echo ($orderby == 'post_views') ? 'selected' : ''; ?>><?php _e('Post views', 'echo-shop'); ?></option>
            </select>
        </p>
        <!-- field order by content in widget -->

        <!-- field order content in widget -->
        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'echo-shop'); ?></label>
            <select name="<?php echo $this->get_field_name('order') ?>" id="<?php echo $this->get_field_id('order'); ?>">
                <option value="desc" <?php echo ($order == 'desc') ? 'selected' : ''; ?>><?php _e('DESC', 'echo-shop'); ?></option>
                <option value="asc" <?php echo ($order == 'asc') ? 'selected' : ''; ?>><?php _e('ASC', 'echo-shop'); ?></option>
            </select>
        </p>
        <!-- field order content in widget -->

<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    function update($new_instance, $old_instance)
    {
        $new_data = [];
        //title widget
        $new_data['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : $old_instance['title'];

        //title widget

        //post count
        $new_data['posts_count'] = (isset($new_instance['posts_count']) && is_numeric($new_instance['posts_count'])
            && $new_instance['posts_count'] > 0) ? ((int)($new_instance['posts_count'])) : $old_instance['posts_count'];
        //post count

        // field type content in widget
        $new_data['alt_content'] = (in_array($new_instance['alt_content'], ['post_views', 'post_date'])) ? $new_instance['alt_content'] : $old_instance['alt_content'];
        // field type content in widget

        // field order by  content in widget
        $new_data['orderby'] = (in_array($new_instance['orderby'], ['post_views', 'post_date'])) ? $new_instance['orderby'] : $old_instance['orderby'];
        // field order  by content in widget

        // field order  content in widget
        $new_data['order'] = (in_array($new_instance['order'], ['desc', 'asc'])) ? $new_instance['order'] : $old_instance['order'];
        // field order  content in widget
        return  $new_data;
    }
} //end class Ci_Posts_Popular
