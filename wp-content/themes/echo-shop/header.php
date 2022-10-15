<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Echo-shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php global $base; ?>

	<!-- start offer slider -->
	<section class="slider_offer">
		<div class="container">
			<div class="swiper mySwiper">
				<?php
				$slider_offer = new WP_Query(array( //start query
					'post_type' => 'slider-offer',
					'order' => 'DESC',
					'orderby' => 'date',
					'posts_per_page' => -1,

				));

				?>
				<div class="swiper-wrapper">
					<?php
					if ($slider_offer->have_posts()) :
						while ($slider_offer->have_posts()) :
							$slider_offer->the_post();
					?>
							<div class="swiper-slide">
								<p class="p-mt"><?php the_title(); ?></p>
							</div> <!-- finish swiper slide -->
					<?php
						endwhile;
					endif;
					?>
				</div>
				<?php wp_reset_query(); // finish query 
				?>
			</div>
		</div><!-- finish container -->
	</section>
	<!-- finish offer slider -->
	<script>
		//  swiper in stikey header 
		var swiper = new Swiper(".mySwiper", {
			spaceBetween: 50,
			centeredSlides: true,
			autoplay: {
				delay: 2500,
				disableOnInteraction: false,
			},
		});
	</script>



	<!-- start stikeky header -->
	<section class="stikey_header">
		<div class="container">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-5 col-12">
					<!-- start information connect -->
					<ul class="information_connect infp_2">
						<li>
							<span> <i class="bi bi-telephone"></i></span>
							<a href="tel:01093140277"> 0109654245125414 </a>
						</li>

						<li>
							<span> <i class="bi bi-envelope"></i></span>
							<a href="mailto:someone@yoursite.com"> mt7899@gmail
							</a>
						</li>
					</ul>
					<!-- finish information connect -->
				</div> <!-- finish col -->

				<div class="col-xl-7 col-lg-7 col-md-7 col-12">
					<ul class="information_connect">
						<li>
							<span> <i class="bi bi-truck"></i></span>
							<p>Free shipping </p>
						</li>

						<li>
							<span><i class="bi bi-clock"></i></span>
							<p>30 days moneyback gurantee </p>
						</li>
						<li>
							<span><i class="bi bi-person"></i></span>
							<p>24/7customer service</p>
						</li>
					</ul>
				</div> <!-- finish col -->
			</div> <!-- finish row -->
		</div> <!-- finish container -->
	</section>

	<!-- finish stikeky header -->
	<!-- strat first header -->

	<section class="first_header py-3">
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-6 col-12">
					<?php
					if (has_custom_logo()) {
						the_custom_logo();
					}
					?> </div><!-- finish col -->

				<div class="col-xl-6 col-lg-6 col-md-12 col-12">
					<div class="search_form">
						<?php aws_get_search_form(true); ?>
					</div>
				</div><!-- finish col -->

				<div class="col-xl-3 col-lg-3 col-md-6 col-12">
					<div class="card_shop">
						<a href="<?php echo wc_get_cart_url(); ?>"> <i class="bi bi-bag"></i> </a>
						<a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'echo-shop'); ?>"><?php echo sprintf(_n('%d item', '%d items', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?> – <?php echo WC()->cart->get_cart_total(); ?></a>
					</div>
				</div><!-- finish col -->
			</div><!-- finish row -->
		</div><!-- finish container -->
	</section>
	<!-- finish first header -->

	<!-- strat nav menu -->
	<nav class="navbar navbar-expand-lg" id="navbar">
		<div class="container">

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>


			<div class="collapse navbar-collapse" id="navbarNavDropdown">

				<?php echo get_menu('menu-1', 'navbar-nav') ?>

			</div>

		</div><!-- finish container -->
	</nav><!-- finish nav -->

	<!-- finish nav menu -->