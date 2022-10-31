<?php

/**
 * The template for home page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pick_up
 */

get_header();
$slider =  new WP_Query(array(
    'post_type' => 'slider-hero',
    'orderby' => 'date',
    'posts_per_page' => -1,
    'order'   => 'DESC',
));
?>

<!-- start hero section -->

<section class="hero_section">
    <div class="container-fluid px-0">
        <div class="swiper mySwiper">

            <div class="swiper-wrapper">
                <?php
                if ($slider->have_posts()) :  //while ondition
                    while ($slider->have_posts()) : $slider->the_post();  //while ondition

                ?>
                        <div class="swiper-slide">
                            <div class="content">

                                <div class="img">
                                    <div class="overlay"></div>
                                    <?php the_post_thumbnail('hero_slider', array('class' => 'img-fluid')); ?>

                                </div>
                                <div class="text">
                                    <h1><?php the_title(); ?></h1>
                                    <p><?php the_field('slider_description'); ?></p>
                                    <div class="button">
                                        <?php $button_url = get_field('slider_button_link'); ?>
                                        <a href="<?php echo $button_url; ?>"><?php the_field('slider_button_text'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- finish swiper slide -->

                <?php endwhile;  //end while ondition
                endif;  //end if ondition
                ?>
            </div>
            <!-- <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div> -->
            <div class="swiper-pagination"></div>

        </div><!-- finish swiper -->
    </div><!-- finish container -->
</section><!-- finish section -->
<?php
wp_reset_query();  //end loop 
?>


<!-- finish hero section -->


<!-- start popular products section -->
<?php
$show_popular = get_field('popular_products_show');
if ($show_popular == true) :
?>
    <section class="popular_products">
        <div class="container">
            <div class="main_title_center">
                <h2>
                    <?php the_field('popular_products_title'); ?>
                </h2>
                <p>
                    <?php the_field('popular_products_text'); ?>
                </p>
            </div>
            <div class="row mt-4">
                <div class="products">
                    <?php
                    $max_num_product = get_field('popular_products_max_products');
                    $max_num_product_row = get_field('popular_products_max_products_row');
                    echo do_shortcode('[products  columns ="' . $max_num_product_row . '"  limit ="' . $max_num_product . '" orderby="popularity"]'); ?>
                </div>
            </div><!-- finish row -->
        </div><!-- finish container -->
    </section><!-- finish section -->
<?php endif; //end if condition
?>


<!-- finish popular products section -->


<!-- start recent products section -->
<?php
$show_recent = get_field('new_arrivals_show');
if ($show_recent == true) :
?>
    <section class="arrivals_products">
        <div class="container">
            <div class="main_title_center">
                <h2>
                    <?php the_field('new_arrivals_title'); ?>
                </h2>
                <p>
                    <?php the_field('new_arrivals_text'); ?>
                </p>
            </div>
            <div class="row mt-4">
                <div class="products">
                    <?php
                    $max_num_recent = get_field('new_arrivals_max_products');
                    $max_num_recent_row = get_field('new_arrivals_max_products_row');
                    echo do_shortcode('[products  columns ="' . $max_num_recent_row . '"  limit ="' . $max_num_recent . '"  orderby="date"]'); ?>
                </div>
            </div><!-- finish row -->
        </div><!-- finish container -->
    </section><!-- finish section -->
<?php endif; //end if condition
?>

<!-- finish recent products section -->


<!-- start deal of the week -->
<section class="deal_week">
    <div class="container">
        <h2>Deal of the week</h2>
        <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-12 ml-auto text-center">

            </div><!-- finish col -->
            <div class="col-lg-6 col-12 mr-auto text-center">

            </div><!-- finish col -->

        </div><!-- finish row -->
    </div><!-- finish container -->
</section><!-- finish section -->

<!-- finish deal of the week -->

<!-- start categories section -->
<?php
$show_cate = get_field('category_product_show');
if ($show_cate == true) :
?>
    <section class="categories_products">
        <div class="container">
            <div class="main_title_center">
                <h2>
                    <?php the_field('category_product_title'); ?>
                </h2>
                <p>
                    <?php the_field('category_product_text'); ?>
                </p>
            </div> <!-- finish main title -->

            <div class=" row boxes">
                <?php echo  do_shortcode('[product_categories limit =6  columns =3 parent="0" DESC orderby="date"]') ?>
            </div>

        </div> <!-- finish container -->
    </section> <!-- finish section -->
<?php endif; //end if condition
?>
<!-- finish categories section -->


<!-- start last news section -->
<?php
$the_post =  new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'date',
    'posts_per_page' => 3,
    'order'   => 'DESC',
));
?>
<section class="blog_section">
    <div class="container ">
    <div class="main_title_center">
                <h2>
                    <?php the_field('last_news_title'); ?>
                </h2>
                <p>
                    <?php the_field('last_news_description'); ?>
                </p>
            </div>
        <div class="row">
            <?php
            if ($the_post->have_posts()) :
                while ($the_post->have_posts()) :
                  $the_post->the_post();
            ?>
                    <div class="col-lg-6 col-12 mb-5">
                        <div class="content">
                            <div class="img">
                                <?php
                                if (has_post_thumbnail()) { // check if there is image 
                                    the_post_thumbnail('blog-img', array('class' => 'img-fluid'));
                                } else {
                                    echo '<img src="' . get_bloginfo('stylesheet_directory') . '/assets/image/blog.jpg" alt="blog" />';
                                }; ?>

                            </div>
                            <div class="text">
                                <h4> <?php the_title(); ?></h4>
                                <p>
                                    <?php if (has_excerpt()) {
                                        echo get_the_excerpt();
                                    } else {
                                        echo wp_trim_words(get_the_content(), 18);
                                    } ?>

                                </p>
                            </div>
                            <a href="<?php the_permalink(  ); ?>"><?php echo __('Read More..', 'echo-shop'); ?> </a>
                        </div>
                    </div>
            <?php
                endwhile; //end while condition
            endif;  //end if condition 
            ?>
        </div>
    </div><!-- finish container -->
</section><!-- finish section -->
<?php
wp_reset_query();  //end loop 
?>
<!-- start last news section -->


<?php
get_footer();
?>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        },
    });
</script>