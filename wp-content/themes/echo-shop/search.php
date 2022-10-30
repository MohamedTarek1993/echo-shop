<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Echo-shop
 */

get_header();
?>

<!---------------------- start header-------------------------------------------->
<section class="header_section" style="background-image: url(./image/back2.png);">
	<div class="container">
		<div class="row">
			<div class="page__title-wrapper">
				<h3 class="title">
					<?php echo __('Search', 'echo-shop'); ?>
				</h3>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"> <?php echo __('Home', 'echo-shop'); ?> </a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo __('Search', 'echo-shop'); ?> </li>
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
          
			<div class=" search_information">
				<h4 class="small-title"><?php _e('Search Summary', 'echo-shop'); ?></h4>
				<div class="row">
					<div class="col">
						<h6><?php _e('Search Term', 'echo-shop'); ?>: <?php echo get_search_query(); ?></h6>
					</div>
					<div class="col">
						<h6><?php _e('Found Posts', 'echo-shop'); ?>: <?php echo $wp_query->found_posts; ?></h6>
					</div>
				</div>
			</div>

			<!-- start card blog -->
			<?php get_template_part('template-parts/card-blog-2');  ?>
			<!-- start card blog -->

			<!-- start sidebar -->
		  <?php
                dynamic_sidebar('sidebar-6'); ?>
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
