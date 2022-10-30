<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Echo-shop
 */

get_header();

$post_id = get_the_ID();

$link = get_permalink($post_id);


$post_meta = get_post_meta($post_id);  //get post meta
$visit_count = ((int)($post_meta['wpc_post_views'][0])) + 1;
update_post_meta($post_id, 'wpc_post_views', $visit_count); //update post meta


if (have_posts()) : //start if condition
	while (have_posts()) : //start while cpnsition
		the_post();
?>

		<!---------------------- start header-------------------------------------------->
		<section class="header_section" style="background-image: url('<?php bloginfo("stylesheet_directory"); ?>/assets/image/blog-header.png');">
			<div class="container">
				<div class="row">
					<div class="page__title-wrapper">
						<h3 class="title">
							<?php echo __('Blogs', 'echo-shop'); ?>
						</h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"> <?php echo __('Home', 'echo-shop'); ?></a></li>
								<li class="breadcrumb-item"><a href="<?php echo site_url('blogs'); ?>   "><?php echo __('Blogs', 'echo-shop'); ?></a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
		</section>
		<!---------------------- finish header -------------------------------------------->


		<!---------------------- start blog single-------------------------------------------->

		<section class="blog_content">
			<div class="container">
				<div class="row">
					<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-12">
						<div class="blog_wrabber">
							<div class="blog_content_warrper">

								<!-- catgory -->
								<?php get_template_part('template-parts/single/categories');  ?>
								<!-- catgory -->
								<!-- image post -->
								<?php if (has_post_thumbnail($post->ID)) { ?>
									<div class="image_main">
										<?php the_post_thumbnail(); ?>
									</div><!-- end media -->

								<?php
								} else { ?>
									<img src="<?php bloginfo('stylesheet_directory'); ?>/assets/image/blog.jpg" alt="blog">
								<?php }
								?>
								<!-- image post -->

								<div class="postbox__meta">
									<span> <i class="bi bi-eye"></i> <?php echo $visit_count; ?> </span>
									<span> <a href="<?php echo get_year_link(get_the_date('Y')); ?>"> <i class="bi bi-calendar3"></i> <?php echo get_the_date('d M, Y', $post_id); ?></a> </span>
									<span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="bi bi-person"></i> <?php echo get_the_author_meta('display_name'); ?></a></span>
									<span><i class="bi bi-chat"></i> <?php echo get_comments_number($post_id); ?> Comments</span>
								</div>

								<h2 class="title">
									<?php the_title(); ?>
								</h2>
								<div class="content">
									<?php the_content(); ?>
								</div>

								<!-- tag -->
								<?php get_template_part('template-parts/single/tags');  ?>
								<!-- tag -->
								<!-- share  -->
								<?php get_template_part('template-parts/single/share');  ?>
								<!-- share  -->

							</div><!-- finish blog content warapper -->

							<!-- perv && next post -->
							<?php get_template_part('template-parts/single/prev-next-post');  ?>
							<!-- perv && next post -->

							<!-- comments -->
							<?php comments_template(); ?>
							<!-- comments -->

						</div> <!-- finish blog warapper -->

					</div> <!-- finish col -->

					<!-- start sidebar -->
                          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-12">

                          <div class="sideber_warrper">
                                <?php
                                      dynamic_sidebar('sidebar-4'); ?>


                              </div>
                      </div>
					
					<!-- finish sidebar -->
				</div> <!-- end row -->
			</div><!-- end container -->
		</section>
		<!---------------------- finish blog single-------------------------------------------->

		<!-- start also like -->
		<?php get_template_part('template-parts/single/related-posts');  ?>

		<!-- finish also like -->

	
<?php
	endwhile;  //end while loop
endif;    //end if  
get_footer();
?>
	<!-- blog also like slider -->
	<script>
			var swiper = new Swiper(".mySwiper-1", {
				slidesPerView: 2,
				spaceBetween: 10,
				loop: true,
				autoplay: {
					delay: 2500,
					disableOnInteraction: false,
				},
				breakpoints: {
					640: {
						slidesPerView: 1,
						spaceBetween: 20,
					},
					768: {
						slidesPerView: 1,
						spaceBetween: 40,
					},
					1024: {
						slidesPerView: 2,
						spaceBetween: 50,
					},
				},
			});
		</script>
		<!-- blog also like slider -->