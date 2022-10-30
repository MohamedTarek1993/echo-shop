<?php


?>
<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-12">
    <div class="row">

        <?php

        $args_post     = array(
            'post_type' => 'post',
            'orderby'   => 'date',
            'posts_per_page' => 3,
            'order'  => 'desc',
        );
        $the_post = new WP_Query('$args_post');
        if ($the_post->have_posts()) :
            while ($the_post->have_posts()) : $the_post->the_post();

                $post_id = get_the_ID();
                $post_link = get_permalink($post_id);
                $categories = get_the_terms($post_id, 'category');
                $post_meta = get_post_meta($post_id);  //get post meta
                $visit_count = ((int)($post_meta['wpc_post_views'][0])) + 1;
                update_post_meta($post_id, 'wpc_post_views', $visit_count); //update post meta

        ?>
                <div class="col-12">
                    <div class="card_archieve_2 xk">
                    <div class="img">
                            <?php
                            if (has_post_thumbnail()) { // check if there is image 
                                the_post_thumbnail('archieve-img', array('class' => 'img-fluid'));
                            } else {
                                echo '<img src="' . get_bloginfo('stylesheet_directory') . '/assets/image/blog.jpg" alt="blog" />';
                            }; ?>
                            <div class="overlay">

                                <?php if (is_array($categories) && count($categories)) {
                                    echo '<span ><a href="' . get_term_link($categories[0]) . '" title="">' . $categories[0]->name . '</a></span>';
                                } ?>
                            </div>



                        </div>
                        <div class="postbox__meta">
                            <span> <i class="bi bi-eye"></i> <?php echo $visit_count; ?> </span>
                            <span> <a href="<?php echo get_year_link(get_the_date('Y')) ?>;"> <i class="bi bi-calendar3"></i> <?php echo get_the_date('d M, Y', $post_id); ?></a> </span>
                            <span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="bi bi-person"></i> <?php echo get_the_author_meta('display_name'); ?></a></span>
                            <span><i class="bi bi-chat"></i> <?php echo get_comments_number($post_id); ?> <?php esc_html_e('Comments' , 'echo-shop'); ?> </span>
                        </div>
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <div class="expert">
                            <p> <?php if (has_excerpt()) {
                                    echo get_the_excerpt();
                                } else {
                                    echo wp_trim_words(get_the_content(), 50);
                                } ?>
                            </p>
                        </div>
                        <div class="button">
                            <a href="<?php echo $post_link ?>"> <?php echo esc_html_e('read more...' , 'echo-shop'); ?> </a>
                        </div>
                    </div>

                </div>

        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>


</div>