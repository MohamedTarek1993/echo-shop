<?php

/**
 * The template for displaying related ppst
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */

$post_tag = get_the_terms(null, 'post_tag');
if (is_array($post_tag)) {
    $related_post = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post__not_in' => [get_the_ID()],
        'tag__in' => wp_list_pluck($post_tag, 'term_id'),
    ]);
?>

    <section class="also_like_blog">
        <div class="container">
            <div class="main_title_center">
                <h2> <?php esc_html_e('You may also like', 'echo-shop'); ?> </h2>
            </div>
            <div class="swiper mySwiper-1">
                <div class="swiper-wrapper">
                    <?php

                    if ($related_post->have_posts()) {
                        while ($related_post->have_posts()) {
                            $related_post->the_post();

                    ?>
                            <div class="swiper-slide">
                                <a href="<?php echo get_permalink(get_the_ID()); ?>" class="card_blog">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                    <h2><?php the_title(); ?></h2>
                                </a>
                            </div>
                    <?php
                        } //end while
                    } //end if

                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
    wp_reset_postdata();
} // end if
?>