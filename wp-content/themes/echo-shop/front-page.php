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
                                <div class="overlay"></div>
                                <div class="img">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
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
                        </div>

                <?php endwhile;  //end while ondition
                endif;  //end if ondition
                ?>
            </div>
            <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
            <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
        </div>
    </div>
</section>
<?php
wp_reset_query();  //end loop 
?>


<!-- finish hero section -->


<!-- start popular products section -->
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
                <?php echo do_shortcode('[products  columns =4  limit = 8 ]'); ?>
            </div>
        </div>
    </div>
</section>

<!-- finish popular products section -->

<!-- start categories section -->
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
<!-- finish categories section -->


<?php
get_footer();
?>
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>