<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Echo-shop
 */

?>

	<footer  class="site-footer">
	
	</footer><!-- finish footer -->

	<div class="copy_rights_footer">
		<p>
		<?php echo get_theme_mod("footer_copy_rights", esc_html__("All Right Received To Echo Company ")) ?>

		</p>
	</div>

<?php wp_footer(); ?>

</body>
</html>
