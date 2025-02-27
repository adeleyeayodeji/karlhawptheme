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
?>
<div class="footer-section">
	<div class="footer-block">
		<div class="footer-flex-container">
			<div class="footer-links-wrapper">
				<div class="footer-links-block">
					<h4 class="footer-links-block-header">Our Company</h4><a class="footer-link" href="/about">About Us</a><a class="footer-link" href="https://www.instagram.com/karlhajewels/">Instagram</a>
				</div>
				<div class="footer-links-block">
					<h4 class="footer-links-block-header">Customer Service</h4><a class="footer-link" href="/contact">Contact Us</a><a class="footer-link" href="/faqs">FAQs</a><a class="footer-link" href="/shipping-returns">Shipping &amp; Returns</a>
				</div>
				<div class="footer-links-block">
					<h4 class="footer-links-block-header">Policy</h4><a class="footer-link" href="/cookie-policy">Cookie Policy</a><a class="footer-link" href="/privacy-policy">Privacy Policy</a><a class="footer-link" href="/terms-conditions">Terms &amp; Conditions</a>
				</div>
			</div>
		</div>
		<div class="footer-text-block">
			<div class="mini-text">© Karlha Lifestyle Limited 2025. | All Rights reserved.</div>
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
					if (variation.attributes['attribute_color'] === selectedVariant) {
						//get first of .product-body-image
						var image = $('.product-body-image').first();
						//set the src to the selected variant image
						image.attr('src', variation.image.full_src);
						//set the name to the selected variant
						$('.product-name').text(variation.name);
						// Update the price fields
						$('#product-price').html(variation.display_price);

						if (variation.display_regular_price !== variation.display_price) {
							$('#product-sale-price').html(variation.display_regular_price).show();
						} else {
							$('#product-sale-price').hide();
						}
					}
				});
			});

			try {
				//select the first variant on page load
				$('.feature-product-variant-select').val(productVariations[0].attributes['attribute_color']).trigger('change');
			} catch (error) {
				console.log(error);
			}
		}

		/**
		 * 
		 * Add to card ajax
		 * 
		 */
		function addToCartAjax(productId, variationId = null, isBuyNow = false) {
			var data = {
				action: 'add_to_cart',
				nonce: karlha_jewels.nonce,
				product_id: productId
			};
			if (variationId) {
				data.variation_id = variationId;
			}
			//add to cart
			$.ajax({
				url: karlha_jewels.ajax_url,
				type: 'POST',
				data: data,
				beforeSend: function() {
					//swal adding to cart
					Swal.fire({
						title: 'Adding to cart...',
						text: 'Please wait while we add the product to your cart',
						icon: 'info',
						confirmButtonColor: '#c89c6c',
						showConfirmButton: false,
						allowOutsideClick: false,
						showCancelButton: false,
						didOpen: function() {
							Swal.showLoading();
						}
					});
				},
				success: function(response) {
					//close swal
					Swal.close();
					//check if response is json
					if (response.success) {
						if (isBuyNow) {
							//redirect to checkout
							window.location.href = '<?php echo wc_get_checkout_url(); ?>';
						} else {
							//swal success
							Swal.fire({
								title: 'Success',
								text: 'Product added to cart',
								icon: 'success',
								confirmButtonColor: '#c89c6c',
								confirmButtonText: 'Go to Cart',
								allowOutsideClick: false,
								//cancel button text
								showCancelButton: true,
								cancelButtonText: 'Continue Shopping',
							}).then(function(isConfirmed) {
								if (isConfirmed) {
									//redirect to cart
									window.location.href = '<?php echo wc_get_cart_url(); ?>';
								}
							});
						}
					} else {
						//swal error
						Swal.fire({
							title: 'Error',
							text: response.data.message,
							icon: 'error',
						});
					}
				},
				error: function(response) {
					console.log(response);
					Swal.fire({
						title: 'Error',
						text: 'An error occurred while adding to cart',
						icon: 'error',
						confirmButtonColor: '#c89c6c'
					});
				}
			});
		}


		/**
		 * Add to cart
		 */
		$('#add-item-cart, #buy-button').on('click', function() {
			var productId = $(this).data('product-id');
			var productIsInStock = $(this).data('product-is-in-stock');
			//check if data-is-buy-now is true
			var isBuyNow = $(this).data('is-buy-now');

			//check if product is variable
			if (productVariations && productVariations.length > 0) {
				//get selected variant
				var selectedVariant = $('.feature-product-variant-select').val();
				//get the variation that matches the selected variant
				var variation = productVariations.find(function(variation) {
					return variation.attributes['attribute_color'] === selectedVariant;
				});
				//is_in_stock
				if (variation.is_in_stock) {
					//variation_id
					var variationId = variation.variation_id;
					//add to cart
					addToCartAjax(productId, variationId, isBuyNow);
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
			} else {
				//is_in_stock
				if (productIsInStock == 'true') {
					//add to cart
					addToCartAjax(productId, null, isBuyNow);
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
			}
		});
	});
</script>
</body>

</html>