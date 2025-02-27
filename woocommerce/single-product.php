<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header('shop'); ?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
	.product-listing-filter-section-alt {
		gap: 10px;
		flex-wrap: wrap;
		align-items: center;

		p {
			font-family: "Vultura", sans-serif;
			color: #8a8a8a;
			font-weight: 400;
			letter-spacing: 0px;
			text-decoration: none;
			text-transform: capitalize;
		}

		select.orderby {
			display: inline-block;
			width: auto;

			font-family: "Vultura", sans-serif;
			color: #8a8a8a;
			font-weight: 400;
			letter-spacing: 0px;
			text-decoration: none;
			text-transform: capitalize;
		}
	}


	.popup-title {
		font-family: 'Lato';
	}

	input:focus,
	select:focus,
	textarea:focus,
	button:focus,
	video:focus {
		outline: none;
	}

	input {
		-webkit-appearance: none;
	}

	input[type=checkbox] {
		cursor: pointer;
		-webkit-appearance: checkbox;
	}

	.w-dyn-empty {
		display: none;
	}

	input[type=submit] {
		cursor: pointer;
	}

	.wishlist-link,
	.header-icon,
	.main-side-cart-remove-link,
	.spinner-button,
	.product-alt-image,
	.add-wishlist-link,
	.product-sample-link {
		cursor: pointer;
	}

	#terminal-current-currency {
		cursor: pointer;
	}

	.footer-mailing-list-input::placeholder {
		color: #fff;
	}

	.main-side-cart-products-wrapper::-webkit-scrollbar {
		width: 0.5em;
	}

	.main-side-cart-products-wrapper::-webkit-scrollbar-thumb {
		background-color: #b0e7d9;
		outline: 1px solid #b0e7d9;
	}

	.main-side-cart-products-wrapper::-webkit-scrollbar-track {
		background-color: white;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 0;
	}

	.swiper-container {
		width: 100%;
		height: auto;
	}

	.swiper-button-next {
		color: #c89c6c;
	}

	.swiper-button-prev {
		color: #c89c6c;
	}

	.iti.iti--allow-dropdown {
		width: 100%;
	}

	/* Create a custom radio button */
	.checkmark {
		position: absolute;
		top: 2px;
		left: 0;
		height: 15px;
		width: 15px;
		background-color: #eee;
		border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.customer-info-container:hover input~.checkmark {
		background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.customer-info-container input:checked~.checkmark {
		background-color: #c1976f;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.customer-info-container input:checked~.checkmark:after {
		display: block;
	}

	/* Style the indicator (dot/circle) */
	.customer-info-container .checkmark:after {
		top: 5.5px;
		left: 5px;
		width: 5px;
		height: 4px;
		border-radius: 50%;
		background: white;
	}
</style>

<div class="mini-nav-block product-page">
	<a class="mini-nav-link" href="<?php echo home_url(); ?>">Home</a>
	<div class="mini-nav-divider">/</div>
	<a class="mini-nav-link w--current" href="<?php the_permalink(); ?>" aria-current="page"><?php the_title(); ?></a>
</div>
<script>
	var productVariations = [];
</script>
<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
// do_action('woocommerce_before_main_content');
?>

<?php while (have_posts()) : ?>
	<?php the_post();
	$product = wc_get_product(get_the_ID());
	$product_images = $product->get_gallery_image_ids();
	$product_image = $product->get_image_id();
	?>

	<div class="product-body-wrapper">
		<div class="product-description-wrapper">
			<div class="product-spread-image-block">
				<div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
					<div class="swiper-wrapper" id="swiper-wrapper-9c2988d3b7bc9e101" aria-live="polite">
						<?php if ($product_images) : ?>
							<?php foreach ($product_images as $key => $image_id) : ?>
								<div class="swiper-slide swiper-slide-prev" role="group" aria-label="<?php echo $key + 1; ?> / <?php echo count($product_images); ?>" style="width: 534px;"><img class="product-body-image" id="mobile-image-<?php echo $key + 1; ?>" alt="<?php the_title(); ?>" src="<?php echo wp_get_attachment_url($image_id); ?>"></div>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="swiper-slide swiper-slide-prev" role="group" aria-label="1 / 1" style="width: 534px;"><img class="product-body-image" id="mobile-image-33" alt="<?php the_title(); ?>" src="<?php echo wp_get_attachment_url($product_image); ?>"></div>
						<?php endif; ?>
					</div>
					<div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-9c2988d3b7bc9e101" aria-disabled="false"></div>
					<div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-9c2988d3b7bc9e101" aria-disabled="true"></div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
			</div>
			<div class="product-description-block">
				<h1 class="name-box">
					<?php the_title(); ?>
				</h1>
				<div class="product-spread-price-block">
					<?php if ($product->is_on_sale()) : ?>
						<h1 class="product-spread-price" id="product-price">
							<?php echo wc_price($product->get_regular_price()); ?>
						</h1>
						<h1 class="product-spread-price" id="product-sale-price">
							<?php echo wc_price($product->get_sale_price()); ?>
						</h1>
					<?php else : ?>
						<h1 class="product-spread-price" id="product-price">
							<?php echo wc_price($product->get_regular_price()); ?>
						</h1>
					<?php endif; ?>
				</div>
				<!-- Variant area -->
				<?php if ($product->is_type('variable')) :
					$variations = $product->get_available_variations();
					//loop through variations and convert prices to naira
					foreach ($variations as $key => $variation) {
						$variations[$key]['display_price'] = wc_price($variation['display_price']);
						//convert regular price to naira
						$variations[$key]['display_regular_price'] = wc_price($variation['display_regular_price']);
					}
					$attributes = $product->get_variation_attributes();
				?>
					<div class="product-variant-block" id="product-variant-block">
						<?php foreach ($attributes as $attribute_name => $options) : ?>
							<div class="product-variant-selector-block">
								<div class="feature-product-variant-label"><?php echo wc_attribute_label($attribute_name); ?></div>
								<div class="w-embed">
									<select class="feature-product-variant-select" data-attribute="<?php echo esc_attr($attribute_name); ?>">
										<option value="">Select <?php echo wc_attribute_label($attribute_name); ?></option>
										<?php foreach ($options as $option) : ?>
											<option value="<?php echo esc_attr($option); ?>"><?php echo esc_html($option); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<script>
						productVariations = <?php echo json_encode($variations); ?>;
					</script>
				<?php endif; ?>

				<!-- Description &amp; Details -->
				<div class="product-details-block">
					<h1 class="details-header product">Description &amp; Details</h1>
					<p class="details-text product" id="product-description">
						<?php the_content(); ?>
					</p>
				</div>
				<a class="add-to-cart-button buy-now w-button" id="buy-button" data-product-id="<?php echo $product->get_id(); ?>" data-product-is-in-stock="<?php echo $product->is_in_stock(); ?>" data-is-buy-now="true">Buy it Now</a>
				<a class="add-to-cart-button w-button" id="add-item-cart" data-product-id="<?php echo $product->get_id(); ?>" data-product-is-in-stock="<?php echo $product->is_in_stock(); ?>">Add to Cart</a>
			</div>
		</div>
	</div>

<?php
endwhile; // end of the loop. 
?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
// do_action('woocommerce_after_main_content');
?>

<div class="related-product-section">
	<h1 class="related-products-header">you may also like</h1>
	<div class="products-wrapper-block" id="recommended-products">
		<div class="products-wrapper-block">
			<?php
			//get 4 random products
			$products = wc_get_products(array(
				'limit' => 4,
				'orderby' => 'rand',
				//exclude current product
				'exclude' => array($product->get_id()),
			));
			foreach ($products as $product) :
			?>
				<div class="product-listing-block">
					<a href="<?php echo get_the_permalink($product->get_id()); ?>" class="product-image-overlay w-inline-block">
						<div class="product-display-box"><img loading="lazy" alt="" class="product-image" src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" style=""></div>
					</a>
					<h1 class="product-name"><?php echo $product->get_name(); ?></h1>
					<div class="product-listing-price-block">
						<div class="product-listing-price price"><?php echo wc_price($product->get_price()); ?></div>
					</div>

				</div>
			<?php endforeach; ?>

		</div>
	</div>
</div>

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

?>
<script>
	var swiper = new Swiper('.swiper', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
		},
	});
</script>