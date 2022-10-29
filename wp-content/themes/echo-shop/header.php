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

	<!-- search overlay start -->
	<section class="search__area d-flex align-items-center">
		<div class="container">
			<div class="row">
				<div class="col-xxl-12">
					<div class="search__wrapper">
						<div class="search__close">
							<button class="search-close-btn"><i class="bi bi-x-circle"></i></button>
						</div>
						<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<div class="search__input">
								<input name="s" class="form-control" value="<?php echo esc_attr(get_search_query()); ?>" type="text" placeholder="<?php echo esc_attr_x('Search Here...', 'placeholder',  'echo-shop') ?>">
								<button type="submit" id="searchsubmit" type="submit"><i class="bi bi-search"></i></button>
								<?php if (class_exists('Woocommerce')) : ?>
									<input type="hidden" value="product" name="post_type" id="post_type" />
								<?php endif; ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search overlay end -->


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

				<div class="col-xl-4 col-lg-4 col-md-12 col-12">

				</div><!-- finish col -->

				<div class="col-xl-5 col-lg-5 col-md-6 col-12">
					<ul class="settings_header">

						<li class="search_form">
							<a href="javascript:void(0)" class="search-toggle">
								<i class="bi bi-search"></i>
							</a>
						</li>
                         <?php if(class_exists('Woocommerce')): //check when deactive woocommerce plugin ?>
						<li class="card_shop">
							<a class="content_icon" href="<?php echo wc_get_cart_url(); ?>"> <span>
									<i class="bi bi-bag"></i>
								</span>
							</a>
							<span class="cart-customlocation"> <?php echo WC()->cart->get_cart_contents_count(); ?> </span>
						</li>

						<li class="account_list">
							<i class="bi bi-person-circle"></i>
							<ul class="acount_menu">
								<?php
								if (is_user_logged_in()) :
								?>
									<li>
										<a href='<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>'>My Acountant</a>

									</li>

									<li>
										<a href='<?php echo esc_url(wp_login_url(get_permalink(get_option('woocommerce_myaccount_page_id')))); ?>'> Logout</a>
									</li>
								<?php
								else :
								?>
									<li>
										<a href='<?php echo esc_url(wp_login_url(get_permalink(get_option('woocommerce_myaccount_page_id')))); ?>'> login/Register</a>
									</li>
								<?php
								endif;
								?>
							</ul>
						</li>
                        <?php endif ; //end if check when deactive woocommerce plugin ?>  

					</ul>


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