<?php

/**
 * The template for displaying share
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */
?>

<div class="postbox__share">
    <h4><?php esc_html_e('Share Post', 'echo-shop'); ?> </h4>
    <?php echo do_shortcode('[addtoany]'); ?>
</div>