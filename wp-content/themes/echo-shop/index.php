<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Echo-shop
 */

get_header();
?>
<!---------------------- start header-------------------------------------------->
<section class="header_section" style="background-image: url('<?php bloginfo("stylesheet_directory"); ?>/assets/image/blog-header.png');">
	<div class="container">
		<div class="row">
			<div class="page__title-wrapper">
				<h3 class="title">
					<?php echo __('Blog', 'echo-shop'); ?>
				</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"> <?php echo __('Home', 'echo-shop'); ?> </a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo __('Blog', 'echo-shop'); ?> </li>
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
			<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-7 col-12">
				<!-- start card blog -->
				<?php get_template_part('template-parts/card-blog');  ?>
				<!-- start card blog -->
			</div>
			<!-- start sidebar -->
			<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-5 col-12">
				<?php
				get_sidebar();
				?>
				<!-- finish sidebar -->
			</div>
		</div> <!-- finish row -->

		<!---------------------- start pajnition-------------------------------------------->
		<?php get_template_part('template-parts/pagination');  ?>
		<!---------------------- finish pajnition-------------------------------------------->
	</div> <!-- finish container -->
</section>
<!---------------------- finish blog content-------------------------------------------->

<?php
get_footer();
