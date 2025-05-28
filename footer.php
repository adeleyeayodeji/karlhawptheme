<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package karlhawptheme
 */

if (is_page('my-account')) {
	echo '</div> </div> </div>';
}

$menu_items = wp_get_nav_menu_items('karlha_footer');
$menu_tree = [];

foreach ($menu_items as $item) {
	if ($item->menu_item_parent == 0) {
		$menu_tree[$item->ID] = [
			'title' => $item->title,
			'url'   => $item->url,
			'children' => []
		];
	} else {
		$menu_tree[$item->menu_item_parent]['children'][] = [
			'title' => $item->title,
			'url'   => $item->url
		];
	}
}
?>
<div class="footer-section">
	<div class="footer-block">
		<div class="footer-flex-container">
			<div class="footer-links-wrapper">
				<?php foreach ($menu_tree as $item) : ?>
					<div class="footer-links-block">
						<h4 class="footer-links-block-header"><a href="<?php echo $item['url']; ?>" style="text-decoration: none; color: inherit;"><?php echo $item['title']; ?></a></h4>
						<?php foreach ($item['children'] as $child) : ?>
							<a class="footer-link" href="<?php echo $child['url']; ?>"><?php echo $child['title']; ?></a>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="footer-text-block">
			<div class="mini-text">© Karlha Lifestyle Limited <?php echo date('Y'); ?>. | All Rights reserved.</div>
			<div class="mini-links-block"><a class="designs-by-es-link" href="https://www.theeclecticsource.com/" target="_blank">Designs by ES</a></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>

<script>
	jQuery(document).ready(function($) {
		//check if element exists
		if ($('#product-variant-block').length > 0) {
			// Listen for variant change
			$('.feature-product-variant-select').on('change', function() {
				var selectedVariant = $(this).val();
				// Loop through variations to find the selected one
				$.each(productVariations, function(index, variation) {
					//get the first key and value of the attributes
					const [
						[firstKey, firstValue]
					] = Object.entries(variation.attributes);
					//check if the first value is the selected variant
					if (firstValue === selectedVariant) {
						//get first of .product-body-image
						var image = $('.product-body-image').first();
						//set the src to the selected variant image
						image.attr('src', imageGallery[index]);

						//set the name to the selected variant
						$('.product-name').text(variation.name);
						// Update the price fields
						$('#product-price').html(variation.display_regular_price);

						if (variation.display_regular_price !== variation.display_price) {
							$('#product-sale-price').html(variation.display_price).show();
							//add product-strikethrough-price class
							$('#product-price').addClass('product-strikethrough-price');
						} else {
							$('#product-sale-price').hide();
							//remove product-strikethrough-price class
							$('#product-price').removeClass('product-strikethrough-price');
						}

						//get buy-button
						var buyButton = $('#buy-button');
						//set the data-variation-id to the selected variant id
						buyButton.data('variation-id', variation.variation_id);
						//product-is-in-stock
						buyButton.data('product-is-in-stock', variation.is_in_stock);


						//get add-item-cart
						var addItemCart = $('#add-item-cart');
						//set the data-variation-id to the selected variant id
						addItemCart.data('variation-id', variation.variation_id);
						//product-is-in-stock
						addItemCart.data('product-is-in-stock', variation.is_in_stock);
					}
				});
			});

			try {
				//get the first variation
				var firstVariation = productVariations[0];
				//get the first key and value of the attributes
				const [
					[firstSelectedKey, firstSelectedValue]
				] = Object.entries(firstVariation.attributes);
				//select the first variant on page load
				$('.feature-product-variant-select').val(firstSelectedValue).trigger('change');
			} catch (error) {
				console.log(error);
			}
		}

		/**
		 * 
		 * Add to card ajax
		 * 
		 */
		function addToCartAjax(productId, variationId = null, isBuyNow = false, button) {
			var data = {
				action: 'add_to_cart_karlha_jewels',
				nonce: karlha_jewels.nonce,
				product_id: productId
			};
			if (variationId) {
				data.variation_id = variationId;
			}

			//old button text
			var oldButtonText = button.text();

			//add to cart
			$.ajax({
				url: karlha_jewels.ajax_url,
				type: 'POST',
				data: data,
				beforeSend: function() {
					//block button
					button.css({
						'opacity': 0.5,
						'cursor': 'wait'
					});
					//change button text
					button.text('Adding to cart...');
				},
				success: function(response) {
					//unblock button
					button.css({
						'opacity': 1,
						'cursor': 'auto',
						'pointer-events': 'auto'
					});
					//check if response is json
					if (response.success) {
						if (isBuyNow) {
							//redirect to checkout
							window.location.href = '<?php echo wc_get_checkout_url(); ?>';
						} else {
							//change button text
							button.text(oldButtonText);

							//iziToast success
							iziToast.success({
								title: 'Success',
								message: 'Product added to cart',
								position: 'topRight',
								timeout: 5000,
								buttons: [
									['<button>View Cart</button>', function(instance, toast) {
										window.location.href = '<?php echo wc_get_cart_url(); ?>';
									}]
								]
							});
						}
					} else {
						//iziToast error
						iziToast.error({
							title: 'Error',
							message: response.data.message,
							position: 'topRight',
							timeout: 5000,
						});
					}
				},
				error: function(response) {
					//unblock button
					button.css({
						'opacity': 1,
						'cursor': 'auto',
						'pointer-events': 'auto'
					});
					//change button text
					button.text(oldButtonText);
					//iziToast error
					iziToast.error({
						title: 'Error',
						message: 'An error occurred while adding to cart',
						position: 'topRight',
						timeout: 5000,
					});
				}
			});
		}


		/**
		 * Add to cart
		 */
		$('#add-item-cart, #buy-button').on('click', function(e) {
			e.preventDefault();

			var productId = $(this).data('product-id');
			var productIsInStock = $(this).data('product-is-in-stock');
			//check if data-is-buy-now is true
			var isBuyNow = $(this).data('is-buy-now');
			//variation id
			var variationId = $(this).data('variation-id');

			//check if empty
			if (variationId == '' || variationId == null || variationId == undefined) {
				variationId = null;
			}

			//is_in_stock
			if (productIsInStock) {
				//add to cart
				addToCartAjax(productId, variationId, isBuyNow, $(this));
			} else {
				//SweetAlert2
				Swal.fire({
					title: 'Out of Stock',
					text: 'This product is out of stock',
					icon: 'error',
					confirmButtonColor: '#c89c6c'
				});
				return;
			}

		});
	});
</script>
</body>

</html>