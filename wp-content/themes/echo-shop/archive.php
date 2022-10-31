<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Echo-shop
 */

get_header();
?>

	<!---------------------- start header-------------------------------------------->
	<section class="header_section" style="background-image: url('<?php bloginfo("stylesheet_directory"); ?>/assets/image/archieve-header.png');">
			<div class="container">
				<div class="row">
					<div class="page__title-wrapper">
						<h3 class="title">
						<?php echo get_the_archive_title();	 ?>
						</h3>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"> <?php echo esc_html_e('Home', 'echo-shop'); ?> </a></li>
								<li class="breadcrumb-item active" aria-current="page"><?php echo get_the_archive_title();	 ?> </li>
							</ol>
						</nav>
					</div>

				</div>
			</div>
		</section>

		<!---------------------- finish header -------------------------------------------->


		<!---------------------- start blog content-------------------------------------------->
		<section class="blog_content blog_archieve">
			<div class="container">
				<div class="row">


					<!-- start card blog -->
					<?php get_template_part('template-parts/card-blog-2');  ?>
					<!-- start card blog -->

					<!-- start sidebar -->
						<!-- start sidebar -->
                          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-12">

                          <div class="sideber_warrper">
                                 <?php
                    dynamic_sidebar('sidebar-5'); ?>


                              </div>
                      </div>
					
					<!-- finish sidebar -->
				
					<!-- finish sidebar -->

				</div> <!-- finish row -->
				<!---------------------- start pajnition-------------------------------------------->
				<?php get_template_part('template-parts/pagination');  ?>
				<!---------------------- finish pajnition-------------------------------------------->
			</div> <!-- finish container -->
		</section>
		<!---------------------- finish blog content-------------------------------------------->
<?php
get_footer();
