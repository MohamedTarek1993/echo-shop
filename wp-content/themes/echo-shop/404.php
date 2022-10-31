<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Echo-shop
 */

get_header();
?>
<div class="error_section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 col-12">
				<div class="img">
					<img class="w-100" src="<?php echo get_template_directory_uri() ?>/assets/image/error.png" alt="404">
				</div>
				<h1><?php echo __('Page Not Found', 'echo-shop') ?> </h1>
				<div class="button">
					<a href="<?php echo home_url(); ?>" class="btn first"> <?php echo __('Go Home', 'echo-shop') ?> </a>
				</div>
			</div>

		</div>
	</div>
</div>
	
<?php
get_footer();
