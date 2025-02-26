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
 * @package karlhawptheme
 */

get_header();

?>


<div class="main-side-cart-wrapper">
	<div class="side-cart-main-block">
		<div class="side-cart-heading-block">
			<h1 class="side-cart-main-heading">Your BAG</h1><a class="side-cart-close-link w-inline-block" href="#" onclick="hideSideCart()"><img src="https://uploads-ssl.webflow.com/5e257bf2b2b645122d1437b5/5e5d9231b13fe4d59347b9c8_21b92c682e4c6b3998d7843450a56763.png" alt=""></a>
		</div>
		<div class="main-side-cart-products-wrapper w-clearfix" id="main-side-cart-product-wrapper"></div>
		<div class="side-cart-products-empty-wrapper" id="side-cart-product-wrapper"><img class="shopping-cart-empty-icon" src="/images/Ecommerce-Shopping-Bag-icon.png" alt="">
			<div class="side-cart-empty-text">Your shopping cart is empty</div>
		</div>
		<div class="_wf-side-cart-summary-block">
			<div>
				<div class="side-cart-sub-total-text" id="side-cart-sub-total">$0.00</div>
			</div>
			<div class="side-cart-link-block"><a class="side-cart-checkout-link" href="/cart/?id=8xWbgIG06g4HwQvwhSGnyriB" data-cartlink="">PROCEED TO CHECKOUT</a>
				<div class="w-embed"><a class="side-cart-continue-shopping-link" style="cursor: pointer;" onclick="hideSideCart()">CONTINUE SHOPPING</a></div>
				<div class="styles-2"><a class="side-cart-continue-shopping-link" href="#">Text Link</a></div>
			</div>
		</div>
	</div>
</div>

<?php

get_footer();
