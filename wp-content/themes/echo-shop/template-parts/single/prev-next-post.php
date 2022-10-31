<?php

/**
 * The template for displaying previous next post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */
?>

<div class="prev_next_posts">
    <div class="row">
        <?php
        $next_post = get_next_post();
        $previous_post = get_previous_post();
        ?>
        <div class="col-lg-6 col-12">
            <?php if (is_object($previous_post)) : ?>
                <div class="pr_ne_post">
                    <?php echo get_the_post_thumbnail($previous_post); ?>
                    <div class="text_content">
                        <h5 class="text">
                            <?php echo $previous_post->post_title; ?>
                        </h5>
                        <a href="<?php echo get_permalink($previous_post->ID) ?>"> <?php esc_html_e('Pervious Post' , 'echo-shop') ;?></a>
                    </div>
                </div>

            <?php endif ?>

        </div>
        <div class="col-lg-6 col-12">
            <?php if (is_object($next_post)) : ?>
                <div class="pr_ne_post">
                    <?php echo get_the_post_thumbnail($next_post); ?>
                    <div class="text_content">
                        <h5 class="text">
                            <?php echo $next_post->post_title; ?>
                        </h5>
                        <a href="<?php echo get_permalink($next_post->ID) ?>"><?php esc_html_e('Next Post' , 'echo-shop') ;?></a>
                    </div>
                </div>

            <?php endif ?>

        </div>
    </div>
</div>