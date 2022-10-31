<?php

/**
 * The template for displaying TAGS
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */

?>
<div class="postbox__tag">
    <h4> <?php echo esc_html_e('Post Tags:', 'echo-shop') ?> </h4>
    <?php the_tags('', '', ''); ?>

</div>