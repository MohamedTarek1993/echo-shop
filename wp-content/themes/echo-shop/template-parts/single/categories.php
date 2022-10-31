<?php

/**
 * The template for displaying categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */

$post_id = get_the_ID();
?>

<div class="postbox__cate">
    <h4><?php  esc_html_e('Post Category:', 'echo-shop'); ?> </h4>
    <?php
    $catgories = get_the_terms($post_id, 'category');
    if (is_array($catgories)) {
        foreach ($catgories as $catgory) {
            echo '<span class="color-aqua"><a href="' .esc_url(get_term_link($catgory))  . '" title="">' . $catgory->name . '</a></span>';
        }
    }

    ?>
</div>