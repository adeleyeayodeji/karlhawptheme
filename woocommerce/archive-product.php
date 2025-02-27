<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>

<div class="category-body-wrapper">
	<div id="products-container">
		<?php
		if (woocommerce_product_loop()) {

		?>
			<div class="category-filters-block">
				<div class="mini-nav-block"><a class="mini-nav-link" href="<?php echo home_url(); ?>">Home</a>
					<div class="mini-nav-divider">/</div><a class="mini-nav-link w--current" href="<?php echo home_url('/shop'); ?>">Shop</a>
				</div>
				<div class="product-listing-filter-section-alt">
					<?php do_action('woocommerce_before_shop_loop'); ?>
				</div>
			</div>

			<div class="products-wrapper-block">

				<?php
				// woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();
						$product = wc_get_product(get_the_ID());

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');
				?>
						<div class="product-listing-block">
							<a href="<?php the_permalink(); ?>" class="product-image-overlay w-inline-block">
								<div class="product-display-box">
									<img loading="lazy" alt="" class="product-image" src="<?php echo get_the_post_thumbnail_url(); ?>" style="">
								</div>
							</a>
							<h1 class="product-name">
								<?php the_title(); ?>
							</h1>
							<div class="product-listing-price-block">
								<?php if ($product->is_on_sale()) : ?>
									<div class="product-listing-price price crossed">
										<?php echo wc_price($product->get_regular_price()); ?>
									</div>
									<div class="lproduct-listing-price sale-price">
										<?php echo wc_price($product->get_sale_price()); ?>
									</div>
								<?php else : ?>
									<div class="product-listing-price price">
										<?php echo wc_price($product->get_regular_price()); ?>
									</div>
								<?php endif; ?>
							</div>
							<?php if (!$product->is_in_stock()) : ?>
								<div class="out-of-stock-box">
									<div class="sold-out-text">SOLD OUT</div>
								</div>
							<?php endif; ?>
						</div>
				<?php
					}
				}

				// woocommerce_product_loop_end();

				?>
			</div>
		<?php

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
		?>
	</div>
</div>

<?php

get_footer('shop');
