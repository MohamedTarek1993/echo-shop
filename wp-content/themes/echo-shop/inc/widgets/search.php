<?php

class Echo_Search extends WP_Widget
{
    /**
     * Sets up the widgets name etc
     */
    function __construct()
    {
        parent::__construct(
            'echo_search', // Base ID
            esc_html__('Echo Shop Search', 'echo-shop'), // Name
            array('description' => esc_html__('This for Search', 'echo-shop'),
             'customize_selective_refresh' => true,) // Args
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

        echo $args['before_widget'];

?>
        <form class="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" class="form-control" placeholder="<?php echo esc_attr($instance['placeholder']) ?>">
                <button type="submit" class="btn">
                    <span class="icon_search">
                        <i class="bi bi-search"></i>
                    </span>
                </button>
            </div>
        </form>
    <?php

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


        //placeholder widget
        $placeholder = !empty($instance['placeholder']) ? $instance['placeholder'] : esc_html__('search...', 'echo-shop');
        //placeholder widget
    ?>


        <!-- placeholder widget label -->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('placeholder')); ?>"><?php esc_attr_e('Placeholder:', 'echo-shop'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('placeholder')); ?>" name="<?php echo esc_attr($this->get_field_name('placeholder')); ?>" type="text" value="<?php echo esc_attr($placeholder); ?>">
        </p>
        <!-- placeholder widget label -->

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


        //placeholder widget
        $new_data['placeholder'] = (!empty($new_instance['placeholder'])) ? strip_tags($new_instance['placeholder']) : $old_instance['placeholder'];
        //placeholder widget
        return $new_data;
    }
}

