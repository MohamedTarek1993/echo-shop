<?php

class Echo_Tags extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'echo_tages_widget',
            __('Echo Shop Tags', 'echo-shop'),
            [
                'description' => __('This widget creates a tag list.', 'echo-shop'),
                'customize_selective_refresh' => true,
            ]
        );
    }
    function widget($args, $instance)
    {
        echo $args['before_widget'];
        $title = apply_filters('widget_title', $instance['title']);
        if (!empty($title)) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
?>

        <div class="sidebar__widget_tags">
            <?php
            $popular_tages = get_terms([
                'taxonomy' => 'post_tag',
                'orderby' => 'date',
                'order' => 'DESC',
                'hide_empty' => true
            ]);
            if (is_array($popular_tages)) {
                foreach ($popular_tages as $tag) {
                    echo '<a href="'. get_term_link($tag) .'">'. $tag->name .'</a>';
                }
            }
            ?>
        </div>
        <!-- end -widget -->
    <?php
        echo $args['after_widget'];
    }
    function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Popular Tages', 'echo-shop');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Widget Title', 'echo-shop'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
<?php
    }
    function update($new_instance, $old_instance)
    {
        $new_data = [];
        if (!empty($new_instance['title'])) {
            $new_data['title'] = strip_tags($new_instance['title']);
        } else {
            $new_data['title'] = $old_instance['title'];
        }
        return $new_data;
    }
}
